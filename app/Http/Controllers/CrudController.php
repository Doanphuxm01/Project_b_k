<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\BookType;
use App\Http\Requests\PostRequest;

class CrudController extends Controller
{
    // protected $post;
    // protected $book;
    public function __construct(Post $post , BookType $book) {
        $this->middleware('auth');
        // $this->Post = $post;
        // $this->book = $book;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $book=$Post->ShowPost();
        // return Response()->json($posts);
        $posts = Post::all();
        // $book = BookType::all();
        // $post = Post::find(1)->booktype->toArray();

        // $book = $post->booktype->toArray();
        $book = BookType::all();
        // var_dump($book);
        return Response()->json(['post'=>$posts,'book'=>$book]);
        // return response()->json(['Post' => $post,'BookType' => $book]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = BookType::all();
        return view('admin.pages.Product.table', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $posts = Post::create($request->all());
        return response()->json([$posts,'success'=>'add success']);

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
        $post= Post::find($id);
        return response()->json($post);
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
       
        $post = Post::find($id)->update($request->all());
        return response()->json([$post,'success'=>'edit success ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return Response()->json(['success'=>'xóa thành công ']);
    }
}
