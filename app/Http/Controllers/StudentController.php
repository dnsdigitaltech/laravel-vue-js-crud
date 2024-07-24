<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data = [
            'scope' => 'Criar'
        ];
        return view('student.view', $data);
    }

    public function create()
    {
        $data = [
            'scope' => 'Criar'
        ];
        return view('student.form', $data);
    }

    public function store(Request $request)
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
    
    public function fetchStudentData()
    {
        $students = Student::all();
        return $students;
    }

    public function edit($id)
    {
        $data = [
            'scope' => 'Editar',
            'id' => $id
        ];
        return view('student.form', $data);
    }

    public function editData($id)
    {
        $student = Student::find($id);

         return response()->json([
            'status' => 200,
            'data' => $student
        ]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->name;
        $student->class = $request->class;
        $student->section = $request->section;
        $student->email = $request->email;
        $student->update();
        return response()->json([
            'status' => 200,
            'message' => 'Estudante atualizado com sucesso!'
        ]);
    }

    public function showPage($id)
    {
        $data = [
            'scope' => 'Ver',
            'id' => $id
        ];
        return view('student.form', $data);
    }
}