<?php

namespace App\Controllers;
use App\Models\UserModel;




class User extends BaseController
{

	public function user()
	{

		$data = $this->common_data();
		$data['list_user'] = $this->UserModel->find();


		echo view('admin/user', $data);
	}


	public function addUser()
	{ {

			$data_add = [


				'display_name' => $this->request->getVar("display_name"),
				'email' => $this->request->getVar("email"),
				'mobile' => $this->request->getVar("mobile"),
				'role'  => $this->request->getVar("role"),
				'pass' => $this->request->getVar("pass"),
				'password' => $this->request->getVar("password"),



			];

			var_dump($data_add);
			$xx = $this->UserModel->insert($data_add);
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
				'role'  => $this->request->getVar("role"),
				'pass' => $this->request->getVar("pass"),
				'password' => $this->request->getVar("password"),

			];
			var_dump($data_update);
			$this->UserModel->update($id, $data_update);
		


			return redirect()->to(base_url('admin/user'));
		



	
	}

	public function get_data(){

		$id = $this->request->getVar("id");
		$user_data=$this->UserModel->find($id);
	
	// var_dump($res);
?>
 <div class="form-outline mb-4">
 <input type="hidden" id="edit_id" name="id" value="<?= $user_data['id'] ?>"  class="form-control" >
											  <input type="text" id="display_name" name="display_name" value="<?= $user_data['display_name'] ?>" class="form-control form-control-lg" />
											  <label class="form-label" for="display_name"> Name</label>
										  </div>

										  <div class="form-outline mb-4">
											  <input type="email" id="email" name="email" value="<?= $user_data['email'] ?>" class="form-control form-control-lg" />
											  <label class="form-label" for="email">Email</label>
										  </div>
										  <div class="form-outline mb-4">
											  <input type="text" id="mobile" name="mobile"  value="<?= $user_data['mobile'] ?>" class="form-control form-control-lg" />
											  <label class="form-label" for="mobile">Phone</label>
										  </div>

										  <div class="form-outline mb-4">
											  <input type="password" id="password" name="password" value="<?= $user_data['password'] ?>" class="form-control form-control-lg" />
											  <label class="form-label" for="password">Password</label>
										  </div>

										

										
											 
											  <?php
	}

	public function delete(){
		
		$id = $this->request->getVar("id");
	$this->UserModel->delete($id);
	


	}
	

}
?>