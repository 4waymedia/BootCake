<ul class="nav nav-list">
    <li class="heading"><div class="input-append">
      	<input class="span12" id="prependedInput" type="text" placeholder="DRE# or SLUG">
        <span class="add-on"><i class="icon-search"></i></span></div>
    </li>
      
    <li class="hasSubmenu">
        <a data-toggle="collapse" class="" href="#menu_dashboards"><i class="icon-home"></i><span>TOGGLE</span></a>
      	<ul class="collapse" id="menu_dashboards">
      		<li class=""><a href="/users/dashboard"><span>User Dashboard</span></a></li>
      		<li class=""><a href="/admin/dashboard"><span>Admin</span></a></li>
      	</ul>
    </li>
    
    <li><a href="">Link 1</a></li>
    <li><a href="">Link 2</a></li>
    <li><a href="">Link 3</a></li>
</ul>

<?php echo $this->fetch('navigation'); ?>