<?php 

/**
* 
*/
class User_Model extends CI_Model
{
	public function login_user($username, $password)
	{

		$this->db->where('username', $username);
		//$this->db->where('password', $password);
		$result = $this->db->get('users');
		$db_pass = $result->row(2)->password;
		if(password_verify($password, $db_pass))
			return $result->row(0)->id;
		else
			return false;
	}

	public function get_users($id, $username)
	{
		$this->db->where([
			'id'=>$id,
			'username' => $username
			]);
		//$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->result();

		//$query = $this->db->query("SELECT * FROM users");
		//return $query->num_fields();
		//return $query->num_rows(); helper functions

		/*$query = $this->db->get('users');
		return $query->result();*/


		/*manually how connect
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';waawawdd
		$config['database'] = 'ci_db';

		$connection = $this->load->database($config);

		$config_2['hostname'] = 'localhost';
		$config_2['username'] = 'root';
		$config_2['password'] = '';
		$config_2['database'] = 'ci_db';

		$connection = $this->load->database($config_2);*/
	}
	public function create_user()
	{
		$options = ['cost' => 12];
		$encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
		$user_data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'password' => $encripted_pass
					);
		$data = $this->db->insert('users', $user_data);
		return $data;

	}

	public function create_users($data)
	{
		$this->db->insert('users', $data);
	}

	public function update_users($data, $id)
	{
		$this->db->where(['id'=> $id]);
		$this->db->update('users', $data);
	}

	public function delete_users($id)
	{
		$this->db->where(['id'=> $id]);
		$this->db->delete('users');
	}
	
}
 ?>