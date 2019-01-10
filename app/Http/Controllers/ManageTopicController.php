<?php

namespace App\Http\Controllers;

use App\Section;
use App\Students;
use App\Subject;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Topic;
use App\Upload;
class ManageTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.createtopic');
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
        if($file = $request->file('file')) {
            $name = time().$file->getClientOriginalName();
            $file->move('uploads',$name);
            $upload = Upload::create(['file'=>$name]);
            $input['file'] = $upload->id;

        }
        Topic::create($input);
        return redirect('/teacher');

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

    public function createTopic($sid,$subid){

        return view('teacher.createtopic')->with(compact('sid','subid'));
    }
    public function getTopic($subid,$sid){
        return DataTables::of(Topic::query()->where(['section_id'=>$sid,'subject_id'=>$subid]))->make(true);
    }
    public function student(){
        $m1 = Message::where(['to'=>Auth::user()->id,'status'=>'new'])->get();
        return view('teacher.studentlist')->with(compact('m1'));
    }

    public function viewlist($id){
        $section = Section::find($id);
        $m1 = Message::where(['to'=>Auth::user()->id,'status'=>'new'])->get();
        return view('teacher.viewstudent')->with(compact('section','m1'));
    }

    public function getStudent($id){
        return DataTables::of(Students::query()->where('section_id',$id))->make(true);
    }


}
