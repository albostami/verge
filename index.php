<?php 

include 'lib/bones.php';

get('/', function($app){
	// echo "Home";
	$app->set('message', 'Welcome Back!');
	$app->render('home');

});

get('/signup',function($app){
	// echo "Signup";
	$app->render('signup');
});
 



?>