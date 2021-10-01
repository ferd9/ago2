<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idplana')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idplana), array('view', 'id'=>$data->idplana)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idproducto')); ?>:</b>
	<?php echo CHtml::encode($data->idproducto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomproducto')); ?>:</b>
	<?php echo CHtml::encode($data->nomproducto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('garantia')); ?>:</b>
	<?php echo CHtml::encode($data->garantia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_serie')); ?>:</b>
	<?php echo CHtml::encode($data->nro_serie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_barras')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_barras); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('almacen')); ?>:</b>
	<?php echo CHtml::encode($data->almacen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	*/ ?>

</div>