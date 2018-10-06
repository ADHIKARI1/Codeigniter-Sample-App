<p class="bg-success">
	<?php if($this->session->flashdata('login_success')): ?>
		<?php echo $this->session->flashdata('login_success'); ?>
	<?php endif; ?>
</p>
<p class="bg-danger">
	<?php if($this->session->flashdata('login_failed')): ?>
		<?php echo $this->session->flashdata('login_failed'); ?>
	<?php endif; ?>
</p>
<p class="bg-warning">
	<?php if($this->session->flashdata('no_access')): ?>
		<?php echo $this->session->flashdata('no_access'); ?>
	<?php endif; ?>
</p>


<?php if($this->session->userdata('logged_in')): ?>
<h1>Hi <?php echo $this->session->userdata('username'); ?></h1>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Project Name</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($project_data as $project): ?>
		<tr>			
			<td><?php echo $project->project_name ?></td>
			<td><?php echo $project->project_body ?></td>
			<td><a href="<?php echo base_url(); ?>projects/display/<?php echo $project->id; ?>">View</a></td>						
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php if(isset($tasks)): ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Task Name</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($tasks as $task): ?>
		<tr>			
			<td><?php echo $task->task_name ?></td>
			<td><?php echo $task->task_body ?></td>
			<td><a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->id; ?>">View</a></td>						
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>

<?php else: ?>
	<div class="jumbotron">
		<h1 class="text-center">Welcome to Project APP</h1>
	</div>
<?php endif; ?>

