<?php
include_once('m/Model.php');
class listing extends Model{

public function listfunc(){
	$sql='SELECT*FROM newss';
    $answer=$this->DB($sql);
	return $answer;
}	
}
?>