<?php

namespace App\Controllers;




class Partners extends BaseController
{

    public function partners()
    {

        $data = $this->common_data();
       
       
        $data['part'] = $this->PartnersModel->find();

        //  var_dump($data);
        // var_dump( $data['part']);
        echo view('user/partners', $data);
    }


    public function insert()
    { 

        $data = $this->common_data();
            if($this->request->getVar("name")!==null){
            $add_data = [


                'name' => $this->request->getVar("name"),
                'email' => $this->request->getVar("email"),
                'image' => $this->request->getVar("image"),
                 'user_id' => $data['user_data']['id']




            ];

            $ad = $this->PartnersModel->insert($add_data);

           
           //$this->session->setFlashdata("successMsg", "New P created successfully");
            return redirect()->to(base_url('user/partners'));
            }

        return view('user/partners');
    }
    public function update()
	{


	$id=$this->request->getVar("id");

			$data_update = [


			
                'name' => $this->request->getVar("name"),
                'email' => $this->request->getVar("email"),
                'image' => $this->request->getVar("image"),
                'user_id' => $this->request->getVar("user_id"),



			];
			// var_dump($data_update);
            $this->PartnersModel->update($id, $data_update);
			


			return redirect()->to(base_url('user/partners'));
		



	
	}

    public function get_data()
    {

        $id = $this->request->getVar("id");
        $par = $this->PartnersModel->find($id);

    //    var_dump($par);
?>

        <div class="form-group">
            <label for="">Name</label>
            <input type="text" id="name" name="name"  value="<?= $par['name'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" id="email" name="email" value="<?= $par['email'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Choose image</label>
            <input class="form-control" type="file" value="<?= $par['image'] ?>" name="image" id="image">
        </div>



<?php
    }

    public function delete()
    {


        $id = $this->request->getVar("id");
        $this->PartnersModel->delete($id);
    }

public function get_userid($id){

    $id = $this->request->getVar("id");
    $pratners= $this->userModel->find($id);


}

}
