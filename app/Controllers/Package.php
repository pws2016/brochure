<?php namespace App\Controllers;
  use App\Models\packageModel;
use App\Models\UserProfileModel;



class Package extends BaseController
{

    public function package()
	{

        

		$data = $this->common_data();
		echo view('admin/package',$data);

		// $model = $this->PackageModel;

	
	}





public function insert()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('title', 'title', 'required');
			$this->form_validation->set_rules('price', 'price', 'required');
			$this->form_validation->set_rules('sorting', 'sorting', 'required');
			$this->form_validation->set_rules('validity', 'validity', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('nb_brochure', 'nb_brochure', 'required');
		

			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				if ($this->crud_model->insert_entry($ajax_data)) {
					$data = array('responce' => 'success', 'message' => 'Record added Successfully');
				} else {
					$data = array('responce' => 'error', 'message' => 'Failed to add record');
				}
			}

			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function fetch()
	{
		if ($this->input->is_ajax_request()) {
			// if ($posts = $this->crud_model->get_entries()) {
			// 	$data = array('responce' => 'success', 'posts' => $posts);
			// }else{
			// 	$data = array('responce' => 'error', 'message' => 'Failed to fetch data');
			// }
			$posts = $this->crud_model->get_entries();
			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function delete()
	{
		if ($this->input->is_ajax_request()) {
			$del_id = $this->input->post('del_id');

			if ($this->crud_model->delete_entry($del_id)) {
				$data = array('responce' => 'success');
			} else {
				$data = array('responce' => 'error');
			}

			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function edit()
	{
		if ($this->input->is_ajax_request()) {
			$edit_id = $this->input->post('edit_id');

			if ($post = $this->crud_model->edit_entry($edit_id)) {
				$data = array('responce' => 'success', 'post' => $post);
			} else {
				$data = array('responce' => 'error', 'message' => 'failed to fetch record');
			}
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function update()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('title', 'title', 'required');
			$this->form_validation->set_rules('price', 'price', 'required');
			$this->form_validation->set_rules('sorting', 'sorting', 'required');
			$this->form_validation->set_rules('validity', 'validity', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('brochure', 'nb_brochure', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$data['id'] = $this->input->post('edit_id');
				$data['title'] = $this->input->post('edit_title');
				$data['price'] = $this->input->post('edit_price');
				$data['sorting'] = $this->input->post('edit_sorting');
				$data['validity'] = $this->input->post('edit_validity');
				$data['description'] = $this->input->post('edit_description');
				$data['brochure'] = $this->input->post('edit_brochure');


				if ($this->crud_model->update_entry($data)) {
					$data = array('responce' => 'success', 'message' => 'Record update Successfully');
				} else {
					$data = array('responce' => 'error', 'message' => 'Failed to update record');
				}
			}

			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}
}
