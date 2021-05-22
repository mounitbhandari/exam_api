<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use Illuminate\Support\Facades\Validator;
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
        //in case of resource 'collection' use for get a list of data

        $request= Student::get();
        return response()->json(['success'=>1,'data'=> StudentResource::collection($request)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_student_by_id($id)
    {
        //in case of resource 'new' use for get a list of data

        $result= Student::findOrFail($id);
        return response()->json(['success'=>1,'data'=> new StudentResource($result)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_students(Request $request)
    {
        $rules = array(
            'studentName' => 'required',
            // 'fatherName'=> 'required',
            'guardianName'=> 'required',
            'relationToGuardian'=> 'required',
            'dob'=>'required','date_format(Y-M-D)',
            'sex'=>'required|in:M,F,O'
        );

        $message= array(
             'error' => 'validation error',
            'sex' => 'please use M, F or O'
        );


        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return response()->json(['success'=>0,'data'=>$message,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }
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
                DB::commit();

                return response()->json(['success'=>1,'data'=> new StudentResource($student)], 200,[],JSON_NUMERIC_CHECK);
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



        $student= new Student();
        $student= Student::find($request->input('id'));
        $student->student_name=$request->input('studentName');
        $student->father_name=$request->input('fatherName');
        $student->mother_name=$request->input('motherName');
        $student->guardian_name=$request->input('guardianName');
        $student->relation_to_guardian=$request->input('relationToGuardian');
        $student->dob=$request->input('dob');
        $student->sex=$request->input('sex');
        $student->address=$request->input('address');
        $student->city=$request->input('city');
        $student->pin=$request->input('pin');
        $student->guardian_contact_number=$request->input('guardian_contact_number');
        $student->whatsapp_number=$request->input('whatsappNumber');
        $student->email_id=$request->input('emailId');
        $student->save();



        return response()->json(['success'=>1,'data'=> $student], 200,[],JSON_NUMERIC_CHECK);
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
    public function delete_students($id)
    {
        $student= Student::find($id);
        if(!empty($student)){
            $result = $student->delete();
        }else{
            $result = false;
        }
        return response()->json(['success'=>$result,'id'=>$id], 200);
    }
}
