<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'status',
        'name',
        'surname',
        'email',
        'username',
        'tckn',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $appends = ['full_name'];
    public function getRole()
    {
        foreach ($this->roles as $role){
            $roles[] = $role->name;
        }
        return $roles;
    }
    public function getPermission()
    {
        foreach ($this->getPermissionsViaRoles() as $permissionsViaRole){
            $permissions[] = $permissionsViaRole->name;
        }
        return $permissions;
    }
    public static function getConcat($q){
        return User::select('id','name','surname')->where(DB::raw('CONCAT(name," ",surname)'),"like","%$q%")->whereIn('status',[1,2]);
    }
    public static function getFullName($q){
        return User::select('id','name','surname','created_at')->where(DB::raw('CONCAT(name," ",surname)'),"like","%$q%");
    }

    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'user_has_brands', 'user_id', 'brand_id')->select(['name','id']);
    }

    public function getFullNameAttribute(){
        return ($this->name." ".$this->surname);
    }
    public function detail():HasOne
    {
        return  $this->hasOne(UserDetail::class,'user_id','id');
    }
    public function workScore():HasMany
    {
        return $this->hasMany(WorkScore::class, 'user_id','id');
    }
    public function permits():HasMany
    {
        return $this->hasMany(Permit::class,'user_id','id');
    }

}
