<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::all();
        return response()->json([
            "success" => true,
            "message" => "Successfully retrieved all students",
            "data" => $data
        ]);
    }
}
