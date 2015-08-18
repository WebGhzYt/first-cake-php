<h1>Dashboard</h1>
<h1>Welcome to the Admin Panel</h1>
<?php 
	if($this->Session->check('Auth.User')){
		echo "<br>".$this->Html->link( "Dashboard",   array('controller'=>'users','action'=>'dashboard') ); 
		echo "<br>".$this->Html->link( "Users",   array('controller'=>'users','action'=>'admin_index') ); 
		echo "<br>";
		echo "".$this->Html->link( "Posts",   array('controller'=>'posts','action'=>'index') ); 		
		echo "<br><br>".$this->Html->link( "Contacts",   array('plugin' => 'contact_manager','controller'=>'contacts','action'=>'index') ); 
		echo "<br><br>".$this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') ); 
		
	}else{
		echo "<br>".$this->Html->link( "Return to Login Screen",   array('controller'=>'users','action'=>'login') ); 
	}
?>