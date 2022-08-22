<?php

namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use CodeIgniter\Files\File;



class Products extends BaseController
{

    public function products()
    {

        $data = $this->common_data();
        $data['prod'] = $this->ProductsModel->where('user_id',$data['user_data']['id'])->find();


        echo view('user/products', $data);
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


            if ($this->request->getVar("name") !== null) {
                $add_data = [


                    'name' => $this->request->getVar("name"),
                    'description' => $this->request->getVar("description"),
                    'image' => $name,
                    'user_id' => $data['user_data']['id']




                ];

                $ad = $this->ProductsModel->insert($add_data);

                return redirect()->to(base_url('user/products'));
            }
        }

        return view('user/products');
    }
    public function update()
    {
        $data = $this->common_data();

        $id = $this->request->getVar("id");





        $data_update = [



            'name' => $this->request->getVar("name"),
            'description' => $this->request->getVar("description"),
            'user_id' => $this->request->getVar("user_id"),



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
                'description' => $this->request->getVar("description"),
                'image' => $name,
                'user_id' => $data['user_data']['id']




            ];
        }
        $this->ProductsModel->update($id, $data_update);



        return redirect()->to(base_url('user/products'));
    }

    public function get_data()
    {

        $id = $this->request->getVar("id");
        $prod = $this->ProductsModel->find($id);

        //    var_dump($par);
?>
        <input type="hidden" id="edit_partners" name="id" class="form-control" value="<?= $prod['id'] ?>">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" id="name" name="name" value="<?= $prod['name'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="md-textarea form-control" rows="3" required><?= $prod['description'] ?></textarea>  
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
        $this->ProductsModel->delete($id);
    }
}
