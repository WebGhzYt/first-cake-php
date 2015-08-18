<!-- File: /app/View/Contacts/edit.ctp -->

<h1>Edit Contact</h1>
<?php
	echo $this->Form->create('Contact');
	echo $this->Form->input('name');
	echo $this->Form->input('mobile');
	echo $this->Form->hidden('user_id',array('value'=> $current_user['id']));
	echo $this->Form->end('Update Contact');
?>