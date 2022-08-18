<?php namespace App\Controllers;


class Ajax extends BaseController
{ 
	public function index($f){
		return $this->$f();
	}
	public function save_step(){
		$data=$this->common_data();
		$step=$this->request->getVar('step');
		$current_step=$step+1;
		switch($step){
			case 0:
				$tab=array("title"=>$this->request->getVar('title'),"step"=>$current_step);
				$this->BrochuresModel->update($this->session->get('current_brochure'),$tab);
				
			break;
			case 1:
			$logo_name=null;
			if($this->request->getVar('selectlogo')=='new'){ // uplaod new logo 
					$validated = $this->validate([
							'logo' => [
								'uploaded[logo]',
								'mime_in[logo,image/jpg,image/jpeg,image/gif,image/png]',
								'max_size[logo,4096]',
							],
						]);
						
						if ($validated) { 
							$avatar_logo = $this->request->getFile('logo');
							 $logo_name = $avatar_logo->getRandomName();
							
							$avatar_logo->move(ROOTPATH.'public/uploads/',$logo_name);
						
						
						}
						else{$validation=$this->validator;
							$error_msg=$validation->listErrors();
							$logo_name=null;
						}
			}
			elseif($this->request->getVar('selectlogo')=='default'){ // recuperate logo from company data
				$inf_company=$this->CompanyModel->where('user_id',$data['user_data']['id'])->first();
				if(!empty($inf_company)) $logo_name=$inf_company['logo'];
			}
			elseif($this->request->getVar('selectlogo')=='current'){ // remain old selected logo
				$logo_name=null;
			}
			else  $logo_name=""; // without logo
				$tab=array("step"=>$current_step);
				if(!is_null($logo_name)) $tab['logo']=$logo_name;
				$tab['title_couverture']=$this->request->getVar('title_couverture');
				$tab['subtitle_couverture']=$this->request->getVar('subtitle_couverture');
				$this->BrochuresModel->update($this->session->get('current_brochure'),$tab);
			break;
		}
		$res=array("error"=>false,'POST'=>$tab,'FILES'=>$_FILES);
		echo json_encode($res);
	}
}
?>