<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
    ];
    public function vocabs()
    {
      return $this->hasMany(Vocab::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function withRoles($roleId)
    {
        return $this->belongsToMany(Role::class)->wherePivot('role_id', '=', $roleId);
    }

    public function permissions($userId)
    {
        $permissions=[];
        foreach ($this->roles as $role)
        {
            if($role->pivot->user_id==$userId){

                foreach($role->permissions as $permission)
                {
                    $permissions[]=$permission->title.$permission->pivot->model_name;
                }

            }

        }

        return collect($permissions);
   }
}
