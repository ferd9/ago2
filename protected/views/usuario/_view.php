<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->login), array('view', 'id'=>$data->login)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nivel')); ?>:</b>
	<?php echo CHtml::encode($data->nivel0->descripcion); ?>
	<br />


</div>