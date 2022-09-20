<?php

namespace App\Controllers;
use App\Models\UsersMobileModel;




class List_mobile extends BaseController
{

	public function List_mobile()
	{

		$data = $this->common_data();
        $common_data=$this->common_data();
        
        $inf_user=$this->UserModel->find($common_data['user_data']['id']);
		$data['inf_user']=$inf_user;
        $data['list_mobile'] = $this->UsersMobileModel->where('user_id', $data['user_data']['id'])->find();
		echo view('user/list_mobile', $data);
	}
    public function insert()
	{
		
		$data = $this->common_data();
		if($this->request->getVar("mobile")!==null){
			$inset = [
                'user_id' => $data['user_data']['id'],

				'mobile' => $this->request->getVar("mobile"),
			


			];

		var_dump($inset);
			$xx = $this->UsersMobileModel->insert($inset);
		
			return redirect()->to(base_url('user/list_mobile'));
		}
      
		return view('user/list_mobile');
	}
    public function delete()
    {


        $id = $this->request->getVar("id");
        $this->UsersMobileModel->delete($id);
    }

}