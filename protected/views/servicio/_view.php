<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Servicio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nombreservicio), array('view', 'id'=>$data->idservicio)); ?>
	<br />
</div>