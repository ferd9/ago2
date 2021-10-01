<?php

class ProductoManager extends TabularInputManager
{

    protected $class='Producto';

    public function getItems()
    {
        if (is_array($this->_items))
            return ($this->_items);
        else
            return array(
                'n0'=>new Producto(),
            );
    }


    public function deleteOldItems($model, $itemsPk)
    {
        $criteria=new CDbCriteria;
        $criteria->addNotInCondition('idproducto', $itemsPk);
        $criteria->addCondition("idventa= {$model->primaryKey}");

        Producto::model()->deleteAll($criteria);
    }


    public static function load($model)
    {
        $return= new ProductoManager();
        foreach ($model->students as $item)
            $return->_items[$item->primaryKey]=$item;
        return $return;
    }


    public function setUnsafeAttribute($item, $model)
    {
        $item->idventa=$model->primaryKey;

    }


}