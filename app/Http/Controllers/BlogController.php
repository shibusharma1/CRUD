<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('categories')->get();
        return view('blogs', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('blog-form',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'contents' => 'required|string',
            // 'image' => 'required|image|mimes:jpeg,png,jpg|max:5000',

        ]);

        // $filename = time() . '_image.' . $request->image->getClientOriginalExtension();
        // $request->image->storeAs('public/images', $filename);

        // $filename = time() . '_image.' . $request->image->getClientOriginalExtension();
        // $request->image->storeAs('public/images', $filename);


        // dd($request->all());
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->category_id = $request->category;
        $blog->contents = $request->contents;
        // $blog->image = $filename;
        $blog->save();

        return redirect()->route('blog.index')->with('success', 'Blog added successfull.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // d    d($id);
        $blog = Blog::findOrFail(id: $id);
        return view('show', compact('blog'));
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
