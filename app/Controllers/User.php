<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\CLI\Console;

class User extends BaseController
{

	public function user()
	{

		$data = $this->common_data();

		$data['list_user'] = $this->UserModel->getexpired();
		$data['pack_title'] = $this->PackageModel->find();
		$data['pack'] = $this->UserPackModel->find();
        $data['list_pack'] = $this->PackageModel->find();
	
    

	  //$data['expired_date']= $this->UserModel->getexpired('$id');
	
	      echo view('admin/user', $data);
	
	}


	public function addUser()
	{
		 {

			
		    $p = $this->PackageModel->find($this->request->getVar("pack"));
			$data_add = [


				'display_name' => $this->request->getVar("display_name"),
				'email' => $this->request->getVar("email"),
				'mobile' => $this->request->getVar("mobile"),
				'role'  => 'C',
				'active'  => 'yes',
				'pass' => $this->request->getVar("pass"),
				'password' =>md5( $this->request->getVar("password")),
				'remain_broch' => $p['nb_brochure'],




			];


			
			// var_dump($data_add);
			$xx = $this->UserModel->insert($data_add);
           

		   $C_date=strtotime($p['created_at']);
		   $exp=strtotime($p['validity_months']);
     
		   $exp_date = $C_date+ $exp;

			$data_pack = array(
			'user_id'=> $xx, 
			'pack_id'=>$this->request->getVar("pack"),
			'nb_brochure'=>$p['nb_brochure'],
			'expired_at'=> date('Y-m-d',strtotime("+".$p['validity_months']." months -1 day")),


		);
			$this->UserPackModel->insert($data_pack);
			
			$session = session();
			$session->setFlashdata("successMsg", "New Package created successfully");
			return redirect()->to(base_url('admin/user'));
		}



		return view('admin/user');
	}






	public function updateUser()
	{


	$id=$this->request->getVar("id");

			$data_update = [


				
				'display_name' => $this->request->getVar("display_name"),
				'email' => $this->request->getVar("email"),
				'mobile' => $this->request->getVar("mobile"),
				//'role'  => $this->request->getVar("role"),
				'pass' =>$this->request->getVar("pass"),
				'password' =>  md5($this->request->getVar("password")),
				//'pack_id'=>$this->request->getVar("pack"),

			];

			// var_dump($data_update);

			$this->UserModel->update($id, $data_update);
		


			return redirect()->to(base_url('admin/user'));
		



	
	}

	public function get_data(){

		 $id = $this->request->getVar("id");
		$user_data=$this->UserModel->find($id);
	
	
?>

 <input type="hidden" id="edit_id" name="id" value="<?= $user_data['id'] ?>"  class="form-control" >
 
 
   <div class="mb-3">
	<label class="form-label" for="email">Email<span class="text-primary">*</span></label>
	<input type="email" class="form-control" id="email" name="email" class="form-control form-control-lg" placeholder="Enter email" required value="<?= $user_data['email'] ?>">
</div>

<div class="mb-3">
	<label class="form-label" for="display_name">Username<span class="text-primary">*</span></label>
	<input type="text" class="form-control" id="display_name" name="display_name" class="form-control form-control-lg" placeholder="Enter username" required value="<?= $user_data['display_name'] ?>">
</div>

<div class="mb-3">
	<label class="form-label" for="mobile">Phone<span class="text-primary">*</span></label>
	<input type="text" class="form-control" id="mobile" name="mobile" class="form-control form-control-lg" placeholder="Enter username" required  value="<?= $user_data['mobile'] ?>">
</div>

<div class="mb-3">
	<label class="form-label" for="password">Password<span class="text-primary">*</span></label>
	<input type="password" class="form-control" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password" required>
</div>
									
											 
											  <?php
	}

	public function delete(){
		
		$id = $this->request->getVar("id");
	$this->UserModel->delete($id);
	


	}
	

}
?>