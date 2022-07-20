<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class PartnersModel extends Model
{
	
    protected $table = 'contacts';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'name','email','image', 'address','phone','fax'];
	protected $useSoftDeletes = true;
	protected $returnType = 'array';
	protected $useTimestamps = true;
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';
	
	
	
	
}