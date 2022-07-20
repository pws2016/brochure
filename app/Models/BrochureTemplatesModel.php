<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class BrochureTemplatesModel extends Model
{
	
    protected $table = 'brochure_templates';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'title','html','background'];
	protected $useSoftDeletes = true;
	protected $returnType = 'array';
	protected $useTimestamps = true;
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';
	
	
	
	
}