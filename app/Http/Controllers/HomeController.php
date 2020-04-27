<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Post::orderBy('id', 'DESC')->paginate(4);
        $count = count($data);
        $data->setPath(url('/home'));
        $post_pagination = $data->render();
        $post['post_pagination'] = $post_pagination;
        $post['post'] = $data;
        $post['i'] = $count;


        return view('home', $post);
    }
    public function admin()
    {
        return view('admin');
    }
}
