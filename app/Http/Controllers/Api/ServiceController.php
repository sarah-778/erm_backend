<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    /**
     * Display a listing of active services for the React frontend.
     */
    public function index(): JsonResponse
    {
        $services = Service::where('is_active', true)
            ->latest()
            ->get();

        return response()->json($services, 200);
    }
}