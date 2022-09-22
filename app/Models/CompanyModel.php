<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class CompanyModel extends Model
{
	
    protected $table = 'company_info';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 
	'logo','background',
	'title_operation','description_operation',
	'title_contacts','description_contacts',
	'title_partners','description_partners',
	'title_intro','description_intro',
	'title_premi','description_premi',
	'title_product','description_product',

	'phone','email','siteweb',
	'facebook','twitter',
	'image_intro','image_operation',
	'linkedin','instagram',
];
	// protected $useSoftDeletes = true;
	// protected $returnType = 'array';
	// protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
	// protected $deletedField  = 'deleted_at';
	// protected $updatedField  = 'updated_at';
	
	
	
	
}