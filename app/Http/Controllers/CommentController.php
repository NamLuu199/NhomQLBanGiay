<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use App\Blog;
use Session;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createBlog(Request $request , $id)
    {
        $this->validate($request, array(
            'name'   => 'required|max:255',
            'email'   => 'required|email|max:255',
            'comment'   => 'required|min:3|max:2000',
        ));

        $blog = Blog::find($id);
        $comment = new Comment();
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $comment->comment = $request->input('comment');
        $comment->approved = true;
        $comment->blog()->associate($blog);

        $comment->save();


        return redirect()->route('shop.blog',[
            $blog->slug,
            $blog->id
        ]);
    }
    public function store(Request $request , $product_id)
    {

        $this->validate($request, array(
            'name'   => 'required|max:255',
            'email'   => 'required|email|max:255',
            'comment'   => 'required|min:3|max:2000',
        ));
        $product = Product::find($product_id);

        $comment = new Comment();
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $comment->comment = $request->input('comment');
        $comment->approved = true;
        $comment->product()->associate($product);

        $comment->save();


        return redirect()->route('shop.product',[
            $product->slug,
            $product->id
        ]);
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