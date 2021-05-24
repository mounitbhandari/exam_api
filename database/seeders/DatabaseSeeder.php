<?php

namespace Database\Seeders;

use App\Models\QuestionLevel;
use App\Models\Student;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserType;
use App\Models\QuestionType;
use App\Models\Subject;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //person_types table data
        UserType::create(['user_type_name' => 'Owner']);
        UserType::create(['user_type_name' => 'Manager']);
        UserType::create(['user_type_name' => 'Manager Sales']);
        UserType::create(['user_type_name' => 'Manager Accounts']);
        UserType::create(['user_type_name' => 'Office Staff']);
        UserType::create(['user_type_name' => 'Worker']);
        UserType::create(['user_type_name' => 'Developer']);
        UserType::create(['user_type_name' => 'Customer']);
        $this->command->info('User Type creation Finished');

        User::create(['user_name'=>'Arindam Biswas','mobile1'=>'9836444999','mobile2'=>'100','email'=>'arindam','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>1]);



        //for sudents

        Student::create([
            'student_name' => 'Bimal Paul',
            'father_name' => 'Atanu Paul',
            'mother_name' => 'Aroti Paul',
            'guardian_name' => 'Atanu Paul',
            'relation_to_guardian' => 'Father',
            'dob' => '1999-08-14',
            'sex' => 'M',
            'address' => '56/7,Rabindrapally',
            'city' => 'Barrackpore',
            'district' => 'North 24 Parganas',
            // 'state_id' => 22,
            'pin' => '700122',
            'guardian_contact_number' => '9832700122',
            'whatsapp_number' => '7985241065',
            'email_id' => 'bimalpaul@gmail.com',
        ]);

        Student::create([
            'student_name' => 'Saheli Bhowmik',
            'father_name' => 'Arpan Bhowmik',
            'mother_name' => 'Semanti Bhowmik',
            'guardian_name' => 'Arpan Bhowmik',
            'relation_to_guardian' => 'Father',
            'dob' => '1999-08-14',
            'sex' => 'F',
            'address' => '56/7,Rabindrapally',
            'city' => 'Barrackpore',
            'district' => 'North 24 Parganas',
            // 'state_id' => 22,
            'pin' => '700122',
            'guardian_contact_number' => '9758356402',
            'whatsapp_number' => '7985241065',
            'email_id' => 'sahelibhowmik@gmail.com',
        ]);

        Student::create([
            'student_name' => 'Susmita Sen',
            'father_name' => 'Poritosh Sen',
            'mother_name' => 'Hrishita Sen',
            'guardian_name' => 'Poritosh Sen',
            'relation_to_guardian' => 'Father',
            'dob' => '1999-08-14',
            'sex' => 'F',
            'address' => '56/7,Rabindrapally',
            'city' => 'Barrackpore',
            'district' => 'North 24 Parganas',
            // 'state_id' => 22,
            'pin' => '700122',
            'guardian_contact_number' => '9832700122',
            'whatsapp_number' => '7985241065',
            'email_id' => 'sensusmita@gmail.com',
        ]);

        Student::create([
            'student_name' => 'Mounita Bhandai',
            'father_name' => 'Uttam Bhandai',
            'mother_name' => 'Aparna Bhandai',
            'guardian_name' => 'Uttam Bhandai',
            'relation_to_guardian' => 'Father',
            'dob' => '1999-08-14',
            'sex' => 'F',
            'address' => '56/7,Rabindrapally',
            'city' => 'Barrackpore',
            'district' => 'North 24 Parganas',
            // 'state_id' => 22,
            'pin' => '700122',
            'guardian_contact_number' => '9830515844',
            'whatsapp_number' => '8910668387',
            'email_id' => 'tataibhandari@gmail.com',
        ]);

        Student::create([
            'student_name' => 'Ankit Das',
            'father_name' => 'Mukesh Das',
            'mother_name' => 'Aroti Das',
            'guardian_name' => 'Aroti Das',
            'relation_to_guardian' => 'Mother',
            'dob' => '1999-08-14',
            'sex' => 'M',
            'address' => '56/7,Rabindrapally',
            'city' => 'Barrackpore',
            'district' => 'North 24 Parganas',
            // 'state_id' => 22,
            'pin' => '700122',
            'guardian_contact_number' => '9832700122',
            'whatsapp_number' => '7985241065',
            'email_id' => 'ankitdas@gmail.com',
        ]);

        Student::create([
            'student_name' => 'Ananda Nag',
            'father_name' => 'Indrajit Nag',
            'mother_name' => 'Ratri Nag',
            'guardian_name' => 'Ratri Nag',
            'relation_to_guardian' => 'Mother',
            'dob' => '1999-08-14',
            'sex' => 'M',
            'address' => '56/7,Rabindrapally',
            'city' => 'Barrackpore',
            'district' => 'North 24 Parganas',
            // 'state_id' => 22,
            'pin' => '700122',
            'guardian_contact_number' => '9832700122',
            'whatsapp_number' => '7985241065',
            'email_id' => 'nagananda@gmail.com',
        ]);

        Student::create([
            'student_name' => 'Robin Chowdhuri',
            'father_name' => 'Jitandra Chowdhuri',
            'mother_name' => 'Shikha Chowdhuri',
            'guardian_name' => 'Jitandra Chowdhuri',
            'relation_to_guardian' => 'Father',
            'dob' => '1999-08-14',
            'sex' => 'M',
            'address' => '56/7,Rabindrapally',
            'city' => 'Barrackpore',
            'district' => 'North 24 Parganas',
            // 'state_id' => 22,
            'pin' => '700122',
            'guardian_contact_number' => '9832700122',
            'whatsapp_number' => '7985241065',
            'email_id' => 'robinchowdhuri@gmail.com',
        ]);



        //qustionLevels
        QuestionLevel::create([
            'question_level_name' => 'Hard'
        ]);
        QuestionLevel::create([
            'question_level_name' => 'Standard'
        ]);
        QuestionLevel::create([
            'question_level_name' => 'Medium'
        ]);
        QuestionLevel::create([
            'question_level_name' => 'Easy'
        ]);

        // QuestionLevel::create([
        //     'question_level_name' => 'ab'
        // ]);

        // QuestionLevel::create([
        //     'question_level_name' => 'az'
        // ]);

        // QuestionLevel::create([
        //     'question_level_name' => 'asd'
        // ]);

        // QuestionLevel::create([
        //     'question_level_name' => 'dfg'
        // ]);



        // data of question_types
        QuestionType::create([
            'question_type_name' => 'mcq'
        ]);
        QuestionType::create([
            'question_type_name' => 'saq'
        ]);
        QuestionType::create([
            'question_type_name' => 'laq'
        ]);
        QuestionType::create([
            'question_type_name' => 'descriptive_questions'
        ]);



        //subject
        Subject::create([
            'subject_name' => 'MS Word'
        ]);
        Subject::create([
            'subject_name' => 'MS Excel'
        ]);
        Subject::create([
            'subject_name' => 'MS Powepoint'
        ]);
        Subject::create([
            'subject_name' => 'HTML'
        ]);
        Subject::create([
            'subject_name' => 'Notepad'
        ]);
        Subject::create([
            'subject_name' => 'C-Language'
        ]);
        Subject::create([
            'subject_name' => 'C++Language'
        ]);
        Subject::create([
            'subject_name' => 'JAVA'
        ]);
        Subject::create([
            'subject_name' => 'PYTHON'
        ]);
        Subject::create([
            'subject_name' => 'Web Design'
        ]);
        




        // Product has separate file
        // php artisan db:seed --class=ProductSeeder


        //Transaction types

    }
}
