<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#"><?php echo SITE_NAME; ?></a>
        <?php echo $this->element('menu/user'); ?>
        <?php if ($this->params['prefix'] == 'admin') {echo $this->element('menu/admin');} ?>
        
        <?php //if ($this->params['prefix'] == 'manage') {echo $this->element('menu/manage');} ?>
        
        <div class="nav-collapse collapse" style="height: 0px;">
          <ul class="nav">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#tours">Tours</a></li>
            <li><a href="#order">Order</a></li>
          </ul>
        </div><!--/.nav-collapse -->
    	</div>
	</div>
</div>