<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::select( 'id','name', 'email', 'phone')->get();
        return $this->sendResponse($data, 'Student data fetch successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $student = Student::create($request->all());
        $data = $request->input();
        return $this->sendResponse($data, 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {

        $selectStudent = Student::select( 'id','name', 'email', 'phone')->where('id', $student->id)->get();
        return $this->sendResponse($selectStudent, 'Student data fetch successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student)
    {
        dd($request->all());
        return $this->sendResponse($student, 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return $this->sendResponse($student, 'Student deleted successfully');
    }
}
