<?php

namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use CodeIgniter\Files\File;



class Brochures extends BaseController
{
	public function index()
	{
		$data = $this->common_data();

		$verify = $this->verifyUserPack($data['user_data']['id']);
		if ($verify['status'] == false) $data['errorPack'] = $verify['msg'];

		$ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->find();
		if (!empty($ll)) {
			foreach ($ll as $k => $v) {
				$inf_cat = $this->CategoryModel->find($v['id_category']);
				$v['catname'] = $inf_cat['title'] ?? "";
				$res[] = $v;
			}
		}
		$data['list'] = $res ?? array();




		echo view('user/brochures.php', $data);
	}


	public function duplication()
	{
		$data = $this->common_data();

		$id = $this->request->getVar('id');
		$dup = $this->BrochuresModel->find($id);

		$newid = $this->BrochuresModel->insert(array(
			"user_id" => $data['user_data']['id'],
			"title" => $dup['title'] . " copy",
			"template_id" => $dup['template_id'],
			"background" => $dup['background'],
			"status" => $dup['status'],
			"step" => $dup['step'],
			"title_operation" => $dup['title_operation'],
			"description_operation" => $dup['description_operation'],
			"title_premi" => $dup['title_premi'],
			"description_premi" => $dup['description_premi'],
			"title_product" => $dup['title_product'],
			"description_product" => $dup['description_product'],
			"title_partners" => $dup['title_partners'],
			"description_partners" => $dup['description_partners'],
			"title_contacts" => $dup['title_contacts'],
			"description_contacts" => $dup['description_contacts'],
			"title_couverturego" => $dup['title_couverture'],
			"subtitle_couverture" => $dup['subtitle_couverture'],
			"title_intro" => $dup['title_intro'],
			"description_intro" => $dup['description_intro'],
			"id_category" => $dup['id_category'],
		));

		$ll = $this->BitemModel->where('id_brochure', $id)->find();
		if (!empty($ll)) {
			foreach ($ll as $k => $v) {

				$this->BitemModel->insert(array("id_brochure" => $newid, 'id_item' => $v['id_item'], 'type_item' =>  $v['type_item']));
			}
		}

		$ll = $this->BtemplateModel->where('id_brochure', $id)->find();
		if (!empty($ll)) {
			foreach ($ll as $k => $v) {

				$this->BtemplateModel->insert(array("id_brochure" => $newid, 'page_id' => $v['page_id'], 'ord' =>  $v['ord']));
			}
		}
		return redirect()->back();
		//  echo view('user/brochures.php',$data);


	}
	public function new_broch()
	{
		$data = $this->common_data();
		$data['list_category'] = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();

		$verify = $this->verifyUserPack($data['user_data']['id']);
		if ($verify['status'] == false) return redirect()->to(base_url('user/brochures'))->with('error', $verify['msg']);
		//if(null ===($this->session->get('current_brochure')) ){

		$current_brochure = $this->BrochuresModel->insert(array(





			"user_id" => $data['user_data']['id'],
			'status' => 'draft',
			'template_id' => 1,
			'title' => 'Brochure ' . date('d-m-Y'),






		));

		$this->session->set(array('current_brochure' => $current_brochure));
		//}
		$inf_brochure = $this->BrochuresModel->find($this->session->get('current_brochure'));
		$data['inf_brochure'] = $inf_brochure;
		$data['startIndex'] = $inf_brochure['step'];
		$data['company'] = $this->CompanyModel->where('user_id', $data['user_data']['id'])->first();
		$data['premi'] = $this->PremiModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(1,ids_category)>0')->where('enable', '1')->orderBy('ord', 'DESC')->find();
		$data['par'] = $this->PartnersModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(1,ids_category)>0')->where('enable', '1')->orderBy('ord', 'ASC')->find();
		$data['cont'] = $this->ContactsModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(1,ids_category)>0')->where('enable', '1')->orderBy('ord', 'DESC')->find();
		$data['prod'] = $this->ProductsModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(1,ids_category)>0')->where('enable', '1')->find();
		$data['ope'] = $this->OperationsModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(1,ids_category)>0')->where('enable', '1')->orderBy('ord', 'DESC')->find();

		//insert

		$data['list_template'] = $this->BrochureTemplatesModel->where('user_id is null')->orWhere('user_id', $data['user_data']['id'])->find();
		$data['list_pages'] = $this->BrochureTemplatePagesModel->where('template_id', $inf_brochure['template_id'])->orderBy('type', 'ASC')->find();
		$ll = $this->BtemplateModel->where('id_brochure', $inf_brochure['id'])->find();
		if (!empty($ll)) {
			foreach ($ll as $k => $v) {
				$res_page_template[$v['ord']] = $v['page_id'];
			}
		}
		$data['res_page_template'] = $res_page_template ?? array();
		echo view('user/brochures_new.php', $data);
	}
	public function edit_broch($id)
	{
		$data = $this->common_data();

		$data['list_category'] = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();



	/*	$verify = $this->verifyUserPack($data['user_data']['id']);
		if ($verify['status'] == false) return redirect()->to(base_url('user/brochures'))->with('error', $verify['msg']);*/
		//if(null ===($this->session->get('current_brochure')) ){


		$this->session->set(array('current_brochure' => $id));
		// var_dump($this->session->get('current_brochure'));exit;
		//}
		$inf_brochure = $this->BrochuresModel->find($this->session->get('current_brochure'));
		// var_dump($inf_brochure);
		if ($inf_brochure['status'] == 'done') return redirect()->to(base_url('user/brochures'))->with('error', "brochue is done");
		$data['inf_brochure'] = $inf_brochure;
		$data['startIndex'] = $inf_brochure['step'];
		$data['company'] = $this->CompanyModel->where('user_id', $data['user_data']['id'])->first();
		$data['premi'] = $this->PremiModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(1,ids_category)>0')->where('enable', '1')->find();
		$data['par'] = $this->PartnersModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(1,ids_category)>0')->where('enable', '1')->orderBy('ord', 'ASC')->find();
		$data['cont'] = $this->ContactsModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(1,ids_category)>0')->where('enable', '1')->find();
		$data['prod'] = $this->ProductsModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(1,ids_category)>0')->where('enable', '1')->find();
		$data['ope'] = $this->OperationsModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(1,ids_category)>0')->where('enable', '1')->find();
		
		// $data['cat'] = $this->CategoryModel->where('user_id',$data['user_data']['id'])->find();

		// $data['list_category'] = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();


		$ll = $this->BitemModel->select('id_item')->where('type_item', 'products')->where('id_brochure', $id)->find();
		if (!empty($ll)) {
			foreach ($ll as $prod) {
				$data['items_product'][] = $prod['id_item'];
			}
		}
		$premichecked = $this->BitemModel->select('id_item')->where('type_item', 'premi')->where('id_brochure', $id)->find();
		if (!empty($premichecked)) {
			foreach ($premichecked as $prem) {
				$data['items_premi'][] = $prem['id_item'];
			}
		}
		$contactchecked = $this->BitemModel->select('id_item')->where('type_item', 'contacts')->where('id_brochure', $id)->find();
		if (!empty($contactchecked)) {
			foreach ($contactchecked as $cont) {
				$data['items_contact'][] = $cont['id_item'];
			}
		}
		$partnerchecked = $this->BitemModel->select('id_item')->where('type_item', 'partners')->where('id_brochure', $id)->find();
		if (!empty($partnerchecked)) {
			foreach ($partnerchecked as $par) {
				$data['items_partner'][] = $par['id_item'];
			}
		}
		$operationschecked = $this->BitemModel->select('id_item')->where('type_item', 'operations')->where('id_brochure', $id)->find();
		if (!empty($operationschecked)) {
			foreach ($operationschecked as $ope) {
				$data['items_operations'][] = $ope['id_item'];
			}
		}



		$data['list_template'] = $this->BrochureTemplatesModel->where('user_id is null')->orWhere('user_id', $data['user_data']['id'])->find();
		$data['list_pages'] = $this->BrochureTemplatePagesModel->where('template_id', $inf_brochure['template_id'])->orderBy('type', 'ASC')->find();
		$ll = $this->BtemplateModel->where('id_brochure', $inf_brochure['id'])->find();
		if (!empty($ll)) {
			foreach ($ll as $k => $v) {
				$res_page_template[$v['ord']] = $v['page_id'];
			}
		}
		$data['res_page_template'] = $res_page_template ?? array();

		return view('user/brochures_edit.php', $data);
	}

	public function preview_broch($id)
	{
		$data = $this->common_data();
		$inf_brochure = $this->BrochuresModel->find($this->session->get('current_brochure'));
		$inf_template = $this->BrochureTemplatesModel->find($inf_brochure['template_id']);
		$list_pages = $this->BrochureTemplatePagesModel->where('template_id', $inf_brochure['template_id'])->orderBy('type', 'ASC')->find();
		$ll = $this->BtemplateModel->where('id_brochure', $inf_brochure['id'])->find();
		if (!empty($ll)) {
			foreach ($ll as $k => $v) {
				$res_page_template[$v['ord']] = $v['page_id'];
			}
		}

		####### start compiling html ##############
		$html = $inf_template['html'];
		#### page $i #####
		for ($i = 1; $i < 8; $i++) {

			$temp_page = $this->BrochureTemplatePagesModel->find($res_page_template[$i]);
			$page[$i] = $temp_page['html'];
			switch ($temp_page['type']) {
				case 'couverture':
					if ($inf_brochure['logo'] != "") $logo = "<img src='" . base_url('uploads/' . $inf_brochure['logo']) . "'>";
					if ($inf_brochure['background'] != "") $background=base_url('uploads/' .$inf_brochure['background']);
					else $background="";
					$page[$i] = str_replace(
						array("{page_title}", "{page_description}", "{logo}", "{background}"),
						array($inf_brochure['title_couverture'], $inf_brochure['subtitle_couverture'], $logo, $background),
						$page[$i]
					);

					break;

				case 'introduction':
					if ($inf_brochure['logo'] != "") $logo = "<img src='" . base_url('uploads/' . $inf_brochure['logo']) . "'>";
					if ($inf_brochure['background'] != "") $background=base_url('uploads/' .$inf_brochure['background']);
					if ($inf_brochure['image_intro'] != "") $page_img=base_url('uploads/' .$inf_brochure['image_intro']);
					$page[$i] = str_replace(
						array("{page_title}", "{page_description}", "{logo}", "{background}","{page_img}"),
						array($inf_brochure['title_intro'], $inf_brochure['description_intro'], $logo, $background,$page_img),
						$page[$i]
					);

					break;


				case 'operation':
					if ($inf_brochure['image_operation'] != "") $page_img=base_url('uploads/' .$inf_brochure['image_operation']);
					preg_match_all('/{item}/', $page[$i], $output_array);
					$x_items = count($output_array[0]);
					$bitems = $this->BitemModel->where('id_brochure', $id)->where('type_item', 'operations')->find();

					foreach ($bitems as $kk => $vv) {
						$ids_item[$kk + 1] = $vv['id_item'];
					}

					for ($j = 1; $j <= $x_items; $j++) {
						$item_html = "";
						if (isset($ids_item[$j])) {
							$inf_item = $this->OperationsModel->find($ids_item[$j]);
							$item_html = $temp_page['item_html'];
							if (!empty($inf_item)) {
								$sub_items = "";
								$list_subItem = $this->SubOperationsModel->where('id_op',$ids_item[$j])->where('enable',1)->find();
								if (!empty($list_subItem)) {
									foreach($list_subItem as $l => $item)	{
										$sub_items.="<li>".$item['description']."</li>";	
									}
								}

								$item_html = str_replace(
									array("{item_title}", "{item_description}", "{sub_items}"),
									array($inf_item['name'], $inf_item['description'], $sub_items),
									$item_html
								);
							} else $item_html = "";
						} else $item_html = "";
						$count = 1;

						$pos = strpos($page[$i], "{item}");
						$page[$i] = substr_replace($page[$i], $item_html, $pos, 6);
					}
					$page[$i] = str_replace(
					    array("{page_title}", "{page_description}","{page_img}"),
						array($inf_brochure['title_operation'], $inf_brochure['description_operation'],$page_img),
						$page[$i]
					);

					// $page[$i] = str_replace(
					// 	array("{page_title}", "{page_description}"),
					// 	array($inf_brochure['title_operation'], $inf_brochure['description_operation']),
					// 	$page[$i]
					// );
					break;
				case 'premi':

					preg_match_all('/{item}/', $page[$i], $output_array);
					$x_items = count($output_array[0]);
					$bitems = $this->BitemModel->where('id_brochure', $id)->where('type_item', 'premi')->find();
					foreach ($bitems as $kk => $vv) {
						$ids_item[$kk + 1] = $vv['id_item'];
					}

					for ($j = 1; $j <= $x_items; $j++) {
						$item_html = "";
						if (isset($ids_item[$j])) {
							$inf_item = $this->PremiModel->find($ids_item[$j]);
							$item_html = $temp_page['item_html'];
							if (!empty($inf_item)) {
								$item_img = "";
								if ($inf_item['image'] != "") $item_img =base_url('uploads/' . $inf_item['image']);// "<img src='" . base_url('uploads/' . $inf_item['image']) . "'>";
								$item_html = str_replace(
									array("{item_title}", "{item_description}", "{item_img}"),
									array($inf_item['name'], $inf_item['description'], $item_img),
									$item_html
								);
							} else $item_html = "";
						} else $item_html = "";
						$count = 1;

						$pos = strpos($page[$i], "{item}");
						$page[$i] = substr_replace($page[$i], $item_html, $pos, 6);
					}
					$page[$i] = str_replace(
						array("{page_title}", "{page_description}"),
						array($inf_brochure['title_premi'], $inf_brochure['description_premi']),
						$page[$i]
					);
					break;
				case 'product':

					preg_match_all('/{item}/', $page[$i], $output_array);
					$x_items = count($output_array[0]);
					$bitems = $this->BitemModel->where('id_brochure', $id)->where('type_item', 'products')->find();
					foreach ($bitems as $kk => $vv) {
						$ids_item[$kk + 1] = $vv['id_item'];
					}

					for ($j = 1; $j <= $x_items; $j++) {
						$item_html = "";
						if (isset($ids_item[$j])) {
							$inf_item = $this->ProductsModel->find($ids_item[$j]);
							$item_html = $temp_page['item_html'];
							if (!empty($inf_item)) {
								$item_img = "";
								if ($inf_item['image'] != "") $item_img =  base_url('uploads/' . $inf_item['image']);//"<img src='" . base_url('uploads/' . $inf_item['image']) . "'>";
								$item_html = str_replace(
									array("{item_title}", "{item_description}", "{item_img}"),
									array($inf_item['name'], $inf_item['description'], $item_img),
									$item_html
								);
							} else $item_html = "";
						} else $item_html = "";
						$count = 1;

						$pos = strpos($page[$i], "{item}");
						$page[$i] = substr_replace($page[$i], $item_html, $pos, 6);
					}
					$page[$i] = str_replace(
						array("{page_title}", "{page_description}"),
						array($inf_brochure['title_product'], $inf_brochure['description_product']),
						$page[$i]
					);
					break;

				case 'partners':

					preg_match_all('/{item}/', $page[$i], $output_array);
					$x_items = count($output_array[0]);
					$bitems = $this->BitemModel->where('id_brochure', $id)->where('type_item', 'partners')->find();
					foreach ($bitems as $kk => $vv) {
						$ids_item[$kk + 1] = $vv['id_item'];
					}

					for ($j = 1; $j <= $x_items; $j++) {
						$item_html = "";
						if (isset($ids_item[$j])) {
							$inf_item = $this->PartnersModel->find($ids_item[$j]);
							$item_html = $temp_page['item_html'];
							if (!empty($inf_item)) {
								$item_img = "";
								if ($inf_item['image'] != "") $item_img =base_url('uploads/' . $inf_item['image']);// "<img src='" . base_url('uploads/' . $inf_item['image']) . "'>";
								$item_html = str_replace(
									array("{item_title}","{item_name}", "{item_lastname}","{item_email}", "{item_img}","{item_description}", "{item_sede}", "{item_phone}", "{item_linkedin}", "{item_tipologia}","{item_fax}","{item_mobile}",),
									array($inf_item['title'],$inf_item['name'],$inf_item['lastname'], $inf_item['email'], $item_img,$inf_item['description'], $inf_item['sede'],$inf_item['phone'], $inf_item['linkedin'],$inf_item['tipologia'],$inf_item['fax'],$inf_item['mobile'],),
									$item_html
								);
							} else $item_html = "";
						} else $item_html = "";
						$count = 1;

						$pos = strpos($page[$i], "{item}");
						$page[$i] = substr_replace($page[$i], $item_html, $pos, 6);
					}
					$page[$i] = str_replace(
						array("{page_title}", "{page_description}"),
						array($inf_brochure['title_partners'], $inf_brochure['description_partners']),
						$page[$i]
					);
					break;
				case 'contact':

					preg_match_all('/{item}/', $page[$i], $output_array);
					$x_items = count($output_array[0]);
					$bitems = $this->BitemModel->where('id_brochure', $id)->where('type_item', 'contacts')->find();
					foreach ($bitems as $kk => $vv) {
						$ids_item[$kk + 1] = $vv['id_item'];
					}

					for ($j = 1; $j <= $x_items; $j++) {
						$item_html = "";
						if (isset($ids_item[$j])) {
							$inf_item = $this->ContactsModel->find($ids_item[$j]);
							$item_html = $temp_page['item_html'];
							if (!empty($inf_item)) {
								$item_img = "";
								if ($inf_item['image'] != "") $item_img =base_url('uploads/contact_pic/' . $inf_item['image']);// "<img src='" . base_url('uploads/' . $inf_item['image']) . "'>";
								$item_html = str_replace(
									array("{item_title}", "{item_email}", "{item_phone}", "{item_fax}", "{item_adres}", "{item_img}"),
									array($inf_item['name'], $inf_item['email'], $inf_item['phone'], $inf_item['fax'], $inf_item['address'], $item_img),
									$item_html
								);
							} else $item_html = "";
						} else $item_html = "";
						$count = 1;

						$pos = strpos($page[$i], "{item}");
						$page[$i] = substr_replace($page[$i], $item_html, $pos, 6);
					}
					$page[$i] = str_replace(
						array("{page_title}", "{page_description}","{company_website}","{company_phone}","{company_email}","{company_twitter}","{company_facebook}","{company_linkedin}","{company_instagram}","{company_youtube}"),
						array($inf_brochure['title_contacts'], $inf_brochure['description_contacts'], $inf_brochure['website'], $inf_brochure['phone'], $inf_brochure['email'], $inf_brochure['twitter'], $inf_brochure['facebook'], $inf_brochure['linkedin'], $inf_brochure['instagram'],$inf_brochure['youtube']),
						$page[$i]
					);
					break;
			} // end switch type page
		} // end for $i
		$html = str_replace(
			array("{page1}", "{page2}", "{page3}", "{page4}", "{page5}", "{page6}", "{page7}"),
			array($page[1] ?? "", $page[2] ?? "", $page[3] ?? "", $page[4] ?? "", $page[5] ?? "", $page[6] ?? "", $page[7] ?? ""),
			$html
		);
		//return view('user/brochures_preview.php',$data);
		echo $data['html'] = $html ?? "";
	}


	public function delete()
	{


		$id = $this->request->getVar("id");
		$this->BrochuresModel->delete($id);
	}
}
