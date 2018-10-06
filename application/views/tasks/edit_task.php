

<h2>edit Task</h2>

<?php $attributes = array('id'=>'task_form', 'class'=>'form-horizontal') ?>

<!-- <?php if($this->session->flashdata('errors')): ?>
	<?php echo $this->session->flashdata('errors'); ?>
<?php endif; ?> -->

<?php echo validation_errors("<p class='bg-danger'>"); ?>
<?php   $pro_id = $this->uri->segment(3, 0); ?>
<?php echo form_open('tasks/edit/'.$pro_id, $attributes); ?>
<div class="form-group">
<?php echo form_label('Task Name'); ?>
<?php $data = array(
	'class' => 'form-control',
	'name' => 'task_name',
	'value' => $task_data->task_name
); ?>
<?php echo form_input($data); ?>
</div>
<div class="form-group">
<?php echo form_label('Task Description'); ?>
<?php $data = array(
	'class' => 'form-control',
	'name' => 'task_body',
	'value' => $task_data->task_body
); ?>
<?php echo form_textarea($data); ?>
</div>
<div class="form-group">
<?php echo form_label('Task Due Date'); ?>
<?php $data = array(
	'class' => 'form-control',
	'name' => 'due_date',
	'type' => 'date',
	'value' => $task_data->due_date
	
); ?>
<?php echo form_input($data); ?>
</div>
<div class="form-group">
<?php $data = array(
	'class' => 'btn btn-primary',
	'name' => 'submit',
	'value' => 'Update'
); ?>
<?php echo form_submit($data); ?>
</div>

<?php echo form_close(); ?>
