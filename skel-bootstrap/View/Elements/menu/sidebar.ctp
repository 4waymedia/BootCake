<ul class="nav nav-list bs-docs-sidenav">
	<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
    <li class="divider"></li>
	<li><?php echo $this->Html->link(__('Add Users'), array('action' => 'add')); ?></li>
	<li><?php echo $this->Html->link(__(' Users'), array('action' => 'index')); ?></li>
</ul>

<?php echo $this->fetch('sidebar'); ?>