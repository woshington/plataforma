<!doctype html>
<html lang='pt-BR'>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title_for_layout; ?></title>
		<?php 
			echo $this->Html->css(array('style'));
			echo $this->Html->script(array('jquery/jquery-1.4.1.min', 'jquery/custom_jquery', 'jquery/jquery.pngFix.pack'));			
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
	</head>
	<body>
		<div id="container">
			<div id="header">
			</div>
			<div id="content">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>			
			<div id="footer">
				<p>Portal da transparência do IFPI - Campus Paulistana</p>
			</div>
		</div>
		<?php //echo $this->element('sql_dump'); ?>
	</body>
</html>	