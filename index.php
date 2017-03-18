<?php 

include 'lib/bones.php';

get('/', function($app){
	echo "Home";

});

get('/signup',function($app){
	echo "Signup";
});

 
// function execFN($callback){
// 	echo $callback();
// }
//
// echo execFN('function name(){
// 	echo \'Ehab\';
// }');


?>