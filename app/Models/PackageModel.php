<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class PackageModel extends Model
{
	
    protected $table = 'package';
	protected $primaryKey = 'id';
    protected $allowedFields = ['price','title','description','sorting','enable','nb_brochure','validity_months'];
	
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';
	
}