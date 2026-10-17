<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsultationController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'phone'    => 'nullable|string|max:50',
            'company'  => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'service'  => 'required|string|max:255',
            'urgency'  => 'required|in:Standard,Priority,Urgent',
            'message'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $consultation = Consultation::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Consultation submitted successfully.',
            'data'    => $consultation,
        ], 201);
    }
}