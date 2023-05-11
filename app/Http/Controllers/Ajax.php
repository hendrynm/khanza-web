<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class Ajax extends Controller
{
    public function uji(): JsonResponse
    {
        return response()->json([
            'status' => '200',
            'message' => 'Data loket berhasil diambil',
            'is_nomor_baru' => (bool) random_int(1,1),
            'data' => array(
                'kode_loket' => chr(rand(65,90)),
                'nomor_loket' => random_int(1,20),
                'nomor_antrean' => sprintf('%03d', random_int(1,299)),
            ),
            'timestamp' => date('d-m-Y h.i.s',time()),
        ]);
    }
}
