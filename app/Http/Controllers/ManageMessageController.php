<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::where('to',Auth::user()->id)->paginate(3);
        $m1 = Message::where(['to'=>Auth::user()->id,'status'=>'new'])->get();
        return view('message.index')->with(compact('messages','m1'));
    }

    public function teachermsg(){

        $m1 = Message::where(['to'=>Auth::user()->id,'status'=>'new'])->get();
        $messages = Message::where('to',Auth::user()->id)->paginate(3);
        return view('message.teachermsg')->with(compact('messages','m1'));
    }

    public function replymsg($id){
        $m1 = Message::where(['to'=>Auth::user()->id,'status'=>'new'])->get();
        $messages = Message::find($id);

        return view('message.reply')->with(compact('messages','m1'));
    }
    public function teacherply($id){
        $messages = Message::find($id);
        $m1 = Message::where(['to'=>Auth::user()->id,'status'=>'new'])->get();
        return view('message.replystd')->with(compact('messages','m1'));
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
        $message->update($msg);
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
}
