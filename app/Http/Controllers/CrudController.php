<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\BookType;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    // protected $post;
    // protected $book;
    public function __construct(Post $post , BookType $book) {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::all();
        $book = BookType::all();
        return Response()->json(['post'=>$posts,'book'=>$book]);
    }

    public function search(Request $request){
        $search = $request->get('search');
        $posts = Post::where('name','like','%'.$search.'%')
                    // orwhere('id_book','like','%'.$search.'%')
                ->get();
        return view('admin.pages.search.search',['posts'=> $posts]);
    }
    public function searchajax(Request $request){
        $search = $request->get('search');
        $posts = Post::where('name','like','%'.$search.'%')->get();
        dd($posts);
        return Response()->json(['post'=>$posts]);

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
        return response()->json([$posts,'success'=>'thêm thành công']);

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
        return response()->json([$post,'success'=>'sửa thành công ']);
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
