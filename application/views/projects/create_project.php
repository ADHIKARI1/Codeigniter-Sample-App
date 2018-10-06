

<h2>Create Project</h2>

<?php $attributes = array('id'=>'project_form', 'class'=>'form-horizontal') ?>

<!-- <?php if($this->session->flashdata('errors')): ?>
	<?php echo $this->session->flashdata('errors'); ?>
<?php endif; ?> -->

<?php echo validation_errors("<p class='bg-danger'>"); ?>
	
<?php echo form_open('projects/create', $attributes); ?>
<div class="form-group">
<?php echo form_label('Project Name'); ?>
<?php $data = array(
	'class' => 'form-control',
	'name' => 'project_name',
	'placeholder' => 'Enter Project Title'
); ?>
<?php echo form_input($data); ?>
</div>
<div class="form-group">
<?php echo form_label('Project Description'); ?>
<?php $data = array(
	'class' => 'form-control',
	'name' => 'project_body',
	'placeholder' => 'Enter Description'
); ?>
<?php echo form_textarea($data); ?>
</div>
<div class="form-group">
<?php $data = array(
	'class' => 'btn btn-primary',
	'name' => 'submit',
	'value' => 'Create'
); ?>
<?php echo form_submit($data); ?>
</div>

<?php echo form_close(); ?>
