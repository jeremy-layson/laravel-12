<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Business extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'country_code',
        'city',
        'postal_code',
        'enabled',
        'slug',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'enabled' => 'boolean',
    ];
    
    /**
     * Get the branches for the business.
     */
    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }
    
    /**
     * Get the users for the business.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
