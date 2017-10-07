<?php

namespace App\Models;

use Artesaos\Defender\Defender;
use Artesaos\Defender\Role;
use Artesaos\Defender\Traits\HasDefender;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasDefender, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'name', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     //
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * 
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    public function _is($roleName)
    {
        
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == $roleName)
            {
                return true;
            }
        }

        return false;
    }


    public function getUserRole($userId){

        if(isset($this->roles) && count($this->roles)){
            $rol = $this->roles[0]->name;
            if($rol=="super_admin"){
                return "Super Admin";
            }elseif($rol=="admin"){
                return "Admin";
            }elseif($rol=="employee"){
                return "Employee";
            }
            return $this->roles[0]->name;
        }else{
            return "";
        }
    }

    public function isSuperAdmin(){
        return $this->_is('super_admin');
    }

    public function isAdmin(){
        return $this->_is('admin');
    }

    public function isEmployee(){
        return $this->_is('employee');
    }

}
