<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function(){
    return "hello world!";

});
?>