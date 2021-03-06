<?php
/*
 * Created on 14.01.2011
 *
 * Made for project TeamServer(Git)
 * by bulaev
 */
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php
echo $html->charset();
?>
    <title>
      <?php __('TeamServer: '); ?>
      <?php echo $title_for_layout; ?>
    </title>
    <?php


echo $html->meta('icon');
echo $html->css(array (
	'js'
    ,'ts-theme/tooltips_main_small'
	,'simple'
//	,'client'
	,'ts-theme/jquery-ui.tiny.css'
	,'bootstrap/bootstrap.buttons.tiny.css'

));
?>
<?php
echo $scripts_for_layout;
echo "\n\n";


?>

  </head>
  <body>
	<div id="global_wrapper" align="center">
		<div id="content_wrapper" style="max-width: 320px;">
			<div id="content_logo">
			<?php echo $html->image('TS_logo.png', array(   'width' => 272,
                                                            'height' => 42,
                                                            'class' => 'pull-left',
                                                            'style' => 'margin-left: 5px;'));?>
			</div>
			<div id="content_text">
			<?php echo $content_for_layout; ?>
			</div>
			<div id="debug">
		    <?php
		    	//pr($session);
		    	//pr($this->data);
		    	//echo $this->element('sql_dump');
		    ?>
			</div>
			<div id="cp">
				<span>©2010-2013</span> <a href="http://www.teamserver.ru">ООО "БС Гейм"</a><br />Лицензия №79554 на <br />"Телематические услуги связи"
			</div>
		</div>
	</div>
  </body>
</html>
