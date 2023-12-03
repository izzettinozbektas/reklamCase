<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Platform extends Model
{
    use HasFactory;
    protected $fillable = ['name','remainder','created_at'];
    public $timestamps = false;

    public function getAdvertisings() : BelongsToMany
    {
        return $this->belongsToMany( Advertising::class, 'advertising_to_platform','advertising_id','platform_id');
    }
    public function getTransactions(): HasMany
    {
        return $this->hasMany(PlatformTransaction::class,'id','platform_id');
    }
}
