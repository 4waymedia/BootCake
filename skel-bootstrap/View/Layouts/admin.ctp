<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta(array("name"=>"viewport","content"=>"width=device-width,  initial-scale=1.0"));
		echo $this->Html->meta('icon');
		
		echo $this->Html->css('bootstrap.2.3.1');
		echo $this->Html->css('bootstrap-responsive');
		// docs.css is only for this exapmple, remove for app dev
		echo $this->Html->css('theme');
		echo $this->Html->css('colors');
		echo $this->fetch('meta');
		echo $this->fetch('css');	
		
		echo $this->Html->script('jquery.1.9.1.min');
		echo $this->Html->script('bootstrap.2.3.1.min');
		echo $this->Html->script('modernizr.protelligence');
		echo $this->Html->script('application');
		echo $this->fetch('script');
	?>
	
</head>
<body id="blue" data-spy="scroll" data-target=".subnav" data-offset="50">

<?php // create header with menu
    echo $this->Html->tag( 
        'header', 
        $this->element('menu/default'),
        //$this->fetch('main-menu'),
        array( 'id'=>'cakeMenu', 'class'=>'container' )
    );
?>

<?php // create container for flash messages
    if($this->session->check('Message.flash')){
        echo $this->Html->tag( 
            'div', 
            $this->Session->flash(),
            array( 'id'=>'cakeFlash', 'class'=>'container' )
        );
    }
?>
<div class="container">
    <div class="row-fluid cake-page">
<?php
    // admin_sidebar has sidebar BLOCK for appending
    echo $this->Html->tag( 
        'div', 
        $this->element('menu/admin_sidebar'),
        array( 'id'=>'cakeContent', 'class'=>'span3 well' )
    );

    // create sidebar block *** well sidebar-nav ***
        echo $this->Html->tag( 
            'div', 
            $this->fetch('content'),
            array( 'id'=>'cakeContent', 'class'=>'span9' )
        );
    ?>
    <? // populate sidebar with defaults ?>

</div>
	
	<footer class="navbar-inner">
		<div class="container">
			<div class="row-fluid">
				&copy; <?php 
				$copyYear = 2009; 
				$curYear = date('Y'); 
				echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
				?> 4waytours
			</div>
		</div>
	</footer><!-- /container -->
	<?php echo $this->Html->script('jquery.tablesorter.js');?>
	<?php echo $this->element('sql_dump'); ?>

</body>
</html>
