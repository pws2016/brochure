<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class PremiModel extends Model
{
	
    protected $table = 'premi';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'name','description','image','enable','ids_category','ord'];
	// protected $useSoftDeletes = true;
	// protected $returnType = 'array';
	// protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
	// protected $deletedField  = 'deleted_at';
	// protected $updatedField  = 'updated_at';
	
	
	
	
}