<?php

namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use CodeIgniter\Files\File;



class SubOperations extends BaseController
{

    public function subOperations($id_parent)
    {

        $data = $this->common_data();

        $data['sub_op'] = $this->SubOperationsModel->where('id_op', $id_parent)->find();
        // var_dump($data['sub_op']);
        $data['id_parent'] = $id_parent;
        echo view('user/subOperations', $data);
    }

    public function insert()
    {


        $data = $this->common_data();



        if ($this->request->getVar("description") !== null) {
            $add_data = [


               
                'description' => $this->request->getVar("description"),
                'id_op' => $this->request->getVar("id_parent"),


            ];

            $ad = $this->SubOperationsModel->insert($add_data);

            return redirect()->to(base_url('user/subOperations/' . $this->request->getVar("id_parent")));
        }
    }

    public function update()
    {

        $data = $this->common_data();

        $id = $this->request->getVar("id");
        if($this->request->getVar('enable') !== null) $enable=1; else $enable=0;
        $this->SubOperationsModel->update($id, array("enable" =>$enable,'description'=>$this->request->getVar('description')));

       
        return redirect()->to(base_url('user/subOperations/' . $this->request->getVar("id_parent")));
    }

    public function get_data()
    {
        $data = $this->common_data();

        $id = $this->request->getVar("id");
        $sub_op = $this->SubOperationsModel->find($id);

?>
        <input type="hidden" id="edit_op" name="id" class="form-control" value="<?= $sub_op['id'] ?>">
        <!-- <div class="form-group">
            <label for="">name</label><span class="text-primary">*</span>
            <input type="text" id="name" name="name" class="form-control" value="<?= $sub_op['name'] ?>" required>
        </div> -->
        <div class="mb-3">
            <label for="descrip_edit">Description</label><span class="text-primary">*</span>
            <textarea id="descrip_edit" name="description" class="md-textarea form-control" rows="3" required><?= $sub_op['description'] ?></textarea>
        </div>
        <div class="mb-4">
            <div class="form-check">

                <input type="checkbox" name="enable" <?php if ($sub_op['enable'] == 1) echo 'checked' ?> /> <br />

                <label class="form-check-label" for="flexCheckDefault">
                    Enable
                </label>
            </div>
        </div>

<?php
    }


    public function delete()
    {


        $id = $this->request->getVar("id");
        $this->SubOperationsModel->delete($id);
    }
}
