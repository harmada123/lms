<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Courses;
use App\Photo;
use App\User;
use Yajra\DataTables\DataTables;
use App\Students;

class ManageStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.studentlist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section = Section::pluck('section','id')->all();
        $course = Courses::pluck('course','id')->all();
        return view('admin.createstd')->with(compact('section','course'));
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
        if($file = $request->file('photo_id')) {
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;


        }
        $input['password'] = bcrypt($request->lname . str_replace("-","", $request->birthday));
        $student = Students::create($input);
        $input['user_id'] = $student->id;
        User::create($input);
        return redirect('/student');
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
        $student = Students::find($id);
        $section = Section::pluck('section','id')->all();
        $course = Courses::pluck('course','id')->all();
        return view('admin.editstudent')->with(compact('student','section','course'));
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
        $student = Students::find($id);
        $input = $request->all();
        if($file = $request->file('photo_id')) {
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $student->update($input);
        return redirect('student');
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
    public function getstudent(){
        return DataTables::of(Students::join('sections','students.section_id','sections.id')
            ->select('students.id','sections.section','students.name','students.lname'))
            ->make(true);
    }

    public function olist(){
        return view('admin.onlinereg');
    }

    public function getInactive(){
        return DataTables::of(Students::query()->where('section_id',null))->make(true);
    }
}
