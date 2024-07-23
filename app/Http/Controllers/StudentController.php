<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        $data = [
            'scope' => 'create'
        ];
        return view('student.form', $data);
    }
    public function store( Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->class = $request->class;
        $student->section = $request->section;
        $student->email = $request->email;
        $student->save();

        return response()->json([
            'status' => 200,
            'message' => 'Estudante cadastrado com sucesso!'
        ]);
    }
}