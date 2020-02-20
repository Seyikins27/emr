<?php

  require 'config/const.php';
  require 'config/conn.php';
  function __autoload($class)
   {
	   require INC.DS.$class.'.php';
   }
  
  $bootstrap= new Bootstrap();

?>