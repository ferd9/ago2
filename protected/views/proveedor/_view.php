<div class="view">


        <b><?php echo CHtml::encode($data->getAttributeLabel('Proveedor')); ?>:</b>

        <?php echo CHtml::link(CHtml::encode($data->proveedor0->nombre), array('view', 'id'=>$data->idproveedor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ruc')); ?>:</b>
	<?php echo CHtml::encode($data->ruc); ?>
	<br />		


      

</div>