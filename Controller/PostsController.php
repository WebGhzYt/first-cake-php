<?php
	class PostsController extends AppController {				
		//public $helpers = array('Like.Like');
		//public $helpers = array('Html','Form');
		//public $scaffold = 'admin';
		
	
		public function index(){
			//$this->Post->like($post_id, $this->Auth->user('id'));
			$this->loadModel('Category');
			//$this->set('posts', $this->Post->find('all',array('conditions'=>array('Post.user_id'=> $this->Session->read('Auth.User'))),array('order'=>'Post.created DESC','limit'=>50)));
			$this->set('posts', $this->Post->find('all',array('order'=>'Post.created DESC','limit'=>50)));
		}
		public function admin_index(){
			//$this->Post->like($post_id, $this->Auth->user('id'));
			$this->loadModel('Category');
			$this->set('posts', $this->Post->find('all',array('order'=>'Post.created DESC','limit'=>50)));
		}
		
		public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid post'));
			}

			$post = $this->Post->findById($id);
			if (!$post) {
				throw new NotFoundException(__('Invalid post'));
			}
			$this->set('post', $post);
		}
		
		public function admin_view($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid post'));
			}

			$post = $this->Post->findById($id);
			if (!$post) {
				throw new NotFoundException(__('Invalid post'));
			}
			$this->set('post', $post);
		}
		
		
		public function add() {
			//$categories = $this->Post->Categories->find('list');
			//$this->set(compact('categories'));
			
			//$this->Post->Category->Behaviors->load('Containable');
			//$query_options = array('fields' => array("Category.name"));
			//$this->set("categories", $this->Post->Category->find('all', $query_options));
			
			$this->loadModel('Category'); 
			
			//$sql = "SELECT * FROM `posts` LEFT JOIN `blog`.`categories` ON `posts`.`category_id` = `categories`.`id`";
			
			//$categories = $this->Category->find('all');
			
			//$categories = $this->query($sql);
			
			//$categories = $this->Category->find('all');
			
			$this->set('categories', $this->Post->Category->find('list'));
			
			
			//$this->loadModel('Category');            			
			//$categories = $this->Category->find('list');			
			//$this->set('categories',$categories);			
			//print_r ($categories);exit();
			//print_r ($this->request->data);exit();
			if ($this->request->is('post')) {
				$this->Post->create();
				//print_r ($this->request->data);exit();
				if ($this->Post->save($this->request->data)) {
					$this->Session->setFlash(__('Your post has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
		}
		
		public function admin_add() {
			//$categories = $this->Post->Categories->find('list');
			//$this->set(compact('categories'));
			
			//$this->Post->Category->Behaviors->load('Containable');
			//$query_options = array('fields' => array("Category.name"));
			//$this->set("categories", $this->Post->Category->find('all', $query_options));
			
			$this->loadModel('Category'); 
			
			//$sql = "SELECT * FROM `posts` LEFT JOIN `blog`.`categories` ON `posts`.`category_id` = `categories`.`id`";
			
			//$categories = $this->Category->find('all');
			
			//$categories = $this->query($sql);
			
			//$categories = $this->Category->find('all');
			
			//$this->set('categories', $this->Post->Category->find('all'));
			$this->set('categories', $this->Post->Category->find('list'));
			
			
			
			//$this->loadModel('Category');            			
			//$categories = $this->Category->find('list');			
			//$this->set('categories',$categories);			
			//print_r ($categories);exit();
			//print_r ($this->request->data);exit();
			if ($this->request->is('post')) {
				$this->Post->create();
				//print_r ($this->request->data);exit();
				if ($this->Post->save($this->request->data)) {
					$this->Session->setFlash(__('Your post has been saved.'));
					return $this->redirect(array('action' => 'admin_index'));
				}
				$this->Session->setFlash(__('Unable to add your post.'));
			}
		}
		
		
		public function edit($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid post'));
			}

			$post = $this->Post->findById($id);
			if (!$post) {
				throw new NotFoundException(__('Invalid post'));
			}

			if ($this->request->is(array('post', 'put'))) {
				$this->Post->id = $id;
				if ($this->Post->save($this->request->data)) {
					$this->Session->setFlash(__('Your post has been updated.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to update your post.'));
			}

			if (!$this->request->data) {
				$this->request->data = $post;
			}
		}
		
		public function admin_edit($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid post'));
			}

			$post = $this->Post->findById($id);
			if (!$post) {
				throw new NotFoundException(__('Invalid post'));
			}

			if ($this->request->is(array('post', 'put'))) {
				$this->Post->id = $id;
				if ($this->Post->save($this->request->data)) {
					$this->Session->setFlash(__('Your post has been updated.'));
					return $this->redirect(array('action' => 'admin_index'));
				}
				$this->Session->setFlash(__('Unable to update your post.'));
			}

			if (!$this->request->data) {
				$this->request->data = $post;
			}
		}
		
		public function delete($id = null) {
			 $this->Post->id = $id;
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Post->delete($id)) {
				$this->Session->setFlash(
					__('The post with id: %s has been deleted.', h($id))
				);
			} else {
				$this->Session->setFlash(
					__('The post with id: %s could not be deleted.', h($id))
				);
			}
	
			$this->redirect(array('controller' => 'posts', 'action' => 'index'));
		}
		
		public function admin_delete($id = null) {
			 $this->Post->id = $id;
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Post->delete($id)) {
				$this->Session->setFlash(
					__('The post with id: %s has been deleted.', h($id))
				);
			} else {
				$this->Session->setFlash(
					__('The post with id: %s could not be deleted.', h($id))
				);
			}
	
			$this->redirect(array('controller' => 'posts', 'action' => 'admin_index'));
		}
		
	}
?>