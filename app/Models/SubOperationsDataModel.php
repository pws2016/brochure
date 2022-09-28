<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class SubOperationsDataModel extends Model
{
	
    protected $table = 'sub_operations_data';
	protected $primaryKey = 'id';
    protected $allowedFields = ['id_partner','date','sede','sub_op',];
	protected $useSoftDeletes = true;
	protected $returnType = 'array';
	protected $useTimestamps = true;
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';
	
	
	
	
}