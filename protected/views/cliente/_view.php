<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre Cliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cliente0->nombre), array('view', 'id'=>$data->idcliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tipo Cliente')); ?>:</b>
	<?php echo CHtml::encode($data->idtipoCliente0->descripcion); ?>
	<br />





</div>