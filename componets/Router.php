<?php
class Router
{
	private $routes;
	public function __construct(){
		$routesPath = ROOT.'/confing/routes.php';
		$this->routes = include($routesPath);

	}
	private function GetURI()
	{
		if(!empty($_SERVER['REQUEST_URI']))
		{
		return trim($_SERVER['REQUEST_URI'],'/');
		}
	}
	public function run()
	{
	//Получить строку запроса
		$uri = $this->GetURI();
		if(empty($uri)){
			$uri = 'news';
		}
	//Проверка такого запроса в routes.php
	foreach($this->routes as $uriPattern => $path)
	{
		//сравниваем $uriPattern и uri
	if(preg_match("~$uriPattern~",$uri)){
			$internalRoute = preg_replace("~$uriPattern~",$path,$uri);
            
			$segments = explode('/',$internalRoute);
            
            
			$controllerName = ucfirst(array_shift($segments)).'Controller';
			$actionName = 'action'.ucfirst(array_shift($segments));
            if($segments==!null){
            $s = $segments[0];
            }
            else{
                $s = true;
            }
			
	
	//Подключение контроллера 
	$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
	if(file_exists($controllerFile)){
		include_once($controllerFile);
	}
	//ВЫзов метода
	$controllerObject = new $controllerName;
	$result = $controllerObject->$actionName($s);
	if($result != null){
		break;
	}
	}
	}
	}
}
?>