<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //  
    public $table = "post";
    protected $fillable = ['img', 'description', 'category', 'start_date', 'end_date'];


    public static function getAll()
    {
        $data = \DB::table('post')

            ->select('post.*')
            ->paginate(2);
        var_dump($data);
        return $data;
    }
}
