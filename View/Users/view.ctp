Id: <?php
	echo $user['User']['id']. "<br>Email: ";
	echo $user['User']['email']."<br>Image : ";	
	//$src = "/cakephp_example/img/uploads/users_images/" . $user['User']['image_url'];
	$file = WWW_ROOT . 'img/uploads/users_images/' . $user['User']['image_url'];		
	if (file_exists($file))
	{
		echo $this->Html->image("/img/uploads/users_images/" . $user['User']['image_url'], array('alt' => 'CakePHP'));	
	}
	else
	{
		echo $this->Html->image("/img/uploads/users_images/default.jpg", array('alt' => 'CakePHP'));	
	}
?>

