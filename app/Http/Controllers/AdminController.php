<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Category;
use App\Http\Requests\TopicRequest;


class AdminController extends Controller
{
    public function list() {

        $listOfTopics = Topic::all();

        return view('admin.list',compact('listOfTopics'));
    }

    public function edit(Topic $topic,$id) {

        $topic = Topic::where('id',$id)->first();
        $categories = Category::all();
        return view('admin.edit',compact('topic','categories'));

    }

    public function update(TopicRequest $request, Topic $topic,$id)
    {
        $input = $request->validated();


        $topic = Topic::where('id',$id)->first();
        $topic->title = $input['title'];
        $topic->image_url = $input['image_url'];
        $topic->description = $input['description'];
        $topic->category_id =$input['category'];
        $topic->save();
        

        return redirect('/admin');
    }

    public function destroy(Topic $topic, $id)
    {
        $topic = Topic::where('id',$id)->first();
        $topic->delete();
        return redirect('/admin');
    }

    public function aprove($id) {
        $topic = Topic::where('id',$id)->first();
        $topic->status = 'aproved';
        $topic->save();

        return redirect('/admin');
    }
}
