<?php
	class WelcomesController extends AppController {
		public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->allow('index','home','aboutus','contactus','carrer','location');
		}

		
		public $scaffold;
		public function index(){}		
		public function aboutus(){}
		public function contactus(){}
		public function carrer(){}
		public function location(){}
			
	}
?>
