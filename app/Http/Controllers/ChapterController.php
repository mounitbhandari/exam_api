<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChapterResource;
use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_chapters(Request $request)
    {
        $request = Chapter::get();

        return response()->json(['success'=>1,'data'=> ChapterResource::collection($request)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_chapter_by_id($id)
    {
        $request = Chapter::findOrFail($id);

        return response()->json(['success'=>1,'data'=> new ChapterResource($request)], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_chapter(Request $request)
    {
        $rules = array(
            'subjectId' => 'required',
            'chapterName' =>'required'
        );
        $message = array(
            'error' => 'validator eorror',
            'subjectId' => 'subject id must be required',
            'chapterName' => 'chapter name must be required'
        );

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return response()->json(['success'=>0,'data'=>$message,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        };

        DB::beginTransaction();
        try{
            $chapter= new Chapter();
            $chapter->subject_id=$request->input('subjectId');
            $chapter->chapter_name=$request->input('chapterName');
            $chapter->save();
            DB::commit();

            return response()->json(['success'=>1,'data'=> new ChapterResource($chapter)], 200,[],JSON_NUMERIC_CHECK);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update_chapter(Request $request)
    {
        $chapter= new Chapter();
        $chapter= Chapter::find($request->input('id'));
        $chapter->subject_id = $request->input('subjectId');
        $chapter->chapter_name = $request->input('chapterName');
        $chapter->save();


        return response()->json(['success'=>1,'data'=> new ChapterResource($chapter)], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapter $chapter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function delete_chapter($id)
    {
        $chapter= Chapter::find($id);
        if(!empty($chapter)){
            $request = $chapter->delete();
        }else{
            $request = false;
        }
        return response()->json(['success'=>$request,'id'=>$id], 200);
    }
}
