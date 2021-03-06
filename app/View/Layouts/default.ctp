<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$siteDescription = "NINEKAO.COM | My Portfolio and Profile";

?>
<!-- 
THIS SITE USE:
- CAKEPHP [MIT] : http://cakephp.org
- MATERIALIZE CSS [MIT] : http://materializecss.com/
- MAGINIFIC POPUP [MIT] : http://dimsemenov.com/plugins/magnific-popup/
- SIMPLE TYPING CAROUSEL [MIT] : https://gist.github.com/gschier/6903476
- JQUERY [MIT] : http://jquery.com/
-->
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $siteDescription ?>:
		<?php //echo $this->fetch('title'); ?>
	</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="NINEKAO.COM My Portfolio and Profile">
	<meta name="keywords" content="ninekao,portfolio,profile"/>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('materialize');
		echo $this->Html->css('main-portfolio');
		echo $this->Html->css('magnific-popup');
		echo $this->Html->script('jquery-1.11.2.js');
		echo $this->Html->script('materialize.js');
		echo $this->Html->script('main-portfolio.js');
		echo $this->Html->script('simple-typing-carousel.js');
		echo $this->Html->script('jquery.magnific-popup.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<!--------------------------------- 
HEADER WITH TOP NAV FOR MOBILE
----------------------------------->
    <header>
      <nav class="hide-on-large-only">
          <div class="nav-wrapper">
          	<?php echo $this->html->link("NINE<strong>KAO</strong>","/",array('escape' => false, 'class' => 'brand-logo')); ?>
          	<a class="button-collapse" href="#" data-activates="nav-mobile"><i class="mdi-navigation-menu"></i></a>
          </div>
      </nav>
<!--------------------------------- 
HEADER WITH SIDE NAV FOR ALL
----------------------------------->	
      <ul id="nav-mobile" class="side-nav fixed">
        <li class="logo">
        	NINE<strong>KAO</strong>
        </li>
        <div class="profile-image hide-on-med-and-down">
			<?php echo $this->Html->image('profile/avatar.jpg?'.time()); ?>
		</div>
        <li><?php echo $this->html->link("<i class='mdi-action-assignment'></i>PORTFOLIO","/",array('escape' => false )); ?></li>
        <li><?php echo $this->html->link("<i class='mdi-action-account-box'></i>CONTACT ME","#contact-me",array('class' => 'modal-trigger', 'escape' => false )); ?></li>
        <?php if(!$this->Session->check('Auth.User')) { ?>
        	<li><?php echo $this->html->link("<i class='mdi-action-settings-applications'></i>ADMIN ZONE","#admin-login",array('class' => 'modal-trigger', 'escape' => false )); ?></li>
        <?php } else { ?>
        <li class="no-padding">
	        <ul class="collapsible collapsible-accordion">
				<li>
				<div class="collapsible-header"></i><i class='mdi-action-settings-applications'></i>ADMIN ZONE<i class="mdi-navigation-arrow-drop-down"></i></div>
				<div class="collapsible-body">
				<ul>
					<li><?php echo $this->html->link("<i class='mdi-action-account-box'></i>EDIT PROFILE","#admin-edit-profile",array('class' => 'modal-trigger', 'escape' => false )); ?></li>
					<li><?php echo $this->html->link("<i class='mdi-hardware-security'></i>CHANGE PASSWORD","#admin-change-password",array('class' => 'modal-trigger', 'escape' => false )); ?></li>
					<li><?php echo $this->html->link("<i class='mdi-action-assignment'></i>ADD PORTFOLIO","#admin-add-portfolio",array('class' => 'modal-trigger', 'escape' => false )); ?></li>
					<li><?php echo $this->html->link("<i class='mdi-action-exit-to-app'></i>LOG OUT", array('controller' => 'Users', 'action' => 'logout'),array('escape' => false )); ?></li>
				</ul>
				</div>
				</li>
			</ul>
		</li>
		<?php } ?>
      </ul>
    </header> <!-- End header -->
<!--------------------------------- 
MAIN FOR FETCH CONTENT
----------------------------------->	
    <main>
    	<?php echo $this->Session->flash('flash', array('element' => 'flash-custom')); ?> 
		<?php echo $this->fetch('content'); ?> 
    </main> <!-- End main -->
    
<!--------------------------------- 
LOAD MODAL	
----------------------------------->	    
    <!-- contact-me Modal -->
	<?php echo $this->element('modal/contact-me-modal'); ?>
    
    <!-- admin Modal -->
	<?php 
		if(!$this->Session->check('Auth.User')) {
			echo $this->element('modal/admin-login-modal'); 
		}
		else {
			echo $this->element('modal/admin-add-portfolio');
			echo $this->element('modal/admin-change-password');
			echo $this->element('modal/admin-edit-profile'); 
		}
	?>
<!--------------------------------- 
END	
----------------------------------->
</body>
</html>
