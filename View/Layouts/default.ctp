<?php
	$cakeDescription = "Example_Cake_PhP";
	$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
	
    echo $this->Html->css('/Jmenu/css/jquery/plugins/jquery/jquery.min');
    echo $this->Html->css('/Jmenu/css/jquery/plugins/jmenu/jmenu');
    echo $this->Html->script('/Jmenu/js/jquery/jquery.min');
    echo $this->Html->script('/Jmenu/js/jquery/plugins/jmenu/jMenu.jquery.min');
    echo $this->Html->script('/Jmenu/js/jquery/plugins/jquery-ui/jquery-ui.min');

?>


	

<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->css('bootstrap.min.css');?>
	<?php echo $this->Html->script('bootstrap.js');?>
	<?php echo $this->Html->script('bootstrap.min.js');?>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

	<?php if ($this->request->params['controller'] != 'contacts') {?>
		<div id="header"  class="navbar-header">
			<h3>	
				<?php												
					echo $this->Html->link(
						$this->Html->image('Cake-logo.png',array('alt'=>'advertisement', 'height'=>'2%','width'=>'4%')), array('controller' => 'welcomes', 'action' => 'index'), array('escape' => false));
					
				?>

				
					<?php 						
						foreach ($menus_header as $menu): ?>
						<td><?php echo $this->Html->link($menu['Menu']['name'], array('controller' => $menu['Menu']['controller'], 'action' => $menu['Menu']['action'] ,'full_base'=>false), array('class' => 'dropdown'));
					?>						
						</td>							
					<?php endforeach ?>	
					
				<?php unset($menu); ?>
				<?php
					if($this->Session->check('Auth.User')){
						echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));
					}else{
						echo $this->Html->link('Signup', array('controller' => 'users', 'action' => 'add'));
						echo " ";
						echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'));
					}
				?>
		
			</h3>		
		</div>
		<?php }
		else{
			echo $this->Html->link(
				$this->Html->image('Cake-logo.png',array('alt'=>'advertisement', 'height'=>'7%','width'=>'4%')), '/', array('escape' => false));			
		}
		?>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		
		<div id="footer">
			<?php
				echo $this->Facebook->share('http://firstass.heroku.com/');
			?>
		<?php if ($this->request->params['controller'] != 'contacts') {?>
			<h3>										
					<?php foreach ($menus_footer as $menu): ?>
						<td><?php echo $this->Html->link($menu['Menu']['name'], array('controller' => $menu['Menu']['controller'], 'action' => $menu['Menu']['action'])); ?>	</td>	
					
					<?php endforeach ?>	
					<?php unset($menu); ?>
			</h3>
			

		<?php }?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>

