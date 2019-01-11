<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Homework;
use App\Teacher;
use App\Section;
use App\Students;
use App\Subject;
use App\Message;
use App\User;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m1 = Message::where(['to'=>Auth::user()->id,'status'=>'new'])->get();
        return view('student.index')->with(compact('m1'));
    }
    public function viewtopic(){
        $id = Auth::user()->user_id;
        $student = Students::find($id);
        $sid = $student->section_id;
        $m1 = Message::where(['to'=>Auth::user()->id,'status'=>'new'])->get();
        return view('student.viewtopic')->with(compact('sid','m1'));
    }

    public function checktopic($id){
        $topic = Topic::find($id);
        $section = Section::find($topic->section_id);
        $teacher = Teacher::find($section->teacher_id);
        $user = User::where('user_id',$teacher->id)->where('role','teacher')->first(['id']);
        $user_id = $user->id;
        $hw = Homework::all()->where('topic_id',$topic->id);
        $m1 = Message::where(['to'=>Auth::user()->id,'status'=>'new'])->get();
        return view('student.topic')->with(compact('topic','hw','user_id','m1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $message = Message::find($request->id);
        $msg['status'] = $request->status1;
        if($file = $request->file('file')) {
            $name = time().$file->getClientOriginalName();
            $file->move('uploads',$name);
            $upload = Upload::create(['file'=>$name]);
            $input['file'] = $upload->id;
        }
        Message::create($input);
        return redirect('/questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getsub($id){
        return DataTables::of(Topic::join('subjects','topics.subject_id','subjects.id')
            ->select('topics.id','subjects.subject','topics.topic','topics.section_id')
            ->where('section_id',$id))->make(true);
    }
    public function homework(){
        $student = Auth::user()->user_id;
        $section = Students::find($student)->section_id;
        $m1 = Message::where(['to'=>Auth::user()->id,'status'=>'new'])->get();
        return view('student.viewhw')->with(compact('section','m1'));
    }
}
