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
            $student->student_name = $request->input('studentName');
            $student->father_name = $request->input('fatherName');
            $student->mother_name = $request->input('motherName');
            $student->guardian_name = $request->input('guardianName');
            $student->relation_to_guardian = $request->input('relationToGuardian');
            $student->dob = $request->input('dob');
            $student->sex = $request->input('sex');
            $student->address = $request->input('address');
            $student->city = $request->input('city');
            $student->pin = $request->input('pin');
            $student->guardian_contact_number = $request->input('guardianContactNumber');
            $student->whatsapp_number = $request->input('whatsappNumber');
            $student->email_id = $request->input('emailId');
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
    public function update_students(Request $request)
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
