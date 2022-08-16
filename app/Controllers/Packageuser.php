<?php

namespace App\Controllers;




class Packageuser extends BaseController
{

	public function package_list()
	{

	 $data = $this->common_data();
		// $data['list_pack'] = $this->PackageModel->find();
		// var_dump($data['list_pack']);


		echo view('user/packageuser', $data);
	}
}