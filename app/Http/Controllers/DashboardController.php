<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function get()
    {
        return response()->json([
            'data' => [
                'message' => 'SOME DATA BABY'
            ]
        ]);
    }
}
