<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_sudents()
    {
        $result= Student::get();
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_student_by_id($id)
    {
        $result= Student::findOrFail($id);
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_students(Request $request)
    {
        DB::beginTransaction();
        try{
            $student= new Student();
            $student->student_name = $request->student_name;
            $student->father_name = $request->father_name;
            $student->mother_name = $request->mother_name;
            $student->guardian_name = $request->guardian_name;
            $student->relation_to_guardian = $request->relation_to_guardian;
            $student->dob = $request->dob;
            $student->sex = $request->sex;
            $student->address = $request->address;
            $student->city = $request->city;
            $student->pin = $request->pin;
            $student->guardian_contact_number = $request->guardian_contact_number;
            $student->whatsapp_number = $request->whatsapp_number;
            $student->email_id = $request->email_id;
            $student->save();

            return response()->json(['success'=>1,'data'=> $student], 200,[],JSON_NUMERIC_CHECK);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
