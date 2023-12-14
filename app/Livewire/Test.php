<?php

namespace App\Livewire;

use App\Actions\ProcessSalesData\CreateNewSalesData;
use App\Actions\StoreResults\StoreNewResult;
use App\Models\Dvi;
use App\Models\Experiential;
use App\Models\Ipv;
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
    public $floatingEmailParent = '';

    #[Rule('required|email')]
    public $floatingEmailInstitution = '';

    #[Rule('required')]
    public $floatingFirstName = '';

    #[Rule('required')]
    public $floatingLastName = '';

    #[Rule('required')]
    public $floatingPhone = '';

    #[Rule('required')]
    public $floatingCompany = '';

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

            $this->floatingEmailParent = $salesData->floatingEmailParent;
            $this->floatingEmailInstitution = $salesData->floatingEmailInstitution;
            $this->floatingFirstName = $salesData->floatingFirstName;
            $this->floatingLastName = $salesData->floatingLastName;
            $this->floatingPhone = $salesData->floatingPhone;
            $this->floatingCompany = $salesData->floatingCompany;
        }

        if ($xpath == 'eid') {
            $this->questions = Dvi::all();
        }

        if ($xpath == 'ivp') {
            $this->questions = Ipv::all();
        }
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
        $storeExperiencial = new StoreNewResult(
            $this->user->id,
            Carbon::parse($this->user->birthday)->age,
            $this->session, $this->xpath,
            $this->lang,
            $this->timeSetted,
            $result
        );
        $storeExperiencial->store();

        /**
         * Creating Sales Force Data
         */
        $this->validate();
        $processSalesData = new CreateNewSalesData(
            $this->session,
            $this->floatingEmailParent,
            $this->floatingEmailInstitution,
            $this->floatingFirstName,
            $this->floatingLastName,
            $this->floatingPhone,
            $this->floatingCompany
        );
        $processSalesData->store();
        
        redirect()->to('/dashboard');

    }

    public function callActionAnswer(bool $state, int $question)
    {

        if ($state) {

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
