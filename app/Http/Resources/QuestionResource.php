<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OptionResource;


class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "questionId"=>$this->id,
            "questionTypeId"=>$this->question_type_id,
            "questionLevelId"=>$this->question_level_id,
            "chapterId"=>$this->chapter_id,
            "question"=>$this->question,
            "pictureUrl"=>$this->picture_url,
            "marks"=>$this->marks,
            "options"=> OptionResource::collection($this->options),
        ];
    }
}
