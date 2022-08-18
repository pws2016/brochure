<?php

namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use CodeIgniter\Files\File;



class Brochures extends BaseController
{
	public function index(){
		$data=$this->common_data();
		
		$verify=$this->verifyUserPack($data['user_data']['id']);
		if($verify['status']==false) $data['error']=$verify['msg'];
		
		$list=$this->BrochuresModel->where('user_id',$data['user_data']['id'])->find();
		$data['list']=$list;
		
		echo view('User/brochures.php',$data);
	}
	
	public function new_broch(){
		$data=$this->common_data();
		$verify=$this->verifyUserPack($data['user_data']['id']);
		if($verify['status']==false) return redirect()->to(base_url('user/brochures'))->with('error',$verify['msg']);
		if(null ===($this->session->get('current_brochure')) ){
			
			$current_brochure=$this->BrochuresModel->insert(array("user_id"=>$data['user_data']['id'],'status'=>'draft','template_id'=>1,'title'=>'Brochure '.date('d-m-Y')));
			$this->session->set(array('current_brochure'=>$current_brochure));
		}
		$inf_brochure=$this->BrochuresModel->find($this->session->get('current_brochure'));
		$data['inf_brochure']=$inf_brochure;
		$data['startIndex']=$inf_brochure['step'];
		echo view('User/brochures_new.php',$data);
	}
	
}?>