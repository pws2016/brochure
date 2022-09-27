<?php

namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use CodeIgniter\Files\File;



class Contacts extends BaseController
{

    public function contacts()
    {

        $data = $this->common_data();


        $data = $this->common_data();
        if ($this->request->getVar('action') !== null) {
            switch ($this->request->getVar('action')) {
                case 'desactivate':
                    $id = $this->request->getVar('id');
                    $this->ContactsModel->update($id, array("enable" => 0));
                    $this->BitemModel->where('type_item', 'contacts')->where('id_item', $id)->where("id_brochure IN(select id from brochures where user_id='" . $data['user_data']['id'] . "')")->delete();
                    $msg = " contact desactivate";
                    break;

                case 'activate':
                    $id = $this->request->getVar('id');
                    $this->ContactsModel->update($id, array("enable" => 1));
                    if ($this->request->getVar('insert_item') !== null) {
                        $inf_cont = $this->ContactsModel->find($id);
                        $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_cont['ids_category'] . ")")->find();
                        foreach ($ll as $k => $v) {
                            $exist = $this->BitemModel->where('id_brochure', $v['id'])->where('type_item', 'contacts')->where('id_item', $id)->find();
                            if (empty($exist)) $this->BitemModel->insert(array("id_brochure" => $v['id'], 'id_item' => $id, 'type_item' => 'contacts'));
                        }
                    }
                    $msg = " conatct activate";
                    break;


                case 'duplicate':
                    $id = $this->request->getVar('id');
                    $inf_cont = $this->ContactsModel->find($id);
                    $newid = $this->ContactsModel->insert(array("user_id" => $data['user_data']['id'], "name" => $inf_cont['name'] . " copy", "phone" => $inf_cont['phone'], "fax" => $inf_cont['fax'], "address" => $inf_cont['address'],  "email" => $inf_cont['email'], "image" => $inf_cont['image'], "enable" => $inf_cont['enable'], "ids_category" => $inf_cont['ids_category'], "ord" => $inf_cont['ord']));
                    if ($this->request->getVar('insert_item') !== null) {
                        $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_cont['ids_category'] . ")")->find();
                        if (!empty($ll)) {
                            foreach ($ll as $k => $v) {

                                $this->BitemModel->insert(array("id_brochure" => $v['id'], 'id_item' => $newid, 'type_item' => 'contacts'));
                            }
                        }
                    }
                    $msg = "duplicate done";
                    break;
                case 'associate':
                    $id = $this->request->getVar('id');
                    if ($id != "") {
                        $this->BitemModel->where('type_item', 'premi')->where('id_item', $id)->where("id_brochure IN (select id from brochures where user_id='" . $data['user_data']['id'] . "')")->delete();
                        if (!empty($this->request->getVar('list_assoc'))) {
                            foreach ($this->request->getVar('list_assoc') as $kk => $vv) {
                                $this->BitemModel->insert(array("id_brochure" => $vv, 'id_item' => $id, 'type_item' => 'contacts'));
                            }
                        }
                    }
                    break;
            }



            return redirect()->back()->with('msg', $msg);
        }
        $ll = $this->ContactsModel->where('user_id', $data['user_data']['id'])->find();
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
        $data['cont'] = $res;
        $data['list_category'] = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();



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

            $in_date = explode("/",$this->request->getVar("ord"));

            $date = $in_date[2].'-'.$in_date[1].'-'.$in_date[0];

            if ($this->request->getVar("name") !== null) {
                $add_data = [


                    'name' => $this->request->getVar("name"),
                    'email' => $this->request->getVar("email"),
                    'phone' => $this->request->getVar("phone"),
                    'fax' => $this->request->getVar("fax"),
                    'address' => $this->request->getVar("address"),
                    'image' => $name,
                    'user_id' => $data['user_data']['id'],
                    'enable' => 1,
                    'ids_category' => implode(",", $this->request->getVar("ids_category") ?? ""),
                    'ord' => $date,


                ];

                $ad = $this->ContactsModel->insert($add_data);

                return redirect()->to(base_url('user/contacts'));
            }
        }

        return view('user/contacts');
    }
    public function update()
    {

        $data = $this->common_data();
        $id = $this->request->getVar("id");



        $in_date = explode("/",$this->request->getVar("ord"));

        $date = $in_date[2].'-'.$in_date[1].'-'.$in_date[0];

        $data_update = [



            'name' => $this->request->getVar("name"),
            'email' => $this->request->getVar("email"),
            'phone' => $this->request->getVar("phone"),
            'fax' => $this->request->getVar("fax"),
            'address' => $this->request->getVar("address"),
            'ord' => $date,
            'ids_category' => implode(",", $this->request->getVar("ids_category") ?? "")
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
                'ord' => $date,
                'image' => $name,
                'user_id' => $data['user_data']['id'],
                'ids_category' => implode(",", $this->request->getVar("ids_category") ?? "")



            ];
        }
        $this->ContactsModel->update($id, $data_update);



        return redirect()->to(base_url('user/contacts'));
    }

    public function get_data()
    {

        $data = $this->common_data();
        $id = $this->request->getVar("id");
        $cont = $this->ContactsModel->find($id);
        $list_category = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();
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
            <input type="text" id="address" name="address" value="<?= $cont['address'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Choose image</label>
            <input class="form-control" type="file" name="image" id="image">
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
<div class="input-group" id="datepicker1">
    <input type="text" class="form-control" name="ord" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" data-date-container='#datepicker1' data-provide="datepicker" value="<?php if($cont['ord']!="") echo date('d/m/Y',strtotime($cont['ord'])) ?>"  >

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
                $x = $this->BitemModel->where('type_item', 'contacts')->where('id_item', $id)->where("id_brochure IN(select id from brochures where user_id='" . $data['user_data']['id'] . "')")->countAllResults(); ?>
                <div class="alert alert-danger"><?php echo str_replace("{x}", $x, lang('app.alert_desactivate_item')) ?></div>
            <?php
                break;
            case 0:
                $inf_cont = $this->ContactsModel->find($id);
                $x = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_cont['ids_category'] . ")")->countAllResults(); ?>
                <div class="alert alert-warning"><?php echo str_replace("{x}", $x, lang('app.alert_activate_item')) ?></div>
<?php
                break;
        }
    }
    public function delete()
    {


        $id = $this->request->getVar("id");
        $this->ContactsModel->delete($id);
    }
}
