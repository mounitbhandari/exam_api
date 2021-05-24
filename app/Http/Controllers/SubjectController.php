<?php

namespace App\Http\Controllers;


use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_students(Request $request)
    {
        $request = Subject::get();
        return response()->json(['success'=>1,'data'=> $request], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_student_by_id($id)
    {
        $request = Subject::findOrFail($id);
        return response()->json(['success'=>1,'data'=>$request], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_subjects(Request $request)
    {
        $subject = new Subject();
        $subject->subject_name = $request->input('subjectName');
        $subject->save();

        return response()->json(['success'=>1,'data'=> $subject], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update_subjects(Request $request)
    {
        // $subject = new Subject();
        // $subject = Subject::find($request->input('id'));
        // $subject ->subject_name = $subject->input('subjectName');
        // $subject->save();

        $subject= new Subject();
        $subject= Subject::find($request->input('id'));
        $subject->subject_name=$request->input('subjectName');
        $subject->save();

        return response()->json(['success'=>1,'data'=> $subject], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function delete_subjects($id)
    {
        $subject= Subject::find($id);
        if(!empty($subject)){
            $request = $subject->delete();
        }else{
            $request = false;
        }
        return response()->json(['success'=>$request,'id'=>$id], 200);
    }
}
