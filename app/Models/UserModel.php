<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UserModel extends Model
{


    protected $table = 'users';
	protected $primaryKey = 'id';
	protected $allowedFields = [
	'role', 
	'email',
	'password',
	'display_name',
	'active',
	'token',
	'mobile',
	'pass'];
	/*protected $useSoftDeletes = true;
	protected $returnType = 'array';
	protected $useTimestamps = true;
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';
	*/
  
  
  

	public function login($email,$password,$role='customer'){
		$db = \Config\Database::connect();
		$req="SELECT * FROM ".$this->table." where deleted_at IS NULL ";
		if(!is_null($role)) $req.=" and role='".$role."'";
		if(!is_null($email)) $req.=" and email='".$email."'";
		if(!is_null($password)) $req.=" and password='".md5($password)."'";
		$query = $db->query($req);
		$results = $query->getResultArray();
		return $results;
	}
	
	
	
	public function activate($id,$active,$token=null){
		$db = \Config\Database::connect();
		$req="update ".$this->table." set active='".$active."'";
		if(!is_null($token)) $req.=",token='".$token."'";
		$req.=" where id='".$id."'";
		$query = $db->query($req);
		return true;
	}

	public function getlogeduserdata($id){
		$data = $this->UserModel->find();
         $data->where('$uniid',$id);
		 $res= $data->get();
		 if (count($res->getResultArray()) == 1 ){
			return $res->getRow();
		}
			else
			{
				return false;
			}
var_dump('$data');
		 }



	}





