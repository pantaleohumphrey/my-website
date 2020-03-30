<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session;
use App\Category;
use App\Tag;
class PostController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$posts = Post::all();
        $posts = Post::paginate(3);
        return view('posts.index')->with('posts',$posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories= Category::all();
           $tags=Tag::all();
        return view('posts.create')->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data

        
        $this->validate($request, 
            array(
            'title'=>'required|max:255',
            'category_id'=>'numeric|required',
            'description'=>'required'
            ));

        // storethe data
        $post= new Post;
        $post->title= $request->title;
        $post->category_id= $request->category_id;
        $post->description= $request->description;

        $post->save();
        $post->tags()->sync($request->tags, false);
        //redirect back
        Session::flash('success','The Post is saved succcessfully!!');
 
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts=Post::find($id);
         
        return view('posts.show')->with('post',$posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $categories=Category::all();
         $cats=[];
        foreach($categories as $category){
          $cats[$category->id]=$category->name;
        }
        
         $tags=Tag::all();
         $tags2=array();
        foreach($tags as $tag){
            $tags2[$tag->id]=$tag->name;
        }
        return view('posts.edit')->with('post',$post)->with('categories',$cats)->with('tags',$tags2);
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
        
        $this->validate($request, array(
            'title'=>'required|max:255',
            'category_id'=>'required|integer',
             'description'=>'required'
             
             ));
        $posts=Post::find($id);
        $posts->title=$request->input('title');
        $posts->category_id=$request->input('category_id');
        $posts->description=$request->input('description');
        $posts->save();
        if(isset($request->tags)){
            $posts->tags()->sync($request->tags);

        }
        else{
          $posts->tags()->sync(array());
        }
        
        Session:: flash('success','This post updated succcessfully!!');
        return redirect()->route('posts.show', $posts->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=Post::find($id);
        $posts->tags()->detach();
        $posts->delete();
        Session:: flash('success', 'This post deleted succcessfully!!');
        return redirect()->route('posts.index');
    }
}
