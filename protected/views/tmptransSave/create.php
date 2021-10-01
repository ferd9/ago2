<h2><?php echo $tmp->idproducto." // ".$tmp->nombreproducto;?></h2>

<?php echo $this->renderPartial('_form', array('tmp'=>$tmp,'mjs'=>$mjs,'model'=>$model)); ?>