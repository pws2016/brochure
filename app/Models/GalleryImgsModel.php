<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class GalleryImgsModel extends Model
{
	
    protected $table = 'gallery_imgs';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'title','path'];
	protected $useSoftDeletes = true;
	protected $returnType = 'array';
	protected $useTimestamps = true;
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';
	
	
	
	
}