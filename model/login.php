<?php
  
  class LoginModel extends Model
  {
	  function Auth($data)
	  {
		  $message="";
		  $user=$data[0];
		  $password=$data[1];
		  $pass=Hash::create('sha256', $password, HASH_PASS);
		  
		
		  if($user=='Admin' && $pass='admpass17')
		  {
			Session::init();
			Session::set('name', 'ADMINISTRATOR');
			Session::set('sessionid', 'adminuser001');
			Session::set('user', 'ADMIN');
			Session::set('priv', 'AD01');
			Session::set('loggedIn', true);
			header('location:'.DIR.'admin');
		  }
		  else
		  {
		  $sql="SELECT * FROM login WHERE user_name='$user' AND password='$pass'";
		 $row=$this->db->select($sql);
		 $count=$this->db->rowCount($sql);
		 
		 if($count>=1)
		 {
		$sql2="SELECT * FROM staff_tbl WHERE staff_id='$user'";
		$row2=$this->db->select($sql2);
			
			Session::init();
			Session::set('name', $row2[0]['lastname'].' '.$row2[0]['firstname']);
			Session::set('sessionid', $row[0]['user_name']);
			Session::set('user', $row2[0]['email']);
			Session::set('priv', $row[0]['user_type']);
			Session::set('loggedIn', true);
			$usertype=substr($row[0]['user_type'], 0, 2);
			switch($usertype)
			{
				case 'BL';
				header('location:'.DIR.'billing');
				break;
				
				case 'DC';
				header('location:'.DIR.'doctor');
				break;
				
				case 'FD';
				header('location:'.DIR.'frontdesk');
				break;
				
				case 'LB';
				header('location:'.DIR.'laboratory');
				break;
				
				case 'RD';
				header('location:'.DIR.'radiology');
				break;
				
				case 'NR';
				header('location:'.DIR.'nurse');
				break;
				
				case 'PH';
				header('location:'.DIR.'pharmacy');
				break;
				
				case 'IV';
				header('location:'.DIR.'inventory');
				break;
		    }
			
		 }
		 else
		 {
		  $message= "WRONG USERNAME OR PASSWORD COMBINATION";
		 }
	   }
		 return $message;
	  }
	  
	  
	  function logout()
	  {
		  Session::destroy();
		  header('location:'.DIR.'index');
	  }
	  
	  
  }// end of class