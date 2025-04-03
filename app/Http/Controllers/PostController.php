<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::orderBy('created_at', 'DESC')
        ->get();

        return response()->json([
            'code' => 200,
            'status' => 'List Posts',
            'posts' => $posts,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(Request $request)
    {

        return Post::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postShow(Post $post)
    {

        // $post = Post::with('categories')->find($id);


        if (!$post) {
            return response()->json([
                'message' => 'post not found.'
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'post' => $post,
        ], 200);
    }

    public function postShowWithCategory(Post $post)
    {

        // $post = Post::with('categories')->find($id);

        $post = Post::join('categories', 'posts.category_id', '=', 'categories.id')
        ->select(
            'posts.id as id',
            'categories.name'
            )
        ->get();

        if (!$post) {
            return response()->json([
                'message' => 'post not found.'
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'post' => $post,
        ], 200);
    }

    public function postByCategory($category)
    {
        // $this->authorize('index', User::class);

        $posts = Post::with('categories')->where('category_id', $category)->get();
            return response()->json([
                'code' => 200,
                'status' => 'Listar Post by Category',
                'posts' => $posts,
            ], 200);
    }


    public function postShowSlug($slug)
    {
        // $post = Post::where('slug', $slug)->first();

        $post = Post::select([
            "id",
            'title',
        'description',
        'category_id',
        'slug',
        'image',
        ])
            ->where('slug', $slug)
            ->orderBy('id', 'desc')
            ->get();

            return response()->json([
                'code' => 200,
                'status' => 'Listar Post by slug',
                'post' => $post,
            ], 200);
    }

     public function recientes()
    {
        $postrecientes = Post::orderBy('created_at', 'DESC')
        ->get();

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'postrecientes' => $postrecientes
        ], 200);
    }

    public function destacados()
    {

        $posts = Post::join('categories', 'posts.category_id', '=', 'categories.id')
                ->with(["users"])
                ->where('isFeatured', $featured=true)
                ->get([
                    'posts.*', 'posts.title',
                    'categories.*', 'categories.name',
                ]);
            return response()->json([
                'code' => 200,
                'status' => 'Listar Post destacados',
                'posts' => $posts,
            ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $id)
    {
        $post = Post::findOrfail($id);
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug = $request->slug;
        $post->isFeatured = $request->isFeatured;
        $post->status = $request->status;
        $post->image = $request->image;
        $post->update();
        return $post;
    }

    public function postUpdateStatus(Request $request, $id)
    {
        $post = Post::findOrfail($id);
        $post->status = $request->status;
        $post->update();
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {

        $post =  Post::where('id', $id)->first();

        if(!empty($post)){

             // borrar
             $post->delete();
             // devolver respuesta
             $data = [
                 'code' => 200,
                 'status' => 'success',
                 'post' => $post
             ];
         }else{
             $data = [
                 'code' => 404,
                 'status' => 'error',
                 'message' => 'el post no existe'
             ];
         }

         return response()->json($data, $data['code']);
    }

    protected function postInput(string $file = null): array
    {
        return [
            "title" => request("title"),
            "description" => request("description"),
            "slug" => request("slug"),
            "category_id" => request("category_id"),
            "image" => $file,
            "status" => request("status"),
        ];
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    protected function generateFileName(UploadedFile $file): string {
        $extension = $file->getClientOriginalExtension();
        $fullName = $file->getClientOriginalName();
        $pathFileName = trim(pathinfo($fullName, PATHINFO_FILENAME));
        $secureMaxName = substr(Str::slug($pathFileName), 0, 90);
        return sprintf('%s-%s.%s', $secureMaxName, now()->timestamp, $extension);
    }




    public function upload(Request $request)
     {
         // recoger la imagen de la peticion
         $image = $request->file('file0');
         // validar la imagen
         $validate = \Validator::make($request->all(),[
             'file0' => 'required|image|mimes:jpg,jpeg,png,gif'
         ]);
         //guardar la imagen en un disco
         if(!$image || $validate->fails()){
             $data = [
                 'code' => 400,
                 'status' => 'error',
                 'message' => 'Error al subir la imagen'
             ];
         }else{
            $extension = $image->getClientOriginalExtension();
            $image_name = $image->getClientOriginalName();
            $pathFileName = trim(pathinfo($image_name, PATHINFO_FILENAME));
            $secureMaxName = substr(Str::slug($image_name), 0, 90);
            $image_name = now().$secureMaxName.'.'.$extension;

             \Storage::disk('posts')->put($image_name, \File::get($image));

             $data = [
                 'code' => 200,
                 'status' => 'success',
                 'image' => $image_name
             ];

         }

         return response()->json($data, $data['code']);// devuelve un objeto json
     }

     public function getImage($filename)
     {

         //comprobar si existe la imagen
         $isset = \Storage::disk('posts')->exists($filename);
         if ($isset) {
             $file = \Storage::disk('posts')->get($filename);
             return new Response($file, 200);
         } else {
             $data = array(
                 'status' => 'error',
                 'code' => 404,
                 'mesaje' => 'Imagen no existe',
             );

             return response()->json($data, $data['code']);
         }

     }

     public function deleteFotoPost($id)
     {
         $post = Post::findOrFail($id);
         \Storage::delete('posts/' . $post->image);
         $post->image = '';
         $post->save();
         return response()->json([
             'data' => $post,
             'msg' => [
                 'summary' => 'Archivo eliminado',
                 'detail' => '',
                 'code' => ''
             ]
         ]);
     }


     public function search(Request $request){

        return Post::search($request->buscar);

    }
}
