<h2>Tasks for <?php echo $project->project_name; ?></h2>


<table class="table table-hover">
	<thead>
		<tr>
			<th>Task Name</th>
			<th>Description</th>
			<th>Date</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>		
		<tr>
			<td>
				<div><big><?php echo $task->task_name; ?></big></div>
				<div>
					<a href="<?php echo base_url(); ?>tasks/edit/<?php echo $task->id; ?>">Edit</a>
					<a href="<?php echo base_url(); ?>tasks/delete/<?php echo $task->id; ?>/<?php echo $task->project_id; ?>">Delete</a>
				</div>				
			</td>
			<td><?php echo $task->task_body; ?></td>
			<td><?php echo $task->date_created; ?></td>	
			<td><a class="btn btn-primary" href="<?php echo base_url(); ?>tasks/mark/<?php echo $task->id; ?>/<?php echo $task->project_id; ?>">
				<?php if($task->status == 0): ?>
					Pending
				<?php else: ?>					
					Complete
				<?php endif; ?>
			</a></td>							
		</tr>	
	</tbody>
</table>