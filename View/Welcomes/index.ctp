<?php
	echo "Need to be login?"; 
	echo "<br> Click below to login";
	
	
	if($this->Session->check('Auth.User')){
		echo "<br>".$this->Html->link( "Return to Dashboard",   array('controller'=>'users','action'=>'index') ); 
		echo "<br>";
		echo "".$this->Html->link( "Posts",   array('controller'=>'posts','action'=>'index') ); 		
		echo "<br><br>".$this->Html->link( "My Contacts",   array('plugin' => 'contact_manager','controller'=>'contacts','action'=>'index') ); 
		echo "<br><br>".$this->Html->link( "Logout",   array('controller'=>'users','action'=>'logout') ); 
		
	}else{
		
		echo "<br><center>";	
		echo $this->Html->link(
						$this->Html->image('user-login.jpg',array('alt'=>'advertisement', 'height'=>'20%','width'=>'10%')), array('controller' => 'users', 'action' => 'login'), array('escape' => false));
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo $this->Html->link(
						$this->Html->image('admin-login.jpg',array('alt'=>'advertisement', 'height'=>'20%','width'=>'10%')), array('controller' => 'users', 'action' => 'admin_login'), array('escape' => false));
		echo "</center>";				
	}
?>