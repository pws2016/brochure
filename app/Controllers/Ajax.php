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
				$bg_name=null;
				if($this->request->getVar('selectbg')=='new'){ // uplaod new logo 
						$validated = $this->validate([
								'background' => [
									'uploaded[background]',
									'mime_in[background,image/jpg,image/jpeg,image/gif,image/png]',
									'max_size[background,4096]',
								],
							]);
							
							if ($validated) { 
								$avatar_bg = $this->request->getFile('background');
								 $bg_name = $avatar_bg->getRandomName();
								
								$avatar_bg->move(ROOTPATH.'public/uploads/',$bg_name);
							
							
							}
							else{$validation=$this->validator;
								$error_msg=$validation->listErrors();
								$bg_name=null;
							}
				}
				elseif($this->request->getVar('selectbg')=='default'){ // recuperate logo from company data
					$inf_company=$this->CompanyModel->where('user_id',$data['user_data']['id'])->first();
					if(!empty($inf_company)) $bg_name=$inf_company['background'];
				}
				elseif($this->request->getVar('selectbg')=='current'){ // remain old selected logo
					$bg_name=null;
				}
				else  $bg_name=""; // without logo
					
					if(!is_null($bg_name)) $tab['background']=$bg_name;
				$this->BrochuresModel->update($this->session->get('current_brochure'),$tab);

			break;
			
			case 2:
	
			$tab['title_operation']=$this->request->getVar('title_operation');
			$tab['description_operation']=$this->request->getVar('description_operation');
			$tab["step"]=$current_step;
			$x=$this->BrochuresModel->update($this->session->get('current_brochure'),$tab);
				
		    break;

			case 3:

				$tab['title_premi']=$this->request->getVar('title_premi');
				$tab['description_premi']=$this->request->getVar('description_premi');
				
				$tab["step"]=$current_step;
				$this->BrochuresModel->update($this->session->get('current_brochure'),$tab);
				$this->BitemModel->where('id_brochure',$this->session->get('current_brochure'))->where('type_item',"premi")->delete();
				if(!empty($this->request->getVar('select_premi') )){
				foreach($this->request->getVar('select_premi') as $select){
					$this->BitemModel->insert(array('id_brochure'=>$this->session->get('current_brochure'),'id_item'=>$select,'type_item'=>"premi"));
				}
			}

		break;

		case 4:
			$tab['title_partners']=$this->request->getVar('title_partners');
			$tab['description_partners']=$this->request->getVar('description_partners');
			
			$tab["step"]=$current_step;
			$this->BrochuresModel->update($this->session->get('current_brochure'),$tab);
			$this->BitemModel->where('id_brochure',$this->session->get('current_brochure'))->where('type_item',"partners")->delete();
			if(!empty($this->request->getVar('select_partner') )){
			foreach($this->request->getVar('select_partner') as $select){
				$this->BitemModel->insert(array('id_brochure'=>$this->session->get('current_brochure'),'id_item'=>$select,'type_item'=>"partners"));
			}    }
		break;

		case 5:
			$tab['title_contacts']=$this->request->getVar('title_contacts');
			$tab['description_contacts']=$this->request->getVar('description_contacts');
			
			$tab["step"]=$current_step;
			$this->BrochuresModel->update($this->session->get('current_brochure'),$tab);
			$this->BitemModel->where('id_brochure',$this->session->get('current_brochure'))->where('type_item',"contacts")->delete();
			if(!empty($this->request->getVar('select_contact') )){
			foreach($this->request->getVar('select_contact') as $select){
			$this->BitemModel->insert(array('id_brochure'=>$this->session->get('current_brochure'),'id_item'=>$select,'type_item'=>"contacts"));
			}}
		break;

case 6:
	$tab['title_product']=$this->request->getVar('title_product');
			$tab['description_product']=$this->request->getVar('description_product');
			
			$tab["step"]=$current_step;
			$this->BrochuresModel->update($this->session->get('current_brochure'),$tab);
			if(!empty($this->request->getVar('select_product') )){
			foreach($this->request->getVar('select_product') as $select){
				$this->BitemModel->insert(array('id_brochure'=>$this->session->get('current_brochure'),'id_item'=>$select,'type_item'=>"products"));
			}}
break;

case 7:
	        $tab['title_intro']=$this->request->getVar('title_intro');
			$tab['description_intro']=$this->request->getVar('description_intro');
			$tab["step"]=$current_step;
			$this->BrochuresModel->update($this->session->get('current_brochure'),$tab);
break;
case 8:
	
	


break;
			
		}
		$res=array("error"=>false,'error_msg'=>$x,'POST'=>$tab,'FILES'=>$_FILES);
		echo json_encode($res);
	}
	
	
	public function get_template_pages(){
		$template_id=$this->request->getVar('template_id');
		$list_pages=$this->BrochureTemplatePagesModel->where('template_id',$template_id)->orderBy('type','ASC')->find();
		for($i=1;$i<=7;$i++){?>
		<div class="mb-3 col-12">
			<label for="verticalnav-firstname-input"> Template Page <?php echo $i?></label>
			<select class="form-control" id="id_page" name="id_page[]">
				<option value=""><?php echo lang('app.field_select')?></option>
				<?php foreach($list_pages as $k=>$v){?>
					<option value="<?php echo $v['id']?>"><?php echo $v['title']?></option>
				<?php }?>
			</select>
		</div>
		<?php }
	}
	
	public function save_template(){
		$data=$this->common_data();
		$step=$this->request->getVar('step');
		$tab['step']=$step;
		$tab['template_id']=$this->request->getVar('template_id');
		$this->BrochuresModel->update($this->session->get('current_brochure'),$tab);
		
		$exist=$this->BtemplateModel->where('id_brochure',$this->session->get('current_brochure'))->delete();
		foreach($this->request->getVar('id_page') as $k=>$v){
			$this->BtemplateModel->insert(array(
			'id_brochure'=>$this->session->get('current_brochure'),
			'page_id'=>$v,
			'ord'=>($k+1)
			));
		}
	}
}
