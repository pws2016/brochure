<?php namespace App\Controllers;

use App\Models\UserModel;
use Config\Validation;

class User extends BaseController
{

  
    public function user()
	{
		$data = $this->common_data();
		
		$model = new UserModel();
        $datas['users']  = $model->getUser()->getResult();

        echo view('user', $data);
	
			}
			public function save()
			{
				$model = new UserModel();
				$datas = array(
					'display_name'        => $this->request->getPost('display_name'),
					'email'       => $this->request->getPost('product_price'),
					'mobile' => $this->request->getPost('email'),
					'password' => $this->request->getPost('password'),

				);
				$model->saveUser($datas);
				return redirect()->to('/user');
			}

			public function update()
			{
				$model = new UserModel();
				$id = $this->request->getPost('id');
				$datas = array(
					'display_name'        => $this->request->getPost('display_name'),
					'email'       => $this->request->getPost('product_price'),
					'mobile' => $this->request->getPost('email'),
					'password' => $this->request->getPost('password'),
				);
				$model->updateUser($datas, $id);
				return redirect()->to('/user');
			}
			public function delete()
    {
        $model = new UserModel();
        $id = $this->request->getPost('id');
        $model->deleteProduct($id);
        return redirect()->to('/user');
    }

		}

		
	



	