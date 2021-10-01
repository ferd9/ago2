<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuario), array('view', 'id'=>$data->usuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sutbotal')); ?>:</b>
	<?php echo CHtml::encode($data->sutbotal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('igv')); ?>:</b>
	<?php echo CHtml::encode($data->igv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descuento')); ?>:</b>
	<?php echo CHtml::encode($data->descuento); ?>
	<br />


</div>