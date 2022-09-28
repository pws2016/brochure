<?php

namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use CodeIgniter\Files\File;



class SubOperationsData extends BaseController
{

    public function SubOperationsData($id_parent)
    {

        $data = $this->common_data();

        // $data['sub_data'] = $this->SubOperationsDataModel->where('sub_op', $id_parent)->find();

        $data['id_parent'] = $id_parent;

        $ll = $this->SubOperationsDataModel->where('sub_op', $id_parent)->find();
        $res = array();
        foreach ($ll as $kk => $vv) {
            $str_cat = "";



            $inf_cat = $this->PartnersModel->find($vv['id_partner']);
            $str_cat = $inf_cat['name'];


            $vv['partners'] = $str_cat;
            $res[] = $vv;
        }
        $data['sub_data'] = $res;


        $data['list_partner'] = $this->PartnersModel->Where('user_id', $data['user_data']['id'])->find();

        echo view('user/subOperationsData', $data);
    }

    public function insert()
    {


        $data = $this->common_data();

        $in_date = explode("/", $this->request->getVar("date"));

        $dates = $in_date[2] . '-' . $in_date[1] . '-' . $in_date[0];

        if ($this->request->getVar("sede") !== null) {
            $add_data = [


                'id_partner' => $this->request->getVar("list_partner"),
                'date' => $dates,
                'sede' => $this->request->getVar("sede"),
                'sub_op' => $this->request->getVar("id_parent"),


            ];

            $ad = $this->SubOperationsDataModel->insert($add_data);

            return redirect()->to(base_url('user/subOperationsData/' . $this->request->getVar("id_parent")));
            // . $this->request->getVar("id_parent")
        }
    }

    public function update()
    {

        $data = $this->common_data();
        $id = $this->request->getVar("id");

        $in_date = explode("/", $this->request->getVar("date"));

        $dates = $in_date[2] . '-' . $in_date[1] . '-' . $in_date[0];

        $this->SubOperationsDataModel->update($id, array(
            'id_partner' => $this->request->getVar("list_partner"),
            "sede" => $this->request->getVar('sede'),
            'date' => $dates,
        ));



        return redirect()->to(base_url('user/subOperationsData/' . $this->request->getVar("id_parent")));
    }

    public function get_data()
    {
        $data = $this->common_data();

        $id = $this->request->getVar("id");
        $sub_op = $this->SubOperationsDataModel->find($id);
  $list_partner  = $this->PartnersModel->Where('user_id', $data['user_data']['id'])->find();
?>
        <input type="hidden" id="edit_op" name="id" class="form-control" value="<?= $sub_op['id'] ?>">
        <div class="form-group">
            <label for="">Partner List</label><span class="text-primary">*</span>
            <select class="form-select" name="list_partner">

                <?php if (!empty($list_partner)) {
                    foreach ($list_partner as $k => $v) { ?>
                        <option value="<?php echo $v['id'] ?>"<?php if ($v['id']==$sub_op['id_partner']) echo "selected"?> > <?php echo $v['name'] ?> </option>
                <?php }
                } ?>
            </select>

            

        </div>
        <div class="mb-3">

            <label class="form-label">Order date</label>
            <div class="input-group" id="datepicker1">
                <input type="text" class="form-control" name="date" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" data-date-container='#datepicker1' data-provide="datepicker" value="<?php if ($sub_op['date'] != "") echo date('d/m/Y', strtotime($sub_op['date'])) ?>">

                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
            </div>



        </div>
        <div class="form-group">
            <label for="sede">Sede</label><span class="text-primary">*</span>
            <textarea id="sede" name="sede" class="md-textarea form-control" rows="3 "> <?= $sub_op['sede'] ?> </textarea>
        </div>


<?php
    }


    public function delete()
    {


        $id = $this->request->getVar("id");
        $this->SubOperationsDataModel->delete($id);
    }
}
