<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('razon_social')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->razon_social), array('view', 'id'=>$data->idtransporte)); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('ruc')); ?>:</b>
	<?php echo CHtml::encode($data->ruc); ?>
	<br />

        <?php /* echo CHtml::encode($data->getAttributeLabel('licencia_conducir')); ?>:</b>
	<?php echo CHtml::encode($data->licencia_conducir); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('nro_soat')); ?>:</b>
	<?php echo CHtml::encode($data->nro_soat); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('nro_placa')); ?>:</b>
	<?php echo CHtml::encode($data->nro_placa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marca_vehiculo')); ?>:</b>
	<?php echo CHtml::encode($data->marca_vehiculo); ?>
	<br />	

	<b><?php echo CHtml::encode($data->getAttributeLabel('certificado_inscripcion')); ?>:</b>
	<?php echo CHtml::encode($data->certificado_inscripcion); ?>
	<br />		

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode(($data->estado == 1) ? "✔ - Activo" : "✗ - Inactivo"); */?>
	<br />

</div>