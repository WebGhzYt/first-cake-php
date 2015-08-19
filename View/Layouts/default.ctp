<?php
	$cakeDescription = "Example_Cake_PhP";
	$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
	
    /*echo $this->Html->css('/Jmenu/css/jquery/plugins/jquery/jquery.min');
    echo $this->Html->css('/Jmenu/css/jquery/plugins/jmenu/jmenu');
    echo $this->Html->script('/Jmenu/js/jquery/jquery.min');
    echo $this->Html->script('/Jmenu/js/jquery/plugins/jmenu/jMenu.jquery.min');
    echo $this->Html->script('/Jmenu/js/jquery/plugins/jquery-ui/jquery-ui.min');*/

?>

<!DOCTYPE html>
<html>
<head>
	
	<?php //echo $this->Html->css('bootstrap.min.css');?>
	<?php //echo $this->Html->script("jquery-1.10.2.min"); ?>
	
	<?php
		echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css\">\n"; 
		echo "	<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>\n"; 
		echo "	<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js\"></script>\n"; 
		echo "	\n";
	?>
	<?php echo $this->Html->script("custom.js"); ?>
	
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
					//echo $this->Html->link('Notice', '#', array('id' => 'notice_btn','class' => 'btn btn-warning active'));					
				?>	
				
				<?php
					echo "<button type=\"button\" class=\"btn btn-warning active\" data-toggle=\"modal\" data-target=\"#myModal\">Notice Board</button>\n";
				?>
				<?php 						
					foreach ($menus_header as $menu): ?>
					<td><?php echo $this->Html->link($menu['Menu']['name'], array('controller' => $menu['Menu']['controller'], 'action' => $menu['Menu']['action'] ,'full_base'=>false), array('class' => 'btn btn-warning'));
				?>						
					</td>							
					<?php endforeach ?>	
					
				<?php unset($menu); ?>
				<?php
					if($this->Session->check('Auth.User')){
						echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-warning'));
					}else{
						echo $this->Html->link('Signup', array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-warning'));
						echo " ";
						
						echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-warning'));
						
						echo "<button type=\"button\" class=\"btn btn-info btn-lg\" data-toggle=\"modal\" data-target=\"#myModalSignin\">Signup Modal</button>\n";
						
						
						echo "<button type=\"button\" class=\"btn btn-info btn-lg\" data-toggle=\"modal\" data-target=\"#myModalLogin\">Login Modal</button>\n";

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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Notice Board</h4>
      </div>
      <div class="modal-body">
        <h3>Share Files and Photos.</h3>
		<h3>Fully customizable</h3>
		<h3>No programming or software required</h3>
		<h3>No branding</h3>
		<h3>Inexpensive Website Design</h3>
      </div>
      <div class="modal-footer">
	  Rohit Jain
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- Login Modal -->
<div id="myModalLogin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login Model</h4>
      </div>
      <div class="modal-body">
        Login data
      </div>
      <div class="modal-footer">
	  Rohit Jain
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- Login Modal -->
<div id="myModalSignin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Signup Model</h4>
      </div>
      <div class="modal-body">
        Signup data
      </div>
      <div class="modal-footer">
	  Rohit Jain
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


