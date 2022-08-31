<?php

namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use CodeIgniter\Files\File;



class Premi extends BaseController
{

    public function premi()
    {

        $data = $this->common_data();
        if ($this->request->getVar('action') !== null) {
            switch ($this->request->getVar('action')) {
                case 'desactivate':
                    $id = $this->request->getVar('id');
                    $this->PremiModel->update($id, array("enable" => 0));
                    $this->BitemModel->where('type_item', 'premi')->where('id_item', $id)->where("id_brochure IN(select id from brochures where user_id='" . $data['user_data']['id'] . "')")->delete();
                    break;
                    $msg=" premi desactivate";
                case 'activate':
                    $id = $this->request->getVar('id');
                    $this->PremiModel->update($id, array("enable" => 1));
                    if ($this->request->getVar('insert_item') !== null) {
                        $inf_premi = $this->PremiModel->find($id);
                        $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_premi['ids_category'] . ")")->find();
                        foreach ($ll as $k => $v) {
                            $exist = $this->BitemModel->where('id_brochure', $v['id'])->where('type_item', 'premi')->where('id_item', $id)->find();
                            if (empty($exist)) $this->BitemModel->insert(array("id_brochure" => $v['id'], 'id_item' => $id, 'type_item' => 'premi'));
                        }
                    }
                    break;
                    $msg=" premi activate";

                case 'duplicate':
                    $id = $this->request->getVar('id');
                    $inf_premi = $this->PremiModel->find($id);
                    $newid = $this->PremiModel->insert(array("user_id" => $data['user_data']['id'], "name" => $inf_premi['name'] . " copy", "description" => $inf_premi['description'], "image" => $inf_premi['image'], "enable" => $inf_premi['enable'], "ids_category" => $inf_premi['ids_category']));
                    if ($this->request->getVar('insert_item') !== null) {
                        $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_premi['ids_category'] . ")")->find();
                        if (!empty($ll)) {
                            foreach ($ll as $k => $v) {

                                $this->BitemModel->insert(array("id_brochure" => $v['id'], 'id_item' => $newid, 'type_item' => 'premi'));
                            }
                        }
                    }
                    $msg="duplicate done";
                    break;
            }
            
            return redirect()->back()->with('msg',$msg);

        }
        $ll = $this->PremiModel->where('user_id', $data['user_data']['id'])->find();
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
        $data['premi'] = $res;
        $data['list_category'] = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();

        return view('user/premi', $data);
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
                    'user_id' => $data['user_data']['id'],
                    'enable' => 1,
                    'ids_category' => implode(",", $this->request->getVar("ids_category") ?? "")


                ];

                $ad = $this->PremiModel->insert($add_data);

                if ($this->request->getVar("insert_item") !== null) {
                    $inf_premi = $this->PremiModel->find($ad);
                    $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_premi['ids_category'] . ")")->find();
                    if (!empty($ll)) {
                        foreach ($ll as $k => $v) {

                            $this->BitemModel->insert(array("id_brochure" => $v['id'], 'id_item' => $ad, 'type_item' => 'premi'));
                        }
                    }
                }
                return redirect()->to(base_url('user/premi'));
            }
        }

        return view('user/premi');
    }
    public function update()
    {

        $data = $this->common_data();

        $id = $this->request->getVar("id");
        $inf_premi = $this->PremiModel->find($id);
        $data_update = [

            'name' => $this->request->getVar("name"),
            'description' => $this->request->getVar("description"),
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
            $avatar->move(ROOTPATH . 'public/uploads');

            $data_update = [

                'name' => $this->request->getVar("name"),
                'description' => $this->request->getVar("description"),
                'image' => $name,
                'ids_category' => implode(",", $this->request->getVar("ids_category") ?? "")

            ];
        }
       $this->PremiModel->update($id, $data_update);


        if ($this->request->getVar("insert_item") !== null) {



            $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_premi['ids_category'] . ")")->find();
            if (!empty($ll)) {
                foreach ($ll as $k => $v) {

                    $this->BitemModel->where('id_brochure', $v['id'])->where('id_item', $id)->where('type_item', "premi")->delete();
                   
                }
            }
            $inf_premi = $this->PremiModel->find($id);
            $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_premi['ids_category'] . ")")->find();
            if (!empty($ll)) {
                foreach ($ll as $k => $v) {

                    $this->BitemModel->insert(array("id_brochure" => $v['id'], 'id_item' => $id, 'type_item' => 'premi'));
                }
            }
        }

        return redirect()->to(base_url('user/premi'));
    }

    public function get_data()
    {
        $data = $this->common_data();
        $id = $this->request->getVar("id");
        $prod = $this->PremiModel->find($id);
        $list_category = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();
       
?>
        <input type="hidden" id="edit_partners" name="id" class="form-control" value="<?= $prod['id'] ?>">
        <div class="form-group">
            <label for="">Name</label><span class="text-primary">*</span>
            <input type="text" id="name" name="name" value="<?= $prod['name'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Category</label><span class="text-primary">*</span>
            <select id="ids_category" name="ids_category[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." required style="width:100%">
                <?php if (!empty($list_category)) {
                    foreach ($list_category as $k => $v) { ?>
                        <option value="<?php echo $v['id'] ?>" <?php if (in_array($v['id'], explode(',', $prod['ids_category']))) echo 'selected' ?>><?php echo $v['title'] ?></option>
                <?php }
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label><span class="text-primary">*</span>
            <textarea id="description" name="description" class="md-textarea form-control" rows="3" required><?= $prod['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Choose image</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>

        <div class="alert alert-warning"><label><input type='checkbox' name='insert_item' checked>I accept to associate the item to brochures </label></div>


        <?php
    }

    public function delete()
    {


        $id = $this->request->getVar("id");
        $this->PremiModel->delete($id);
    }

    public function get_block_data()
    {
        $data = $this->common_data();
        $id = $this->request->getVar("id");
        $enable = $this->request->getVar("enable");
        switch ($enable) {
            case 1:
                $x = $this->BitemModel->where('type_item', 'premi')->where('id_item', $id)->where("id_brochure IN(select id from brochures where user_id='" . $data['user_data']['id'] . "')")->countAllResults(); ?>
                <div class="alert alert-danger"><?php echo str_replace("{x}", $x, lang('app.alert_desactivate_item')) ?></div>
            <?php
                break;
            case 0:
                $inf_premi = $this->PremiModel->find($id);
                $x = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_premi['ids_category'] . ")")->countAllResults(); ?>
                <div class="alert alert-warning"><?php echo str_replace("{x}", $x, lang('app.alert_activate_item')) ?></div>
<?php
                break;
        }
    }
}
