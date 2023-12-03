<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\DonatedItem;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function donated_item(): HasMany
    {
        return $this->hasMany(DonatedItem::class);
    }

}
