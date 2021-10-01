<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nro Documento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->numero_documento), array('view', 'id'=>$data->idguia_remision_compra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transporte')); ?>:</b>
	<?php echo CHtml::encode($data->transporte0->razon_social); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('Proveedor')); ?>:</b>
	<?php echo CHtml::encode($data->idproveedor0->proveedor0->nombrecompleto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_origen')); ?>:</b>
	<?php echo CHtml::encode($data->numero_origen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_origen')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_origen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_origen')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_origen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_traslado')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_traslado); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_orden_compra')); ?>:</b>
	<?php echo CHtml::encode($data->numero_orden_compra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flete')); ?>:</b>
	<?php echo CHtml::encode($data->flete); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('almacen')); ?>:</b>
	<?php echo CHtml::encode($data->almacen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	
	*/ ?>

</div>