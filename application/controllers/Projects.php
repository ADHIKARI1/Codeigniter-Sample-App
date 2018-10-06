
<?php 
/**
* 
*/
class Projects extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('no_access', 'Please logging to access');
			redirect('home/index');
		}
	}
	
	

	public function index()
	{
		$data['projects'] = $this->Project_Model->get_projects();
		$data['main_view'] = "projects/index";
		$this->load->view('layout/main', $data);
	}

	public function display($id)
	{
		$data['project_data'] = $this->Project_Model->get_project($id);
		$data['tasks_c'] = $this->Project_Model->project_tasks($id, true);
		$data['tasks_a'] = $this->Project_Model->project_tasks($id, false);
		if(!$data['project_data'])
			redirect('Projects/index');
		$data['main_view'] = "projects/display";
		$this->load->view('layout/main', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('project_name', 'Project Name', 'trim|required');
		$this->form_validation->set_rules('project_body', 'Project Description', 'trim|required');

		if ($this->form_validation->run() == false){

			$data['main_view'] = "projects/create_project";
			$this->load->view('layout/main', $data);
		}
		else
		{
			$data = array(
				'project_user_id' => $this->session->userdata('user_id'),
				'project_name' => $this->input->post('project_name'),
				'project_body' => $this->input->post('project_body')
				);

			if ($this->Project_Model->create_project($data)) {
				$this->session->set_flashdata('create_success', 'You have successfully created!');
				/*$data['main_view'] = "projects/create_project";
				$this->load->view('layout/main', $data);*/
				redirect('projects/index');
			}
			else
			{
				$this->session->set_flashdata('create_failed', 'Failed to create the project!');
				redirect('projects/index');
			}

		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('project_name', 'Project Name', 'trim|required');
		$this->form_validation->set_rules('project_body', 'Project Description', 'trim|required');


		if ($this->form_validation->run() == false){

			$data['project_data'] = $this->Project_Model->get_project($id);
			$data['main_view'] = "projects/edit_project";
			$this->load->view('layout/main', $data);
		}
		else
		{
			
			$data = array(				
				'project_user_id' => $this->session->userdata('user_id'),
				'project_name' => $this->input->post('project_name'),
				'project_body' => $this->input->post('project_body')
				);			

			if ($this->Project_Model->edit_project($data, $id)) {
				$this->session->set_flashdata('edit_success', 'You have successfully updated!');
				redirect('projects/index');
			}
			else
			{
				$this->session->set_flashdata('edit_failed', 'Failed to update the project!');
				redirect("projects/index");
			}

		}
	}

	public function delete($id)
	{
		$this->Project_Model->delete_project($id);
		$this->Project_Model->delete_project_tasks($id);
		$this->session->set_flashdata('delete_success', 'You have successfully Deleted!');
		redirect("projects/index");
	}


}

 ?>