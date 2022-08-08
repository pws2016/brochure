<?php namespace App\Controllers;
//use App\Models\UserModel;
//use App\Models\UserProfileModel;



class Package extends BaseController
{

    public function package()
	{
		$data = $this->common_data();
	// echo view('includes/header', $data);
		echo view('admin/package',$data);
	
	}
}
