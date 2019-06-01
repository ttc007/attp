<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index');
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
        if($request->hasFile('file')){
            $file = $request->file;
            $file->move('upload', $file->getClientOriginalName());

            $data = [
                "type" => $request->type,
                "src" => $file->getClientOriginalName(),
                "text" => $request->text,
                "author" => Auth::user()->name
            ];

            Post::create($data);
            if($request->type=="Hệ thống pháp luật") return redirect("/lawSystem");
            return redirect("/communication");
        }
        return redirect()->back();
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

    public function communication(Request $request)
    {
        $posts = Post::whereIn("type",["Video", "Image"])->orderBy('id', 'DESC')
                    ->offset($request->offset)->limit(10)->get();
        return view('post.communication',compact('posts'))  ;
    }

    public function lawSystem(Request $request)
    {
        $posts = Post::whereIn("type",["Hệ thống pháp luật"])->orderBy('id', 'DESC')
                    ->offset($request->offset)->limit(10)->get();
        return view('post.lawSystem',compact('posts'));
    }
}
