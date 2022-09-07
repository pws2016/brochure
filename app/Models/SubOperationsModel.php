<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class SubOperationsModel extends Model
{
	
    protected $table = 'sub_operations';
	protected $primaryKey = 'id';
    protected $allowedFields = ['name','description','enable','id_op'];
	protected $useSoftDeletes = true;
	protected $returnType = 'array';
	protected $useTimestamps = true;
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';
	
	
	
	
}