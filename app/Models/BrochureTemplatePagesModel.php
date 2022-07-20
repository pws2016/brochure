<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class BrochureTemplatesModel extends Model
{
	
    protected $table = 'brochure_template_pages';
	protected $primaryKey = 'id';
    protected $allowedFields = ['template_id', 'title','html','ord'];
	protected $returnType = 'array';

	
	
	
}