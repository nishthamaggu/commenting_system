<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comments;

class CommentController extends Controller
{
    private $paginateCount = 20;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comments = Comments::orderBy('id', 'asc');
        $comments = $comments->paginate($this->paginateCount);
        return view('comments.index',['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create', ['modify' => 0]);
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

        $comment = new Comments();
        $comment->fill($input);
        $comment->save();

        return redirect()->route('comments.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $comment = Comments::find($id);
        \Cookie::queue(\Cookie::make('id', $id));
        $listingData['id'] = $comment->id;
        $listingData['comment'] = $comment->comment;
        $listingData['author'] = $comment->author;
        $listingData['replies'] = $comment->getReplies($comment->id);

        // dd($listingData);
        return view('comments.show', ['listingData' => $listingData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comments $comment)
    {
        return view('comments.create', ['comment' => $comment, 'modify' => 1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comments $comment)
    {
        $input = $request->all();
        $comment->fill($input);
        $comment->save();
        return redirect()->route('comments.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comments::find($id);
        $comment->delete();
        return redirect()->route('comments.index');
    }
}
