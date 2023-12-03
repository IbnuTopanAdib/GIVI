<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Donation extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }
    public function answer(): HasOne
    {
        return $this->hasOne(Answer::class);
    }
}
