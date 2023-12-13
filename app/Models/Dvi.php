<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dvi extends Model
{
    use HasFactory;

    protected $table = 'dvi_questions';

    public function interests(): BelongsToMany
    {
        return $this->belongsToMany(Interest::class, 'dvi_assets', 'dvi_question_id', 'dvi_interest_id');
    }
}
