<?php
include_once('m/Model.php');
class Change extends Model{
	
	public function changefunc($id){
	$sql='SELECT*FROM newss WHERE id ="'.$id.'"';
    $answer=$this->DB($sql);
	return $answer;
}	
	
	
	
	
}



?>