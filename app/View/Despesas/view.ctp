<div class="despesas view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Despesa'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Despesa'), array('action' => 'edit', $despesa['Despesa']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Despesa'), array('action' => 'delete', $despesa['Despesa']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $despesa['Despesa']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Despesas'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Despesa'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Tipo Despesas'), array('controller' => 'tipo_despesas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Tipo Despesa'), array('controller' => 'tipo_despesas', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Orcamentos'), array('controller' => 'orcamentos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Orcamento'), array('controller' => 'orcamentos', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($despesa['Despesa']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Valor'); ?></th>
		<td>
			<?php echo h($despesa['Despesa']['valor']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Observacao'); ?></th>
		<td>
			<?php echo h($despesa['Despesa']['observacao']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Tipo Despesa'); ?></th>
		<td>
			<?php echo $this->Html->link($despesa['TipoDespesa']['descricao'], array('controller' => 'tipo_despesas', 'action' => 'view', $despesa['TipoDespesa']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Orcamento'); ?></th>
		<td>
			<?php echo $this->Html->link($despesa['Orcamento']['id'], array('controller' => 'orcamentos', 'action' => 'view', $despesa['Orcamento']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

