<?php 
class Router{
	
	public static function start(){
		$array=include_once('Router/routes.php');
		$routes=explode('/',$_SERVER['REQUEST_URI']);// / = New array's element u can check it by print_r($routes);
		if(!empty($routes[1]) and !empty($routes[2])){
			$Controller=$routes[1];
			print_r($routes[0]);
			$Action=$routes[2];
			foreach($array as $k=>$v){
				$k=explode('/',$k);
				$v=explode('/',$v);
			if($Controller==$k[0] and $Action==$k[1]){
				$Controller=$v[0];
				$Action=$v[1];
			}	
			}
		}elseif(!empty($routes[1]) and empty($routes[2])){
			$Controller=$routes[1];
			foreach($array as $k => $v){
				$k=explode('/',$k);
				$v=explode('/',$v);
				if(empty($k[1])){
				if($Controller==$k[0]){
					$Controller=$v[0];
					$Action=$v[1];
				}
				}
			}
		}
		$ControllerName='c/C_'.$Controller.'.php';
		if(file_exists($ControllerName)){
			include_once($ControllerName);
			$obj=new $Controller();
            if(method_exists($obj,$Action)==true){
				if(!empty($routes[3]) and $routes[3]!=0){
					$id=$routes[3];
					$obj->$Action($id);
				}else{
					$id=1;
					$obj->$Action($id);
					}
				
			}else{die('NO METHOD');}			
		}else{die('NO CONTROLLER');}	
	}
}
?>