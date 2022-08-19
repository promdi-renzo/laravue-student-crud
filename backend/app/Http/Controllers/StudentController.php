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

    public function store(Request $request)
    {
        $input = $request->all();
        $data = Student::create($input);
        return response()->json([
            "success" => true,
            "message" => "Student created successfully.",
            "data" => $data
        ]);
    }

    public function show($id)
    {
        $data = Student::find($id);

        if (is_null($data)) return response()->json([
            "success" => false,
            "message" => "Student does not exist.",
            "data" => $data
        ]);

        return response()->json([
            "success" => true,
            "message" => "Student retrieved successfully.",
            "data" => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Student::find($id);

        if (is_null($data)) return response()->json([
            "success" => false,
            "message" => "Student does not exist.",
            "data" => $data
        ]);

        $input = $request->all();
        $data->first_name = $input['first_name'];
        $data->last_name = $input['last_name'];
        $data->email = $input['email'];
        $data->save();

        return response()->json([
            "success" => true,
            "message" => "Student updated successfully.",
            "data" => $data
        ]);
    }

    public function destroy($id)
    {

        $data = Student::find($id);

        if (is_null(Student::find($id))) return response()->json([
            "success" => false,
            "message" => "Student does not exist.",
            "data" => $data
        ]);

        $data->delete();

        return response()->json([
            "success" => true,
            "message" => "Student deleted successfully.",
            "data" => $data
        ]);
    }
}
