<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
class BlogController extends Controller
{
    //
    public function showpreview($type){

      $input=Post::where('gallerytype', 'LIKE', '0')->get();

      return view('blog.preview')->withInput($input);
    }
    public function getSingle($id){

      $post=Post::find($id);

      $grids  = $post->grids;
      var_dump($grids);
      $images = $post->photos;
      return view('blog.single', array('post'=>$post,'images'=>$images,'grid'=>$grids));
     //return $slug;
    }


}
