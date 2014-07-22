    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?=$this->Html->link('Plataforma - Exercicio '.$ano, array('controller'=>'index', 'action'=>'index'), array('class'=>'navbar-brand'))?>          
        </div>  
        <div class="collapse navbar-collapse">
        <?php if($this->Session->read('Auth.User')):?>
          <ul class="nav navbar-nav">
            <li class="active"><?=$this->Html->link('Home', array('controller'=>'index', 'action'=>'index'))?></li>
            <li><?=$this->Html->link('Usuarios', array('controller'=>'users', 'action'=>'index'))?></li>
            <li><?=$this->Html->link('Memorandos', array('controller'=>'memorandos', 'action'=>'index'))?></li>
            <li><?=$this->Html->link('Orcamentos', array('controller'=>'orcamentos', 'action'=>'index'))?></li>
            <li><?=$this->Html->link('Albuns', array('controller'=>'albuns', 'action'=>'index'))?></li>            
            <li class="active"><?=$this->Html->link('Sair', array('controller'=>'users', 'action'=>'logout'))?></li>
          </ul>
          <?php endif;?>
        </div><!--/.nav-collapse -->
      </div>
    </div>