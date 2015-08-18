<center><h1><b>List Blog Posts</b></h1></center>
<table>
	<?php if (count($posts) > 0){ ?>	
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Actions</th>
			<th>Created</th>
			<th>Category</th>
			<th>modified</th>
		</tr>
	<?php } ?>
	<tr>
	</tr>
	<tr>
		<td colspan="5">
			
			<?php echo $this->Html->link('Add Post',  array('controller' => 'posts', 'action' => 'add')); ?>
		</td>
	</tr>
    <!-- Here is where we loop through our $posts array, printing out post info -->
		<?php foreach ($posts as $post): ?>
			<tr>
			<td><?php echo $post['Post']['id']; ?></td>
			<td>	
				<?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></td>
			<td>
				<?php
					echo $this->Html->link('Edit',array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']));
					echo "&nbsp;&nbsp;".$this->Html->link('Delete',array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array('confirm' => 'Are you sure?'));
					echo $this->Form->postLink(
					'&nbsp;<button class="btn btn-danger">
						Del using Js
					 </button>',
					array(
						  'action'   => 'delete', $post['Post']['id']
						  ),
					array(
						  'class'    => 'tip',
						  'escape'   => false,
						  'confirm'  => 'Are you sure ?'
						 ));                
				?>
			</td>
			<td><?php echo $this->Time->timeAgoInWords($post['Post']['created']); ?></td>	
			<td>			
				<?php echo $this->Html->link($post['Category']['name'], array('controller' => 'categories', 'action' => 'view', $post['Post']['category_id'])); ?>								
			</td>			
			<td>
				<?php 
					echo $post['Post']['modified']; 
					//echo $this->Like->like('post', $post['Post']['id']);
					//$this->Like->like('post', $post_id);
					//echo $this->Like->dislike('post', $post['Post']['id']);				
				?>
			</td>
		</tr>
		<?php endforeach ?>	
    <?php unset($post); ?>
	
</table>