<?php 

echo "You can change the article: ";
if(!empty($answer)){
foreach($answer as $ans){
		$id = $ans['id'];
		$title = $ans['title'];
		$content = $ans['content'];
	} 
}else{
	$routes=explode('/',$_SERVER['REQUEST_URI']);
	$id=$routes[3];
	$host='localhost';
		$user='root';
		$pass='';
		$DB='news';
		$sql='SELECT*FROM newss WHERE id ="'.$id.'"';
		$link=mysqli_connect($host,$user,$pass,$DB)or die($link);
		$query=mysqli_query($link,$sql);
		$content['content']=mysqli_fetch_assoc($query);
	$title=$content['title'];
}
if(!empty($_REQUEST['submit'])){
	$title=$_REQUEST['title'];
	$content=$_REQUEST['content'];
	$routes=explode('/',$_SERVER['REQUEST_URI']);
	$id=$routes[3];
	$host='localhost';
		$user='root';
		$pass='';
		$DB='news';
		$sql='UPDATE newss SET title="'.$title.'",content="'.$content.'" WHERE id="'.$id.'"';
		$link=mysqli_connect($host,$user,$pass,$DB)or die($link);
		$query=mysqli_query($link,$sql)or die('Error query');
		echo "<br>";
		echo "Succesly changed!";
}
?>
<html>
<head>
<title>You can change it</title>
</head>

<body>
<!DOCTYPE html>
<html>
<form action="" method="POST">
<input type="text" name="title" value="<?php echo $title; ?>"/>
</br>
</br>
<textarea name="content"><?php echo $content; ?></textarea>
</br>
<input type="submit" value="Change" name="submit"/>
</form>
</html>
</body>
</html>