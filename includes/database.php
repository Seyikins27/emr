<?php

  class Database
  {
	  private static $con='';
	  
	  function __construct()
	  {
		 self::$con= mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME)or die("could not connect to database");
	  }
	  
	  static function select($sql)
	  {
		  $result=mysqli_query(self::$con, $sql);
		  $resultcount=mysqli_num_rows($result);
		  if($result)
		  {
		    
			if($resultcount>=1)
			{
		      $data=array();
		      while($row=mysqli_fetch_assoc($result))
		      {
			   $data[]=$row  ;		
		      }
		  
		       return $data;
			}
			else
			{
				$data='';
			}
		  }
		  
		  else
		  {
			  self::error();
		  }
		  
		  
	  }
	  
	  static function rowCount($sql)
	  {
		  $result=mysqli_query(self::$con, $sql);
		  $count=mysqli_num_rows($result);
		  return $count;
	  }
	  
	  static function insert($table, $data)
	  {
		  $key=implode(',', array_keys($data));
		  $value=implode("','", array_values($data));
	
	$sql="INSERT INTO $table ($key) VALUES ('$value')";
		      
			  $result=mysqli_query(self::$con, $sql);
			  if($result)
			  {
				  $r="SUCCESSFUL";
				  
			  }
			  else
			  {
				  $r=mysqli_error(self::$con);
				  echo mysqli_error(self::$con);
			  }
		  
		  
		  
		  return $r;
	  }
	  
	  static function query()
	  {
		  $result=mysqli_query(self::$con, $sql);
		 
		  if($result)
		  {
		    
			
		  }
		  
		  else
		  {
			  $this->error();
		  }
	  }
	  
	  static function update($table, $set, $where)
	  {
         //split each array into stmt seperated by commas
			$s = implode(',', array_map(
    function ($v, $k) {
        if(is_array($v)){
            return $k.'[]='.implode('&'.$k.'[]=', $v);
        }else{
           return "".$k."='".$v."'";
			
        }
    }, 
    $set, 
    array_keys($set)
));
			  
		  //split each array into stmt seperated by AND
			$w = implode(' AND ', array_map(
    function ($v, $k) {
        if(is_array($v)){
            return $k.'[]='.implode('&'.$k.'[]=', $v);
        }else{
           return "".$k."='".$v."'";
			
        }
    }, 
    $where, 
    array_keys($where)
));


		  
		  $sql="UPDATE $table SET ".$s." WHERE ".$w."";
		  
		  $result=mysqli_query(self::$con, $sql);
		  if(mysqli_affected_rows(self::$con)>=1)
		  {
			  $msg="UPDATED SUCCESSFULLY";
		  }
		  else
		  {
			   $msg=mysqli_error(self::$con);
			   echo mysqli_error(self::$con);
		  }
		  echo $msg;
	  }
	  
	  static function delete($table, $where)
	  {
         
			  
		  //split each array into stmt seperated by AND
	$w = implode(' AND ', array_map(function ($v, $k) 
	 {
        if(is_array($v)){
            return $k.'[]='.implode('&'.$k.'[]=', $v);
        }else{
           return "".$k."='".$v."'";
			
        }
    },  $where,  array_keys($where)));


		  
		  $sql="DELETE FROM $table WHERE ".$w."";
		  echo $sql;
		  $result=mysqli_query(self::$con, $sql);
		  if(mysqli_affected_rows(self::$con)>=1)
		  {
			  $msg="DELETED SUCCESSFULLY";
		  }
		  else
		  {
			 $msg="NOT SUCCESSFUL";
		  }
		  echo $msg;
	  }
	  
	  static function error()
	  {
		  echo mysqli_error(self::$con);
		  
	  }
  }