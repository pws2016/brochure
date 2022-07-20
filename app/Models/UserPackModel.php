<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UserPackModel extends Model
{
	
    protected $table = 'user_pack';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'pack_id','nb_brochure','expired_at'];
	protected $useSoftDeletes = true;
	protected $returnType = 'array';
	protected $useTimestamps = true;
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';
	
	
	
	
}