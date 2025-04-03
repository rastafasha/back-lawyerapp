<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {

        $documents = Document::get();

        return response()->json([
            'code' => 200,
            'status' => 'List documents',
            'documents' => $documents,
        ], 200);
    }

    public function show(Document $document)
    {

        if (!$document) {
            return response()->json([
                'message' => 'document not found.'
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'document' => $document,
        ], 200);
    }

    public function documentByUser($user)
    {
        // $this->authorize('index', User::class);

        $documents = Document::with('users')->where('user_id', $user)->get();
            return response()->json([
                'code' => 200,
                'status' => 'Listar Post by Category',
                'documents' => $documents,
            ], 200);
    }

    public function documentCreate(Request $request)
    {

        return Document::create($request->all());

    }

    public function documentUpdate(Request $request, $id)
    {
        $document = Document::findOrfail($id);
        $document->update();
        return $document;
    }

    public function documentUpdateStatus(Request $request, $id)
    {
        $document = Document::findOrfail($id);
        $document->status = $request->status;
        $document->update();
        return $document;
    }

    public function destroy($id, Request $request)
    {

        $document =  Document::where('id', $id)->first();

        if(!empty($document)){

             // borrar
             $document->delete();
             // devolver respuesta
             $data = [
                 'code' => 200,
                 'status' => 'success',
                 'document' => $document
             ];
         }else{
             $data = [
                 'code' => 404,
                 'status' => 'error',
                 'message' => 'el document no existe'
             ];
         }

         return response()->json($data, $data['code']);
    }

    public function documentShare(Request $request, $id)
    {
        $document = Document::findOrfail($id);
        $document->share = $request->share;
        $document->update();
        return $document;
    }

    public function search(Request $request){

        return Document::search($request->buscar);

    }
}
