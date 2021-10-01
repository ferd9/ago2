<div class="view">



    	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_documento')); ?>:</b>

        <?php echo CHtml::link(CHtml::encode($data->idtipoDocumento0->descripcion." / ".$data->numero_documento), array('view', 'id'=>$data->idventa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cliente')); ?>:</b>
	<?php echo CHtml::encode($data->idcliente0->cliente0->nombre); ?>
	<br />

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('Tipo Documento')); ?>:</b>
	<?php echo CHtml::encode($data->idtipoDocumento0->descripcion); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tipo Pago')); ?>:</b>
	<?php echo CHtml::encode($data->idtipoPago0->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_venta')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_venta); ?>
	<br />
<?php  /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />

 	<b><?php  /* echo CHtml::encode($data->getAttributeLabel('importe_total')); ?>:</b>
	<?php echo CHtml::encode($data->importe_total); ?>
	<br />


        <b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />
        
	<?php 
	<b><?php echo CHtml::encode($data->getAttributeLabel('hora')); ?>:</b>
	<?php echo CHtml::encode($data->hora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subtotal')); ?>:</b>
	<?php echo CHtml::encode($data->subtotal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('igv')); ?>:</b>
	<?php echo CHtml::encode($data->igv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe_total')); ?>:</b>
	<?php echo CHtml::encode($data->importe_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_venta')); ?>:</b>
	<?php echo CHtml::encode($data->estado_venta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_venta_pago')); ?>:</b>
	<?php echo CHtml::encode($data->estado_venta_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('almacen')); ?>:</b>
	<?php echo CHtml::encode($data->almacen); ?>
	<br />

	*/ ?>

</div>