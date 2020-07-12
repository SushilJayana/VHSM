<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'role:administrator']], function () {
    Route::resource('dashboard', 'DashboardController');
    Route::resource('subject','SubjectController');
    Route::resource('education_level','EducationLevelController');    
       
    Route::post('classroom/{classroom_id}/study_material/store','StudyMaterialController@store');   
    Route::resource('classroom/{classroom_id}/study_material','StudyMaterialController');
    Route::resource('classroom/{classroom_id}/assignment','AssignmentController');

    Route::resource('classroom','ClassroomController');

});