<?php 
	foreach ($albuns as $v) :
 		if(!empty($v['Imagen'][0]['url'])) {
 			echo '<div style="float:left">';
 			$img = $this->Html->image('album/'.$v['Albun']['id'].'/40/'.$v['Imagen'][0]['url']);
 			echo $this->Html->link($img,'/albuns/ver/'.$v['Albun']['id'],array('escape'=>false)).'<br>';
 			echo $v['Albun']['titulo'];
 			echo '</div>';
 		}
	endforeach;