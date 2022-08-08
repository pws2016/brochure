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


	public function get_entries()
	{
			$query = $this->db->get('package');
			
				return $query->result();
			
	}
	public function insert_entry($data)
	{
		return $this->db->insert('package', $data);
	}

	public function delete_entry($id){
		return $this->db->delete('package', array('id' => $id));
	}

	public function edit_entry($id){
		$this->db->select("*");
		$this->db->from("package");
		$this->db->where("id", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	public function update_entry($data)
	{
		return $this->db->update('package', $data, array('id' => $data['id']));
	}
	
}