<?php

namespace App\Controllers;


class Ajax extends BaseController
{
	public function index($f)
	{
		return $this->$f();
	}
	public function save_step()
	{
		$data = $this->common_data();

		$step = $this->request->getVar('step');
		$current_step = $step + 1;
		switch ($step) {
			case 0:
				$tab = array("title" => $this->request->getVar('title'), "step" => $current_step);
				$tab['id_category'] = $this->request->getVar('id_category');
				$tab['template_id'] = $this->request->getVar('template_id');


				$x = $this->BrochuresModel->update($this->session->get('current_brochure'), $tab);
				//var_dump($this->session->get('current_brochure'));
				$exist = $this->BtemplateModel->where('id_brochure', $this->session->get('current_brochure'))->delete();
				foreach ($this->request->getVar('id_page') as $k => $v) {
					$this->BtemplateModel->insert(array(
						'id_brochure' => $this->session->get('current_brochure'),
						'page_id' => $v,
						'ord' => ($k + 1)
					));
				}

				$this->BrochuresModel->update($this->session->get('current_brochure'), $tab);


			break;

			case 1:

				$logo_name = null;
				$tab["step"] = $current_step;
				if ($this->request->getVar('selectlogo') == 'new') { // uplaod new logo 
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

						$avatar_logo->move(ROOTPATH . 'public/uploads/', $logo_name);
					} else {
						$validation = $this->validator;
						$error_msg = $validation->listErrors();
						$logo_name = null;
					}
				} elseif ($this->request->getVar('selectlogo') == 'default') { // recuperate logo from company data
					$inf_company = $this->CompanyModel->where('user_id', $data['user_data']['id'])->first();
					if (!empty($inf_company)) $logo_name = $inf_company['logo'];
				} elseif ($this->request->getVar('selectlogo') == 'current') { // remain old selected logo
					$logo_name = null;
				} else  $logo_name = ""; // without logo
				//	$tab=array("step"=>$current_step);
				if (!is_null($logo_name)) $tab['logo'] = $logo_name;
				$tab['title_couverture'] = $this->request->getVar('title_couverture');
				$tab['subtitle_couverture'] = $this->request->getVar('subtitle_couverture');
				$bg_name = null;
				if ($this->request->getVar('selectbg') == 'new') { // uplaod new logo 
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

						$avatar_bg->move(ROOTPATH . 'public/uploads/', $bg_name);
					} else {
						$validation = $this->validator;
						$error_msg = $validation->listErrors();
						$bg_name = null;
					}
				} elseif ($this->request->getVar('selectbg') == 'default') { // recuperate logo from company data
					$inf_company = $this->CompanyModel->where('user_id', $data['user_data']['id'])->first();
					if (!empty($inf_company)) $bg_name = $inf_company['background'];
				} elseif ($this->request->getVar('selectbg') == 'current') { // remain old selected logo
					$bg_name = null;
				} else  $bg_name = ""; // without logo

				if (!is_null($bg_name)) $tab['background'] = $bg_name;
				$x =	$this->BrochuresModel->update($this->session->get('current_brochure'), $tab);

			break;

			case 2: // intro
				$tab['title_intro'] = $this->request->getVar('title_intro');
				$tab['description_intro'] = $this->request->getVar('description_intro');
				$tab["step"] = $current_step;
				if ($this->request->getVar('select_img_intro') == 'new') { // uplaod new logo 
					$validated = $this->validate([
						'image_intro' => [
							'uploaded[image_intro]',
							'mime_in[image_intro,image/jpg,image/jpeg,image/gif,image/png]',
							'max_size[image_intro,4096]',
						],
					]);

					if ($validated) {
						$avatar_logo = $this->request->getFile('image_intro');
						$logo_name = $avatar_logo->getRandomName();

						$avatar_logo->move(ROOTPATH . 'public/uploads/', $logo_name);
					} else {
						$validation = $this->validator;
						$error_msg = $validation->listErrors();
						$logo_name = null;
					}
				} elseif ($this->request->getVar('select_img_intro') == 'default') { // recuperate logo from company data
					$inf_company = $this->CompanyModel->where('user_id', $data['user_data']['id'])->first();
					if (!empty($inf_company)) $logo_name = $inf_company['image_intro'];
				} elseif ($this->request->getVar('select_img_intro') == 'current') { // remain old selected logo
					$logo_name = null;
				} else  $logo_name = ""; // without logo
				//	$tab=array("step"=>$current_step);
				if (!is_null($logo_name)) $tab['image_intro'] = $logo_name;
				$this->BrochuresModel->update($this->session->get('current_brochure'), $tab);
				break;

				//prod
			case 3:

				$tab['title_product'] = $this->request->getVar('title_product');
				$tab['description_product'] = $this->request->getVar('description_product');

				$tab["step"] = $current_step;
				$this->BrochuresModel->update($this->session->get('current_brochure'), $tab);
				$x=$this->BitemModel->where('id_brochure', $this->session->get('current_brochure'))->where('type_item', "products")->delete();
				if (!empty($this->request->getVar('select_product'))) {
					foreach ($this->request->getVar('select_product') as $select) {
						$this->BitemModel->insert(array('id_brochure' => $this->session->get('current_brochure'), 'id_item' => $select, 'type_item' => "products"));
					}
				}

				break;
				//Operazioni
			case 4:

				$tab['title_operation'] = $this->request->getVar('title_operation');
				$tab['description_operation'] = $this->request->getVar('description_operation');
				$tab["step"] = $current_step;
				if ($this->request->getVar('select_img_operation') == 'new') { // uplaod new logo 
					$validated = $this->validate([
						'image_operation' => [
							'uploaded[image_operation]',
							'mime_in[image_operation,image/jpg,image/jpeg,image/gif,image/png]',
							'max_size[image_operation,4096]',
						],
					]);

					if ($validated) {
						$avatar_logo = $this->request->getFile('image_operation');
						$logo_name = $avatar_logo->getRandomName();

						$avatar_logo->move(ROOTPATH . 'public/uploads/', $logo_name);
					} else {
						$validation = $this->validator;
						$error_msg = $validation->listErrors();
						$logo_name = null;
					}
				} elseif ($this->request->getVar('select_img_operation') == 'default') { // recuperate logo from company data
					$inf_company = $this->CompanyModel->where('user_id', $data['user_data']['id'])->first();
					if (!empty($inf_company)) $logo_name = $inf_company['image_operation'];
				} elseif ($this->request->getVar('select_img_operation') == 'current') { // remain old selected logo
					$logo_name = null;
				} else  $logo_name = ""; // without logo
				//	$tab=array("step"=>$current_step);
				if (!is_null($logo_name)) $tab['image_operation'] = $logo_name;
				$x = $this->BrochuresModel->update($this->session->get('current_brochure'), $tab);

			$x=$this->BitemModel->where('id_brochure', $this->session->get('current_brochure'))->where('type_item', "operations")->delete();
				if (!empty($this->request->getVar('select_operations'))) {
					foreach ($this->request->getVar('select_operations') as $select) {
						$this->BitemModel->insert(array('id_brochure' => $this->session->get('current_brochure'), 'id_item' => $select, 'type_item' => "operations"));
					}
				}
				break;
				//Premi
			case 5:

				$tab['title_premi'] = $this->request->getVar('title_premi');
				$tab['description_premi'] = $this->request->getVar('description_premi');

				$tab["step"] = $current_step;
				$this->BrochuresModel->update($this->session->get('current_brochure'), $tab);
				$this->BitemModel->where('id_brochure', $this->session->get('current_brochure'))->where('type_item', "premi")->delete();
				if (!empty($this->request->getVar('select_premi'))) {
					foreach ($this->request->getVar('select_premi') as $select) {
						$this->BitemModel->insert(array('id_brochure' => $this->session->get('current_brochure'), 'id_item' => $select, 'type_item' => "premi"));
					}
				}

				break;
				//7Partner
			case 6:
				$tab['title_partners'] = $this->request->getVar('title_partners');
				$tab['description_partners'] = $this->request->getVar('description_partners');

				$tab["step"] = $current_step;
				$x = $this->BrochuresModel->update($this->session->get('current_brochure'), $tab);
				$this->BitemModel->where('id_brochure', $this->session->get('current_brochure'))->where('type_item', "partners")->delete();
				if (!empty($this->request->getVar('select_partner'))) {
					foreach ($this->request->getVar('select_partner') as $select) {
						$this->BitemModel->insert(array('id_brochure' => $this->session->get('current_brochure'), 'id_item' => $select, 'type_item' => "partners"));
					}
				}
				break;
				//Contatti
			case 7:
				$tab['title_contacts'] = $this->request->getVar('title_contacts');
				$tab['description_contacts'] = $this->request->getVar('description_contacts');
				$tab['phone'] = $this->request->getVar('phone');
				$tab['email'] = $this->request->getVar('email');
				$tab['facebook'] = $this->request->getVar('facebook');
				$tab['twitter'] = $this->request->getVar('twitter');
				$tab['linkedin'] = $this->request->getVar('linkedin');
				$tab['instagram'] = $this->request->getVar('instagram');
				$tab['siteweb'] = $this->request->getVar('siteweb');
				$tab["step"] = $current_step;
				$this->BrochuresModel->update($this->session->get('current_brochure'), $tab);
				$this->BitemModel->where('id_brochure', $this->session->get('current_brochure'))->where('type_item', "contacts")->delete();
				if (!empty($this->request->getVar('select_contact'))) {
					foreach ($this->request->getVar('select_contact') as $select) {
						$this->BitemModel->insert(array('id_brochure' => $this->session->get('current_brochure'), 'id_item' => $select, 'type_item' => "contacts"));
					}
				}
				break;


			case 8:

				$tab["step"] = $current_step;
				// $step=$this->request->getVar('step');
				// $tab['step']=$step;
				// $tab['template_id']=$this->request->getVar('template_id');
				$tab['status'] = "done";

				$x = $this->BrochuresModel->update($this->session->get('current_brochure'), $tab);
				// var_dump($this->session->get('current_brochure'));
				$exist = $this->BtemplateModel->where('id_brochure', $this->session->get('current_brochure'));


				$inf_user = $this->UserModel->find($data['user_data']['id']);
				$nb = $inf_user['remain_broch'] - 1;

				$this->UserModel->update($data['user_data']['id'], array("remain_broch" => $nb));

				break;
		}
		$res = array("error" => false, 'error_msg' => $x, 'POST' => $tab, 'FILES' => $_FILES);
		echo json_encode($res);
	}


	public function get_template_pages()
	{
		$template_id = $this->request->getVar('template_id');
		$list_pages = $this->BrochureTemplatePagesModel->where('template_id', $template_id)->orderBy('type', 'ASC')->find();
		for ($i = 1; $i <= 7; $i++) { ?>
			<div class="mb-3 col-12">
				<label for="verticalnav-firstname-input"> Template Page <?php echo $i ?></label>
				<select class="form-control" id="id_page" name="id_page[]">
					<option value=""><?php echo lang('app.field_select') ?></option>
					<?php foreach ($list_pages as $k => $v) { ?>
						<option value="<?php echo $v['id'] ?>"><?php echo $v['title'] ?></option>
					<?php } ?>
				</select>
			</div>
			<?php }
	}

	public function save_template()
	{
		$data = $this->common_data();
		$step = $this->request->getVar('step');
		$tab['step'] = $step;
		// $tab['template_id']=$this->request->getVar('template_id');
		$this->BrochuresModel->update($this->session->get('current_brochure'), $tab);

		//   $exist=$this->BtemplateModel->where('id_brochure',$this->session->get('current_brochure'))->delete();
		// 	foreach($this->request->getVar('id_page') as $k=>$v){
		// 		$this->BtemplateModel->insert(array(
		// 		'id_brochure'=>$this->session->get('current_brochure'),
		// 		'page_id'=>$v,
		// 		'ord'=>($k+1)
		// 		));
		// }
	}
	public function get_items_by_cat()
	{
		$data = $this->common_data();

		$id_categ = $this->request->getVar('id_cat');
		$type_item = $this->request->getVar('type_item');

		switch ($type_item) {
			case "products":
			$prod = $this->ProductsModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(' . $id_categ . ',ids_category)>0')->where('enable', '1')->find();
				foreach ($prod as $row) {
			?>
					<input type="checkbox" name="select_product[]" value="<?= $row['id']; ?>" checked /> <?= $row['name']; ?> <br />
				<?php
				}

		break;
		case "operations":
			$operat = $this->OperationsModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(' . $id_categ . ',ids_category)>0')->where('enable', '1')->orderBy('ord','DESC')->find();
				foreach ($operat as $row) {
			?>
					<input type="checkbox" name="select_operations[]" value="<?= $row['id']; ?>" checked /> <?= $row['name']; ?> <br />
				<?php
				}

		break;


		case "premi":
				$premi = $this->PremiModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(' . $id_categ . ',ids_category)>0')->where('enable', '1')->orderBy('ord','DESC')->find();

				foreach ($premi as $row) {
				?>
					<input type="checkbox" name="select_premi[]" value="<?= $row['id']; ?>" checked /> <?= $row['name']; ?> <br />
				<?php
				}
		break;
		case "partners":
              $part = $this->PartnersModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(' . $id_categ . ',ids_category)>0')->where('enable', '1')->orderBy('ord','ASC')->find();

				foreach ($part as $row) {
				?>
					<input type="checkbox" name="select_partner[]" value="<?= $row['id']; ?>" checked /> <?= $row['name']; ?> <br />
				<?php
				}
		break;
		case "contacts":
				

					$cont = $this->ContactsModel->where('user_id',$data['user_data']['id'])->where('FIND_IN_SET(' . $id_categ . ',ids_category)>0')->where('enable','1')->orderBy('ord','DESC')->find();
				
					foreach ($cont as $row) {
					?>
						<input type="checkbox" name="select_contact[]" value="<?= $row['id']; ?>" checked /> <?= $row['name']; ?> <br />
					<?php
					}
		break;
		}
	}

	public function get_items_cat()
	{
		
			$data = $this->common_data();
	
			$id_categ = $this->request->getVar('id_cat');
			$type_item = $this->request->getVar('type_item');
	
			switch ($type_item) {
				case "products":
				$prod = $this->ProductsModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(' . $id_categ . ',ids_category)>0')->where('enable', '1')->find();
          $items_product=$this->BitemModel->select('id_item')->where('type_item','products')->where('id_brochure',$this->session->get('current_brochure'))->find();
				
				foreach ($prod as $row) {
					?>
	
						<input type="checkbox"  name="select_product[]" value="<?= $row['id']; ?>" <?php if(in_array($row['id'],$items_product ?? array())) echo 'checked'?>/> <?= $row['name']; ?> <br />
					<?php
					}
			break;
			case "operations":
				$operat = $this->OperationsModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(' . $id_categ . ',ids_category)>0')->where('enable', '1')->find();
					foreach ($operat as $row) {
				?>
						<input type="checkbox" name="select_operations[]" value="<?= $row['id']; ?>" checked /> <?= $row['name']; ?> <br />
					<?php
					}
	
			break;
			case "premi":
					$premi = $this->PremiModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(' . $id_categ . ',ids_category)>0')->where('enable', '1')->find();
					
			$items_premi=$this->BitemModel->select('id_item')->where('type_item','premi')->where('id_brochure',$this->session->get('current_brochure'))->find();
			foreach ($premi as $row) {
						?>
							<input type="checkbox" name="select_premi[]" value="<?= $row['id']; ?> "<?php if(in_array($row['id'],$items_premi ?? array())) echo 'checked'?>/> <?= $row['name']; ?> <br />
						<?php
						}
	
			break;
			case "partners":
	
	
					$part = $this->PartnersModel->where('user_id', $data['user_data']['id'])->where('FIND_IN_SET(' . $id_categ . ',ids_category)>0')->where('enable', '1')->orderBy('ord','ASC')->find();
	
					$items_partner=$this->BitemModel->select('id_item')->where('type_item','partners')->where('id_brochure',$this->session->get('current_brochure'))->find();
					foreach ($part as $row) {
					?>
						<input type="checkbox" name="select_partner[]" value="<?= $row['id']; ?>" <?php if(in_array($row['id'],$items_partner ?? array())) echo 'checked'?>/> <?= $row['name']; ?> <br />
					<?php
					}
	
			break;
			case "contacts":
					
	
						$cont = $this->ContactsModel->where('user_id',$data['user_data']['id'])->where('FIND_IN_SET(' . $id_categ . ',ids_category)>0')->where('enable','1')->find();
						$items_contact=$this->BitemModel->select('id_item')->where('type_item','contacts')->where('id_brochure',$this->session->get('current_brochure'))->find();
						foreach ($cont as $row) {
							?>
								<input type="checkbox" name="select_contact[]" value="<?= $row['id']; ?>"  <?php if(in_array($row['id'],$items_contact ?? array())) echo 'checked'?>/> <?= $row['name']; ?> <br />
							<?php
							}

			break;
			}
		
	
	}
	
	public function get_list_broch(){
			$data = $this->common_data();
	
			$id = $this->request->getVar('id');
			$type_item = $this->request->getVar('type_item');
			$res=array();
			$ll=$this->BrochuresModel->where('user_id',$data['user_data']['id'])->find();
			if(!empty($ll)){
				foreach($ll as $k=>$v){
					$inf_cat=$this->CategoryModel->find($v['id_category']);
					$v['catname']=$inf_cat['title'] ?? "";
					$has_item=$this->BitemModel->where('type_item',$type_item)->where('id_item',$id)->where('id_brochure',$v['id'])->find();
					if(!empty($has_item)) $v['checked']=true; else $v['checked']=false;
					$res[]=$v;
				}
			}
			
			if(!empty($res)){
				foreach($res as $k=>$v){?>
				<tr>
					<td><input type="checkbox" name="list_assoc[]" value="<?php echo $v['id']?>" <?php if($v['checked']==true) echo 'checked'?>></td>
					<td> <?php echo $v['title']; ?></td>
					<td> <?php echo $v['catname']; ?></td>
					<td> <?php echo $v['created_at']; ?></td>
					<td> <?php echo $v['updated_at']; ?></td>
					<td><?php echo $v['status']; ?></td>
				</tr>
				<?php }
			}
		
			
	}
}
