<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OptionResource extends JsonResource
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
            "optionId"=>$this->id,
            "questionId"=>$this->question_id,
            
            "option"=>$this->option,
            "pictureUrl"=>$this->picture_url,
            "isAnswer"=>$this->is_answer,

        ];
    }
}
