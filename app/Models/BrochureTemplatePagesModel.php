<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class BrochureTemplatePagesModel extends Model
{
	
    protected $table = 'brochure_template_pages';
	protected $primaryKey = 'id';
    protected $allowedFields = ['template_id', 'title','html','ord','type','item_html'];
	protected $returnType = 'array';

	
	
	
}