<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class BtemplateModel extends Model
{
	
    protected $table = 'b_template';
	protected $primaryKey = 'id';
    protected $allowedFields = ['id_brochure', 'page_id','ord'];
	// protected $returnType = 'array';

	
	
	
}