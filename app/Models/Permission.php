<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'module',
        'description',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }

    protected function rolePermissions()
    {
        return $this->hasMany(RolePermission::class);
    }
}
