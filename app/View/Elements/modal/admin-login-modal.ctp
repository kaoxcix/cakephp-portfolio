<div id="admin-login" class="my-modal">
		<div class="my-modal-dialog admin-modal">
		<!-- header -->
		<div class="row">
			<div class="col s8"><h4>ADMIN ZONE</h4>Please enter your username and password</div>
			<div class="col s4 textRight"><h4>
			<?php 
				echo $this->Html->link('<i class="mdi-navigation-close"></i>','#',
				array('class' => 'modal-close blue-grey-text tooltipped', 'data-position' => 'top', 'data-tooltip' => 'Close', 'escape' => false));
			?>
			</h4></div>
		</div>
		<!-- body -->
		<?php  
			echo $this->Form->create('User', array('url' => array('controller' => 'Users',	'action' => 'login')));
	    ?>
	            <div class="row"><div class="col s6"><?php echo $this->Form->input('username'); ?></div>
	        	<div class="col s6"><?php echo $this->Form->input('password'); ?></div></div>
	        	<div class="row">
	       		<?php 
	   		 	echo $this->Form->end(array('label' => 'Login', 'class' => 'btn blue-grey darken-2 right')); 
	   		 	echo $this->Form->button('Cancel', array('class' => 'btn modal-close  blue-grey darken-2 right'));
			    ?>
			  </div>
		</div>
</div>