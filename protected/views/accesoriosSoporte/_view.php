<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idacce_soporte')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idacce_soporte), array('view', 'id'=>$data->idacce_soporte)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_soporte')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad_soporte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_soporte')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_soporte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serie_soporte')); ?>:</b>
	<?php echo CHtml::encode($data->serie_soporte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigobarras_soporte')); ?>:</b>
	<?php echo CHtml::encode($data->codigobarras_soporte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_sopore')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_sopore); ?>
	<br />


</div>