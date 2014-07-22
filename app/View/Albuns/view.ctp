<?php 
	//pr($albun);
?>
<div id="links">
	<?php 
		foreach ($albun['Imagen'] as $key => $imagem) {
			echo "<a href = '".$this->webroot.'img/Albuns/imagen/'.$imagem['id'].'/exibir_'.$imagem['url']."' title='".$imagem['titulo'] ."' data-gallery >";
    		echo $this->Html->image('Albuns/imagen/'.$imagem['id'].'/icone_'.$imagem['url']);
    		echo '</a>';
    }?>
</div>