<?php
	class Post extends AppModel{		
		//$actsAs = array('Like.Likeable');
		public $belongsTo = array('Category', 'User');
		//public $displayField = 'title';
		public $validate = array(
		'title' => array('rule' => 'notBlank'),
		'body' => array(
			'rule' => array('minLength', '8'),
            'message' => 'Minimum 8 characters long'
		)
		);
	}
?>