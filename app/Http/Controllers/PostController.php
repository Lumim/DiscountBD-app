<?php

namespace App\Http\Controllers;

use App\Post;
use Image;
use File;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Flysystem\Exception;

class PostController extends Controller
{
    //
    public function make_post()
    {
        return view('makepost');
    }
    public function view_post()
    {

        $data = Post::orderBy('id', 'DESC')->paginate(4);
        $count = count($data);
        $data->setPath(url('admin/routes/viewpost'));
        $post_pagination = $data->render();
        $post['post_pagination'] = $post_pagination;
        $post['post'] = $data;
        $post['i'] = $count;


        return view('viewpost', $post);
    }
    public function store_post(Request $request)
    {
        try {
            $now = date('Y-m-d H:i:s');

            if (!empty($request->input('description'))) {

                if ($request->hasFile('content_image'))

                    $image = $request->file('content_image');
                $filename  = time() . '.' . $image->getClientOriginalExtension();
                $path = 'public/img/post/' . $filename;
                Image::make($image->getRealPath())->resize(800, 400)->save($path);

                $data = array(
                    'description' => $request->input('description'),
                    'img' => $filename,
                    'created_by' => Auth::user('id'),
                    'category' => $request->input('category'),
                    'start_date' => $request->input('start_date'),
                    'end_date' => $request->input('end_date')
                );
                \DB::table('post')->insert($data);
                return \Redirect::to('admin/routes/makepost')->with('message', "Post Has Been Uploaded SusscessFully ");
            } else {
                return \Redirect::to('admin/routes/makepost')->with('message', "Please enter the data correctly ");
            }
        } catch (\Throwable $th) {
            //throw $th;

            var_dump($th);

            $message = "Message : " . $th->getMessage() . ", File : " . $th->getFile() . ", Line : " . $th->getLine();

            return redirect()->back()->with('errormessage', $message);
        }
    }
    public function publish_post($id)
    {
        try {
            \DB::table('post')->where('id', $id)->update(array('isPublished' => '1'));
            return redirect()->back()->with('message', "Post Has Been published SusscessFully ");
        } catch (\Throwable $th) {
            $message = "Message : " . $th->getMessage() . ", File : " . $th->getFile() . ", Line : " . $th->getLine();
            return redirect()->back()->with('errormessage', $message);
        }
    }
    public function unpublish_post($id)
    {
        try {
            \DB::table('post')->where('id', $id)->update(array('isPublished' => '0'));
            return redirect()->back()->with('message', "Post Has Been unpublished SusscessFully ");
            die();
        } catch (\Throwable $th) {
            $message = "Message : " . $th->getMessage() . ", File : " . $th->getFile() . ", Line : " . $th->getLine();
            return redirect()->back()->with('errormessage', $message);
        }
    }
    public function delete_post($id, $img)
    {
        try {
            $image_path = 'public/img/post/' . $img;  // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);

                \DB::table('post')->where('id', $id)->delete();
                return redirect()->back()->with('message', "Post Has Been deleted SusscessFully ");
            } else {
                var_dump($image_path);
            }
        } catch (\Throwable $th) {
            echo "not done";

            $message = "Message : " . $th->getMessage() . ", File : " . $th->getFile() . ", Line : " . $th->getLine();

            return redirect()->back()->with('errormessage', $message);
        }
    }
    public function edit_post($id, $description)
    {
        try {
            \DB::table('post')->where('id', $id)->update(array('description' => $description));
            return redirect()->back()->with('message', "Post Has Been updated SusscessFully");
            die();
        } catch (\Throwable $th) {
            $message = "Message : " . $th->getMessage() . ", File : " . $th->getFile() . ", Line : " . $th->getLine();
            return redirect()->back()->with('errormessage', $message);
        }
    }
    public function add_details($id, $details)
    {
        try {
            \DB::table('post')->where('id', $id)->update(array('details' => $details));
            return redirect()->back()->with('message', "Details Has Been added SusscessFully ");
        } catch (\Throwable $th) {
            $message = "Message : " . $th->getMessage() . ", File : " . $th->getFile() . ", Line : " . $th->getLine();
            return redirect()->back()->with('errormessage', $message);
        }
    }
}
