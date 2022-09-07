<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class OperationsModel extends Model
{
	
    protected $table = 'operations';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'name','description','enable','ids_category'];
	// protected $useSoftDeletes = true;
	// protected $returnType = 'array';
	// protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
	// protected $deletedField  = 'deleted_at';
	// protected $updatedField  = 'updated_at';
	
	
	
	
}