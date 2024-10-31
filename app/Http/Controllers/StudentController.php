<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
      public function index() {
        // menampilkan data students dari database
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];

        return response()->json($data, 200);
    }
    public function store(Request $request) {

        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];
        // menampilkan data students dari database
        $students = Student::create($input);

        $data = [
            'message' => 'students is created succesfuly',
            'data' => $students
        ];

        return response()->json($data, 201);
    }
}
