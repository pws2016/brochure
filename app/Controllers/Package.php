<?php

namespace App\Controllers;




class Package extends BaseController
{

	public function package()
	{

		$data = $this->common_data();
		$data['list_pack'] = $this->PackageModel->find();
		
		echo view('admin/package', $data);
	}
	public function insert()
	{ {

			$data_ins = [


				'title' => $this->request->getVar("title"),
				'price' => $this->request->getVar("price"),
				'description' => $this->request->getVar("description"),
				'sorting'  => $this->request->getVar("sorting"),
				'validity' => $this->request->getVar("validity"),
				'nb_brochure' => $this->request->getVar("nb_brochure"),



			];

			// var_dump($data_ins);
			$xx = $this->PackageModel->insert($data_ins);
			$session = session();
			$session->setFlashdata("successMsg", "New Package created successfully");
			return redirect()->to(base_url('admin/package'));
		}



		return view('admin/package');
	}

	public function update()
	{


	$id=$this->request->getVar("id");

			$data_edit = [


				'title' => $this->request->getVar("title"),
				'price' => $this->request->getVar("price"),
				'description' => $this->request->getVar("description"),
				'sorting'  => $this->request->getVar("sorting"),
				'validity_months' => $this->request->getVar("validity_months"),
				'nb_brochure' => $this->request->getVar("nb_brochure"),



			];
			var_dump($data_edit);
			$this->PackageModel->update($id, $data_edit);
			// var_dump($data_ins);


			return redirect()->to(base_url('admin/package'));
		



	
	}

	public function get_data(){

		$id = $this->request->getVar("id");
		$person=$this->PackageModel->find($id);
	
	// var_dump($res);
?>

	<div class="form-group">
	<label for="">Title</label>
 <input type="hidden" id="edit_id" name="id"  class="form-control" value="<?= $person['id'] ?>" > 
	<input type="text" id="title" name="title" value="<?= $person['title'] ?>" class="form-control" required>
  </div>
  <div class="form-group">
	<label for="">Price</label>
	<input type="text" id="price" name="price" value="<?= $person['price'] ?>" class="form-control" required>
  </div>
  <div class="form-group">
	<label for="">Description</label>
	<input type="text" id="description" name="description" value="<?= $person['description'] ?>" class="form-control" required>
  </div>
  <div class="form-group">
	<label for="">Sorting</label>
	<input type="text" id="sorting" name="sorting" value="<?= $person['sorting'] ?>" class="form-control" required>
  </div>
  <div class="form-group">
	<label for="">nomber des brochures</label>
	<input type="text" id="nb_brochure" name="nb_brochure" value="<?= $person['nb_brochure'] ?>"  class="form-control" required>
  </div>
  <div class="form-group">
	<label for="">validity_months</label>
	<input type="text" id="validity" name="validity_months" value="<?= $person['validity_months'] ?>" class="form-control" required>
  </div>
<?php
	}

	public function delete(){
		
		$id = $this->request->getVar("id");
	$this->PackageModel->delete($id);
	


	}
}
