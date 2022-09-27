<?php

namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use CodeIgniter\Files\File;



class Partners extends BaseController
{

    public function partners()
    {

        $data = $this->common_data();
        if ($this->request->getVar('action') !== null) {
            switch ($this->request->getVar('action')) {
                case 'desactivate':
                    $id = $this->request->getVar('id');
                    $this->PartnersModel->update($id, array("enable" => 0));
                    $this->BitemModel->where('type_item', 'partners')->where('id_item', $id)->where("id_brochure IN(select id from brochures where user_id='" . $data['user_data']['id'] . "')")->delete();
                    $msg = " partners desactivate";
                    break;

                case 'activate':
                    $id = $this->request->getVar('id');
                    $this->PartnersModel->update($id, array("enable" => 1));
                    if ($this->request->getVar('insert_item') !== null) {
                        $inf_part = $this->PartnersModel->find($id);
                        $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_part['ids_category'] . ")")->find();
                        foreach ($ll as $k => $v) {
                            $exist = $this->BitemModel->where('id_brochure', $v['id'])->where('type_item', 'partners')->where('id_item', $id)->find();
                            if (empty($exist)) $this->BitemModel->insert(array("id_brochure" => $v['id'], 'id_item' => $id, 'type_item' => 'partners'));
                        }
                    }
                    $msg = " partners activate";
                    break;


                case 'duplicate':
                    $id = $this->request->getVar('id');
                    $inf_part = $this->PartnersModel->find($id);
                    $newid = $this->PartnersModel->insert(array("user_id" => $data['user_data']['id'], "name" => $inf_part['name'] . " copy", "email" => $inf_part['email'], "lastname" => $inf_part['lastname'], "title" => $inf_part['title'], "fax" => $inf_part['fax'], "mobile" => $inf_part['mobile'], "image" => $inf_part['image'], "enable" => $inf_part['enable'], "ids_category" => $inf_part['ids_category'], "ord" => $inf_part['ord'], "description" => $inf_part['description'], "phone" => $inf_part['phone'], "sede" => $inf_part['sede'], "tipologia" => $inf_part['tipologia'], "linkedin" => $inf_part['linkedin']));
                    if ($this->request->getVar('insert_item') !== null) {
                        $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_part['ids_category'] . ")")->find();
                        if (!empty($ll)) {
                            foreach ($ll as $k => $v) {

                                $this->BitemModel->insert(array("id_brochure" => $v['id'], 'id_item' => $newid, 'type_item' => 'partners'));
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
                                $this->BitemModel->insert(array("id_brochure" => $vv, 'id_item' => $id, 'type_item' => 'partners'));
                            }
                        }
                    }
                    break;
            }



            return redirect()->back()->with('msg', $msg);
        }
        $ll = $this->PartnersModel->where('user_id', $data['user_data']['id'])->find();
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
        $data['part'] = $res;

        $data['list_category'] = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();

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

        //  $msg = 'Please select a valid file';

        if ($validated) {
            $avatar = $this->request->getFile('image');
            $name = $avatar->getName();
            $avatar->move(ROOTPATH . 'public/uploads');



            if ($this->request->getVar("name") !== null) {
                $add_data = [
                    
                    'fax' => $this->request->getVar("fax"),
                    'mobile' => $this->request->getVar("mobile"),
                    'title' => $this->request->getVar("title"),
                    'name' => $this->request->getVar("name"),
                    'lastname' => $this->request->getVar("lastname"),
                    'email' => $this->request->getVar("email"),
                    'description' => $this->request->getVar("description"),
                    'sede' => $this->request->getVar("sede"),
                    'phone' => $this->request->getVar("phone"),
                    'tipologia' => $this->request->getVar("tipologia"),
                    'linkedin' => $this->request->getVar("linkedin"),

                    'image' => $name,
                    'user_id' => $data['user_data']['id'],
                    'enable' => 1,
                    'ids_category' => implode(",", $this->request->getVar("ids_category") ?? ""),
                    'ord' => $this->request->getVar("ord"),




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
        $id = $this->request->getVar("id");





        $data_update = [

            'fax' => $this->request->getVar("fax"),
            'mobile' => $this->request->getVar("mobile"),
            'title' => $this->request->getVar("title"),
            'name' => $this->request->getVar("name"),
            'lastname' => $this->request->getVar("lastname"),
            'email' => $this->request->getVar("email"),
            'user_id' => $data['user_data']['id'],
            'ord' => $this->request->getVar("ord"),
            'description' => $this->request->getVar("description"),
            'sede' => $this->request->getVar("sede"),
            'phone' => $this->request->getVar("phone"),
            'tipologia' => $this->request->getVar("tipologia"),
            'linkedin' => $this->request->getVar("linkedin"),
            'ids_category' => implode(",", $this->request->getVar("ids_category") ?? ""),



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
                'fax' => $this->request->getVar("fax"),
                'mobile' => $this->request->getVar("mobile"),
                'title' => $this->request->getVar("title"),
                'name' => $this->request->getVar("name"),
                'lastname' => $this->request->getVar("lastname"),
                'email' => $this->request->getVar("email"),
                'image' => $name,
                'user_id' => $data['user_data']['id'],
                'ord' => $this->request->getVar("ord"),
                'description' => $this->request->getVar("description"),
                'sede' => $this->request->getVar("sede"),
                'phone' => $this->request->getVar("phone"),
                'tipologia' => $this->request->getVar("tipologia"),
                'linkedin' => $this->request->getVar("linkedin"),
                'ids_category' => implode(",", $this->request->getVar("ids_category") ?? ""),


            ];
        }
        $this->PartnersModel->update($id, $data_update);



        return redirect()->to(base_url('user/partners'));
    }

    public function get_data()
    {
        $data = $this->common_data();
       
        $id = $this->request->getVar("id");
        $par = $this->PartnersModel->find($id);
        $list_category = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();

?>
        <input type="hidden" id="edit_partners" name="id" class="form-control" value="<?= $par['id'] ?>">
        <div class="form-group">


            <label class="radio-inline">
                <input type="radio" name="title" value="Mr." checked>Mr.
            </label>
            <label class="radio-inline">
                <input type="radio" name="title" value="Mrs.">Mrs.
            </label>
        </div>
        <div class="form-group">
            <label for="">Name</label><span class="text-primary">*</span>
            <input type="text" id="name" name="name" value="<?= $par['name'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for=""> Last Name</label><span class="text-primary">*</span>
            <input type="text" id="lastname" name="lastname" value="<?= $par['lastname'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Email</label><span class="text-primary">*</span>
            <input type="email" id="email" name="email" value="<?= $par['email'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Telefono</label>
            <input type="text" id="phone" name="phone" class="form-control" value="<?= $par['phone'] ?>">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="ord" class="form-label">Fax</label><span class="text-primary">*</span>
                    <input class="form-control" type="fax" name="fax" id="fax" value="<?= $par['fax'] ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="ord" class="form-label">Mobile</label><span class="text-primary">*</span>
                    <input class="form-control" type="mobile" name="mobile" id="mobile" value="<?= $par['mobile'] ?>" required>
                </div>

            </div>
        </div>
        <div class="form-group">
            <label for="">descrizione</label>
            <textarea id="description" name="description" class="form-control"><?= $par['description'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Sede</label>
            <input type="text" id="sede" name="sede" class="form-control" value="<?= $par['sede'] ?>">
        </div>
        <div class="form-group">
            <label for="">LinkedIn URL</label>
            <input type="text" id="linkedin" name="linkedin" class="form-control" value="<?= $par['linkedin'] ?>">
        </div>
        <div class="form-group">
            <label for="">Tipologia</label>
            <select class="form-select" name="tipologia">
             
                <?php if (!empty( $data['typoPartner'])) {
                    foreach ($data['typoPartner'] as $k => $v) { ?>
                <option value="<?php echo $v ?>" <?php if ($v==$par['tipologia']) echo "selected"?>><?php echo $v ?></option>

                       
                <?php }
                } ?>
            </select>
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
            <label for="image" class="form-label">Choose image</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>
        <div class="mb-3">
            <label for="order" class="form-label"> order</label><span class="text-primary">*</span>
            <input class="form-control" type="number" name="ord" id="ord" value="<?= $par['ord'] ?>" required>

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
                $x = $this->BitemModel->where('type_item', 'partners')->where('id_item', $id)->where("id_brochure IN(select id from brochures where user_id='" . $data['user_data']['id'] . "')")->countAllResults(); ?>
                <div class="alert alert-danger"><?php echo str_replace("{x}", $x, lang('app.alert_desactivate_item')) ?></div>
            <?php
                break;
            case 0:
                $inf_part = $this->PartnersModel->find($id);
                $x = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_part['ids_category'] . ")")->countAllResults(); ?>
                <div class="alert alert-warning"><?php echo str_replace("{x}", $x, lang('app.alert_activate_item')) ?></div>
<?php
                break;
        }
    }

    public function delete()
    {


        $id = $this->request->getVar("id");
        $this->PartnersModel->delete($id);
    }
}
