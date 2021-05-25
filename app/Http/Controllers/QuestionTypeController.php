<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionTypeResource;
use App\Models\QuestionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuestionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_question_types()
    {
        $request = QuestionType::get();
        return response()->json(['success'=>1,'data'=> QuestionTypeResource::collection($request)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_question_type_by_id($id)
    {
        $request = QuestionType::findOrFail($id);
        return response()->json(['success'=>1,'data'=> new QuestionTypeResource($request)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_question_type(Request $request)
    {
        $rules= array(
            'questionTypeName' => 'required'
        );
        $message= array(
            'error'=>'validation error'
        );
        $validator= Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return response()->json(['success'=>0,'data'=>$message,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }
        DB::beginTransaction();
        try{
            $questionTypes = new QuestionType();
            $questionTypes->question_type_name=$request->input('questionTypeName');
            $questionTypes->save();
            DB::commit();

            return response()->json(['success'=>1,'data'=> new QuestionTypeResource($questionTypes)], 200,[],JSON_NUMERIC_CHECK);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionType  $questionType
     * @return \Illuminate\Http\Response
     */
    public function update_question_type(Request $request)
    {
        $questionTypes= new QuestionType();
        $questionTypes= QuestionType::find($request->input('id'));
        $questionTypes->question_type_name=$request->input('questionTypeName');
        $questionTypes->save();

        return response()->json(['success'=>1,'data'=> new QuestionTypeResource($questionTypes)], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionType  $questionType
     * @return \Illuminate\Http\Response
     */
    public function delete_question_type($id)
    {
        $questionTypes= QuestionType::find($id);
        if(!empty($questionTypes)){
            $request = $questionTypes->delete();
        }else{
            $request = false;
        }
        return response()->json(['success'=>$request,'id'=>$id], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionType  $questionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionType $questionType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionType  $questionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionType $questionType)
    {
        //
    }
}
