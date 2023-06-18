<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    public function ideas(){
        return self::hasMany(Idea::class,'status_id');
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
