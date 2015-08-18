<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
    <title>Administrator | <?php echo $title_for_layout; ?></title>
    <?php
        echo $this->fetch('meta');
        echo $this->Html->css(array('admin'));
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>
    <div id="container">
        <div id="header">
            <div class="logo">			
				<?php	
					if($this->Session->check('Auth.User')){
					echo $this->Html->link(
						$this->Html->image('admin-logo.jpg',array('alt'=>'advertisement', 'height'=>'2%','width'=>'4%')),'/admin/users/dashboard', array('escape' => false));
					} else
					{
					echo $this->Html->link(
						$this->Html->image('admin-logo.jpg',array('alt'=>'advertisement', 'height'=>'2%','width'=>'4%')),'/admin/users/login', array('escape' => false));
					}
				?>
				<?php												
					echo $this->Html->link(
						$this->Html->image('Cake-logo.png',array('alt'=>'advertisement', 'height'=>'2%','width'=>'4%')), '/', array('escape' => false));
					
				?>
			</div>
            <div class="clear"><?php unset($menu); ?>
				<?php
					if($this->Session->check('Auth.User')){
						echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));
					}else{
						//echo $this->Html->link('Signup', array('controller' => 'users', 'action' => 'add'));
						//echo " ";
						//echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'));
					}
				?></div>
        </div>
        <div id="content-wrapper">
            <?php echo $this->fetch('content'); ?>
        </div>
 
        <div id="footer">
            © <?php echo date("Y");?> - All rights          
    </div>
             <?php echo $this->element('sql_dump'); ?>    
    </div>
 
</body>
</html>