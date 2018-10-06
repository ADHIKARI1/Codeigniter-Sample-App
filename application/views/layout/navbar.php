<nav class="navbar  navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="<?php echo base_url();?>">Codeigniter APP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>users/register">Rigister</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>projects">Projects</a>
      </li>        
    </ul>
    <ul class="navbar-nav ml-auto">
    <?php if($this->session->userdata('logged_in')): ?>      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
      </li> 
      <?php else: ?>  
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a>
      </li>    
    <?php endif; ?> 
    </ul>   
  </div>
</nav>