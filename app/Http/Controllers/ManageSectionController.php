<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Section;
use App\Teacher;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ManageSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sectionlist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Courses::pluck('course','id')->all();
        $teacher = Teacher::all();
        return view('admin.createsection')->with(compact('course','teacher'));
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
        $input = $request->all();
        Section::create($input);
        return redirect('/section');
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
        $section = Section::find($id);
        $course = Courses::pluck('course','id')->all();
        $teacher = Teacher::all();
        return view('admin.editsection')->with(compact('course','teacher','section'));
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
        $section = Section::find($id);
        $input = $request->all();
        $section->update($input);
        return redirect('section');


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
    public function getsection(){
        return DataTables::of(Section::join('teachers','sections.teacher_id','teachers.id')
            ->select('sections.id','sections.section','teachers.name','teachers.lname'))
            ->make(true);
    }
}
