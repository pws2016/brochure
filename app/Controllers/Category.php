<?php

namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use CodeIgniter\Files\File;



class Category extends BaseController
{

    public function categories()
    {

        $data = $this->common_data();


        $data['part'] = $this->CategoryModel->where('user_id', $data['user_data']['id'])->find();


        echo view('user/category', $data);
    }


    public function insert()
    {


        $data = $this->common_data();



        if ($this->request->getVar("title") !== null) {
            $add_data = [


                'title' => $this->request->getVar("title"),

                'user_id' => $data['user_data']['id']




            ];

            $ad = $this->CategoryModel->insert($add_data);
            return redirect()->to(base_url('user/category'));
        }




        return view('user/category');
    }
    public function update()
    {

        $data = $this->common_data();
        $id = $this->request->getVar("id");





        $data_update = [



            'title' => $this->request->getVar("title"),



        ];

        $this->CategoryModel->update($id, $data_update);



        return redirect()->to(base_url('user/category'));
    }

    public function get_data()
    {

        $id = $this->request->getVar("id");
        $par = $this->CategoryModel->find($id);

?>
        <input type="hidden" id="edit_partners" name="id" class="form-control" value="<?= $par['id'] ?>">
        <div class="form-group">
            <label for="">Title</label><span class="text-primary">*</span>
            <input type="text" id="title" name="title" value="<?= $par['title'] ?>" class="form-control" required>
        </div>




<?php
    }

    public function delete()
    {


        $id = $this->request->getVar("id");
        $this->CategoryModel->delete($id);
    }
}
