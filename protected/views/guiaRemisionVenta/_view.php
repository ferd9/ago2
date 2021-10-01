<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_documento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->numero_documento), array('view', 'id'=>$data->idguia_remision_venta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Transporte')); ?>:</b>
	<?php echo CHtml::encode($data->idtransporte0->razon_social); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cliente')); ?>:</b>
	<?php echo CHtml::encode($data->idcliente0->cliente0->nombrecompleto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_destino')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_destino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_traslado')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_traslado); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('direccion_origen')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_origen); ?>
	<br />

	<?php /*
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('almacen')); ?>:</b>
	<?php echo CHtml::encode($data->almacen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	*/ ?>

</div>