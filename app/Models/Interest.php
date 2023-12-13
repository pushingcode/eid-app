<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Interest extends Model
{
    use HasFactory;

    protected $table = 'dvi_interests';

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Dvi::class, 'dvi_assets', 'dvi_interest_id', 'dvi_question_id');
    }
}
