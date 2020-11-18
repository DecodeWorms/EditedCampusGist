
@extends("Parent.baseFile")

@section("body")
<div class="conatiner">
   <div class="card mt-3" id="regCard">
    <div class="card-header bg-primary text-white text-center">REGISTER HERE</div>
     <div class="card-body">
         <form action="classSignUp.php" method="post" enctype="">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username"><br>
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="useremail"><br>
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="userpassword"><br>
              <labe for="confirmPassword" class="form-label"><b>Confirm Password</b></label>
              <input type="password" class="form-control" name="userVerifyPassword"><br>
              <button type="" class="btn btn-secondary btn-block btn-lg">SUBMIT</button>
        </form>
       </div>
    </div>
 </div>
@stop
