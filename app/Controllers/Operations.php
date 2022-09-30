<?php

namespace App\Controllers;

use Illuminate\Support\Facades\DB;
use CodeIgniter\Files\File;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Operations extends BaseController
{

    public function operations()
    {

        $data = $this->common_data();

        if ($this->request->getVar('action') !== null) {
            switch ($this->request->getVar('action')) {
                case 'desactivate':
                    $id = $this->request->getVar('id');
                    $this->OperationsModel->update($id, array("enable" => 0));
                    $this->BitemModel->where('type_item', 'operations')->where('id_item', $id)->where("id_brochure IN(select id from brochures where user_id='" . $data['user_data']['id'] . "')")->delete();
                    $msg = " operations desactivate";
                    break;

                case 'activate':
                    $id = $this->request->getVar('id');
                    $this->OperationsModel->update($id, array("enable" => 1));
                    if ($this->request->getVar('insert_item') !== null) {
                        $inf_operations = $this->OperationsModel->find($id);
                        $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_operations['ids_category'] . ")")->find();
                        foreach ($ll as $k => $v) {
                            $exist = $this->BitemModel->where('id_brochure', $v['id'])->where('type_item', 'operations')->where('id_item', $id)->find();
                            if (empty($exist)) $this->BitemModel->insert(array("id_brochure" => $v['id'], 'id_item' => $id, 'type_item' => 'operations'));
                        }
                    }
                    $msg = " operations activate";
                    break;


                case 'duplicate':
                    $id = $this->request->getVar('id');
                    $inf_operations = $this->OperationsModel->find($id);
                    $newid = $this->OperationsModel->insert(array(
                        "user_id" =>
                        $data['user_data']['id'],
                        "name" => $inf_operations['name'] . " copy",
                        "description" => $inf_operations['description'],
                        "enable" => $inf_operations['enable'],
                        "ord" => $inf_operations['ord'],
                        "ids_category" => $inf_operations['ids_category']
                    ));
                    $sub_op = $this->SubOperationsModel->where('id_op', $id)->find();

                    if (!empty($sub_op)) {
                        foreach ($sub_op as $k => $v) {

                            $this->SubOperationsModel->insert(array("id_op"  => $newid, 'description' => $v['description'], 'enable' => $v['enable'], 'ord' => $v['ord']));
                        }
                    }
                    if ($this->request->getVar('insert_item') !== null) {
                        $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_operations['ids_category'] . ")")->find();
                        if (!empty($ll)) {
                            foreach ($ll as $k => $v) {

                                $this->BitemModel->insert(array("id_brochure" => $v['id'], 'id_item' => $newid, 'type_item' => 'operations'));
                            }
                        }
                    }

                    $msg = "duplicate done";

                    break;
                case 'associate':
                    $id = $this->request->getVar('id');
                    if ($id != "") {
                        $this->BitemModel->where('type_item', 'operations')->where('id_item', $id)->where("id_brochure IN (select id from brochures where user_id='" . $data['user_data']['id'] . "')")->delete();
                        if (!empty($this->request->getVar('list_assoc'))) {
                            foreach ($this->request->getVar('list_assoc') as $kk => $vv) {
                                $this->BitemModel->insert(array("id_brochure" => $vv, 'id_item' => $id, 'type_item' => 'operations'));
                            }
                        }
                    }
                    break;
            }

            return redirect()->back()->with('msg', $msg);

            $ll = $this->OperationsModel->where('user_id', $data['user_data']['id'])->find();
            $res = array();
            foreach ($ll as $kk => $vv) {
                $str_cat = "";
                $tt = explode(",", $vv['ids_category']);
                if (!empty($tt)) {
                    foreach ($tt as $k => $v) {
                        $inf_cat = $this->CategoryModel->find($v);
                        $str_cat .= $inf_cat['title'] . ",";
                    }
                    $str_cat = substr($str_cat, 0, -1);
                }
                $vv['categories'] = $str_cat;
                $res[] = $vv;
            }

            $data['operation'] = $res;
            $data['list_category'] = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();

            echo view('user/operations', $data);
        }
        $ll = $this->OperationsModel->where('user_id', $data['user_data']['id'])->find();
        $res = array();
        foreach ($ll as $kk => $vv) {
            $str_cat = "";
            $tt = explode(",", $vv['ids_category']);
            if (!empty($tt)) {
                foreach ($tt as $k => $v) {
                    $inf_cat = $this->CategoryModel->find($v);
                    $str_cat .= $inf_cat['title'] . ",";
                }
                $str_cat = substr($str_cat, 0, -1);
            }
            $vv['categories'] = $str_cat;
            $res[] = $vv;
        }
        $data['operation'] = $res;
        $data['list_category'] = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();

        echo view('user/operations', $data);
    }
    public function insert()
    {


        $data = $this->common_data();

        $data['list_category'] = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();

        if ($this->request->getVar("name") !== null) {

            $in_date = explode("/", $this->request->getVar("ord"));

            $date = $in_date[2] . '-' . $in_date[1] . '-' . $in_date[0];
            // echo $date;
            $add_data = [


                'name' => $this->request->getVar("name"),
                'description' => $this->request->getVar("description"),

                'ord' => $date,
                'user_id' => $data['user_data']['id'],
                'ids_category' => implode(",", $this->request->getVar("ids_category") ?? "")




            ];

            $ad = $this->OperationsModel->insert($add_data);
            return redirect()->to(base_url('user/operations'));
        }
    }

    public function update()
    {

        $data = $this->common_data();
        $id = $this->request->getVar("id");
        $data['list_category'] = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();
        $in_date = explode("/", $this->request->getVar("ord"));

        $date = $in_date[2] . '-' . $in_date[1] . '-' . $in_date[0];
        $data_update = [
            'name' => $this->request->getVar("name"),
            'description' => $this->request->getVar("description"),
            'user_id' => $data['user_data']['id'],
            'ids_category' => implode(",", $this->request->getVar("ids_category") ?? ""),

            'ord' => $date,

        ];

        $this->OperationsModel->update($id, $data_update);



        return redirect()->to(base_url('user/operations'));
    }

    public function get_data()
    {
        $data = $this->common_data();

        $id = $this->request->getVar("id");
        $op = $this->OperationsModel->find($id);

        $list_category = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();


?>
        <input type="hidden" id="edit_op" name="id" class="form-control" value="<?= $op['id'] ?>">

        <div class="form-group">
            <label for="">name</label><span class="text-primary">*</span>
            <input type="text" id="name" name="name" class="form-control" value="<?= $op['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label><span class="text-primary">*</span>
            <textarea id="description" name="description" class="md-textarea form-control" rows="3" required><?= $op['description'] ?></textarea>


        </div>
        <div class="form-group">
            <label for="">Category</label><span class="text-primary">*</span>
            <select id="ids_category" name="ids_category[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." required style="width:100%">
                <?php if (!empty($list_category)) {
                    foreach ($list_category as $k => $v) { ?>
                        <option value="<?php echo $v['id'] ?>" <?php if ($v['user_id'] == null) echo 'selected' ?>><?php echo $v['title'] ?></option>
                <?php }
                } ?>
            </select>
        </div>
        <div class="mb-3">

            <label class="form-label">Order date</label>
            <div class="input-group" id="datepicker2">
                <input type="text" class="form-control" name="ord" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" data-date-container='#datepicker2' data-provide="editdatepicker" value="<?php if ($op['ord'] != "") echo date('d/m/Y', strtotime($op['ord'])) ?>">

                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
            </div>



        </div>

        <?php
    }
    public function get_block_data()
    {
        $data = $this->common_data();
        $id = $this->request->getVar("id");
        $enable = $this->request->getVar("enable");
        switch ($enable) {
            case 1:
                $x = $this->BitemModel->where('type_item', 'operations')->where('id_item', $id)->where("id_brochure IN(select id from brochures where user_id='" . $data['user_data']['id'] . "')")->countAllResults(); ?>
                <div class="alert alert-danger"><?php echo str_replace("{x}", $x, lang('app.alert_desactivate_item')) ?></div>
            <?php
                break;
            case 0:
                $inf_premi = $this->OperationsModel->find($id);
                $x = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_premi['ids_category'] . ")")->countAllResults(); ?>
                <div class="alert alert-warning"><?php echo str_replace("{x}", $x, lang('app.alert_activate_item')) ?></div>
<?php
                break;
        }
    }
    public function delete()
    {


        $id = $this->request->getVar("id");
        $this->OperationsModel->delete($id);
    }

    public function createExcel()
    {

        $data = $this->common_data();
        $fileName = 'operations.xlsx';
        $operations = $this->OperationsModel->where('user_id', $data['user_data']['id'])->find();

        $res = array();
        foreach ($operations as $v) {
            $str_cat = "";
            $tt = explode(",", $v['ids_category']);
            if (!empty($tt)) {
                foreach ($tt as $k => $c) {
                    $inf_cat = $this->CategoryModel->find($c);
                    $str_cat .= $inf_cat['title'] . ",";
                }
                $str_cat = substr($str_cat, 0, -1);
            }
            $res[] = array('A' => $v['id'], 'B' => $v['name'], 'C' => '', 'D' => '', 'E' => '', 'F' => '', 'G' => $v['description'], 'H' => $str_cat);
            $suboperations = $this->SubOperationsModel->where('id_op', $v['id'])->find();

            if (!empty($suboperations)) {
                foreach ($suboperations as $vv) {
                    $res[] = array('A' => $v['id'], 'B' => $v['name'], 'C' => $vv['description'], 'D' => '', 'E' => '', 'F' => '', 'G' => $v['description'], 'H' => $str_cat);
                    $suboperationsData = $this->SubOperationsDataModel->where('sub_op', $vv['id'])->find();
                    if (!empty($suboperationsData)) {
                        foreach ($suboperationsData as $vvv) {

                            $inf_partner = $this->PartnersModel->find($vvv['id_partner']);

                            $res[] = array('A' => $v['id'], 'B' => $v['name'], 'C' => $vv['description'], 'D' => $vvv['date'], 'E' => $vvv['sede'], 'F' => $inf_partner['name'], 'G' => $v['description'], 'H' => $str_cat);
                        }
                    }
                }
            }
        }
        //    var_dump($res);
        //    exit;

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'operations');
        $sheet->setCellValue('C1', 'Sub_operations');
        $sheet->setCellValue('D1', 'data');
        $sheet->setCellValue('E1', 'sede');
        $sheet->setCellValue('F1', 'partner');
        $sheet->setCellValue('G1', 'desc operations');

        $sheet->setCellValue('H1', 'Categoria');

        $rows = 2;

        foreach ($res as $v) {
            $sheet->setCellValue('A' . $rows, $v['A']);
            $sheet->setCellValue('B' . $rows, $v['B']);
            $sheet->setCellValue('C' . $rows, $v['C']);

            $sheet->setCellValue('D' . $rows, $v['D']);
            $sheet->setCellValue('E' . $rows, $v['E']);
            $sheet->setCellValue('F' . $rows, $v['F']);


            $sheet->setCellValue('G' . $rows, $v['G']);
            $sheet->setCellValue('H' . $rows, $v['H']);

            $rows++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save(ROOTPATH . 'public/uploads/' . $fileName);
        echo view('xsl.php',array('file'=>$fileName));
    //     header("Content-Type: application/vnd.ms-excel");
    //    return (base_url() . "/uploads/" . $fileName);
    }
    
}
