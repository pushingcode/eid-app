<?php

namespace App\Livewire;

use App\Actions\ProcessSalesData\CreateNewSalesData;
use App\Actions\StoreResults\StoreNewResult;
use App\Models\Dvi;
use App\Models\Experiential;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Test extends Component
{
    public User $user;

    public ?Experiential $lastTest;

    public string $session;

    public array $hash; //is promoted to component

    public ?string $timeSetted = null; //is promoted to component

    public Collection $questionsBag; //is promoted to component

    public Collection $questions; //is promoted to component

    public string $lang; //is promoted to component

    public string $xpath; //is promoted to component

    #[Rule('required|email')]
    public $floating_email_parent = '';

    #[Rule('required|email')]
    public $floating_email_institution = '';

    #[Rule('required')]
    public $floating_first_name = '';

    #[Rule('required')]
    public $floating_last_name = '';

    #[Rule('required')]
    public $floating_phone = '';

    #[Rule('required')]
    public $floating_company = '';

    #[On('start-test')]
    public function startTest($xpath)
    {
        $this->timeSetted = \Carbon\Carbon::now();
        $this->xpath = $xpath;
        $this->session = Str::random(25);

        $this->user = User::find(Auth::id());

        //verifying if the user has a test of this type
        $this->lastTest = Experiential::where('user_id', $this->user->id)
        ->where('tool', $this->xpath)
        ->latest()->first() ?? null;

        //if it is not null, we load the last test result
        if ($this->lastTest != null) {
            $salesData = Sale::where('session', $this->lastTest->session)->latest()->first();

            $this->floating_email_parent = $salesData->floating_email_parent;  
            $this->floating_email_institution = $salesData->floating_email_institution;
            $this->floating_first_name = $salesData->floating_first_name;
            $this->floating_last_name = $salesData->floating_last_name;
            $this->floating_phone = $salesData->floating_phone;
            $this->floating_company = $salesData->floating_company;
        }

        if ($xpath == 'eid') {
            $this->questions = Dvi::all();
        }

        //if ($xpath == 'ivp') {}
    }

    public function mount()
    {
        $this->session = new Collection();
        $this->questionsBag = new Collection();
        $this->lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        
    }

    public function save()
    {

        ksort($this->hash);

        $result = [
            "results"   => $this->hash,
            "bags"      => $this->questionsBag
        ];

        /**
         * Creating Experiencial Report
         */
        $storeExperiencial = new StoreNewResult($this->user->id, Carbon::parse($this->user->birthday)->age, $this->session, $this->xpath, $this->lang, $this->timeSetted, $result);
        $storeExperiencial->store();

        /**
         * Creating Sales Force Data
         */
        $this->validate();
        $processSalesData = new CreateNewSalesData($this->session, $this->floating_email_parent, $this->floating_email_institution, $this->floating_first_name, $this->floating_last_name, $this->floating_phone, $this->floating_company);
        $processSalesData->store();
        
        redirect()->to('/dashboard');

    }

    public function callActionAnswer(bool $state, int $question)
    {

        if ($state == true) {

            $dataQuest = Dvi::find($question);

            foreach ($dataQuest->interests as $interest) {
                if (array_key_exists($interest->name, $this->hash)) {

                    $this->hash[$interest->name] += $dataQuest->value;

                } else {

                    $this->hash[$interest->name] = $dataQuest->value;

                }
            }
        }

        $this->questionsBag->push([
            'q' => $question,
            's' => $state,
            't' => \Carbon\Carbon::now()->timestamp,
        ]);

    }

    public function render()
    {
        return view('livewire.test');
    }
}
