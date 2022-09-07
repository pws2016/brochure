<?php

namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use CodeIgniter\Files\File;



class Products extends BaseController
{

    public function products()
    {

       
   
        $data = $this->common_data();
     
        if ($this->request->getVar('action') !== null) {
            switch ($this->request->getVar('action')) {
                case 'desactivate':
                    $id = $this->request->getVar('id');
                    $this->ProductsModel->update($id, array("enable" => 0));
                    $this->BitemModel->where('type_item', 'products')->where('id_item', $id)->where("id_brochure IN(select id from brochures where user_id='" . $data['user_data']['id'] . "')")->delete();
                    $msg=" products desactivate";
                    break;
                
                case 'activate':
                    $id = $this->request->getVar('id');
                    $this->ProductsModel->update($id, array("enable" => 1));
                    if ($this->request->getVar('insert_item') !== null) {
                        $inf_prod = $this->ProductsModel->find($id);
                        $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_prod['ids_category'] . ")")->find();
                        foreach ($ll as $k => $v) {
                            $exist = $this->BitemModel->where('id_brochure', $v['id'])->where('type_item', 'products')->where('id_item', $id)->find();
                            if (empty($exist)) $this->BitemModel->insert(array("id_brochure" => $v['id'], 'id_item' => $id, 'type_item' => 'products'));
                        }
                    }
                    $msg=" products activate";
                    break;
                case 'duplicate':
                    $id = $this->request->getVar('id');
                    $inf_prod = $this->ProductsModel->find($id);
                    $newid = $this->ProductsModel->insert(array("user_id" => $data['user_data']['id'], "name" => $inf_prod['name'] . " copy", "description" => $inf_prod['description'], "image" => $inf_prod['image'], "enable" => $inf_prod['enable'], "ids_category" => $inf_prod['ids_category']));
                    if ($this->request->getVar('insert_item') !== null) {
                        $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_prod['ids_category'] . ")")->find();
                        if (!empty($ll)) {
                            foreach ($ll as $k => $v) {

                                $this->BitemModel->insert(array("id_brochure" => $v['id'], 'id_item' => $newid, 'type_item' => 'products'));
                            }
                        }
                    }
                    $msg="duplicate done";
                    break;
                    case 'associate':
                        $id = $this->request->getVar('id');
                        if($id!=""){
                            $this->BitemModel->where('type_item','premi')->where('id_item',$id)->where("id_brochure IN (select id from brochures where user_id='".$data['user_data']['id']."')")->delete();
                           if(!empty( $this->request->getVar('list_assoc'))){
                               foreach($this->request->getVar('list_assoc') as $kk=>$vv){
                                    $this->BitemModel->insert(array("id_brochure" => $vv, 'id_item' => $id, 'type_item' => 'products'));
                               }
                           }
                        }
                   break;
               }
               
            

            return redirect()->back()->with('msg',$msg);
        }
        $ll = $this->ProductsModel->where('user_id', $data['user_data']['id'])->find();
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
        $data['prod'] = $res;
        $data['list_category'] = $this->CategoryModel->where('user_id IS NULL')->orWhere('user_id', $data['user_data']['id'])->find();
       
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
                    'user_id' => $data['user_data']['id'],
                    'enable' => 1,
                    'ids_category' => implode(",", $this->request->getVar("ids_category") ?? ""),



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

        $inf_prod = $this->ProductsModel->find($id);



        $data_update = [



            'name' => $this->request->getVar("name"),
            'description' => $this->request->getVar("description"),
           


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
        if ($this->request->getVar("insert_item") !== null) {



            $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_prod['ids_category'] . ")")->find();
            if (!empty($ll)) {
                foreach ($ll as $k => $v) {

                    $this->BitemModel->where('id_brochure', $v['id'])->where('id_item', $id)->where('type_item', "products")->delete();
                   
                }
            }
            $inf_prod = $this->ProductsModel->find($id);
            $ll = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_prod['ids_category'] . ")")->find();
            if (!empty($ll)) {
                foreach ($ll as $k => $v) {

                    $this->BitemModel->insert(array("id_brochure" => $v['id'], 'id_item' => $id, 'type_item' => 'products'));
                }
            }
        }



        return redirect()->to(base_url('user/products'));
    }

    public function get_data()
    {
        $data = $this->common_data();
        $id = $this->request->getVar("id");
        $prod = $this->ProductsModel->find($id);
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


    public function get_block_data()
    {
        $data = $this->common_data();
        $id = $this->request->getVar("id");
        $enable = $this->request->getVar("enable");
        switch ($enable) {
            case 1:
                $x = $this->BitemModel->where('type_item', 'products')->where('id_item', $id)->where("id_brochure IN(select id from brochures where user_id='" . $data['user_data']['id'] . "')")->countAllResults(); ?>
                <div class="alert alert-danger"><?php echo str_replace("{x}", $x, lang('app.alert_desactivate_item')) ?></div>
            <?php
                break;
            case 0:
                $inf_prod = $this->ProductsModel->find($id);
                $x = $this->BrochuresModel->where('user_id', $data['user_data']['id'])->where("id_category IN (" . $inf_prod['ids_category'] . ")")->countAllResults(); ?>
                <div class="alert alert-warning"><?php echo str_replace("{x}", $x, lang('app.alert_activate_item')) ?></div>
<?php
                break;
        }
    }

    public function delete()
    {


        $id = $this->request->getVar("id");
        $this->ProductsModel->delete($id);
    }
}
