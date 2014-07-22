<script type="text/javascript">
	setTimeout(function(){
		window.location.href = '<?=Router::url(array("controller"=>"index", "action"=>"despesas"))?>';
	}, 10000);
</script>
<div class="orcamentos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Orcamento'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">
		<div class="col-md-12">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('valor'); ?></th>
						<th><?php echo $this->Paginator->sort('data_liberacao'); ?></th>
						<th><?php echo $this->Paginator->sort('categoria_id'); ?></th>
						<th><?php echo $this->Paginator->sort('executado'); ?></th>
						<th><?php echo $this->Paginator->sort('restante'); ?></th>						
					</tr>
				</thead>
				<tbody>
				<?php $total = $totalExecutado = 0;?>
				<?php foreach ($orcamentos as $orcamento): ?>
					<?php 
						$total += $orcamento['Orcamento']['valor'];
						$totalExecutado += @$despesas[$orcamento['Orcamento']['id']];
					?>
					<tr>						
						<td><?php echo h(CakeNumber::currency($orcamento['Orcamento']['valor'], 'BRL')); ?>&nbsp;</td>
						<td><?php echo h($this->time->format($orcamento['Orcamento']['data_liberacao'], '%d/%m/%Y')); ?>&nbsp;</td>
						<td><?php echo $orcamento['Categoria']['descricao'];?>
		</td>
						<td><?php echo h(CakeNumber::currency(@$despesas[$orcamento['Orcamento']['id']], 'BRL')); ?>&nbsp;</td>
						<td><?php echo h(CakeNumber::currency($orcamento['Orcamento']['valor']-@$despesas[$orcamento['Orcamento']['id']], 'BRL')); ?>&nbsp;</td>						
					</tr>
				<?php endforeach; ?>
				</tbody>
				<tfoot style="background-color: #cfa">
					<tr>
						<td colspan="3"><?=h(CakeNumber::currency($total, 'BRL'))?></td>
						<td><?=h(CakeNumber::currency($totalExecutado, 'BRL'))?></td>
						<td><?=h(CakeNumber::currency($total - $totalExecutado, 'BRL'))?></td>
					</tr>
				</tfoot>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->