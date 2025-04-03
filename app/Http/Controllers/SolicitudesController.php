<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudesController extends Controller
{

    public function index()
    {
        // $this->authorize('index', User::class);

        $solicitudes = Solicitud::orderBy('id', 'desc')
            ->get();

            return response()->json([
                'code' => 200,
                'status' => 'Listar todos los Perfiles',
                'solicitudes' => $solicitudes,
            ], 200);
    }
    public function show(Solicitud $solicitud)
    {

        if (!$solicitud) {
            return response()->json([
                'message' => 'solicitud not found.'
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'solicitud' => $solicitud,
        ], 200);
    }

    public function solicitudByUser ($user_id)
     {
         $solicitud = Solicitud::where('user_id', $user_id)->first();

         if (!$solicitud) {
             return response()->json([
                 'message' => 'solicitud not found.'
             ], 404);
         }

         return response()->json([
             'code' => 200,
             'status' => 'success',
             'solicitud' => $solicitud,
         ], 200);
     }

     public function solicitudStore(Request $request)
    {
        $solicitud = null;
        $request->validate([
            'pedido' => 'array', // Ensure medical is present and is an array
        ]);

        $request->request->add(["pedido"=>json_encode($request->pedido)]);
        $solicitud = Solicitud::create([
            "user_id" =>$request->user_id,
            "pedido" =>$request->pedido, // Ensure this is updated correctly
        ]);


        return response()->json([
            "message" => 200,
            "solicitud" => $solicitud,
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        
        $solicitud = Solicitud::findOrfail($id);
        $solicitud->status = $request->status;
        $solicitud->update();
        // if($request->status ===2){
        //     Mail::to($solicitud->email)->send(new UpdateStatusMail($user));
        // }

        return $solicitud;
        
    }
}
