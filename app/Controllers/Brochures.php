<?php

namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use CodeIgniter\Files\File;



class Brochures extends BaseController
{
	public function index(){
		$data=$this->common_data();
		
		$verify=$this->verifyUserPack($data['user_data']['id']);
		if($verify['status']==false) $data['errorPack']=$verify['msg'];
		
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

			$data['list_template']=$this->BrochureTemplatesModel->where('user_id is null')->orWhere('user_id',$data['user_data']['id'])->find();
			$data['list_pages']=$this->BrochureTemplatePagesModel->where('template_id',$inf_brochure['template_id'])->orderBy('type','ASC')->find();
			$ll=$this->BtemplateModel->where('id_brochure',$inf_brochure['id'])->find();
			if(!empty($ll)){
				foreach($ll as $k=>$v){
				$res_page_template[$v['ord']]=$v['page_id'];
			} }
			$data['res_page_template']=$res_page_template ?? array();
		echo view('User/brochures_new.php',$data);
	}
	public function edit_broch($id){
		$data=$this->common_data();

		$verify=$this->verifyUserPack($data['user_data']['id']);
		if($verify['status']==false) return redirect()->to(base_url('user/brochures'))->with('error',$verify['msg']);
		//if(null ===($this->session->get('current_brochure')) ){
		
	
			$this->session->set(array('current_brochure'=>$id));
			//var_dump($this->session->get('current_brochure'));exit;
		//}
		    $inf_brochure=$this->BrochuresModel->find($this->session->get('current_brochure'));
			if($inf_brochure['status']=='done') return redirect()->to(base_url('user/brochures'))->with('error',"brochue is done");
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
			
			$data['list_template']=$this->BrochureTemplatesModel->where('user_id is null')->orWhere('user_id',$data['user_data']['id'])->find();
			$data['list_pages']=$this->BrochureTemplatePagesModel->where('template_id',$inf_brochure['template_id'])->orderBy('type','ASC')->find();
			$ll=$this->BtemplateModel->where('id_brochure',$inf_brochure['id'])->find();
			if(!empty($ll)){
				foreach($ll as $k=>$v){
				$res_page_template[$v['ord']]=$v['page_id'];
			} }
			$data['res_page_template']=$res_page_template ?? array();
			
		return view('User/brochures_edit.php',$data);
	}

	public function preview_broch($id){
		$data=$this->common_data();
		$inf_brochure=$this->BrochuresModel->find($this->session->get('current_brochure'));	
		$inf_template=$this->BrochureTemplatesModel->find($inf_brochure['template_id']);
		$list_pages=$this->BrochureTemplatePagesModel->where('template_id',$inf_brochure['template_id'])->orderBy('type','ASC')->find();
		$ll=$this->BtemplateModel->where('id_brochure',$inf_brochure['id'])->find();
		if(!empty($ll)){
				foreach($ll as $k=>$v){
				$res_page_template[$v['ord']]=$v['page_id'];
			} 
		}
		
		####### start compiling html ##############
		$html=$inf_template['html'];
		#### page $i #####
		for($i=1;$i<8;$i++){
		
			$temp_page=$this->BrochureTemplatePagesModel->find($res_page_template[$i]);
			$page[$i]=$temp_page['html'];
			switch($temp_page['type']){
				case 'couverture':
					if($inf_brochure['logo']!="") $logo="<img src='".base_url('uploads/'.$inf_brochure['logo'])."'>";
					$page[$i]=str_replace(array("{page_title}","{page_description}","{logo}","{background}"),
					array($inf_brochure['title_couverture'],$inf_brochure['subtitle_couverture'],$logo,$background),
					$page[$i]);
				break;
				case 'operation':
					$page[$i]=str_replace(array("{page_title}","{page_description}"),
					array($inf_brochure['title_operation'],$inf_brochure['description_operation']),
					$page[$i]);
				break;
				case 'premi':
				
					preg_match_all('/{item}/', $page[$i], $output_array);
					 $x_items=count($output_array[0]);
					 $bitems=$this->BitemModel->where('id_brochure',$id)->where('type_item','premi')->find();
					foreach($bitems as $kk=>$vv){
						$ids_item[$kk+1]=$vv['id_item'];
					}
					
					for($j=1;$j<=$x_items;$j++){
						$item_html="";
						if(isset($ids_item[$j])){
							$inf_item=$this->PremiModel->find($ids_item[$j]);
							$item_html=$temp_page['item_html'];
							if(!empty($inf_item)){
								$item_img="";
								if($inf_item['image']!="") $item_img="<img src='".base_url('uploads/'.$inf_item['image'])."'>";
								$item_html=str_replace(array("{item_title}","{item_description}","{item_img}"),
							array($inf_item['name'],$inf_item['description'],$item_img),
							$item_html);
							}
							else $item_html="";
						}
						else $item_html="";
						$count=1;
					
					$pos = strpos($page[$i], "{item}");
					$page[$i]= substr_replace($page[$i],$item_html, $pos, 6);
					}
					$page[$i]=str_replace(array("{page_title}","{page_description}"),
					array($inf_brochure['title_premi'],$inf_brochure['description_premi']),
					$page[$i]);
				break;
				case 'product':
				
					preg_match_all('/{item}/', $page[$i], $output_array);
					 $x_items=count($output_array[0]);
					 $bitems=$this->BitemModel->where('id_brochure',$id)->where('type_item','products')->find();
					foreach($bitems as $kk=>$vv){
						$ids_item[$kk+1]=$vv['id_item'];
					}
					
					for($j=1;$j<=$x_items;$j++){
						$item_html="";
						if(isset($ids_item[$j])){
							$inf_item=$this->ProductsModel->find($ids_item[$j]);
							$item_html=$temp_page['item_html'];
							if(!empty($inf_item)){
								$item_img="";
								if($inf_item['image']!="") $item_img="<img src='".base_url('uploads/'.$inf_item['image'])."'>";
								$item_html=str_replace(array("{item_title}","{item_description}","{item_img}"),
							array($inf_item['name'],$inf_item['description'],$item_img),
							$item_html);
							}
							else $item_html="";
						}
						else $item_html="";
						$count=1;
					
					$pos = strpos($page[$i], "{item}");
					$page[$i]= substr_replace($page[$i],$item_html, $pos, 6);
					}
					$page[$i]=str_replace(array("{page_title}","{page_description}"),
					array($inf_brochure['title_product'],$inf_brochure['description_product']),
					$page[$i]);
				break;

				case 'partners':
				
					preg_match_all('/{item}/', $page[$i], $output_array);
					 $x_items=count($output_array[0]);
					 $bitems=$this->BitemModel->where('id_brochure',$id)->where('type_item','partners')->find();
					foreach($bitems as $kk=>$vv){
						$ids_item[$kk+1]=$vv['id_item'];
					}
					
					for($j=1;$j<=$x_items;$j++){
						$item_html="";
						if(isset($ids_item[$j])){
							$inf_item=$this->PartnersModel->find($ids_item[$j]);
							$item_html=$temp_page['item_html'];
							if(!empty($inf_item)){
								$item_img="";
								if($inf_item['image']!="") $item_img="<img src='".base_url('uploads/'.$inf_item['image'])."'>";
								$item_html=str_replace(array("{item_title}","{item_email}","{item_img}"),
							array($inf_item['name'],$inf_item['email'],$item_img),
							$item_html);
							}
							else $item_html="";
						}
						else $item_html="";
						$count=1;
					
					$pos = strpos($page[$i], "{item}");
					$page[$i]= substr_replace($page[$i],$item_html, $pos, 6);
					}
					$page[$i]=str_replace(array("{page_title}","{page_description}"),
					array($inf_brochure['title_partners'],$inf_brochure['description_partners']),
					$page[$i]);
				break;
				case 'contact':
				
					preg_match_all('/{item}/', $page[$i], $output_array);
					 $x_items=count($output_array[0]);
					 $bitems=$this->BitemModel->where('id_brochure',$id)->where('type_item','contacts')->find();
					foreach($bitems as $kk=>$vv){
						$ids_item[$kk+1]=$vv['id_item'];
					}
					
					for($j=1;$j<=$x_items;$j++){
						$item_html="";
						if(isset($ids_item[$j])){
							$inf_item=$this->ContactsModel->find($ids_item[$j]);
							$item_html=$temp_page['item_html'];
							if(!empty($inf_item)){
								$item_img="";
								if($inf_item['image']!="") $item_img="<img src='".base_url('uploads/'.$inf_item['image'])."'>";
								$item_html=str_replace(array("{item_title}","{item_email}","{item_phone}","{item_fax}","{item_adres}","{item_img}"),
							array($inf_item['name'],$inf_item['email'],$inf_item['phone'],$inf_item['fax'],$inf_item['address'],$item_img),
							$item_html);
							}
							else $item_html="";
						}
						else $item_html="";
						$count=1;
					
					$pos = strpos($page[$i], "{item}");
					$page[$i]= substr_replace($page[$i],$item_html, $pos, 6);
					}
					$page[$i]=str_replace(array("{page_title}","{page_description}"),
					array($inf_brochure['title_contacts'],$inf_brochure['description_contacts']),
					$page[$i]);
				break;
			}// end switch type page
		}// end for $i
		$html=str_replace(array("{page1}","{page2}","{page3}","{page4}","{page5}","{page6}","{page7}"),
		array($page[1] ?? "",$page[2] ?? "",$page[3] ?? "",$page[4] ?? "",$page[5] ?? "",$page[6] ?? "",$page[7] ?? ""),
		$html);
		echo $data['html']=$html ?? "";
		//return view('User/brochures_preview.php',$data);
	}

	
    public function delete()
    {


        $id = $this->request->getVar("id");
        $this->BrochuresModel->delete($id);
    }
	

}
