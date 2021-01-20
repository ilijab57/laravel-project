<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\TopicRequest;
use Illuminate\Support\Facades\Auth;


class TopicController extends Controller
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
        $categories = Category::all();

        return view('topic.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request)
    {
        $input = $request->validated();


        $topic = new Topic();
        $topic->title = $input['title'];
        $topic->image_url = $input['image_url'];
        $topic->description = $input['description'];
        $topic->category_id =$input['category'];
        $topic->user_id = Auth::id();
        $topic->save();
        

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic,$id)
    {
        $topic = Topic::where('id',$id)->first();
        $comments = Comment::where('topic_id',$id)->get();
        // dd($comments);
        return view('topic.show',compact('topic','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic,$id)
    {
        $topic = Topic::where('id',$id)->first();
        $categories = Category::all();
        return view('topic.edit',compact('topic','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(TopicRequest $request, Topic $topic,$id)
    {
        $input = $request->validated();


        $topic = Topic::where('id',$id)->first();
        $topic->title = $input['title'];
        $topic->image_url = $input['image_url'];
        $topic->description = $input['description'];
        $topic->category_id =$input['category'];
        $topic->user_id = Auth::id();
        $topic->save();
        

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic, $id)
    {
        $topic = Topic::where('id',$id)->first();
        $topic->delete();
        return redirect('/home');
    }


    public function comment(Request $request) {
            // dd($request);
            $comment = new Comment();
            $comment->comment = $request->input('comment');
            $comment->user_id = $request->input('user_id');
            $comment->topic_id = $request->input('topic_id');
            $comment->save();

            return redirect()->back();
    }
}
