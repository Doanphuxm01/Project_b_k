<?php

namespace App\Http\Controllers;

use App\BookType;
use Illuminate\Http\Request;

// use App\Http\Requests\BookRequest;
class BookTypeControll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = BookType::all();
        return Response()->json($books);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $books = BookType::all()->paginate(4);
        // BookType::where('user_id', Auth::id())->paginate(4);
        // $book = BookType::paginate(6);
        // dd($book);
        return view('admin.pages.Booktype.booktype', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $books = BookType::create($request->all());
        return response()->json([$books, 'success' => 'hey:bạn đã thêm thành công ']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $books = Booktype::find($id);
        return response()->json($books);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $books = Booktype::find($id)->update($request->all());
        return response()->json([$books, 'success' => 'sửa thành công ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Booktype::find($id)->delete();
        return Response()->json(['success' => 'xóa thành công ']);
    }
}
