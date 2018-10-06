
<?php 
/**
* 
*/
class Home extends CI_Controller
{
	
	

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$user_id = $this->session->userdata('user_id');
			$data['tasks'] = $this->Task_Model->get_user_tasks($user_id);
			$data['project_data'] =   $this->Project_Model->get_projects_by_user_id($user_id);
		}
		
		$data['main_view'] = "home_view";
		$this->load->view('layout/main', $data);
	}
}

 ?>