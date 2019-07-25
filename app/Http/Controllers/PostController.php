{{-- <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $post = DB::select('select * from posts');
        $post = DB::table('posts')->paginate(5);
        return view('index',['posts' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $detail = $request->get('detail');
        $author = $request->get('author');
        $posts = DB::insert('insert into posts(name, detail, author)value(?,?,?)', [$name, $detail, $author]);
        if ($posts) {
            $red=redirect('posts')->with('success','data has been added');
        }else{
            $red = redirect('posts/create')->with('danger','input data failed, please try again');
        }
        return $red;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $posts = DB::select('select * from posts where id=?',[$id]);
       return view('show',['posts'=> $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = DB::select('select *from posts where id = ?',[$id]);
        return view('edit',['posts' => $posts]);
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
        $name = $request->get('name');
        $detail = $request->get('detail');
        $author = $request->get('author');
        $posts = DB::update('update posts set name=?,detail=?,author=? where id=?', [$name, $detail, $author,$id]);
        if ($posts) {
            $red =  redirect('posts')->with('success','data has been');
        }else{
            $red = redirect('posts/edit',$id)->with('danger','error update');
        }
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = DB::delete('delete from posts where id=?',[$id]);
        $red = redirect('posts');
        return $red;
    }
}
 --}}