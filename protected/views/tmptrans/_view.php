<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtmptras')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtmptras), array('view', 'id'=>$data->idtmptras)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idproducto')); ?>:</b>
	<?php echo CHtml::encode($data->idproducto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreproducto')); ?>:</b>
	<?php echo CHtml::encode($data->nombreproducto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preciocompra')); ?>:</b>
	<?php echo CHtml::encode($data->preciocompra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preciosinigv')); ?>:</b>
	<?php echo CHtml::encode($data->preciosinigv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precioconigv')); ?>:</b>
	<?php echo CHtml::encode($data->precioconigv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stockproducto')); ?>:</b>
	<?php echo CHtml::encode($data->stockproducto); ?>
	<br />


</div>