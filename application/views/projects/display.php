<p class="bg-success">
	<?php if($this->session->flashdata('success')): ?>
		<?php echo $this->session->flashdata('success'); ?>
	<?php endif; ?>
</p>
<p class="bg-danger">
	<?php if($this->session->flashdata('falied')): ?>
		<?php echo $this->session->flashdata('failed'); ?>
	<?php endif; ?>
</p>
<div class="row">
<div class="col-sm-9 ">
	<div class="row">
		<?php if(isset($project_data)): ?>
		<div class="col-sm-9 ">
			<h1>PROJECT: <?php echo $project_data->project_name; ?></h1>
			<small>POSTED: <?php echo $project_data->date_created; ?></small>
			<h4>DESCRIPION: </h4>
			<p><?php echo $project_data->project_body; ?></p>
		</div>
	<?php endif; ?>
	</div>
	<div class="row">
	<div class="col-sm-9 ">
<h3>Active Tasks</h3>
<?php if($tasks_a): ?>	
	<ul class="list">
		<?php foreach($tasks_a as $task): ?>					
			<li><a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->task_id; ?>"><?php echo $task->task_name; ?></a></li>			
		<?php endforeach; ?>
	</ul>
<?php else: ?>
	<p>You have no tasks pending</p>
<?php endif; ?>

<h3>Tasks Completed</h3>
<?php if($tasks_c): ?>	
	<ul class="list">
		<?php foreach($tasks_c as $task): ?>					
			<li><a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->task_id; ?>"><?php echo $task->task_name; ?></a></li>			
		<?php endforeach; ?>
	</ul>
<?php else: ?>
	<p>You have no tasks pending</p>
<?php endif; ?>
	</div>
	</div>
	</div>

<div class="col-sm-3 float-right">
<h4>Project Actions</h4>
<ul class="list-group">
	<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/create/<?php echo $project_data->id; ?>">Create Task</a></li>	
	<li class="list-group-item"><a href="<?php echo base_url(); ?>projects/edit/<?php echo $project_data->id; ?>">Edit Project</a></li>	
	<li class="list-group-item"><a href="<?php echo base_url(); ?>projects/delete/<?php echo $project_data->id; ?>">Delete Project</a></li>	
</ul>
</div>
</div>