<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'business_id',
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
     * Get the business that owns the branch.
     */
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
    
    /**
     * Get the users for the branch.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
