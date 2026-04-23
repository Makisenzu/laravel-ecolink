<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    protected $fillable = [
        'role_id',
        'firstname',
        'middlename',
        'lastname',
        'username',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function driver()
    {
        return $this->hasMany(Driver::class);
    }

    public function resident()
    {
        return $this->hasMany(Resident::class);
    }

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }

    public function hasRole(string|array $roles): bool
    {
        $roleNames = is_array($roles) ? $roles : [$roles];
        $userRole = $this->role?->role_name;

        return $userRole !== null && in_array($userRole, $roleNames, true);
    }

    public function hasAnyRole(array $roles): bool
    {
        return $this->hasRole($roles);
    }

    public function hasPermission(string $permission): bool
    {
        return $this->role?->permissions()
            ->where('slug', $permission)
            ->orWhere('name', $permission)
            ->exists();
    }
}
