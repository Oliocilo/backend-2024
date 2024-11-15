<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    // Menampilkan semua pasien
    public function index()
    {
         $patients = Patient::all();

         if ($patients->isEmpty()) {
            // Jika tidak ada pasien, return response dengan pesan yang sesuai
            return response()->json([
                'message' => 'No patients found.',
                'data' => []
            ], 200);  // Status 200 menandakan permintaan berhasil
        }

        return response()->json([
            'message' => 'Patients retrieved successfully.',
            'data' => $patients
        ], 200);
    }

    // Menampilkan data pasien berdasarkan ID
    public function show($id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            return response()->json($patient, 200);
        } else {
            return response()->json(['message' => 'Patient not found'], 404);
        }
    }

    // Menambahkan pasien baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
    'age' => 'required|integer|min:1',
    'address' => 'required|string|max:500',
    'status' => 'required|string|in:active,inactive',
], [
    'name.required' => 'Nama pasien wajib diisi.',
    'age.required' => 'Usia pasien wajib diisi.',
    'status.in' => 'Status pasien harus berupa "active" atau "inactive".',
]);

        $patient = Patient::create($validatedData);
        return response()->json([
            'message' => 'Patient created successfully', 
            'patient' => $patient], 201);
    }

    // Memperbarui data pasien berdasarkan ID
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            $validatedData = $request->validate([
                'name' => 'string|max:255',
                'age' => 'integer',
                'address' => 'string',
                'status' => 'string'
            ]);

            $patient->update($validatedData);
            return response()->json(['message' => 'Patient updated successfully', 'patient' => $patient], 200);
        } else {
            return response()->json(['message' => 'Patient not found'], 404);
        }
    }

    // Menghapus data pasien berdasarkan ID
    public function destroy($id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            $patient->delete();
            return response()->json(['message' => 'Patient deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Patient not found'], 404);
        }
    }
}
