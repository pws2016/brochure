<?php namespace App\Controllers;

use App\Models\UserModel;
use Config\Validation;

class User extends BaseController
{

  
    public function user()
	{
		$data = $this->common_data();
		$users=[];
     $users = new UserModel();
	 $listclient ['users']= $users->orderBy('id', 'DESC')->findAll();
     // 	 var_dump($listclient);
	//  return view('admin/user',$data);
	 echo view('admin/user',$data,$listclient);

	
		$data = [];
		helper(['form']);


		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))
											->first();

				$this->setUserSession($user);
				//$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('dashboard');

			}
		}

		
	echo  view('admin/user',$data);
	}

	private function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'firstname' => $user['firstname'],
			'lastname' => $user['lastname'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

public function register(){
	$data = [];
	helper(['form']);

	if ($this->request->getMethod() == 'post') {
		//let's do the validation here
		$rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
			'phone'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'pass'      => 'required|min_length[4]|max_length[50]',
            'confirmpass'  => 'matches[password]'
        ];

		if (! $this->validate($rules)) {
			$data['validation'] = $this->validator;
		}else{
			$model = new UserModel();

			$newData = [
				'display_name' => $this->request->getVar('name'),
				'mobile' => $this->request->getVar('phone'),
				'email' => $this->request->getVar('email'),
				'password' => $this->request->getVar('pass'),
			];
			$model->save($newData);
			$session = session();
			$session->setFlashdata('success', 'Successful Registration');
			return redirect()->to('admin/user');

		}
	}


	echo  view('admin/user',$data);

}

}



	