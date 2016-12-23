<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Support\Facades\DB;


class PagesController extends Controller{

    public function getIndex(){
      //$photos = DB::table('posts')->where('gallerytype','like', '0')->get();
      //$paintings = DB::table('posts')->where('gallerytype', 'like', '1')->get();
      $photos=Post::where('gallerytype', 'LIKE', '0')->get();
      $paintings=Post::where('gallerytype', 'LIKE', '1')->get();

      return view('welcome',array('photos'=>$photos,'paintings'=>$paintings));

    }

    public function getAdmin(){
      //$photos = DB::table('posts')->where('gallerytype','like', '0')->get();
      //$paintings = DB::table('posts')->where('gallerytype', 'like', '1')->get();
      $photos=Post::where('gallerytype', 'LIKE', '0')->get();
      $paintings=Post::where('gallerytype', 'LIKE', '1')->get();

      return view('admin',array('photos'=>$photos,'paintings'=>$paintings));

    }

    public function getAbout(){
        $data['name']='Alexandra Braun';
        return view('pages.about')->withName($data);
    }

    public function getContact(){
        return view('pages.contact');
    }

    public function postContact(){


    }
}
