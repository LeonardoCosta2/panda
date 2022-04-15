<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller{
    
    public function index(){
        return view('admin.home');
    }

    public function posts(){
        $posts = Post::all();

        return view('site.home', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //dd($request->allFiles()['description']);
        $input = $request->all();

        $post = new Post();
        $post->title = $input['title'];
        $post->tags = $input['tags'];
        $post->description = $input['description'];
        $post->save();

        return true;

    }

    public function uploadImagePost(){
        // Allowed extentions.
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        // Get filename.
        $temp = explode(".", $_FILES["image_param"]["name"]);

        // Get extension.
        $extension = end($temp);

        // An image check is being done in the editor but it is best to
        // check that again on the server side.
        // Do not use $_FILES["file"]["type"] as it can be easily forged.
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES["image_param"]["tmp_name"]);

        if ((($mime == "image/gif")
        || ($mime == "image/jpeg")
        || ($mime == "image/pjpeg")
        || ($mime == "image/x-png")
        || ($mime == "image/png"))
        && in_array($extension, $allowedExts)) {
            // Generate new random name.
            $name = sha1(microtime()) . "." . $extension;

            // Save file in the uploads folder.
            move_uploaded_file($_FILES["image_param"]["tmp_name"], getcwd() . "/img/" . $name);

            // Generate response.
            //$response = new StdClass;
            $response['link'] = "/img/" . $name;
            echo stripslashes(json_encode($response));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
