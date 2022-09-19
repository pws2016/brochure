<?php namespace App\Controllers;




class UserPanel extends BaseController
{

    public function Dash()
	{
		$data = $this->common_data();
		echo view('user/dashboarduser',$data);
	
	}
	
	public function profile()
	{
		
		
		$common_data=$this->common_data();
		$data=$common_data;
		if($common_data['is_logged']==false) return redirect()->to( base_url('login'));
		if($common_data['user_data']['role']=='A') return redirect()->to( base_url('/myAccount') );
		
		if(!is_null($this->request->getVar('submit'))){
			$signup_email=$this->request->getVar('signup_email');
			$signup_password=$this->request->getVar('signup_password');
			$signup_password_confirmation=$this->request->getVar('signup_password_confirmation');
		/*	$val = $this->validate([
			'signup_email' => ['label' => 'Email', 'rules' => 'trim|required|valid_email|is_unique[users.email,id,'.$common_data['user_data']['id'].']'],			
		
		]);*/
		$val=true;
		if($signup_password!=""){
			$val = $this->validate([
			
			'signup_password_confirmation' => ['label' => lang('app.field_confirm_password'), 'rules' => 'trim|required|matches[signup_password]']
			]);
		}
			if (!$val)
			{
					//var_dump($this->validator);
					$validation=$this->validator;
					$error_msg=$validation->listErrors();
					$data['error']=$error_msg;
			}
			else{
					//$dt['email']=$signup_email;
					if($signup_password!=""){$dt['password']=md5($signup_password);
					$this->UserModel->edit($common_data['user_data']['id'],$dt);}
					$dtp=array("user_id"=>$common_data['user_data']['id'],
					"ragione_sociale"=>$this->request->getVar('ragione_sociale'),
					"fattura_piva"=>$this->request->getVar('fattura_piva'),
					"nome"=>$this->request->getVar('nome'),
					"cognome"=>$this->request->getVar('cognome'),
					"mobile"=>$this->request->getVar('mobile'),
					"fattura_nome"=>$this->request->getVar('fattura_nome'),
					"fattura_cognome"=>$this->request->getVar('fattura_cognome'),
					"fattura_cf"=>$this->request->getVar('fattura_cf'),
					"fattura_indirizzo"=>$this->request->getVar('fattura_indirizzo'),
					"fattura_cap"=>$this->request->getVar('fattura_cap'),
					"fattura_pec"=>$this->request->getVar('fattura_pec'),
					"fattura_sdi"=>$this->request->getVar('fattura_sdi'),
					"fattura_phone"=>$this->request->getVar('fattura_phone'),
					"fattura_stato"=>$this->request->getVar('fattura_stato'),
					"fattura_provincia"=>$this->request->getVar('fattura_provincia'),
					"fattura_comune"=>$this->request->getVar('fattura_comune'));
					$inf_profile=$this->UserProfileModel->where('user_id',$common_data['user_data']['id'])->first();
					if(!empty($inf_profile)) $dtp['id']=$inf_profile['id'];
					$xx=$this->UserProfileModel->save($dtp);
					
					$data['success']=lang('app.success_update');
			
			}
		}
		$inf_user=$this->UserModel->find($common_data['user_data']['id']);
		/*$inf_profile=$this->UserProfileModel->where('user_id',$common_data['user_data']['id'])->first();
		$data['list_nazioni']=$this->NazioniModel->where('status','enable')->findAll();
		 $data['list_comuni']=array();
		 $data['list_provincia']=array();
		if($inf_profile['fattura_stato']==106){
			$data['list_provincia']=$this->ProvinceModel->orderby("provincia",'asc')->findAll();
			if($inf_profile['fattura_provincia']!="") $data['list_comuni']=$this->ComuniModel->where('id_prov',$inf_profile['fattura_provincia'])->findAll();
		}
		$data['inf_profile']=$inf_profile;
		*/
		$data['inf_user']=$inf_user;
		
		return view('user/profile',$data);
	}
}


