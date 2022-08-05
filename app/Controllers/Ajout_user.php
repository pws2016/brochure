<?php namespace App\Controllers;


class Ajout_user extends BaseController
{

    public function ajout_user()
	{
		$data = $this->common_data();


		return view('admin/ajout_user',$data);
	

	
	}
}