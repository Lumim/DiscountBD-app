<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use Image;
use File;
use App\User;
use League\Flysystem\Exception;


class actioncontroller extends Controller
{
    //
    public function like($pid,$uid){

        try{
       $likedusers= DB::table('post')
       ->where('id', '=', $pid)
       ->pluck('likedusers');
       $arr= json_decode($likedusers,true);
       $total_likes=DB::table('post')->where('id','='$pid)->pluck('total_likes');

       var_dump($arr);

       if($likedusers=null || $likedusers!==null){
        array_push($arr,$uid);
        $data=json_encode($arr);
        \DB::table('post')->where('id', $pid)->update(array('likedusers' => $data));
        $total_likes+=1;
        \DB::table('post')->where('id',$pid)->update(array('total_likes'=>$total_likes));
       }
    }
    catch(\Throwable $th){
        $message = "Message : " . $th->getMessage() . ", File : " . $th->getFile() . ", Line : " . $th->getLine();
        return redirect()->back()->with('errormessage', $message);

    }

        

    }
}
