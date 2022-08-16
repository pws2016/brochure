<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\SettingModel;
use App\Models\UserModel;
use App\Models\UserProfileModel;
use App\Models\UsersLogModel;
use App\Models\TemplatesModel;
use App\Models\PackageModel;
use App\Models\UserPackModel;
use App\Models\PartnersModel;

/**
 * Class BaseController
 * test
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
  protected $helpers = ['form','url','text'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
			$this->session = \Config\Services::session();
		 $session = session()->start();
		 
		$this->SettingModel =  new SettingModel();
		
		$this->UsersLogModel=new UsersLogModel();
		$this->UserModel =  new UserModel();
		$this->UserProfileModel =  new UserProfileModel();
		$this->TemplatesModel =  new TemplatesModel();
        $this->PackageModel =  new PackageModel();
        $this->UserPackModel =  new UserPackModel();
        $this->PartnersModel =  new PartnersModel();

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
	public function common_data(){
		$common_data=array();
		$is_logged=false;
		$user_data=$this->session->get('user_data');	
		if(!empty($user_data)) $is_logged=true;
		$common_data['is_logged']=$is_logged;
		$common_data['user_data']=$user_data;
		$settings=$this->SettingModel->getByMetaKey();
		$common_data['settings']=$settings;
		$user_loginas=$this->session->get('user_loginas');	
		if(!empty($user_loginas)) $common_data['user_loginas']=$user_loginas;
		if(isset($user_data) && $user_data['role']=='A') $common_data['profile_url']=base_url('admin/profile');
		else $common_data['profile_url']=base_url('myAccount/profile');
		
		if(isset($user_data) &&$user_data['role']=='A') $common_data['prefix_route']='admin/';
		else $common_data['prefix_route']='myAccount/';
		
	
		return $common_data;
	}
	
}
