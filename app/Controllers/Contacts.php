<?php

namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use CodeIgniter\Files\File;



class Contacts extends BaseController
{

    public function contacts()
    {

        $data = $this->common_data();


        $data['cont'] = $this->ContactsModel->where('user_id',$data['user_data']['id'])->find();

        echo view('user/contacts', $data);
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
            $avatar->move(ROOTPATH . 'public/uploads/contact_pic/');


            if ($this->request->getVar("name") !== null) {
                $add_data = [


                    'name' => $this->request->getVar("name"),
                    'email' => $this->request->getVar("email"),
                    'phone' => $this->request->getVar("phone"),
                    'fax' => $this->request->getVar("fax"),
                    'address' => $this->request->getVar("address"),
                    'image' => $name,
                    'user_id' => $data['user_data']['id']




                ];

                $ad = $this->ContactsModel->insert($add_data);


                //$this->session->setFlashdata("successMsg", "New P created successfully");
                return redirect()->to(base_url('user/contacts'));
            }
        }

        return view('user/contacts');
    }
    public function update()
    {

        $data = $this->common_data();
        $id = $this->request->getVar("id");





        $data_update = [



            'name' => $this->request->getVar("name"),
            'email' => $this->request->getVar("email"),
            'phone' => $this->request->getVar("phone"),
            'fax' => $this->request->getVar("fax"),
            'address' => $this->request->getVar("address"),
            // 'image' => $this->request->getFile("image"),
            // 'user_id' => $this->request->getVar("user_id"),



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
            $avatar->move(ROOTPATH . 'public/uploads/contact_pic/');



            $data_update = [


                'name' => $this->request->getVar("name"),
                'email' => $this->request->getVar("email"),
                'phone' => $this->request->getVar("phone"),
                'fax' => $this->request->getVar("fax"),
                'address' => $this->request->getVar("address"),
                'image' => $name,
                'user_id' => $data['user_data']['id']




            ];
        }
        $this->ContactsModel->update($id, $data_update);



        return redirect()->to(base_url('user/contacts'));
    }

    public function get_data()
    {

        $id = $this->request->getVar("id");
        $cont = $this->ContactsModel->find($id);

        //    var_dump($cont);
?>
        <input type="hidden" id="edit_partners" name="id" class="form-control" value="<?= $cont['id'] ?>">
        <div class="form-group">
            <label for="">Name</label><span class="text-primary">*</span>
            <input type="text" id="name" name="name" value="<?= $cont['name'] ?>" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="">Email</label><span class="text-primary">*</span>
            <input type="text" id="email" name="email" value="<?= $cont['email'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Phone</label><span class="text-primary">*</span>
            <input type="text" id="phone" name="phone" value="<?= $cont['phone'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Fax</label>
            <input type="text" id="fax" name="fax" value="<?= $cont['fax'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" id="address" name="address"  value="<?= $cont['address'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Choose image</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>



<?php
    }

    public function delete()
    {


        $id = $this->request->getVar("id");
        $this->ContactsModel->delete($id);
    }

   
}
