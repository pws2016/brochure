<?php

namespace App\Controllers;
use App\Models\UserModel;




class Test extends BaseController
{

	public function test()
	{

		$data = $this->common_data();

	

		echo view('admin/test', $data);
	}
}