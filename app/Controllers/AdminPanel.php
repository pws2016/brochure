<?php namespace App\Controllers;
//use App\Models\UserModel;
//use App\Models\UserProfileModel;



class AdminPanel extends BaseController
{

    public function Dashboard()
	{
		$data = $this->common_data();

		echo view('admin/dashboard',$data);
	
	}
}


