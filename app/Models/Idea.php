<?php

namespace App\Models;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idea extends Model
{
    use HasFactory,Sluggable;
    protected $guarded=[];

    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'title',
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
