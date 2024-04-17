<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public   function index()
    {
        $students=Student::all();

        return view("student.index",["students"=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'Phone' => 'required|',
            'age' => 'required',
            'gender' => 'required',
        ]);
    
        // Create a new student instance
        $student = new Student;
        $student->name = $validatedData['name'];
        $student->address = $validatedData['address'];
        $student->Phone = $validatedData['Phone'];
        $student->age = $validatedData['age'];
        $student->gender = $validatedData['gender'];
        
        // Save the student to the database
        $student->save();
    
        
        return redirect('/students')->with('success', 'Student added successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
