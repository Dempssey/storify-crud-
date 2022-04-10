<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoryRequest;

class StoryController extends Controller
{



    public function __construct(){
        $this->authorizeResource(Story::class,'story');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mystories = Story::where('user_id',Auth::id())->orderBy('id', 'DESC')->paginate(5);
        return view('stories.index',compact('mystories'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stories.make');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {
        Story::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'type'=>$request->type,
            'status'=>$request->status,
            'user_id'=>Auth::id()

        ]);

        return redirect()->route('stories.index')->with('success','Story successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {

        return view('stories.view',compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        return view('stories.ammend',compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Story $story)
    {
        $data = $request->validate([
            'title'=>'required',
            'body'=>'required',
            'status'=>'required'
        ]);

        $story->update($data);
        return redirect()->route('stories.index')->with('update','Story has been succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $story->delete();
        return redirect()->route('stories.index')->with('delete','Story successfully deleted');
    }
}
