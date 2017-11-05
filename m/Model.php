<?php
class Model{
	
	
	public static function DB($sql){
		
		$host='localhost';
		$user='root';
		$pass='';
		$DB='news';
		
		$link=mysqli_connect($host,$user,$pass,$DB)or die($link);
		$query=mysqli_query($link,$sql);
		$dbanswer=mysqli_fetch_assoc($query);
		$rows=mysqli_num_rows($query);
		if($rows){
			return $query;
			die();
		}
		if(!empty($dbanswer)){
		$articles=[];
		while($row = mysqli_fetch_assoc($query)){
			$articles[]=$row;
			
		}return $articles;
		}
	}
	
	
	
	
}


?>