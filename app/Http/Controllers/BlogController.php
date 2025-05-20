<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|string|max:255',
            'author'=> 'required|string|max:255',
            'category'=> 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // dd($request->all());
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->category = $request->category;
        $blog->contents = $request->contents;
        $blog->save();

        return redirect()->back()->with('success','Blog added successfull.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::findOrFail(id: $id);
        return view('show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
