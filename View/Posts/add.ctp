<h1>Add Post</h1>


<?php
	//print_r($categories);exit();
?>
<?php
	echo $this->Form->create('Post');
	echo $this->Form->input('title');
	echo $this->Form->input('body', array('rows' => '3'));		
	echo $this->Form->input('category_id',array('value'=> $categories ));
	echo $this->Form->hidden('user_id',array('value'=> $current_user['id']));
	echo $this->Form->end('Save Post');
?>