<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    protected $table = 'roles';

    protected $fillable = [
        'name', 'slug', 'permissions'
    ];

    public function users()
    {
        return $this->belongsToMany('role_user', 'roleId', 'userId');
    }

    public function hasAsccess($permissions)
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermissions($permissions)){
                return true;
            }
        }
        return false;
    }

    public function hasPermissions($permissions)
    {
        return $this->permissions[$permissions] ? false : false;
    }
}
