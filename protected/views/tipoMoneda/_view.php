<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Moneda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->descripcion), array('view', 'id'=>$data->idtipo_moneda)); ?>
	<br />


</div>