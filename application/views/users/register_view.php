

<h2>Register</h2>
<p class="bg-success">
	<?php if($this->session->flashdata('registration_success')): ?>
		<?php echo $this->session->flashdata('registration_success'); ?>
	<?php endif; ?>
</p>
<p class="bg-danger">
	<?php if($this->session->flashdata('registration_failed')): ?>
		<?php echo $this->session->flashdata('registration_failed'); ?>
	<?php endif; ?>
</p>
<?php $attributes = array('id'=>'register_form', 'class'=>'form-horizontal') ?>

<!-- <?php if($this->session->flashdata('errors')): ?>
	<?php echo $this->session->flashdata('errors'); ?>
<?php endif; ?> -->

<?php echo validation_errors("<p class='bg-danger'>"); ?>
	
<?php echo form_open('users/register', $attributes); ?>
<div class="form-group">
<?php echo form_label('First Name'); ?>
<?php $data = array(
	'class' => 'form-control',
	'name' => 'first_name',
	'placeholder' => 'Enter First Name'
); ?>
<?php echo form_input($data); ?>
</div>
<div class="form-group">
<?php echo form_label('Last Name'); ?>
<?php $data = array(
	'class' => 'form-control',
	'name' => 'last_name',
	'placeholder' => 'Enter Last Name'
); ?>
<?php echo form_input($data); ?>
</div>
<div class="form-group">
<?php echo form_label('Email'); ?>
<?php $data = array(
	'class' => 'form-control',
	'name' => 'email',
	'placeholder' => 'Enter E-Mail'
); ?>
<?php echo form_input($data); ?>
</div>
<div class="form-group">
<?php echo form_label('Username'); ?>
<?php $data = array(
	'class' => 'form-control',
	'name' => 'username',
	'placeholder' => 'Enter Username'
); ?>
<?php echo form_input($data); ?>
</div>
<div class="form-group">
<?php echo form_label('Password'); ?>
<?php $data = array(	
	'class' => 'form-control',
	'name' => 'password',
	'placeholder' => 'Enter Password'
); ?>
<?php echo form_password($data); ?>
</div>
<div class="form-group">
<?php echo form_label('Confirm Password'); ?>
<?php $data = array(	
	'class' => 'form-control',
	'name' => 'confirm_password',
	'placeholder' => 'Confirm Password'
); ?>
<?php echo form_password($data); ?>
</div>
<div class="form-group">
<?php $data = array(
	'class' => 'btn btn-primary',
	'name' => 'submit',
	'value' => 'Register'
); ?>
<?php echo form_submit($data); ?>
</div>

<?php echo form_close(); ?>
