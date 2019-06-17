<?php

namespace App\Http\Controllers;

use App\Model\Replies;

use Illuminate\Http\Request;

class AnswersController extends Controller
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

    public function addSubReply(Request $request) 
    {
        $input = $request->all();
        \Cookie::queue(\Cookie::make('parent_reply_id', $input['parent_reply_id']));
        return view('answers.createsubReply');
    }

    public function storeSubReply(Request $request) 
    {
        $input = $request->all();
        $cookie = $request->cookie();
        $answer = new Replies();
        $answer->fill($input);
        $answer->comment_id = $cookie['id'];
        $answer->parent_reply_id = $cookie['parent_reply_id'];
        $answer->save();
        return redirect()->route('comments.show', ['id' => $cookie['id']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reply()
    {
        return view('answers.create');
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
        $cookie = $request->cookie();
        $answer = new Replies();
        $answer->fill($input);
        $answer->comment_id = $cookie['id'];
        $answer->save();
        return redirect()->route('comments.show', ['id' => $cookie['id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd("hee");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {dd("gv");
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
