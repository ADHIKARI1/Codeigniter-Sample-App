<?php 

class Users extends CI_Controller
{	
	public function register()
	{
		
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');

		if ($this->form_validation->run() == false) {
			/*$data = array(
				'errors' => validation_errors()
				);
			$this->session->set_flashdata($data);*/

			$data['main_view'] = "users/register_view";
			$this->load->view('layout/main', $data);
			
		}
		else
		{				
				
				if($this->User_Model->create_user()){
					$this->session->set_flashdata('registration_success', 'You have registered successfully');					

					$data['main_view'] = "users/register_view";
					$this->load->view('layout/main', $data);
				}
				else
				{
					$this->session->set_flashdata('registration_failed', 'You are not registerd');
					redirect('home/index');
				}
				
			
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home/index');
	}
	
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		
		//echo $this->input->post('username');

		if ($this->form_validation->run() == false) {
			$data = array(
				'errors' => validation_errors()
				);
			$this->session->set_flashdata($data);
			redirect('home');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user_id = $this->User_Model->login_user($username, $password);
			if ($user_id) {
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true
					);
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('login_success', 'You are now logged in');
				redirect('home/index');

				/*$data['main_view'] = "admin_view";
				$this->load->view('layout/main', $data);*/
			}
			else
			{
				$this->session->set_flashdata('login_failed', 'You are not logged in');
				redirect('home/index');
			}
		}
	}

	/*public function show($id)
	{
		//http://localhost/ci/index.php/users/show
		//$this->load->model('User_Model');	

		$data['users'] =  $this->User_Model->get_users($id, 'admin');
		

		$this->load->view('user_view', $data);
	}

	public function insert()
	{
		$username = "peter";
		$password = "123456";

		$this->User_Model->create_users([
			'username' => $username,
			'password' => $password
			]);
	}

	public function update($id)
	{
		$username = "sunny";
		$password = "abcd";

		$this->User_Model->update_users([
			'username' => $username,
			'password' => $password
			], $id);
	}

	public function delete($id)
	{		
		$this->User_Model->delete_users($id);
	}*/
}
 ?>