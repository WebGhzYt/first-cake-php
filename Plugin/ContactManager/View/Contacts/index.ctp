<center><h1><b>My Personal Contacts</b></h1></center>
<?php if($this->Session->check('Auth.User')){
	echo $this->Html->link('Logout', '/logout');
		}
?>
<table>
	<?php if (count($contacts) > 0){ ?>	
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Mobile</th>	
			<th>Action</th>	
			
		</tr>
	<?php } ?>
	<?php foreach ($contacts as $contact): ?>
			<tr>
				<td><?php echo $contact['Contact']['id']; ?></td>
				<td>	
					<?php echo $this->Html->link($contact['Contact']['name'],array('controller' => 'contacts', 'action' => 'view', $contact['Contact']['id'])); ?>
				</td>				
				<td><?php echo $contact['Contact']['mobile']; ?></td>
				<td>
					<?php
					echo $this->Html->link('Edit',array('controller' => 'contacts', 'action' => 'edit', $contact['Contact']['id']));
					echo "&nbsp;&nbsp;".$this->Html->link('Delete',array('controller' => 'contacts', 'action' => 'delete', $contact['Contact']['id']), array('confirm' => 'Are you sure?'));
					echo $this->Form->postLink(
					'&nbsp;<button class="btn btn-primary">
						Del using Js
					 </button>',
					array(
						  'action'   => 'delete', $contact['Contact']['id']
						  ),
					array(
						  'class'    => 'tip',
						  'escape'   => false,
						  'confirm'  => 'Are you sure ?'
						 ));                
				?>
				</td>
			</tr>	
	<?php endforeach ?>	
    <?php unset($contact); ?>	
</table>