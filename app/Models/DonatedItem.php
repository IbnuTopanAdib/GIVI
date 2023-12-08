<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Category;
use App\Models\User;
class DonatedItem extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    protected $with = ['category', 'user'];

    public function scopeFilter($query, array $filters){
        // if(isset($filters['search']) ? $filters['search']:false){
        //     return $query->where('judul','like','%'. $filters['search'] . '%')
        //           ->orWhere('body','like','%'. $filters['search'] . '%');
        // }

        $query->when(($filters['search']) ?? false, function($query, $search){
            return $query->where('name','like','%'. $search . '%')
                  ->orWhere('description','like','%'. $search . '%');
        });
        $query->when(($filters['category']) ?? false, function($query, $category){
            return $query->whereHas('category', function($query)  use ($category){
                $query->where('category_name', $category);
            });
        });
        $query->when(($filters['user']) ?? false, fn($query, $user)=>
            $query->whereHas('user', fn($query)=>  
                $query->where('username', $user)
            )
        );

        
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function donation(): HasMany
    {
        return $this->hasMany(User::class);
    }


}
