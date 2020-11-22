<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Helpers\ExternalApiHelper;
use App\Helpers\CheckName;
use Validator;
use Cookie;
use App;
use Session;

class CampusGist extends Controller
{
    protected $request;

    public function __construct(Request $request){
        $this->request = $request;

    }

    public function signup(Request $request){
        $formdata = $request->all();
            $rules = [
                'username'=>['regex:/^[a-zA-Z0-9\s]+$/','unique:signups,user_name'],
                'email'=>['email','unique:signups,email'],
                'password'=>'alpha_num|min:6',
                'confirmpassword'=>'same:password',
                'gender'=>'alpha',
                'stateOfOrigin'=>'regex:/^[a-zA-Z0-9\s]+$/',
                'area'=>'regex:/^[a-zA-Z0-9\s]+$/',
                'tertiaryEducation'=>'regex:/^[a-zA-Z0-9\s]+$/',
                'image'=>'image'

            ];

        $validator = Validator::make($formdata,$rules);

        if($validator->passes()){

        $signup = new App\Signup;
        $signup->user_name = $request->username;
        $signup->email = $request->email;
        $signup->user_password = sha1($request->password);
        $signup->user_confirm_password = sha1($request->confirmpassword);
        $signup->gender = $request->gender;
        $signup->state_of_origin = $request->stateoforigin;
        $signup->area = $request->area;
        $signup->tertiary_education = $request->tertiaryeducation;
        $name =  $request->file('image')->getClientOriginalName();
        $signup->image = $request->file('image')->move('public\Pictures',$name);
        $signup->save();
        return redirect('/signup');

        }
        
    

        
            return back()->withErrors($validator);//inside signup.blade access the errors
            //by using @foreach($error->all() as $messages) {{$messages}} @endforeach 

    }

    

    public function signin(){
        $useremail = $this->request->email;
        $userpassword = $this->request->password;
        $protectedpassword = sha1($userpassword);
        $signup = \App\Signup::where('email','=',$useremail)->where('user_password','=',$protectedpassword)->get('id');
        
        foreach($signup as $values){
            $userid = $values->id;
            $cookieResult = Cookie::make('user_id',$userid,10);

            return redirect('/displayPosts')->withCookie($cookieResult);
            }

            return back();

    }


    public function saveUserPost(Request $request){
        $userIdNumber = Cookie::get('user_id');
        // Session::put('user_id',$userIdNumber);
        $signup = \App\Signup::where('id','=',$userIdNumber)->get();

        $timeOccured = date('D')." ".date('M')." ".date('d')." ".date('y');

        $post = new App\Post;
        foreach($signup as $result){
        $post->user_id = $result->id;
        $post->user_name = $result->user_name;
        $post->user_image = $result->image;
        
        $post->title = $request->title;
        $post->description = $request->description;
        $name = $request->file('image')->getClientOriginalName();
        $post->post_image = $request->file('image')->move('public\Pictures',$name);
        $post->post_time = $timeOccured;
        $post->save();
        return redirect('/collectPost');
        }
    
      return back();

}


    public function displayBlogs(Request $request){

        $userpost = \App\Post::all()->toArray();
        return view('CampusGistDisplayBlogs',compact('userpost'));
 }
 

     public function postComments(Request $request){

       $userId =  Cookie::get('user_id');
       $comment = new App\Comment;
       $signup = \App\Signup::where('id','=',$userId)->get();
       $confirm = request('PostidNumber') == true ? true:false;
       foreach($signup as $results){
        if($confirm == true){
        $values = request('PostidNumber');
        $_SESSION['IdNumber'] = $values;
        $theResult = $_SESSION['IdNumber'];
        $cookieResult = Cookie::make('post_unique_id',$theResult,30);
        $comment->post_unique_id = $theResult;
        $comment->user_id = $results->id;
        $comment->user_name = $results->user_name;
        $comment->user_image = $results->image;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect('/displayPosts')->withCookie($cookieResult);
    }

}

   
 }

 public function getUserProfile(){
    $userId = Cookie::get('user_id');
    $username = \App\Signup::where('id','=',$userId)->get();
    $getUsername = $username->toArray();

    $posts = \App\Post::where('user_id','=',$userId)->get();
    $userPost = $posts->toArray();
    return view('CampusGistMyProfile',compact('getUsername','userPost'));
}




 public function myProfilePostComments(Request $request){

    $userId =  Cookie::get('user_id');
    $comment = new App\Comment;
    $signup = \App\Signup::where('id','=',$userId)->get();
    $confirm = request('PostidNumber') == true ? true:false;
    foreach($signup as $results){
     if($confirm == true){
     $values = request('PostidNumber');
     $_SESSION['IdNumber'] = $values;
     $theResult = $_SESSION['IdNumber'];
     $cookieResult = Cookie::make('post_unique_id',$theResult,30);
     $comment->post_unique_id = $theResult;
     $comment->user_id = $results->id;
     $comment->user_name = $results->user_name;
     $comment->user_image = $results->image;
     $comment->comment = $request->comment;
     $comment->save();
     return redirect('/myProfile')->withCookie($cookieResult);
 }

}


}

public function searchForUser(Request $request){
    $username = $request->username;
    $shortName = substr($username,0,4);
    $value = \App\Signup::where('user_name','like',$shortName.'%')->get();
    $result = $value->toArray();

    return view('CampusGistUserInfo',compact('result'));

}

public function getFullInfo(Request $request){
    $confirm = request('searchId') == true ? true:false;

    if($confirm == true){
        $value = request('searchId');
        Session::put('searchId',$value);
        $userInfo = Session::get('searchId');

        $user = \App\Signup::where('id','=',$userInfo)->get();
        $userResult = $user->toArray();

        $post = \App\Post::where('user_id','=',$userInfo)->get();
        $postResult = $post->toArray();

        return view('CampusGistUserFullInfo',compact('userResult','postResult'));
    }

}



public function searchedProfilePostComments(Request $request){

    $userId =  Cookie::get('user_id');
    $comment = new App\Comment;
    $signup = \App\Signup::where('id','=',$userId)->get();
    $confirm = request('PostidNumber') == true ? true:false;
    foreach($signup as $results){
     if($confirm == true){
     $values = request('PostidNumber');
     $_SESSION['IdNumber'] = $values;
     $theResult = $_SESSION['IdNumber'];
     $cookieResult = Cookie::make('post_unique_id',$theResult,30);
     $comment->post_unique_id = $theResult;
     $comment->user_id = $results->id;
     $comment->user_name = $results->user_name;
     $comment->user_image = $results->image;
     $comment->comment = $request->comment;
     $comment->save();
     return back();
    //  return redirect('/fullInformation')->withCookie($cookieResult);
 }

}

}


    public function fetchComments(Request $request){
        $confirm = request('viewComment') == true ? true:false;
        if($confirm == true){
            $result = request('viewComment');
            Session::put('viewComment',$result);
            $viewCommentId = Session::get('viewComment');
            $userId = Cookie::get('user_id');
            $username = \App\Signup::where('id','=',$userId)->get('user_name');
            $getUsername = $username->toArray();
            $comment = \App\Comment::where('post_unique_id','=',$viewCommentId)->get();
            $results = $comment->toArray();
        }
        
     return view('CampusGistUserComment',compact('results','getUsername'));
     }


    public function postViewComment(Request $request){

        $postId = Session::get('viewComment');
        $userId = Cookie::get('user_id');
        $comment = new App\Comment;
        $signup = \App\Signup::where('id','=',$userId)->get();
        foreach($signup as $results){
            $comment->post_unique_id = $postId;
            $comment->user_id = $results->id;
            $comment->user_name = $results->user_name;
            $comment->user_image = $results->image;
            $comment->comment = $request->comment;
            $comment->save();

        }


     }

    
    public function numberOfComments($anId){
        $numberOfComments = \App\Comment::where('post_unique_id','=',$anId)->get()->cunt();
        return $numberOfComments;
    }



    public function editUserProfile(Request $request){
        $userId = Cookie::get('user_id');
        $username = $request->name;
        $newUsername = $request->newusername;
        $user = \App\Signup::where('id','=',$userId)->get();
        foreach($user as $result){
            if($result->user_name == $username){
                \App\Signup::where('user_name','=',$username)->update(array('user_name'=>$newUsername));
                \App\Post::where('user_name','=',$username)->update(array('user_name'=>$newUsername));
                \App\Comment::where('user_name','=',$username)->update(array('user_name'=>$newUsername));
            }
            
        }
        return view('CampusGistEditProfile');
    }


    public function logOut(){
        $result = Cookie::get('user_id');
        if($result){
            Cookie::forget('user_id');
            return redirect('/signin');
        }
        else{
            
        }
    }



    public function determineHomePage(){
        if(Cookie::get('user_id') != ""){
            return redirect('/displayPosts');
        }
        else{
            return redirect('/signin');
        }
        
    }


    public function practice(CheckName $result){
        return $result->confirmName();
    }

    
    
}
