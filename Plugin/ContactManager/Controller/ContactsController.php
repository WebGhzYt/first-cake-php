<?php
	class ContactsController extends ContactManagerAppController {
    public $uses = array('ContactManager.Contact');	
	
	public function beforeFilter() {		
        parent::beforeFilter();				
    }
	
    public function index() {
        //$this->set('contacts', $this->Contact->find('all',array('order'=>'Contact.name DESC','limit'=>50))); //it's show all contacts
		$this->set('contacts', $this->Contact->find('all',array('conditions'=>array('User.id'=> $this->Session->read('Auth.User'))),array('order'=>'Contact.name DESC','limit'=>50)));
    }
	
	public function admin_index() {
        //$this->set('contacts', $this->Contact->find('all',array('order'=>'Contact.name DESC','limit'=>50))); //it's show all contacts
		$this->set('contacts', $this->Contact->find('all',array('order'=>'Contact.name DESC','limit'=>50)));
    }
	
	public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid Contact'));
			}

			$contact = $this->Contact->findById($id);
			if (!$contact) {
				throw new NotFoundException(__('Invalid Contact'));
			}
			$this->set('contact', $contact);
		}
		
		
	public function add() {
		//$categories = $this->Contact->Categories->find('list');
		//$this->set(compact('categories'));
		//print_r ($categories);exit();
		
		$this->loadModel('User');
		$users = $this->User->find('list');
		$this->set('users',$users);			
		
		
		
		if ($this->request->is('post')) {
			$this->Contact->create();
			//print_r ($this->request->data);exit();
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('Your Contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your Contact.'));
		}
	}
	
	
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Contact'));
		}

		$contact = $this->Contact->findById($id);
		if (!$contact) {
			throw new NotFoundException(__('Invalid Contact'));
		}

		if ($this->request->is(array('Contact', 'put'))) {
			$this->Contact->id = $id;
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('Your Contact has been updated.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to update your Contact.'));
		}

		if (!$this->request->data) {
			$this->request->data = $contact;
		}
	}
	
	
	public function delete($id = null) {
			 $this->Contact->id = $id;
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Contact->delete($id)) {
				$this->Session->setFlash(
					__('The Contact with id: %s has been deleted.', h($id))
				);
			} else {
				$this->Session->setFlash(
					__('The Contact with id: %s could not be deleted.', h($id))
				);
			}
	
			$this->redirect(array('controller' => 'contacts', 'action' => 'index'));
		}	
}
?>