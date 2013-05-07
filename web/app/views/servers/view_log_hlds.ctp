<?php
/*
 * Created on 21.10.2010
 *
 * File created for project TeamServer
 * by nikita
 */
 include('../loading_params.php');
 $class = array(
				'run' => 'nav',
				'update' => 'nav',
				'debug' => 'nav'
				);
				
 $class[strtolower($type)]='active';

 function cutString($string, $length = 35){
 	//Обрезка длинной строки до вида xxxxxx...xxxxx
 	$string = rtrim($string, '.log');
 	if (strlen($string) > $length){
	 	$newString = substr($string, 0, ($length/2 - 3))."...";
	 	$newString .= substr($string, strlen($string) - ($length/2), ($length/2));
	 	return $newString;
 	}
 	else
 	{
 		return $string;
 	}
 	

 }
 
?>
<div id="logs_types">
	<ul class="top_menu">
		<li class="<?php echo $class['run']; ?>">
		<?php 
		
		echo $html->link('Логи работы сервера', '#',
						  array ('id'=>'server_runlog_'.$id, 'escape' => false)
						  );
			
		$event  = $js->request(array('controller'=>'servers',
									 'action'=>'viewLog', $id, "run"), 
							   array('update' => '#server_log_view_'.$id,	  
									 'before'=>$loadingShow,
									 'complete'=>$loadingHide
									 ));

		$js->get('#server_runlog_'.$id)->event('click', $event);
		?>
		</li>
		<li class="<?php echo $class['update']; ?>">
		<?php 
		
		echo $html->link('Логи обновления сервера', '#',
						  array ('id'=>'server_updatelog_'.$id, 'escape' => false)
						  );
			
		$event  = $js->request(array('controller'=>'servers',
									 'action'=>'viewLog', $id, "update"), 
							   array('update' => '#server_log_view_'.$id,	  
									 'before'=>$loadingShow,
									 'complete'=>$loadingHide
									 ));

		$js->get('#server_updatelog_'.$id)->event('click', $event);
		?>
		</li>
		<li class="<?php echo $class['debug']; ?>">
		<?php 
		
		echo $html->link('Логи режима отладки', '#',
						  array ('id'=>'server_debuglog_'.$id, 'escape' => false)
						  );
			
		$event  = $js->request(array('controller'=>'servers',
									 'action'=>'viewLog', $id, "debug"), 
							   array('update' => '#server_log_view_'.$id,	  
									 'before'=>$loadingShow,
									 'complete'=>$loadingHide
									 ));

		$js->get('#server_debuglog_'.$id)->event('click', $event);
		?>
		</li>
	</ul>
</div>

<div id="server_logs">
	<div id="flash"><?php echo $session->flash(); ?></div>
		
	
	<small>Последние <?php echo count($logList); ?> файлов логов:</small>
	<script type="text/javascript">
	$(function() {
		
		var loading = '<?php echo $html->image('loading.gif', array('alt'=>'Loading...', 'width'=>'16', 'height'=>'16')); ?> Подождите...'
				
		$("#tabs-<?php echo $id; ?>").tabs({spinner: loading, selected: '-1',
			ajaxOptions: {
				error: function(xhr, status, index, anchor) {
					$(anchor.hash).html("Ошибка загрузки файла. Попробуйте чуть позже.");
				}
			}
		});
	});
<?php if ( count($logList) > 4){
	// Если больше 4-х логов, то расположим их в столбик слева
	?>
	$(function() {
		$("#tabs-<?php echo $id; ?>").tabs().addClass('ui-tabs-vertical ui-helper-clearfix');
		$("#tabs-<?php echo $id; ?> li").removeClass('ui-corner-top').addClass('ui-corner-left');
	});
<?php }?>	
	
	</script> 

	<div class="config_files" style="margin-bottom: 20px;">
	
		<div id="tabs-<?php echo $id; ?>">
			<ul>
				<li><a href="#tabs-<?php echo $id; ?>-1">Помощь</a></li>
				<?php
				
				foreach ( $logList as $log ) {
					if ($log != ''){
					?>
		
					<li title = "Просмотр лога <?php echo $log; ?>">
					
					<?php
		       		echo $html->link("<span>".cutString(trim($log))."</span>",
		       						array('action'=>'printLogHlds', 
		       							  $id,$log,$type),
		       						array(	
											'escape' => false)
		       						
		       						);
		       		?>
		       		</li>
		       		<?php	
					}
				}
				
				
				?>
				
			</ul>
			<div id="tabs-<?php echo $id; ?>-1">
				Щелкните по логу, который хотели бы просмотреть. 
				Вы также можете загрузить логи по FTP, которые находятся
				в директории logs/=имя&nbsp;сервера=.
				<br><br>
				<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
				<p>
				<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
				Не забывайте, что нельзя менять изначальные настройки логов
				сервера, если хотите иметь возможность просматривать их из 
				панели управления.
				</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
			echo $js->writeBuffer(); // Write cached scripts 
?>