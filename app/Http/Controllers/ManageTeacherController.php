<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ManageTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $message = Message::all();
        $m1 = Message::where(['to'=>Auth::user()->id,'status'=>'new'])->get();
        return view('teacher.index',compact('message','m1'));
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
        //
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

    public function getSection($id){

        return DataTables::of(Section::join('courses','sections.course_id','courses.id')
            ->select('sections.id','sections.section','sections.location','courses.course')
            ->where('teacher_id',$id))
            ->make(true) ;
        
//        return DataTables::of(Section::query()->where('teacher_id',$id))->make(true);
    }
}
