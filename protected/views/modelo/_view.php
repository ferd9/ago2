<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmodelo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idmodelo), array('view', 'id'=>$data->idmodelo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmarca')); ?>:</b>
	<?php echo CHtml::encode($data->idmarca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcategoria')); ?>:</b>
	<?php echo CHtml::encode($data->idcategoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>