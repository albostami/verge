<?php

class Post extends Base {

	protected $user				;
	// Protected $type 			;
	protected $date_created		;
	protected $content 			;
	
	public function __contruct() {
		parent::__construct('post') ;
	}
	
	public function create() {
		
		$bones = new Bones()  ;
		
		$this->_id = $bones->couch->generateIDs(1)->body->uuids[0] 	;
		$this->date_created = date('r') 							;
		$this->user = User::current_user() 							;
		
		try { 
			$bones->couch->put($this->_id,$this->to_json());
		} catch (SagCouchException $e) {
			$bones->error500($e) ;
		}
	} 

}


?>