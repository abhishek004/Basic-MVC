<?php
    
	class app{
        protected $controller='home';
        protected $method='index';
        protected $params=[];
        
        public function __construct(){
            $url = $this->parseUrl();
            print_r($url);
            echo '<br>'.$url[0];
            if(file_exists('../app/controllers'.$url[0].'.php')){
                echo "yes";
                $this->controller=$url[0];
                unset($url[0]);
            }
            require_once '../app/controllers/'.$this->controller.'.php';
            echo $this->controller;
        }
        
        public function parseUrl(){
            if(isset($_GET['url'])){
                return $url = explode("/",filter_var(rtrim($_GET['url'],"/"),FILTER_SANITIZE_URL));
                echo $_GET['url'];
            }    
        }
	}
?>