<?php

namespace App\Models;

use App\Models\Idea;
use App\Models\Comment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function ideas()
    {
        return self::hasMany(Idea::class);
    }

    public function comments()
    {
        return self::hasMany(Comment::class);
    }

    public function votes(){
        return self::belongsToMany(Idea::class,'votes');
    }

    public function getAvatarAttribute()
    {
        $firstCharacter = $this->email[0];
        $int=is_numeric($firstCharacter)
            ? $int= ord(strtolower($firstCharacter)) - 21
            : $int = ord(strtolower($firstCharacter)) - 96;
        return 'https://www.gravatar.com/avatar/'
            . md5($this->email)
            . '?s=200'
            . '&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-'
            . $int
            . '.png';
    }
    public  function isAdmin(){

        return in_array($this->email,[
            'jeffreyway@gmail.com',
            'memad@gmail.com',
            'chagdali@gmail'
        ]);
    }
}
