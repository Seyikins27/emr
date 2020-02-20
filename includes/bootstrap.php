<?php
 
 class Bootstrap
 {
	 public $url="";
	 
	 
	 function __construct()
	 {
		 $this->getUrl();
		 
		if(empty($this->url[0]))
		{
			require 'controller/index.php';
			$controller = new Index();
			$controller->index();
			return false;
			
		} 
		
		 $this->redirect();
	 }
	 // get the url
	 
	 function show_error()
	 {
		 
       
	       if(isset($this->url[2])&& $this->url[1]=='error')
	       {
		    echo $this->url[2];
	       }


	 }
	 
	 function getUrl()
	 {
	   $this->url= isset($_GET['url']) ? $_GET['url'] : null;  $this->url = rtrim($this->url, '/');
	   $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
	   $this->url = explode('/', $this->url);
	 }
	 // check if url file exists 
	 function ifExists()
	 {
		 $file= CTRL.DS.$this->url[0].'.php';
		 
		
		 if(!file_exists($file))
		 {
			 $this->error("File does not exist ");
			 echo"<a href='".DIR."index'>Back</a>";
			 exit();
			
		 }
		
	 }
     // redirects url through the controller
	 function redirect()
	 {
		$this->ifExists();
		require CTRL.DS.$this->url[0].'.php';
		$class= ucfirst($this->url[0]);
		$controller=new $class();
		$method="";
		if(isset($this->url[3]))
		{
				$method=$this->url[1];
		  if (method_exists($controller, $this->url[1]))           {
			 $controller->{$this->url[1]}($this->url[2], $this->url[3]);
			
			 $method=new ReflectionMethod($controller,$this->url[1] );

               $paramsize= sizeof($method->getParameters());
			  
			   if($paramsize<1)
			   {
				     
				   $this->error('Invalid Url');
				   exit;
			   }
			} 
			else
			 {
				$this->error('Invalid methods');
			}
		}
		else if(isset($this->url[2]))
		{
			$method=$this->url[1];
		  if (method_exists($controller, $this->url[1]))           {
			 $controller->{$this->url[1]}($this->url[2]);
			 $method=new ReflectionMethod($controller,$this->url[1] );

               $paramsize= sizeof($method->getParameters());
			   if($paramsize<1)
			   {
				     
				   $this->error('Invalid Url');
				   exit;
			   }
			} 
			else
			 {
				$this->error('Invalid methods');
			}
		}
		else if(isset($this->url[1]))
		{
			$method=$this->url[1];
			if(method_exists($class, $method))
			{
				$controller->$method();
			}
			else
			{
				$this->error("METHOD DOES NOT EXIST");
			}
		}
		else
		{
			$controller->Index();
	    }
	    
	
      }
	  
	  function defaultControl($uri)
	  {
		 
		 header('location:./'.$uri);
		  
	  }
    function error($error)
	{
		echo $error;
	}

 }
?>