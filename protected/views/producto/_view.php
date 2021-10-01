<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Producto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->descripcion), array('view', 'id'=>$data->idproducto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria')); ?>:</b>
	<?php echo CHtml::encode($data->idcategoria0->idcategoria0->idcategoria0->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marca')); ?>:</b>
	<?php echo CHtml::encode($data->idmarca0->idmarca0->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelo')); ?>:</b>
	<?php echo CHtml::encode($data->idmodelo0->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('moneda')); ?>:</b>
	<?php echo CHtml::encode($data->idtipoMoneda0->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
	<?php echo CHtml::encode($data->precio_con_igv); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />



<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('idigv')); ?>:</b>
	<?php echo CHtml::encode($data->idigv0->descripcion); ?>
	<br />-->

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />-->

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_compra')); ?>:</b>
	<?php echo CHtml::encode($data->precio_compra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_sin_igv')); ?>:</b>
	<?php echo CHtml::encode($data->precio_sin_igv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_con_igv')); ?>:</b>
	<?php echo CHtml::encode($data->precio_con_igv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descuento')); ?>:</b>
	<?php echo CHtml::encode($data->descuento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad_medida')); ?>:</b>
	<?php echo CHtml::encode($data->unidad_medida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto')); ?>:</b>
	<?php echo CHtml::encode($data->foto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	*/ ?>

</div>