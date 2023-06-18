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
    const PAGINATION_COUNT=10;

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

    //impleting the relationships 

    public function author(){
        return self::belongsTo(User::class,'user_id');
    }

    public function category(){
        return self::belongsTo(Category::class,'category_id');
    }
    public function status(){
        return self::belongsTo(Status::class,'status_id');
    }
}
