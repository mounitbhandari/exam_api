<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'studentId'=>$this->id,
            'studentName'=>$this->student_name,
            'fatherName'=>$this->father_name,
            'motherName'=>$this->mother_name,
            'guardianName'=>$this->guardian_name,
            'relationToGuardian'=>$this->relation_to_guardian,
            'dob'=>$this->dob,
            'sex'=>$this->sex,
            'address'=>$this->address,
            'city'=>$this->city,
            'pin'=>$this->pin,
            'guardianContactNumber'=>$this->guardian_contact_number,
            'whatsappNumber'=>$this->whatsapp_number,
            'emailId'=>$this->email_id,

        ];
    }
}
