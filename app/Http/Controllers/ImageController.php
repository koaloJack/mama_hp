<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use Session;
use Illuminate\Http\Response;
use Storage;
use Illuminate\Support\Facades\Input;
use App\Image;
use App\Album;
use App\Grid;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageController extends Controller{

        public function deleteImage($id){

          $post = Post::find($id);
          $grids  = $post->grids;
          $images = $post->photos;

          return view('posts.edit',array('post'=>$post,'images'=>$images,'grid'=>$grids));

        }

        public function getForm($id)
        {
          $post = Post::find($id);
          //return view('posts.imageUpload')
          //->with('album',$album);
          return view('posts.imageUpload', array('album' => $album->id));

        }

        public function getImage($img){

          if(Storage::disk('local')->has($img)){
          $file=Storage::disk('local')->get($img);

          //$img=Image::make($file)->resize(200,200);
          return new Response($file,200);
          }
       }


        public function getPreview($id)
        {
          $post=Post::find($id);
          $images = $post->photos;
          //return view('posts.imageUpload')
          //->with('album',$album);
          $y_coordinates=array(0,0,0,1,1,1);
          $x_coordinates=array(0,4,2,0,1,2);

          return view('posts.previewPost', array('post'=>$post,'images'=>$images,'y'=>$y_coordinates,'x'=>$x_coordinates));

        }



        public function upload(Request $request,$id){



            if(!empty($image)){
              echo "in loop";

              $data=file_get_contents($image);
              Image::create(array(
                     'image' => $savedImageName,
                     'post_id'=> $id
                   ));
                 //$extension = $file->getClientOriginalExtension();
               Storage::disk('local')->put($savedImageName,$data);
            }
       }

        public function show($filename){
                //$file=Storage::disk('local')->get($filename);

                if(Storage::disk('local')->has($filename)){
                $file=Storage::disk('local')->get($filename);

                //$img=Image::make($file)->resize(200,200);
                return new Response($file,200);
        }
        public function totalPreview($id,Request $request){

          //$grid=$this->file('grid_data');
          //$post=$POST_['grid'];

          $inputArray = $request->all();
          print_r ($inputArray);
          $grid=$request->get('grid');
          echo $grid;

          $grid_data=json_decode(utf8_encode($grid),true);
          foreach($grid_data as $grid){
            var_dump($grid);

            Grid::create(array(
                   'x' => $grid['x'],
                   'y'=> $grid['y'],
                   'width'=> $grid['width'],
                   'height'=> $grid['height'],
                   'post_id'=> $id
                 ));
          }

          $post=Post::find($id);

          $grids  = $post->grids;
          $images = $post->photos;
          return view('posts.result', array('post'=>$post,'images'=>$images,'grid'=>$grids));
        }

