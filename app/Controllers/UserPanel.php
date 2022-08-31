<?php namespace App\Controllers;




class UserPanel extends BaseController
{

    public function Dash()
	{
		$data = $this->common_data();
		echo view('user/dashboarduser',$data);
	
	}
}


