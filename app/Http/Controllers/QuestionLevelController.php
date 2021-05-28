<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionLevelResource;
use App\Models\QuestionLevel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function save_question_levels(Request $request)
    {
        $rules = array(
            'questionLevelName' => 'required',
            
        );

        $message= array(
             'error' => 'validation error',
            
        );


        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return response()->json(['success'=>0,'data'=>$message,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }
             DB::beginTransaction();
            try{
                $questionLevel= new QuestionLevel();
                $questionLevel->question_level_name = $request->input('questionLevelName');
                $questionLevel->save();
                DB::commit();

                return response()->json(['success'=>1,'data'=> new QuestionLevelResource ($questionLevel)], 200,[],JSON_NUMERIC_CHECK);
            }catch(\Exception $e){
                DB::rollBack();
                return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
            }

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
