<?php

namespace App\Controllers;
use Illuminate\Support\Facades\DB;

use CodeIgniter\Files\File;



class Partners extends BaseController
{

    public function partners()
    {

        $data = $this->common_data();
       
       
        $data['part'] = $this->PartnersModel->where('user_id',$data['user_data']['id'])->find();

      
        echo view('user/partners', $data);
    }


    public function insert()
    { 
     

        $data = $this->common_data();
          
        $validated = $this->validate([
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[image,4096]',
            ],
        ]);
 
        $msg = 'Please select a valid file';
  
        if ($validated) {
            $avatar = $this->request->getFile('image');
            $name = $avatar->getName();
            $avatar->move(ROOTPATH . 'public/uploads');
      

            if($this->request->getVar("name")!==null){
            $add_data = [


                'name' => $this->request->getVar("name"),
                'email' => $this->request->getVar("email"),
                'image' => $name,
                 'user_id' => $data['user_data']['id']




            ];

            $ad = $this->PartnersModel->insert($add_data);

        } 
         
            return redirect()->to(base_url('user/partners'));
             }

        return view('user/partners');
    }
    public function update()
	{

        $data = $this->common_data();
	$id=$this->request->getVar("id");
    
  



			$data_update = [


			
                'name' => $this->request->getVar("name"),
                'email' => $this->request->getVar("email"),
          
                'user_id' => $data['user_data']['id'],



			];
            $validated = $this->validate([
                'image' => [
                    'uploaded[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[image,4096]',
                ],
            ]);
     
            $msg = 'Please select a valid file';
      
            if ($validated) {
                $avatar = $this->request->getFile('image');
                $name = $avatar->getName();
                $avatar->move(ROOTPATH . 'public/uploads');
          
    
               
                $data_update = [
    
    
                    'name' => $this->request->getVar("name"),
                    'email' => $this->request->getVar("email"),
                    'image' => $name,
                     'user_id' => $data['user_data']['id'],
    
    
    
    
                ];
    
              
                }  
            $this->PartnersModel->update($id, $data_update);
			


			return redirect()->to(base_url('user/partners'));
		



	
	}

    public function get_data()
    {

        $id = $this->request->getVar("id");
        $par = $this->PartnersModel->find($id);

    //    var_dump($par);
?>
<input type="hidden" id="edit_partners" name="id"  class="form-control" value="<?= $par['id'] ?>" > 
        <div class="form-group">
            <label for="">Name</label><span class="text-primary">*</span>
            <input type="text" id="name" name="name"  value="<?= $par['name'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Email</label><span class="text-primary">*</span>
            <input type="email" id="email" name="email" value="<?= $par['email'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Choose image</label>
            <input class="form-control" type="file"  name="image" id="image">
        </div>



<?php
    }

    public function delete()
    {


        $id = $this->request->getVar("id");
        $this->PartnersModel->delete($id);
    }



}
