
<?php

   class Admin extends Controller
   {
	   public $url='';
	   function __construct()
	   {
		   parent::__construct();

		   Session::init();
		   if(Session::get('loggedIn')==true && Session::get('priv')=='AD01')
		   {
			   
		   $this->url=lcfirst(__CLASS__);
		   $this->view->user=Session::get('user');
		   $this->view->url='admin';
		   $this->view->pagetitle='TRISATE ADMINISTATOR';
		   $this->view->headertitle='ADMINSTRATOR PORTAL';
		   $this->view->menuitems=$this->menu();
		   $this->view->render('templates/header');
		   $this->view->render('templates/menu');
		  ;
		   }
		   else
		   {
			   session_destroy();
			   header('location:'.DIR.'index');

		   }
         
	   }

	   function index()
	   {

		    $this->view->render($this->url.'/dashboard');
			$this->view->render('templates/footer');
	   }

	   function menu()
	   {
		   $dir=DIR.$this->url;
		   $menu=array('DASHBOARD'=>$dir.'/',
		    'ADD STAFF'=>$dir.'/add',
			'MANAGE STAFF'=>$dir.'/manage_staff',
			'DEPARTMENTS'=>$dir.'/departments',
			'REPORTS'=>$dir.'/reports',
			'LOGOUT'=>$dir.'/logout');

		   return $menu;
	   }

	   function add()
	   {
		 $this->loadModel('components');
		 $this->view->countries=$this->model->countries();
		 $this->view->dept=$this->model->department();
	    $this->view->render($this->url.'/add_staff/index');
		$this->view->render('templates/footer');
	   }

	   function add_staff()
	   {
		 if(isset($_POST['submit']))
		 {

		    echo"submitted";
			echo $_POST['soo'];
			  if(isset($_POST['first_name'])&& isset($_POST['last_name'])&& isset($_POST['gender'])&& isset($_POST['marital_status'])&& isset($_POST['dob'])&& isset($_POST['nationality'])&& isset($_POST['soo'])&& isset($_POST['phone'])&& isset($_POST['email'])&& isset($_POST['addr'])&& isset($_POST['workcat'])&& isset($_POST['designation'])&& isset($_POST['usertype'])&& isset($_POST['dept'])&& isset($_POST['office_no'])&& isset($_POST['userid'])&& isset($_POST['pass']))
			  {
				  echo"checked";


				  $firstname=$this->sanitize($_POST['first_name'],0);

		$lastname=$this->sanitize($_POST['last_name']);
		$gender=$this->sanitize($_POST['gender']);
		$dob=$this->sanitize($_POST['dob']);
		$marital_status=$this->sanitize($_POST['marital_status']);
			 $nationality=$this->sanitize($_POST['nationality']);
		$state=$this->sanitize($_POST['soo']);
		$phone=$this->sanitize($_POST['phone']);
		$email=$this->sanitize($_POST['email']);
	    $adress=$this->sanitize($_POST['addr']);
		$dept=$this->sanitize($_POST['dept']);
		$office=$this->sanitize($_POST['office_no']);
		$designation=$this->sanitize($_POST['designation']);
		$registration_date;
	    $workcat=$this->sanitize($_POST['workcat']);
		$usertype=$this->sanitize($_POST['usertype']);
		$userid=$this->sanitize($_POST['userid']);
		$password=$this->sanitize($_POST['pass']);
		$pass=Hash::create('sha256', $password, HASH_PASS);
		$priv='';
		$wc='';
		$ut='';
		switch($workcat)
		{
			case 'acc':
			$wc='BL';
			break;

			case 'frd':
			$wc='FD';
			break;

			case 'lab':
			$wc='LB';
			break;

			case 'med':
			if($designation=='DOC')
			{
				$wc='DC';
			}
			else if($designation=='NUR')
			{
				$wc='NR';
		    }
			break;

			case 'phm':
			$wc='PH';
			break;

			case 'inv':
			$wc='IV';
			break;

			case 'rad':
			$wc='RD';
			break;

			default:
			$wc='';
			break;
	    }


		switch($usertype)
		{
			case 'SA':
			$ut='SA0';
			break;

			case 'DA':
			$ut=0;
			break;

			case 'RG':
			$ut=1;
			break;

	    }
			$priv=$wc.$ut;

				  $data=array('staff_id'=>$userid, 'firstname'=>$firstname, 'lastname'=>$lastname,'gender'=>$gender, 'date_of_birth'=>$dob, 'marital_status'=>$marital_status,'nationality'=>$nationality,'state_of_origin'=>$state,'phone'=>$phone, 'email'=>$email, 'address'=>$adress,'department'=>$dept,'office_number'=>$office,'designation'=>$designation, 'date_of_registration'=>'NOW()', 'privilege'=>$priv);

					 $logindata=array('user_name'=>$userid, 'password'=>$pass, 'user_type'=>$priv, 'user_status'=>1, 'default_password'=>0);

			$this->loadModel('staff');
		    $this->model->add('staff_tbl', $data);
		    $this->model->add('login', $logindata);
			  }
			  header('location:'.DIR.$this->url.'/add');
	     }
		 else
		 {
			 echo"NOT ALL SET";
		 }
	   }
	   function manage_staff()
	   {
		$this->loadModel("staff");
		//$this->view->staff=$this->model->getdetails();
		$this->view->all=$this->model->getall();
		$this->view->r=$this->loadModel('resolver');
		$this->view->render($this->url.'/manage_staff');
		$this->view->render('templates/footer');
	   }

	   function departments()
	   {
		$this->view->render($this->url.'/manage_dept');
		$this->view->render('templates/footer');
	   }

	   function reports()
	   {
		 $this->view->render($this->url.'/reports');
		$this->view->render('templates/footer');
	   }

	   function logout()
	  {
		  $this->loadModel('login');
		  $this->model->logout();
	  }
   }




