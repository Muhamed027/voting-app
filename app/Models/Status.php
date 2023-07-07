<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    public function ideas()
    {
        return self::hasMany(Idea::class, 'status_id');
    }

    public function get_count()
    {
         return Idea::query()
            ->selectRaw(" count( * ) as all_status")
            ->selectRaw(" count( case when status_id=1 then 1 end ) as open")
            ->selectRaw(" count( case when status_id=2 then 1 end ) as considering")
            ->selectRaw(" count( case when status_id=3 then 1 end ) as in_progress")
            ->selectRaw(" count( case when status_id=4 then 1 end ) as implemented")
            ->selectRaw(" count( case when status_id=5 then 1 end ) as closed")
            ->first()
            ->toArray();
    }







    // public function getcolorAttribute(){
    //     $allStatuses=[
    //         'open'=>'bg-gray-200',
    //         'considering'=>'bg-purple-500 text-white',
    //         'in progress'=>'bg-yellow-500 text-white',
    //         'implemented'=>'bg-green-500 text-white',
    //         'closed'=>'bg-red-500 text-white'
    //     ];
    //     return $allStatuses[$this->name];
    // }
}
