<h2>Projects</h2>
<p class="bg-success">
	<?php if($this->session->flashdata('create_success')): ?>
		<?php echo $this->session->flashdata('create_success'); ?>
	<?php endif; ?>
</p>
<p class="bg-danger">
	<?php if($this->session->flashdata('create_falied')): ?>
		<?php echo $this->session->flashdata('create_failed'); ?>
	<?php endif; ?>
</p>
<p class="bg-success">
	<?php if($this->session->flashdata('edit_success')): ?>
		<?php echo $this->session->flashdata('edit_success'); ?>
	<?php endif; ?>
</p>
<p class="bg-danger">
	<?php if($this->session->flashdata('edit_failed')): ?>
		<?php echo $this->session->flashdata('edit_failed'); ?>
	<?php endif; ?>
</p>
<p class="bg-success">
	<?php if($this->session->flashdata('delete_success')): ?>
		<?php echo $this->session->flashdata('delete_success'); ?>
	<?php endif; ?>
</p>
<p class="bg-danger">
	<?php if($this->session->flashdata('task_failed')): ?>
		<?php echo $this->session->flashdata('task_failed'); ?>
	<?php endif; ?>
</p>
<p class="bg-success">
	<?php if($this->session->flashdata('task_success')): ?>
		<?php echo $this->session->flashdata('task_success'); ?>
	<?php endif; ?>
</p>

<a class="btn btn-primary float-right" href="<?php echo base_url(); ?>projects/create">Create Project</a>
<br>
<br>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Project Name</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($projects as $project): ?>
		<tr>
			
			<td><a href="<?php echo base_url(); ?>projects/display/<?php echo $project->id; ?>"><?php echo $project->project_name ?></a></td>
			<td><?php echo $project->project_body ?></td>	
			<td><a class="btn btn-danger" href="<?php echo base_url(); ?>projects/delete/<?php echo $project->id; ?>"><i class="fas fa-times-circle"></i></a></td>		
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>