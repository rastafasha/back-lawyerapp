<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function index()
    {

        $favorites = Favorite::get();

        return response()->json([
            'code' => 200,
            'status' => 'List favorites',
            'favorites' => $favorites,
        ], 200);
    }

    public function show(Favorite $favorite)
    {

        if (!$favorite) {
            return response()->json([
                'message' => 'favorite not found.'
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'favorite' => $favorite,
        ], 200);
    }

    public function favoriteByUser($user_id)
    {
        $favorites = Favorite::where('user_id', $user_id)->get();

        if (!$favorites) {
            return response()->json([
                'message' => 'favorite not found.'
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'favorites' => $favorites,
        ], 200);
    }

    public function favoriteCreate(Request $request)
    {

        return Favorite::create($request->all());

    }

    public function favoriteUpdate(Request $request, $id)
    {
        $favorite = Favorite::findOrfail($id);
        $favorite->update();
        return $favorite;
    }

    public function favoriteUpdateStatus(Request $request, $id)
    {
        $favorite = Favorite::findOrfail($id);
        $favorite->status = $request->status;
        $favorite->update();
        return $favorite;
    }

    public function destroy($id, Request $request)
    {

        $favorite =  Favorite::where('id', $id)->first();

        if(!empty($favorite)){

             // borrar
             $favorite->delete();
             // devolver respuesta
             $data = [
                 'code' => 200,
                 'status' => 'success',
                 'Favorite' => $favorite
             ];
         }else{
             $data = [
                 'code' => 404,
                 'status' => 'error',
                 'message' => 'el Favorite no existe'
             ];
         }

         return response()->json($data, $data['code']);
    }

    public function search(Request $request){

        return Favorite::search($request->buscar);

    }
}
