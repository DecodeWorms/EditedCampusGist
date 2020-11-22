<?php
namespace App\Helpers;
use Illuminate\Http\Request;
use Cookie;
use App;

class CheckName{

    public function confirmName($request){
        $value = $request->cookie('user_id');
        $result = \App\Signup::where('id','=',$value)->get('user_name');
        echo $result;
        
    }


}

?>