<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class BitemModel extends Model
{
	
    protected $table = 'b_items';
	protected $primaryKey = 'id';
    protected $allowedFields = ['id_brochure', 'id_item','type_item'];
	// protected $returnType = 'array';

	
	
	
}