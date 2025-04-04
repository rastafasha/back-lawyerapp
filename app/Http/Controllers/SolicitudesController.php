<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\SolicitudUser;
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
        $request->validate([
            'pedido' => 'required|array',
            'user_id' => 'required|exists:users,id',
            'solicitudes_selected' => 'array'
        ]);

        // Create the main solicitud
        $solicitud = Solicitud::create([
            "status" => $request->status,
            "pedido" => json_encode($request->pedido),
        ]);

        // Process and validate solicitudes_selected
        $solicitudIds = array_filter(
            array_map('intval', $request->solicitudes_selected),
            function($id) { return $id > 0; }
        );

        if (empty($solicitudIds)) {
            return response()->json([
                "message" => "No valid solicitudes selected",
                "code" => 400
            ], 400);
        }

        // Verify all solicitud_ids exist
        $existingSolicitudIds = Solicitud::whereIn('id', $solicitudIds)
            ->pluck('id')
            ->toArray();

        $invalidIds = array_diff($solicitudIds, $existingSolicitudIds);

        if (!empty($invalidIds)) {
            return response()->json([
                "message" => "Some solicitudes do not exist",
                "invalid_ids" => array_values($invalidIds),
                "code" => 400
            ], 400);
        }

        // Create the relationships
        foreach ($existingSolicitudIds as $solicitudId) {
            SolicitudUser::create([
                "user_id" => $request->user_id,
                "solicitud_id" => $solicitudId
            ]);
        }

        return response()->json([
            "message" => "Solicitud created successfully",
            "code" => 201,
            "solicitud" => $solicitud,
        ], 201);
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
