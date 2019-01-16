<?php

namespace App\Http\Controllers;
use App\Homework;
use Illuminate\Http\Request;
use App\Topic;
use App\Upload;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Message;

class ManageHomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m1 = Message::where(['to'=>Auth::user()->id,'status'=>'new'])->get();
        return view('teacher.hwlist')->with(compact('m1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->user_id;
        $m1 = Message::where(['to'=>Auth::user()->id,'status'=>'new'])->get();
        $topic = Topic::pluck('topic','id')->where('section_id','')->all();
        return view('teacher.createhw')->with(compact('topic','id','m1'));
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
        Homework::create($input);
        return redirect('/hw');
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

    public function gethwlist($id){
        return DataTables::of(Homework::join('topics','homeworks.topic_id','topics.id')
            ->select('homeworks.id','homeworks.title','topics.topic')
            ->where('teacher_id',$id))->make(true);
    }
}
