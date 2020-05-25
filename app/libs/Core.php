<?php
	/*
		* App Core Class
		* Create URL & Loads core controller
		* URL Format - /controller/action/params
	*/

	class Core
	{
		protected $currentController = 'Users';
		protected $currentAction = 'index';
		protected $params = [];

		public function __construct()
		{
			$url = $this->getUrl();
			//Look in controllers for first index
			if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
				//if exist set as controller
					$this->currentController = ucwords($url[0]);
				}
				//unset 0 index
				unset($url[0]);
				//require the controller
				require_once '../app/controllers/' . $this->currentController . '.php';
				//instantiate a controller class
				$this->currentController = new $this->currentController;

				//check for second part of url
				if(isset($url[1])){
					//check to see if method exist in controller
					if(method_exists($this->currentController, $url[1])){
						$this->currentAction = $url[1];
						//Unset 1 index
						unset($url[1]);
					}
				}

				//Get params
				$this->params = $url ? array_values($url) : [];

				//Call a callback with array of params

				call_user_func_array([$this->currentController, $this->currentAction], $this->params);
		}

		public function getUrl()
		{
			if(isset($_GET['url'])){
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);//format for url
				$url = explode('/', $url);
				return $url;
			} 
		}
	}

