<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Advertising extends Model
{
    use HasFactory;
    protected $table = 'advertisings';
    protected $fillable = ['name','description','start_date','end_date','created_at'];
    public $timestamps = false;
    public function getPlatforms() : BelongsToMany
    {
        return $this->belongsToMany( Platform::class, 'advertising_to_platform','advertising_id','platform_id');
    }
}
