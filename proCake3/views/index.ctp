<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

// excluded fields
$ar = array('created', 'modified', 'id');

?>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-1">

<?php echo "<?php echo \$this->start('actions'); ?>\n"; ?>

<ul class="nav nav-list">
	<li class="divider"></li>
	<?php echo "<li><?php echo \$this->Html->link(__('New " . $singularHumanName . "'), array('action' => 'add'), array('class' => '')); ?></li>\n"; ?>
	<?php
		$done = array();
		foreach ($associations as $type => $data) {
			foreach ($data as $alias => $details) {
				if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
					echo "\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index'), array('class' => '')); ?></li>\n";
					echo "\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class' => '')); ?></li>\n";
					$done[] = $details['controller'];
				}
			}
		}
	?>
</ul><!-- .nav nav-list bs-docs-sidenav -->
<?php echo "<?php echo \$this->end(); ?>\n"; ?>
	</div>
</div>

<div id="page-container" class="row actions">

	<div id="page-content" class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-1">

		<div class="<?php echo $pluralVar; ?> index">
		
			<h2 class="page-header"><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
			
			<table class="table table-striped table-bordered">
				<tr>
<?php  foreach ($fields as $field): ?>
<?php if (!in_array($field, $ar)): ?>
				<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
<?php endif; ?>
<?php endforeach; ?>
				<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
			</tr>
<?php
$ar = array('created', 'modified', 'id');
		echo "<?php
		foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
		echo "\t<tr>\n";
			foreach ($fields as $field) {
			if (!in_array($field, $ar)){
				$isKey = false;
				if (!empty($associations['belongsTo'])) {
					foreach ($associations['belongsTo'] as $alias => $details) {
						if ($field === $details['foreignKey'] && !in_array($field, $ar) ) {
							$isKey = true;
							if (!in_array($field, $ar)):
							echo "\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></td>\n";
							endif; 
							break;
						}
					}
				}
				if ($isKey !== true) {
					if (!in_array($field, $ar)):
					echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
					endif;
				}
			}
			}
		
			echo "\t\t<td class=\"actions\">\n";
			echo "\t\t<?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-mini')); ?>\n";
			echo "\t\t<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-mini')); ?>\n";
			echo "\t\t<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
			echo "\t\t</td>\n";
		echo "\t</tr>\n";
		
		echo "\t<?php endforeach; ?>\n";
		?>
</table>
<p><small>
<?php echo "<?php echo \$this->Paginator->counter(array(
'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
));
?>"; ?>
</small></p>

	<div class="row">
		<ul class="pagination pagination-large">
<?php
	echo "<?php\n";
	echo "\t\techo \$this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));\n";
	echo "\t\techo \$this->Paginator->numbers(array('separator' => '</li><li>', 'currentClass' => 'disabled', 'before' => '<li>', 'after' => '</li>'));\n";
	echo "\t\techo \$this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));\n";
	echo "\t?>\n";
?>
		</ul>
	</div><!-- .pagination -->
	
		</div><!-- .index -->
	
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
