<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     */
   // in case of authentification you need to uncech this
    //  public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        $tags=Tag::all();

        return view('tags.index')->with('tags',$tags);
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
        
          $this->validate($request, array('name'=>'required|max:20'));

        // storethe data
        $tags= new Tag;
        $tags->name= $request->name;
        $tags->save();
        //redirect back
        Session::flash('success','The Tag saved succcessfully!!');
 
        return redirect()->route('tags.index');
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
        $tags=Tag::find($id);
        return view('tags.edit')->with('tags',$tags);
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
       
       $this->validate($request, array('name'=>'required|max:20'));
       $tags=Tag::find($id);
       $tags->name=$request->input('name');
       $tags->save();

       Session::flash('success','Tags succcessfully updated');
       return redirect()->route('tags.index');



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
