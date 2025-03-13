<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    public function index(): JsonResponse
    {
        $employees = Employee::all();
        return response()->json([
            'status' => 'success',
            'data' => $employees
        ]);
    }
}
