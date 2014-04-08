<?php
/**
 * 
 * Bootstrap file for getting url and executing controllers
 * 
 * @author shubham
 *
 */

class Bootstrap {

	public function __construct(){
			
		if(isset($_GET['url']))
		{
			$url = $_GET['url'];
			$url = rtrim($url,'/');
			$url = explode('/', $url);	
			$url[0] = filter_var($url[0], FILTER_SANITIZE_STRING);
			
			if(!empty($url[1]))
			{
				include _DIR_."error.php";
				$page_error = new ErrorController('error','page404');

			}
			else
			{
				if(!empty($url[0]))
				{
					$path = _DIR_.$url[0].'.php';
					
					if(file_exists($path))
					{
						include $path;
						$controller =new $url[0]($url[0]);

					}
					else
					{
						include _DIR_.'error.php';
						$page_error = new ErrorController('error','page403');
					}
				}
					
			 else
			 {
			 	//if url is empty loads index page
			 	include _DIR_.'index.php';
			 	$controller=new index('index');
			 }
			 	
			}
		}//end of is_get check
		else 
		{
			include _DIR_.'index.php';
			$controller=new index('index');
		
		}
		
	}//end of constructor

}
