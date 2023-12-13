<?php

namespace App\Livewire;

use App\Models\Experiential;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StartSession extends Component
{
    public ?string $start = null;

    public bool $disable = true;

    public $questions;

    public $xpath;

    public function shouldExecute($startDate): bool
    {
        $start = Carbon::parse($startDate);
        $now = Carbon::now();

        if ($startDate != null) {
            if ($now->diffInDays($start) < env('DAYS_MINIMUMS')) {
                return true;
            }
        }

        return false;

    }

    public function mount()
    {
        $user = Experiential::where('user_id', Auth::id())
            ->where('tool', $this->xpath)
            ->latest()->first() ?? null;
        //set disable button
        $this->disable = $this->shouldExecute($user?->created_at);
    }

    public function setStart($item)
    {
        $this->dispatch('start-test', xpath: $item);
    }

    public function render()
    {
        return view('livewire.start-session');
    }
}
