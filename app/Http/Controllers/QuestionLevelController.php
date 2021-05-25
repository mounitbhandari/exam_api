<?php

namespace App\Http\Controllers;

use App\Models\QuestionLevel;
use Illuminate\Http\Request;

class QuestionLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_question_levels()
    {
        $request= QuestionLevel::get();
        return response()->json(['success'=>1,'data'=>$request], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_question_levels_by_id($id)
    {
        $result= QuestionLevel::findOrFail($id);
        return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);
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
     * @param  \App\Models\QuestionLevel  $questionLevel
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionLevel $questionLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionLevel  $questionLevel
     * @return \Illuminate\Http\Response
     */
    public function update_question_levels(Request $request)

    {
        $questionLevel= new QuestionLevel();
        $questionLevel= QuestionLevel::find($request->input('id'));
        $questionLevel->question_level_name=$request->input('questionLevelName');
        $questionLevel->save();
        
        return response()->json(['success'=>1,'data'=> $questionLevel], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionLevel  $questionLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionLevel $questionLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionLevel  $questionLevel
     * @return \Illuminate\Http\Response
     */
    public function delete_question_levels($id)
    {
        $questionLevel= QuestionLevel::find($id);
        if(!empty($questionLevel)){
            $result = $questionLevel->delete();
        }else{
            $result = false;
        }
        return response()->json(['success'=>$result,'id'=>$id], 200);
    }
}
