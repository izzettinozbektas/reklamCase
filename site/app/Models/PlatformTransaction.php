<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformTransaction extends Model
{
    use HasFactory;
    protected $table = 'platform_transactions';
    protected $fillable = ['platform_id','clicks','spend','revenue','impressions','created_at'];
    public $timestamps = false;
}
