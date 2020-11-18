<?php

namespace App\Http\Controllers;
use App\member;
use App\product;
use App\Brand;
use Validator;
use Illuminate\Http\Request;

class UserInfo extends Controller
{


    public function saveUserInfo(Request  $request){
        //print_r($req->input());

        $formdata = $request->all();
            $rules = [
                'name'=>['alpha_num','unique:members,name'],
                'unit'=>'alpha_num',
                'dateJoined'=>'regex:/^[a-zA-Z0-9\s]+$/',
                'age'=>'integer',
                'image'=>'image'
            ];

            $validator = Validator::make($formdata,$rules);

            if($validator->passes()){
                $member =  new Member;
                $member->name = $request->name;
                $member->unit = $request->unit;
                $member->date_joined = $request->dateJoined;
                $member->age = $request->age;
                $member->gender = $request->gender;
                $name =  $request->file('image')->getClientOriginalName();
                $member->image = $request->file('image')->move('public\Pictures',$name);
                $member->save();
                }else{
                  return redirect('/signup')->withErrors($validator);
                 }


       }

    public function index(){
        $value =  28;
        $member = Member::all()->where('id','=',$value)->toArray();
        return view('displayInfo',compact('member'));
    
    }

    public function getCookie(Request $request){
        return $request->cookie('userid') ;


    }


    public function savesUserInfo(Request $req){
        $member =  new Member;
        $member->name = $req->name;
        $member->unit = $req->unit;
        $member->date_joined = $req->dateJoined;
        $member->age = $req->age;
        $member->gender = $req->gender;
        $member->image = $req->image;
        $member->save();

    }

    public function trysave(Request $request){
    
        
        // $cookieidnumber = UserInfo::getCookie($request);
        // $username = \App\Member::where('id','=',$cookieidnumber)->first(); //this line of 
        // //codes will generate a single at view using {{$username->name}}
           

        // $brand = Brand::all()->toArray();
        // return view('displayInfo',compact(['brand','username']));


        $value =['28th of nov'];
        $member = \App\Member::whereIn('date_joined',$value)->get();
        return view('displayInfo',compact(['member']));

        }


        public function validating(Request $request){
            $formdata = $request->all();
            $rules = [
                'name'=>'alpha_num',
                'unit'=>'alpha',
                'dateJoined'=>'alpha_num',
                'age'=>'integer',
                'image'=>'image'
            ];

            $validator = Validator::make($formdata,$rules);

            if($validator->passes()){
                return view('simple');
            }else{
                return redirect('/signup')->withErrors($validator);
            }
        }
            
    
    
}
