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
        public function showSingleImage($id)
        {
          //$post=Post::find($id);
          //$images = $post->photos;
          //return view('posts.imageUpload')
          //->with('album',$album);
          //if(!$images.empty){
            //$image= $images[0];
            //else {
            //  $image= Dummy::find(0);
            //}

          //}

          //return Response($image);
        }


        public function upload(Request $request,$id){

          if ( $request->isXmlHttpRequest() )
          {
            $image = $request->file( 'image' );
            $timestamp = $this->getFormattedTimestamp();
            $savedImageName = $this->getSavedImageName( $timestamp, $image );


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


          /*



                      if ( $imageUploaded )
                      {
                          $data = [
                              'original_path' => asset( '/images/' . $savedImageName )
                          ];
                          return json_encode( $data, JSON_UNESCAPED_SLASHES );
                      }
                      return "uploading failed";
                    }


          $file=Input::file('file');
          var_dump(Input::file());

          $post=Post::find($id);
          //$destinationPath=public_path() . '/uploads/';
          //$filename = $file->getClientOriginalName();

          //$upload_success = Input::file('file')->move($destinationPath, $filename);


           if(!empty($file)){
             echo "in loop";
             $filename  = $file->getClientOriginalName();
             $data=file_get_contents($file);
             Image::create(array(
                    'image' => $filename,
                    'post_id'=> $id
                  ));
                //$extension = $file->getClientOriginalExtension();
              Storage::disk('local')->put($filename,$data);
            }





          */
        //return view('posts.imagePreview')->withAlbum($album);
       }

        public function show($filename){
                //$file=Storage::disk('local')->get($filename);

                if(Storage::disk('local')->has($filename)){
                $file=Storage::disk('local')->get($filename);

                //$img=Image::make($file)->resize(200,200);
                return new Response($file,200);

              }


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

                                                                                                                                                                                                    /*

          //$arr = get_defined_vars();
          //print_r($arr);
          //$post->grid=serialize($grid_data);
          //$type=gettype($grid_data);

          //var_dump($type);
          //echo "test";
          var_dump($grid_data['grid']);
          foreach($grid_data['grid'] as $grid){
            var_dump($grid);

            Grid::create(array(
                   'x' => $grid['x'],
                   'y'=> $grid['y'],
                   'width'=> $grid['width'],
                   'height'=> $grid['height'],
                   'post_id'=> $id
                  ));

          }


          $images = $post->photos;
          $grids  = $post->grids;
          //var_dump($images);
*/
          $post=Post::find($id);

          $grids  = $post->grids;
          $images = $post->photos;
          return view('posts.result', array('post'=>$post,'images'=>$images,'grid'=>$grids));
        }

    //
}
