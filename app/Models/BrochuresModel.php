<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class BrochuresModel extends Model
{
	
    protected $table = 'brochures';
	protected $primaryKey = 'id';
    protected $allowedFields = [
		'user_id','template_id', 'title','html',
		'background','logo',
		'status','step',
		'title_couverture','subtitle_couverture',
		'title_operation','description_operation',
	'title_contacts','description_contacts',
	'title_partners','description_partners',
	'title_intro','description_intro',
	'title_premi','description_premi',
	'title_product','description_product','id_category'
	
	];
	protected $useSoftDeletes = true;
	protected $returnType = 'array';
	protected $useTimestamps = true;
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';
	
	
	
	
}