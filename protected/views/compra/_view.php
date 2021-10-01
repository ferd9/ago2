<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_documento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtipoDocumento0->descripcion." / ".$data->numero_documento), array('view', 'id'=>$data->idcompra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Proveedor')); ?>:</b>
	<?php echo CHtml::encode($data->idproveedor0->proveedor0->nombrecompleto); ?>
	<br />

        	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_compra')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_compra); ?>
	<br />


<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idorden_compra')); ?>:</b>
	<?php echo CHtml::encode($data->idorden_compra); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_documento')); ?>:</b>
	<?php echo CHtml::encode($data->numero_documento); ?>
	<br />


<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtipo_documento')); ?>:</b>
	<?php echo CHtml::encode($data->idtipo_documento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_total')); ?>:</b>
	<?php echo CHtml::encode($data->sub_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('igv')); ?>:</b>
	<?php echo CHtml::encode($data->igv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_pago')); ?>:</b>
	<?php echo CHtml::encode($data->estado_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtipo_pago')); ?>:</b>
	<?php echo CHtml::encode($data->idtipo_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descuento_total')); ?>:</b>
	<?php echo CHtml::encode($data->descuento_total); ?>
	<br />

	*/ ?>

</div>