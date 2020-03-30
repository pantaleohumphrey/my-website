<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Mail;
use Session;
class PagesController extends Controller{

//to authenicate the user touse this page you need to uncomment below
 // public function __construct()
 //    {
 //        $this->middleware('auth');
 //    }
	public function getIndex(){
		$posts= Post::orderBy('created_at','desc')->limit(4)->get();

	 return view('pages.welcome')->with('posts',$posts);

	}
	public function getAbout(){
		  $first='humphrey';
		  $last='pantaleo';
		  $full=$first. " ".$last;
          $email='h@gmail.com';
          $data=[];
          $data['full']=$full;
          $data['email']=$email;
		      return view('pages.about')->with("data",$data);
	}

	public function getContact(){
     
     return view('pages.contact');
	}

	public function postContact(Request  $request){
       $this->validate($request, array('email'=>'email|required','subject'=>'min:3','message'=>'required|min:5'));
           $data= array(
             'email'=>$request->email,
             'subject'=>$request->subject,
             'bodyMessage'=>$request->message
           	);
       Mail::send('emails.contact', $data, function($message) use($data){
        $message->from($data['email']);
         $message->to('hello@gmail.com');
          $message->subject($data['subject']);
           } );
       Session::flash('success','your mail was sent');
       return redirect('/');
	}
 }
?>