<style>
	.form-signin{
		margin: 0 auto;
		width: 400px;
	}	
</style>
<div class="wrapper">
	<?php echo $this->Session->flash('auth')?>
	<?=$this->Form->create('User', array('action' => 'login', 'class'=>'form-signin'));?>    
	  	<h2 class="form-signin-heading">Logar</h2>
	  	<input type="text" class="form-control" name="data[User][username]" placeholder="Nome de usuario" required="" autofocus="" />
	  	<input type="text" class="form-control" name="data[User][password]" placeholder="Senha" required="" autofocus="" />
	  	<?php echo $this->Form->input('ano', array(
	  			'class'=>'form-control',
	  			'placeholder'=>'Ano',
	  			'label'=>false
	  		),
  			array(
	  			'options'=>$anos
  			));
	  	?>	  	
	  	<label class="checkbox">
	    	<input type="checkbox" value="lembrar-me" id="rememberMe" name="rememberMe"> lembrar-me
	  	</label>
	  	<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
	</form>
</div>