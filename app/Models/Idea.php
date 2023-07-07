<?php

namespace App\Models;

use App\Exceptions\VoteNotFoundException;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idea extends Model
{
    use HasFactory, Sluggable;


    protected $guarded = [];


    const PAGINATION_COUNT = 10;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function author()
    {
        return self::belongsTo(User::class, 'user_id');
    }

    

    public function category()
    {
        return self::belongsTo(Category::class, 'category_id');
    }

    public function status()
    {
        return self::belongsTo(Status::class, 'status_id');
    }

    public function votes()
    {
        return self::belongsToMany(User::class, 'votes');
    }

    public function isVotedByUser( ? User $user)
    {
        if(!$user){
            return false;
        }

        return Vote::where('user_id', $user->id)
            ->where('idea_id', $this->id)
            ->exists();
    }
    public function vote(User $user){
        Vote::create([
            'user_id'=>$user->id,
            'idea_id'=>$this->id
        ]);
    }
    public function removeVote(User $user){
        $voteToDelete=Vote::where('user_id', $user->id)
        ->where('idea_id', $this->id)
        ->first();
        if($voteToDelete){
            $voteToDelete->delete();
        }
        else{
            throw new VoteNotFoundException;
        }
    }
}
