<?php
/*
 * Created on 02.07.2010
 *
 * Made for project TeamServer
 * by bulaev
 */
 //pr($modsList);
 include('../loading_params.php');
?>
<div id="flash"><?php echo $session->flash(); ?></div>
<?php echo $form->create('GameTemplate', array('action' => 'linkPluginToMod')); ?>
				

	<table border="0" cellpadding="0" cellspacing="3" width="100%">
	
	<tr>
		<td align="right" style="width: 150px;">Краткое название:
		</td>
		<td align="left"><?php echo $form->input('Mod.name', 
									array(	'size'=> '30',
											'div' => false, 
											'label' => false));?>
		</td>
	</tr>
	<tr>
		<td align="right">Полное название (без версии):
		</td>
		<td align="left"><?php echo $form->input('Mod.longname', 
									array(	'size'=> '30',
											'div' => false, 
											'label' => false));?>
		</td>
	</tr>
	<tr>
		<td align="right">Версия:
		</td>
		<td align="left"><?php echo $form->input('Mod.version', 
									array(	'size'=> '30',
											'div' => false, 
											'label' => false));?>
		</td>
	</tr>
	<tr>
		<td align="right">Краткое описание:
		</td>
		<td align="left"><?php echo $form->input('Mod.shortDescription', 
									array(	'size'=> '30',
											'div' => false, 
											'label' => false));?>
		</td>
	</tr>
	<tr>
		<td align="left" colspan="2">
		Описание:<br/>
		<?php echo $form->input('Mod.description', 
									array(	'type'=>'textarea',
				  						      'wrap'=>'off',
				  							  'style'=> 'width: 550px;  
				  							  			 height: 200px;
											  			 padding-left: 10px;
			
			
			
														  ',
											'div' => false, 
											'label' => false));?>
		</td>
	</tr>

	<tr>
			<td colspan="2" align="center">
				<hr/>
			</td>
	</tr>

	<tr>
		<td align="right" valign="top">Плагины:
		</td>
		<td align="left"><?php echo $form->input('Plugin', 
									array(	'options' => $pluginsList,
											'div' => false, 
											'label' => false,
											 'style'=> 'width: 400px;  
				  							  			height: 200px;
				  							  			'
				  							  			 ));?>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top">Конфиги:
		</td>
		<td align="left"><?php echo $form->input('Config', 
									array(	'options' => $configsList,
											'div' => false, 
											'label' => false,
											 'style'=> 'width: 400px;  
				  							  			height: 200px;
				  							  			'
				  							  			));?>
		</td>
	</tr>
	<tr>
			<td colspan="2" align="center"><?php 
					echo $form->input('Mod.id', array('type'=>'hidden'));
					// Пока неисправят баг в jQuery, будем отсылать обычной кнопкой
					echo $form->submit('Сохранить',
											array('class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'));
//
//
//					echo $js->submit('Сохранить',
//						array(
//							'url'=> array(
//											'controller'=>'GameTemplates',
//											'action'=>'linkModToTemplate'
//							 ),
//							'update' => '#link_template',
//							'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only',
//							'before' =>$loadingShow,
//							'complete'=>$loadingHide,
//							'buffer' => false));
					?>
			
			</td>
	</tr>
 </table>
				
<?php echo $form->end();?>