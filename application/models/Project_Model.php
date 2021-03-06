<?php /**
* 
*/
class Project_model extends CI_Model
{
	public function get_project($id)
	{
		$this->db->where(['id' => $id]);
		$query = $this->db->get('projects');

		if($query->num_rows()<1)
			return false;
		else
			return $query->row();

	}
	
	public function get_projects()
	{
		$query = $this->db->get('projects');
		return $query->result();

	}

	public function get_projects_by_user_id($user_id)
	{
		$this->db->where(['project_user_id' => $user_id]);
		$query = $this->db->get('projects');
		return $query->result();

	}

	public function create_project($data)
	{
		$result = $this->db->insert('projects', $data);
		return $result;
	}

	public function edit_project($data, $id)
	{
		$this->db->where(['id'=> $id]);
		$this->db->update('projects', $data);

		return true;
	}

	public function delete_project($id)
	{
		$this->db->where(['id'=> $id]);
		$this->db->delete('projects');

		return true;
	}

	public function delete_project_tasks($id)
	{
		$this->db->where(['project_id'=> $id]);
		$this->db->delete('tasks');

		return true;
	}

	public function project_tasks($id, $active = true)
	{
		$this->db->select('
			tasks.task_name,
			tasks.task_body,
			tasks.id as task_id,
			projects.project_name,
			projects.project_body
			');

		
		$this->db->from('tasks');
		$this->db->join('projects', 'projects.id = tasks.project_id');
		$this->db->where('tasks.project_id', $id);

		if($active == true)
			$this->db->where('tasks.status',0);
		else
			$this->db->where('tasks.status',1);

		$query = $this->db->get();
		if($query->num_rows() < 1)
			return false;
		else			
			return $query->result();
	}
	
} 
?>