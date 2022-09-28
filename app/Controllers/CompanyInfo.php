<?php

namespace App\Controllers;





class CompanyInfo extends BaseController
{

    public function companyInfo()
    {

        $data = $this->common_data();
        $data['company'] = $this->CompanyModel->where('user_id',$data['user_data']['id'])->first();


        echo view('user/companyInfo', $data);
    }



    public function update()
	{
        $data = $this->common_data();
        $exist=$this->CompanyModel->where('user_id',$data['user_data']['id'])->first();
		
        $data_update = [


			
            'title_operation' => $this->request->getVar("title_operation"),
            'title_contacts' => $this->request->getVar("title_contacts"),
            'title_partners' => $this->request->getVar("title_partners"),
            'title_intro' => $this->request->getVar("title_intro"),
            'title_product' => $this->request->getVar("title_product"),
            'title_premi' => $this->request->getVar("title_premi"),
            'description_product' => $this->request->getVar("description_product"),
            'description_premi' => $this->request->getVar("description_premi"),

            'description_operation' => $this->request->getVar("description_operation"),
            'description_contacts' => $this->request->getVar("description_contacts"),
            'description_partners' => $this->request->getVar("description_partners"),
            'description_intro' => $this->request->getVar("description_intro"),
			'siteweb' => $this->request->getVar("siteweb"),
			'phone' => $this->request->getVar("phone"),
            'email' => $this->request->getVar("email"),
            'facebook' => $this->request->getVar("facebook"),
            'linkedin' => $this->request->getVar("linkedin"),
            'twitter' => $this->request->getVar("twitter"),
            'instagram' => $this->request->getVar("instagram"),
            'youtube' => $this->request->getVar("youtube"),

            'user_id' => $data['user_data']['id']



        ];
        $validated = $this->validate([
            'logo' => [
                'uploaded[logo]',
                'mime_in[logo,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[logo,4096]',
            ],
        ]);
 
        $msg = 'Please select a valid logo';

        if ($validated) {
            $log = $this->request->getFile('logo');
            $logo_name = $log->getName();
            $log->move(ROOTPATH . 'public/uploads');
       
        $data_update['logo']=$logo_name;
        // validation bg image
 }
 $validation = $this->validator;
 $validation->reset();
  // $validation->reset();
       $validated = $this->validate([
                'background' => [
                    'uploaded[background]',
                    'mime_in[background,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[background,4096]',
                ],
            ]);
     
            $msg = 'Please select a valid background';

            if ($validated) {
                $bg = $this->request->getFile('background');
                $background_name = $bg->getName();
                $bg->move(ROOTPATH . 'public/uploads');

         $data_update['background']= $background_name;
            }
          $validation = $this->validator;
 $validation->reset();
			
			$validated = $this->validate([
                'image_intro' => [
                    'uploaded[image_intro]',
                    'mime_in[image_intro,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[image_intro,4096]',
                ],
            ]);
     
            $msg = 'Please select a valid image_intro';

            if ($validated) {
                $bg = $this->request->getFile('image_intro');
                $background_name = $bg->getName();
                $bg->move(ROOTPATH . 'public/uploads');

         $data_update['image_intro']= $background_name;
            }
			 $validation = $this->validator;
 $validation->reset();
			$validated = $this->validate([
                'image_operation' => [
                    'uploaded[image_operation]',
                    'mime_in[image_operation,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[image_operation,4096]',
                ],
            ]);
     
            $msg = 'Please select a valid background';

            if ($validated) {
                $bg = $this->request->getFile('image_operation');
                $background_name = $bg->getName();
                $bg->move(ROOTPATH . 'public/uploads');

         $data_update['image_operation']= $background_name;
            }
				$error_msg = $validation->listErrors();
		
				 $validation = $this->validator;
 $validation->reset();
				
        if(empty($exist)){ // insert
            $this->CompanyModel->insert($data_update);
        }
        else{ //update

        
    



            $this->CompanyModel->update($exist['id'], $data_update);
        }

        
			return redirect()->to(base_url('user/companyInfo'));
		



	
	}




   
}
