<?php

use App\Http\Controllers\ChapterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerCategoryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\TransactionTypeController;
use App\Http\Controllers\ExtraItemController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionLevelController;
use App\Http\Controllers\QuestionTypeController;
use App\Http\Controllers\SaleMasterController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Models\TransactionMaster;
use App\Http\Controllers\TransactionController;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("login",[UserController::class,'login']);



Route::post("register",[UserController::class,'register']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get("user",[UserController::class,'getCurrentUser']);
    Route::get("logout",[UserController::class,'logout']);

    //get all users
    Route::get("users",[UserController::class,'getAllUsers']);

    //purchase
    Route::post("purchases",[PurchaseController::class,'savePurchase']);
    Route::get("purchases",[PurchaseController::class,'getAllPurchase']);
    Route::get("purchases/{startDate}/{endDate}",[PurchaseController::class,'getAllPurchaseByDateRange']);
});




Route::group(array('prefix' => 'dev'), function() {


    //students
    Route::get("students",[StudentController::class,'get_sudents']);
    Route::get("students/{id}",[StudentController::class,'get_student_by_id']);
    Route::post("students",[StudentController::class,'save_students']);
    Route::patch("students",[StudentController::class,'update_students']);
    Route::delete('students/{id}',[StudentController::class,'delete_students']);

    //qustionLevels
    Route::get("questionlevels",[QuestionLevelController::class,'get_question_levels']);
    Route::get("questionlevels/{id}",[QuestionLevelController::class,'get_question_levels_by_id']);
    Route::post("questionlevels",[QuestionLevelController::class,'save_question_levels']);
    Route::patch("questionlevels",[QuestionLevelController::class,'update_question_levels']);
    Route::delete("questionlevels/{id}",[QuestionLevelController::class,'delete_question_levels']);

    //subject
    Route::get("subjects",[SubjectController::class,'get_subjects']);
    Route::get("subjects/{id}",[SubjectController::class,'get_subject_by_id']);
    Route::post("subjects",[SubjectController::class,'save_subjects']);
    Route::patch("subjects",[SubjectController::class,'update_subjects']);
    Route::delete("subjects/{id}",[SubjectController::class,'delete_subjects']);


    //Chapters
    Route::get("chapters",[ChapterController::class,'get_chapters']);
    Route::get("chapters/{id}",[ChapterController::class,'get_chapter_by_id']);
    Route::post("chapters",[ChapterController::class,'save_chapter']);
    Route::patch("chapters",[ChapterController::class,'update_chapter']);
    Route::delete("chapters/{id}",[ChapterController::class,'delete_chapter']);

    //questionTypes
    Route::get("questiontypes",[QuestionTypeController::class,'get_question_types']);
    Route::get("questiontypes/{id}",[QuestionTypeController::class,'get_question_type_by_id']);
    Route::post("questiontypes",[QuestionTypeController::class,'save_question_type']);
    Route::patch("questiontypes",[QuestionTypeController::class,'update_question_type']);
    Route::delete("questiontypes/{id}",[QuestionTypeController::class,'delete_question_type']);

    //options
    Route::get("options",[OptionController::class,'get_options']);

    //Questions
    Route::get("questions",[QuestionController::class,'get_question']);
    Route::get("options/questions/{id}",[QuestionController::class,'get_answers']);




});

