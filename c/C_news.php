<?php 
class news{
	
	
	public function change($id){
		include_once('m/M_change.php');
		$obj = new Change();
		$answer=$obj->changefunc($id);
		if($answer){
			include_once('v/V_change.php');
		}
	}
	
	public function index(){
		include_once('m/M_index.php');
		
	}
	
	public function listing(){
		include_once('m/M_listing.php');
		$obj=new listing();
		$answer=$obj->listfunc();
		if($answer){
			include_once('v/V_listing.php');
		}
	}
	
	
}

?>