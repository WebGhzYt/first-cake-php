<?php 
	class UsersController extends AppController {
 
    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
        'order' => array('User.username' => 'asc' ) 
    );
     
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('*'); 
		$this->Auth->allow('add');
    }
     
	public function admin_dashboard() {
        $title_for_layout = 'Dashbord';
        $this->set(compact('title_for_layout'));
    }
	
	public function admin_login() {
        $title_for_layout = 'Login';
        $this->set(compact('title_for_layout'));
		//if already logged-in, redirect
        if($this->Session->check('Auth.User')){
            $this->redirect(array('action' => 'admin_dashboard'));      
        }
         
        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
               // $this->Session->setFlash(__('Welcome , '. (strtoupper($this->Auth->user('username')))));
				$this->redirect(array('action' => 'admin_dashboard'));    
            } else {
                $this->Session->setFlash(__('Invalid Admin username or password'));
            }
        } 
    } 
	
	public function admin_logout() {
        $this->redirect($this->Auth->logout());
    }
 
    public function login() {
         
        //if already logged-in, redirect
        if($this->Session->check('Auth.User')){
            $this->redirect(array('action' => 'index'));      
        }
         
        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('Welcome, '. (strtoupper($this->Auth->user('username')))));$this->redirect(array('action' => 'index'));;
            } else {
                $this->Session->setFlash(__('Invalid username or password'));
            }
        } 
    }
 
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
 
    public function index() {
        $this->paginate = array(
            'limit' => 6,
            'order' => array('User.username' => 'asc' )
        );
        $users = $this->paginate('User');
        $this->set(compact('users'));
    }
	
	public function admin_index() {
        $this->paginate = array(
            'limit' => 6,
            'order' => array('User.username' => 'asc' )
        );
        $users = $this->paginate('User');
        $this->set(compact('users'));
    }
 
 
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
			
			/*if (!empty($this->params['form']) && 
             is_uploaded_file($this->params[’form’][’User][’tmp_name’]))
			{*/
				//$image = fread(fopen($this->params['form']['User']['tmp_name'], "r"), 
                                     //$this->params['form']['User']['size']);
				//$this->params['form']['User']['image_url'] = $image;
				
				//print_r ($this->request->data);exit();  				
				
				 if ($this->request->data['User']['image_url']) {
					$file = $this->data['User']['image_url'];
					//print_r($file);exit();
					$filename = str_replace(" ", "-", $this->data['User']['email'] . "_". $file['name']);
					move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/users_images/' . $filename);
					
					$this->request->data['User']['image_url'] = $filename;	
					//print_r($this->request->data);exit();					
				 }
				if ($this->User->save($this->request->data)) {				
					$this->Session->setFlash(__('The user has been created'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be created. Please, try again.'));
				}   
			/*} else {
				$this->redirect(array('action' => 'index'));
			}*/	
        }
    }
	
	public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
			
			/*if (!empty($this->params['form']) && 
             is_uploaded_file($this->params[’form’][’User][’tmp_name’]))
			{*/
				//$image = fread(fopen($this->params['form']['User']['tmp_name'], "r"), 
                                     //$this->params['form']['User']['size']);
				//$this->params['form']['User']['image_url'] = $image;
				
				//print_r ($this->request->data);exit();  				
				
				 if ($this->request->data['User']['image_url']) {
					$file = $this->data['User']['image_url'];
					//print_r($file);exit();
					$filename = str_replace(" ", "-", $this->data['User']['email'] . "_". $file['name']);
					move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/users_images/' . $filename);
					
					$this->request->data['User']['image_url'] = $filename;	
					//print_r($this->request->data);exit();					
				 }
				if ($this->User->save($this->request->data)) {				
					$this->Session->setFlash(__('The user has been created'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be created. Please, try again.'));
				}   
			/*} else {
				$this->redirect(array('action' => 'index'));
			}*/	
        }
    }
 
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid user'));
		}

		$user = $this->User->findById($id);
		if (!$user) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $user);
	}
	
	public function admin_view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid user'));
		}

		$user = $this->User->findById($id);
		if (!$user) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $user);
	}
		
    public function edit($id = null) {
 
            if (!$id) {
                $this->Session->setFlash('Please provide a user id');
                $this->redirect(array('action'=>'index'));
            }
 
            $user = $this->User->findById($id);
            if (!$user) {
                $this->Session->setFlash('Invalid User ID Provided');
                $this->redirect(array('action'=>'index'));
            }
 
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->User->id = $id;
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been updated'));
                    $this->redirect(array('action' => 'edit', $id));
                }else{
                    $this->Session->setFlash(__('Unable to update your user.'));
                }
            }
 
            if (!$this->request->data) {
                $this->request->data = $user;
            }
    }
 
    public function delete($id = null) {
         
        if (!$id) {
            $this->Session->setFlash('Please provide a user id');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
     
    public function activate($id = null) {
         
        if (!$id) {
            $this->Session->setFlash('Please provide a user id');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }
 
}
?>