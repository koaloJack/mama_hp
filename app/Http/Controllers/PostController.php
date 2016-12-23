<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use Session;
use App\Http\Response;
use Storage;
use App\Album;
use Illuminate\Support\Facades\Redirect;
class PostController extends Controller
{

     public function __construct(){
       $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allposts= Post::orderBy('id','desc')->paginate(3);
        return view('posts.index')->withPosts($allposts);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,array(
            'title'=>'required',
            'slug'=>'required|max:255|min:5|alpha_dash|unique:posts,slug',
            'body'=>'required'
        ));
        //store in database
        $post= new Post;

        $post->title =  $request->title;
        $post->slug  =  $request->slug;
        $post->gallerytype  =  $request->gallerytype;

        $post->body  =  $request->body;



        //$file=$request->file('image');
        //$filename=$post->title.'_'.$post->slug.'.jpg';
        //if($file){
        //    Storage::disk('local')->put($filename,File::get($file));
        //}

        $post->save();
        $album = new Album;
        $album ->name=$request->slug;
        $album ->description=$request->title;


        $album->save();

        //Session::flash('success','The blog post was sucessfully saved');
        //return Redirect::route('add_image',array('id'=>$album->id));

        return view('posts.imageUpload')->with('id',$album->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        $grids  = $post->grids;
        $images = $post->photos;
        return view('posts.show', array('post'=>$post,'images'=>$images,'grid'=>$grids));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post= Post::find($id);
        $grids  = $post->grids;
        $images = $post->photos;

        return view('posts.edit',array('post'=>$post,'images'=>$images,'grid'=>$grids));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $post=Post::find($id);
      if($request->input('slug')==$post->slug){
      $this->validate($request,array(
          'title'=>'required',
          'body'=>'required'

      ));
    } else{
      $this->validate($request,array(
          'title'=>'required',
          'slug'=>'required|max:255|min:5|alpha_dash|unique:posts,slug',
          'body'=>'required'

      ));


    }

      $post=Post::find($id);

      $post->title= $request->input('title');
      $post->slug= $request->input('slug');
      $post->body= $request->input('body');

      $post->save();

      return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post= Post::find($id);

        $post->delete();

        return redirect()->route('posts.index');
    }


}
