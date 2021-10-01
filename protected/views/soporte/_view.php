<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nro Soporte')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idsoporte), array('view', 'id'=>$data->idsoporte)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre del Cliente')); ?>:</b>
	<?php echo CHtml::encode($data->idcliente0->cliente0->nombrecompleto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha Ingreso Producto')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ingreso_soporte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha Salida Producto')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_salida_producto); ?>
	<br />
<?php /*
	<b> echo CHtml::encode($data->getAttributeLabel('tipo_atencion')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_atencion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_producto')); ?>:</b>
	<?php echo CHtml::encode($data->estado_producto); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	*/ ?>

</div>