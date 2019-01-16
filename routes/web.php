<?php

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
    return view('auth.login');
});

Auth::routes();



Route::resource('/register','RegistrationController');
Route::resource('/plregister','ManagePLController');



Route::group(['middleware'=>'admin'], function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/admin','ManageAdminController');
    Route::resource('/pl','ManageProfController');
    Route::resource('/student','ManageStudentController');
    Route::resource('/course','ManageCourseController');
    Route::resource('/subject','ManageSubjectController');
    Route::resource('/section','ManageSectionController');



    Route::get('coursetable/getcourse','ManageCourseController@getCourse');
    Route::get('sectiontable/getsection','ManageSectionController@getsection');
    Route::get('studenttable/getstudent','ManageStudentController@getstudent');
    Route::get('teachertable/getteacher','ManageProfController@getteacher');

    Route::get('sublist/{id}','ManageSubjectController@sublist');
    Route::get('sublist/getsubject/{id}','ManageSubjectController@getSubject');

    Route::get('/settings/{id}','ManageAdminController@settings');
    Route::get('/usersinfo/{id}','ManageAdminController@updateInfo');
    Route::get('/olist','ManageStudentController@olist');
    Route::get('/getinactive','ManageStudentController@getInactive');
});

Route::group(['middleware'=>'teacher'], function(){

    Route::resource('/teacher','ManageTeacherController');

    Route::get('/getsection/{id}','ManageTeacherController@getSection');
    Route::resource('/topic','ManageTopicController');


    Route::get('/viewsubjects/{id}','ManageSubjectController@viewsubjects');
    Route::get('/availsubj/{id}','ManageSubjectController@getSubjects');
    Route::get('/viewsubjects/{sid}/topic/{subid}','ManageTopicController@createTopic');

    Route::get('{sid}/getTopic/{subid}','ManageTopicController@getTopic');

    Route::get('/studentlist/','ManageTopicController@student');
    Route::get('/viewstudent/{id}','ManageTopicController@viewlist');
    Route::get('/viewgetstudent/{id}','ManageTopicController@getStudent');
    Route::resource('hw','ManageHomeworkController');


    Route::get('/gethomeworklist/{id}','ManageHomeworkController@gethwlist');

});

Route::resource('pupil','StudentController');
Route::get('/getsubjects','StudentController@getsubjects');
Route::get('/viewtopic/','StudentController@viewtopic');
Route::get('/getsublist/{id}','StudentController@getSub');
Route::get('checktopic/{id}','StudentController@checktopic');
Route::get('/homework','StudentController@homework');
Route::get('/gethwstudent/{id}','StudentController@gethwlist');
Route::get('/contacts','ContactsController@get');


Route::get('/accountsettings/{id}','StudentController@settings');

Route::resource('/message','ManageMessageController');
Route::get('/replymsg/{id}','ManageMessageController@replymsg');
Route::get('/questions','ManageMessageController@teachermsg');
Route::get('/replystd/{id}','ManageMessageController@teacherply');


