<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class BrochuresModel extends Model
{
	
    protected $table = 'brochures';
	protected $primaryKey = 'id';
    protected $allowedFields = [
 
	'title','html',
	'status','step',
	'background','logo',
	'user_id','template_id',
	'title_intro','description_intro',
	'title_premi','description_premi',
	'title_contacts','description_contacts',
	'title_partners','description_partners',
	'title_couverture','subtitle_couverture',
	'title_operation','description_operation',
	'title_product','description_product','id_category',
	'phone','email','siteweb',
	'facebook','twitter',
	'linkedin','instagram',
	'image_intro','image_operation',
	];
	protected $useSoftDeletes = true;
	protected $returnType = 'array';
	protected $useTimestamps = true;
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';
	
	public function getname() {

		$db = \Config\Database::connect();
	
		$builder = $db->table('brochures');
		$builder->select('brochures.*','category.title');
		$builder->where('brochures.deleted_at is NULL');
		$builder->join('category', 'category.user_id = brochures.id');
		$query = $builder->get()->getResultArray();
		return ($query);
	
	}
	
	
}