<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChapterResource extends JsonResource
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
            "chapterId"=>$this->id,
            "chapterName"=>$this->chapter_name,
            "subjectId"=>$this->subject_id,
            "subject"=>new SubjectResource($this->subject)
        ];
    }
}
