<?php declare(strict_types=1);

namespace App\Actions\StoreResults;

use App\Mail\TestCompleted;
use App\Models\Experiential;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StoreNewResult
{
    public function __construct(
        private int $userId,
        private int $userAge,
        private string $session,
        private string $xpath,
        private string $lang,
        private ?string $timeSetted,
        private array $result
    )
    {}

    /**
     * 
     */
    public function store(): Experiential
    {
        $experiencial = new Experiential();

        $experiencial->user_id = $this->userId;
        $experiencial->user_age = $this->userAge;
        $experiencial->session = $this->session;
        $experiencial->tool = $this->xpath;
        $experiencial->lang = $this->lang;
        $experiencial->time_start = $this->timeSetted;
        $experiencial->result = json_encode($this->result);

        $experiencial->save();
        
        Mail::to(Auth::user())->send(new TestCompleted($experiencial));

        return $experiencial;
    }
}