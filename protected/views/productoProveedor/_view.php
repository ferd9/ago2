<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idproducto_proveedor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idproducto_proveedor), array('view', 'id'=>$data->idproducto_proveedor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proveedor')); ?>:</b>
	<?php echo CHtml::encode($data->proveedor0->proveedor0->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producto')); ?>:</b>
	<?php echo CHtml::encode($data->producto0->descripcion); ?>
	<br />


</div>