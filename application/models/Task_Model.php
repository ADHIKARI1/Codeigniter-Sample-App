<?php 

/**
* 
*/
class Task_Model extends CI_Model
{
	public function get_task($id)
	{
		$this->db->where(['id' => $id]);
		$query = $this->db->get('tasks');
		return $query->row();
	}

	public function get_task_status($id)
	{
		$this->db->where(['id' => $id]);
		$query = $this->db->get('tasks');
		return $query->row()->status;
	}

	public function create_task($data)
	{
		$result = $this->db->insert('tasks', $data);
		return $result;
	}

	public function edit_task($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tasks', $data);
		return true;
	}

	public function delete_task($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tasks');
		return true;
	}

	public function mark_task($task_id, $status = false)
	{
		$this->db->where('id', $task_id);

		if($status)
			$this->db->set('status', 0);
		else
			$this->db->set('status', 1);

		$this->db->update('tasks');

		return true;

	}

	public function get_user_tasks($user_id)
	{
		$this->db->where(['project_user_id' => $user_id]);
		$this->db->join('tasks', 'projects.id = tasks.project_id');
		$query = $this->db->get('projects');
		return $query->result();
	}
	
	
}

 ?>