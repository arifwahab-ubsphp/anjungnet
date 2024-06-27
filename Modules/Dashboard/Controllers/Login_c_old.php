<?php namespace Modules\Dashboard\Controllers;

use App\Controllers\BaseController;
use Modules\Dashboard\Models\Login_m;


class Login_c extends BaseController
{
	protected $helpers = ['form','url','file','validation']; //load helper
	

	public function index()
	{
		
		echo view('layouts/view_login');
	}

	public function auth(){


		if(isset($_POST)){

		    $this->session = \Config\Services::session(); //load session
		    

			$p_Pengenalan = trim($this->request->getPost('nokp'));
			$p_Katalaluan = trim($this->request->getPost('katalaluan'));

			#Validation
			$input = $this->validate([
	            'nokp' => 'required',
	            'user_pwd' => 'required'
	        ]);


			if (!$input) {
				
	            echo view('layouts/view_login', ['validation' => $this->validator]);
	        } else {

	        	#Declare model 
	        	$getLogin = new Login_m(); 
	        	$result = $getLogin->getLoginInfo($p_Pengenalan,$p_Katalaluan)->getResult(); #Select Query

	        	if($result){

		        	foreach ($result as $row) {
						$id = $row->userid;
						$nama =  $row->fname;
						$nok = $row->nok;
						$roleid = $row->role;
					}

					$sess_array = array();
					$sess_array = array(

						's_IdPengguna' => $id , 
						's_Nama' => $nama,
						's_NoK' => $nok,
						's_JenisPengguna' => $roleid,
					);	

					$this->session->set('logged_in',$sess_array);

					#Redirect ke Controller front
	                return redirect()->to('/front'); 


	        	}else{

	        		$this->session->setFlashdata('Mesej', 'Emel atau Katalaluan tidak wujud');
	        		return redirect()->to('/login'); 
	        	}
    
	        }
		}


	}

	public function logout(){

		
		$this->session = \Config\Services::session(); //load session

		unset($_SESSION['logged_in']);
		$this->session->destroy();
		return redirect()->to('/login'); 

	}
}