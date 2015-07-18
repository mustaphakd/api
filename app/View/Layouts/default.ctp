<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo "Freely accessible restful apis" ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');

	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link("Worosoft is at your service", 'http://worosoft.com'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('w.png', array('alt' => "worosoft at your service", 'border' => '0')),
					'http://www.worosoft.com',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<div style="float: left">
                Current service endpoints

                <ol>
                    <li>
                        /continents
                    </li>
                    <li>
                        /regions[/continent]
                    </li>
                    <li>
                        /countries[/continent]
                    </li>
                    <br /> <br />

                    <ul>
                    make sure to set your http request header to:
                    <li>Accept: application/json</li>
                    <li>Content-Type: application/json</li>
                    </ul>
                </ol>


			</div>
		</div>
	</div>

</body>
</html>
