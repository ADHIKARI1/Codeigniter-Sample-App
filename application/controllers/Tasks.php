<?php 
/**
* 
*/
class Tasks extends CI_Controller
{
	public function display($id)
	{
		$data['task'] = $this->Task_Model->get_task($id);
		$data['project'] = $this->Project_Model->get_project($data['task']->project_id);
		$data['main_view'] = "tasks/display";
		$this->load->view('layout/main', $data);
	}

	public function create($pro_id)
	{
		$this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
		$this->form_validation->set_rules('task_body', 'Task Description', 'trim|required');

		if ($this->form_validation->run() == false){			
			$data['main_view'] = "tasks/create_task";
			$this->load->view('layout/main', $data);
		}
		else
		{
			$data = array(
				'project_id' => $pro_id,
				'task_name' => $this->input->post('task_name'),
				'task_body' => $this->input->post('task_body'),
				'due_date' => $this->input->post('due_date')
				);

			if ($this->Task_Model->create_task($data)) {
				$this->session->set_flashdata('task_success', 'You have successfully created!');
				/*$data['main_view'] = "tasks/create_task";
				$this->load->view('layout/main', $data);*/
				redirect('projects/index');
			}
			else
			{
				$this->session->set_flashdata('create_failed', 'Failed to create the project!');
				redirect('tasks/index');
			}

		}
	}

	public function edit($task_id)
	{
		$this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
		$this->form_validation->set_rules('task_body', 'Task Description', 'trim|required');

		if ($this->form_validation->run() == false){
			$data['task_data'] = $this->Task_Model->get_task($task_id);
			$data['main_view'] = "tasks/edit_task";
			$this->load->view('layout/main', $data);
		}
		else
		{
			$data = array(
				//'project_id' => $pro_id,
				'task_name' => $this->input->post('task_name'),
				'task_body' => $this->input->post('task_body'),
				'due_date' => $this->input->post('due_date')
				);

			if ($this->Task_Model->edit_task($data, $task_id)) {
				$this->session->set_flashdata('task_success', 'You have successfully updated!');
				/*$data['main_view'] = "tasks/edit_task";
				$this->load->view('layout/main', $data);*/
				redirect('projects/index');
			}
			else
			{
				$this->session->set_flashdata('create_failed', 'Failed to update the project!');
				redirect('projects/index');
			}

		}
	}

	public function delete($id, $p_id)
	{
		$this->Task_Model->delete_task($id);
		$this->session->set_flashdata('delete_success', 'You have successfully Deleted!');
		redirect("projects/display/".$p_id);
	}

	public function mark($task_id, $project_id)
	{
		$task['status'] = $this->Task_Model->get_task_status($task_id);
		$task['status'] =  !$task['status'];
		

		if($task['status']  == 0){
			if($this->Task_Model->mark_task($task_id, true))
			$this->session->set_flashdata('success', 'You have successfully marked task!');
			redirect("projects/display/".$project_id);
			
		}else{
			if($this->Task_Model->mark_task($task_id, false))
			$this->session->set_flashdata('success', 'You have successfully marked task!');
			redirect("projects/display/".$project_id);

			
		}
			
		
			

		
	}

	

	
}

 ?>