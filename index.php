<?php 

include 'lib/bones.php';

define('ADMIN_USER', 'ehab') 		;
define('ADMIN_PASSWORD', 'ehab123')	;

get('/', function($app){
	// echo "Home";
	$app->set('message', 'Welcome Back!');
	$app->render('home');

 });

get('/signup',function($app){
	// echo "Signup";
	$app->render('user/signup');
});

get('/say/:message', function($app){
	$app->set('message', $app->request('message'));
	$app->render('home');
});

post ('/signup', function($app){
	// $user = new stdClass; // standard generic class from php ...note no () ...
	$user = new User() ; 
	// $user->type = 'user' ; // used with the stdClass
	
	$user->full_name = $app->form('full_name')		;
	$user->email = $app->form('email')				;
	// $user->roles = array()							;
//
// 	$user->name = preg_replace('/[^a-z0-9-]/','',strtolower($app->form('username')));
// 	$user->_id = 'org.couchdb.user:' . $user->name;
// 	$user->salt = $app->couch->generateIDs(1)->body->uuids[0] ;//'secret_salt' ;
// 	$user->password_sha = sha1($app->form('password') . $user->salt) ;
//
// 	$app->couch->setDatabase ('_users') ;
// 	$app->couch->login(ADMIN_USER, ADMIN_PASSWORD) ;
// 	$app->couch->put($user->_id, $user->to_json()) ;

	$user->signup($app->form('username'), $app->form('password')) ;
	$app->set('success', 'Thanks for Signing Up ' . $user->full_name . '!');
	$app->render('home');
	
	// echo json_encode($user) ;
	// $curl = curl_init();
	// //curl options
	// $options = array(
	// 	CURLOPT_URL				=> 'localhost:5984/verge',
	// 	CURLOPT_POSTFIELDS		=> json_encode($user) ,
	// 	CURLOPT_HTTPHEADER		=> array("Content-Type: application/json") ,
	// 	CURLOPT_CUSTOMREQUEST	=> 'POST' ,
	// 	CURLOPT_RETURNTRANSFER	=> true ,
	// 	CURLOPT_ENCODING		=> "utf-8",
	// 	CURLOPT_HEADER			=> false,
	// 	CURLOPT_FOLLOWLOCATION	=> true,
	// 	CURLOPT_AUTOREFERER		=> true
	// );
	//
	// curl_setopt_array($curl, $options) ;
	// curl_exec($curl)  ;
	// curl_close($curl) ;
	
	// $app->couch->post($user) ; used with the stdClass
	// echo $user->to_json;
	
	//$app->couch->post($user->to_json());
	
	
	//$app->set('message', 'Thanks for Signing Up ' . $app->form('name') . '!');
	//$app->render('home');
});

get ('/login', function($app){
	$app->render('user/login');
});

post ('/login', function ($app) {
  
	// the login post will take the username and password entered and send to couch _users DB.
	
	$user = new User() ;
	$user->name = $app->form('username') ;
	$user->login($app->form('password'));
	
	$app->set('success', 'You are now logged in!');
	$app->render('home');

});

get('/logout', function($app){
	User::logout() ;
	$app->redirect('/');
});

get('/user/:username', function($app){
	$app->set('user', User::get_by_username($app->request('username')));
	
	$app->set('is_current_user', ($app->request('username') == User::current_user() ? true :false));
	
	$app->render('user/profile');
});


resolve();

?>