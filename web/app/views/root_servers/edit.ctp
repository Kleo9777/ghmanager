<?php
/*
 * Created on 03.06.2010
 *
 * Made for project TeamServer
 * by bulaev
 */
  include('../loading_params.php');
?>

			<?php echo $form->create('RootServer', array('action' => 'edit')); ?>
			<table border="0" cellpadding="0" cellspacing="3" width="95%">
				<tr>
					<td align="right">Название:</td>
					<td align="left"><?php echo $form->input('name', array('size' => '30', 'div' => false, 'label' => false));?></td>
				</tr>
<?php /*?>
				<tr>
					<td align="right">IP #1:</td>
					<td align="left"><?php echo $form->input('IP1', array('size' => '30', 'div' => false, 'label' => false)); ?></td>
				</tr>
				<tr>
					<td align="right">IP #2:</td>
					<td align="left"><?php echo $form->input('IP2', array('size' => '30', 'div' => false, 'label' => false));?></td>
				</tr>
<?php */?>
				<tr>
					<td align="right">Слотов на сервер:</td>
					<td align="left"><?php echo $form->input('slotsMax', array('size' => '10', 'div' => false, 'label' => false));?></td>
				</tr>
				<tr>
					<td align="right">Слотов куплено:</td>
					<td align="left"><?php echo $form->input('slotsBought', array('size' => '10', 'div' => false, 'label' => false));?></td>
				</tr>
				<tr>
					<td align="right">Разрешить:</td>
					<td align="left"><?php echo $form->input('enabled', array('type' =>'checkbox', 'div' => false, 'label' => false));?></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><?php
							echo $form->input('id', array('type'=>'hidden'));
					// Пока неисправят баг в jQuery, будем отсылать обычной кнопкой
					echo $form->submit('Сохранить',
											array('class' => 'btn btn-primary'));


//							echo $js->submit('Сохранить',
//								array(
//									'url'=> array(
//													'controller'=>'rootServers',
//													'action'=>'edit'
//									 ),
//									'update' => '#root_servers_list',
//									'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only',
//									'before' =>$loadingShow,
//									'complete'=>"$('#edit_root_server_container').dialog('close');".$loadingHide,
//									'success'=>'',
//									'buffer' => false));
							?></td>
				</tr>
			</table>
			<?php echo $form->end();?>

