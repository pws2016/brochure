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
		//if(null ===($this->session->get('current_brochure')) ){
			
			$current_brochure=$this->BrochuresModel->insert(array(

			



			"user_id"=>$data['user_data']['id'],
			'status'=>'draft',
			'template_id'=>1,
			'title'=>'Brochure '.date('d-m-Y'),
			
		


		
		
		));
	
			$this->session->set(array('current_brochure'=>$current_brochure));
		//}
		    $inf_brochure=$this->BrochuresModel->find($this->session->get('current_brochure'));
			$data['inf_brochure']=$inf_brochure;
			$data['startIndex']=$inf_brochure['step'];
            $data['company'] = $this->CompanyModel->where('user_id',$data['user_data']['id'])->first();
			$data['premi'] = $this->PremiModel->where('user_id',$data['user_data']['id'])->find();
            $data['par'] = $this->PartnersModel->where('user_id',$data['user_data']['id'])->find();
			$data['cont'] = $this->ContactsModel->where('user_id',$data['user_data']['id'])->find();
			$data['prod'] = $this->ProductsModel->where('user_id',$data['user_data']['id'])->find();
			
			//insert

		
		echo view('User/brochures_new.php',$data);
	}
	public function edit_broch($id){
		$data=$this->common_data();

		$verify=$this->verifyUserPack($data['user_data']['id']);
		if($verify['status']==false) return redirect()->to(base_url('user/brochures'))->with('error',$verify['msg']);
		//if(null ===($this->session->get('current_brochure')) ){
		
	
			$this->session->set(array('current_brochure'=>$id));
		//}
		    $inf_brochure=$this->BrochuresModel->find($this->session->get('current_brochure'));
			$data['inf_brochure']=$inf_brochure;
			$data['startIndex']=$inf_brochure['step'];
            $data['company'] = $this->CompanyModel->where('user_id',$data['user_data']['id'])->first();
			$data['premi'] = $this->PremiModel->where('user_id',$data['user_data']['id'])->find();
            $data['par'] = $this->PartnersModel->where('user_id',$data['user_data']['id'])->find();
			$data['cont'] = $this->ContactsModel->where('user_id',$data['user_data']['id'])->find();
			$data['prod'] = $this->ProductsModel->where('user_id',$data['user_data']['id'])->find();
			$ll=$this->BitemModel->select('id_item')->where('type_item','products')->where('id_brochure',$id)->find();
			if(!empty($ll)){
				foreach($ll as $prod){
					$data['items_product'][]=$prod['id_item'];
					
				}
			}
			$premichecked=$this->BitemModel->select('id_item')->where('type_item','premi')->where('id_brochure',$id)->find();
			if(!empty($premichecked)){
				foreach($premichecked as $prem){
					$data['items_premi'][]=$prem['id_item'];
				
				}
			}
			$contactchecked=$this->BitemModel->select('id_item')->where('type_item','contacts')->where('id_brochure',$id)->find();
			if(!empty($contactchecked)){
				foreach($contactchecked as $cont){
					$data['items_contact'][]=$cont['id_item'];
				}
			}
			$partnerchecked=$this->BitemModel->select('id_item')->where('type_item','partners')->where('id_brochure',$id)->find();
			if(!empty($partnerchecked)){
				foreach($partnerchecked as $par){
					$data['items_partner'][]=$par['id_item'];
				}
			}
			
		
		return view('User/brochures_edit.php',$data);
	}
	
    public function delete()
    {


        $id = $this->request->getVar("id");
        $this->BrochuresModel->delete($id);
    }
	
}
