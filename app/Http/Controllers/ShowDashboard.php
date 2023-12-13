<?php

namespace App\Http\Controllers;

use App\Models\Experiential;
use App\Services\Dictionary;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class ShowDashboard extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {

        $data = [];
        $userDataSet = Experiential::where('user_id', Auth::id())->get()->last();

        if ($userDataSet == null) {

            $data['visible'] = false;

        } else {

            $carbonite = new Carbon();
            $ask = new Collection();

            $payload = json_decode($userDataSet->result, true);

            $lastTimeStamp = data_get(last($payload['bags']), 't');

            $timeDiff = $carbonite::parse($userDataSet->time_start)
                ->diffInMinutes(
                    $carbonite::createFromTimestamp($lastTimeStamp)->toDateTimeString()
                );
            foreach ($payload['bags'] as $value) {
                $ask->push($value['s']);
            }

             /**
             * Validation limitis
             * 100% true
             * 100% false
             */
            $this->toleranceLimit($ask->percentage(fn ($value) => $value === true));
            $this->toleranceLimit($ask->percentage(fn ($value) => $value === false));
            
            $asked = $ask->countBy(function (bool $result) {
                if ($result === true) {
                    return 'Yes';
                } else {
                    return 'No';
                }
            })->all();

            $userDataSetResult = collect($payload['results']);

            foreach ($userDataSetResult as $key => $value) {
                $data['label'][] = __($key, Dictionary::IMAGE[$userDataSet->lang]);
                $data['data'][] = $value;
            }

            $data['date'] = $this->formatDate($userDataSet->created_at, $userDataSet->lang);
            $data['session'] = $userDataSet->session;
            $data['visible'] = true;
            $data['data'] = json_encode($data);
            $data['tool'] = strtoupper($userDataSet->tool);
            $data['lang'] = strtoupper($userDataSet->lang);
            $data['duration'] = round($timeDiff, 2);
            $data['positive'] = $asked['Yes'];
            $data['negative'] = $asked['No'];

        }

        return view('dashboard', $data);

    }

    private function toleranceLimit($tolerable):void 
    {
        if ($tolerable >= env('TOLERANCE_LIMIT',100)) {
            abort(416, "Tolerance Limit Infraction");
        }
    }

    private function formatDate($date_in, $locale) {
        $date = Carbon::parse($date_in);
    
        switch ($locale) {
            case 'es':
                setlocale(LC_TIME, 'es_ES.UTF-8');
                return $date->formatLocalized('%A, %d de %B de %Y');
            default:
                return $date->format('l, F j, Y');
        }
    }
}
