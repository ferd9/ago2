<?php

/**
 * This is the model class for table "ago.almacen_producto".
 *
 * The followings are the available columns in table 'ago.almacen_producto':
 * @property integer $idalmacen
 * @property integer $idmovimiento_almacen
 * @property integer $stock
 * @property integer $stock_minimo
 * @property integer $stock_maximo
 *
 * The followings are the available model relations:
 * @property Almacen $idalmacen0
 * @property MovimientoAlmacen $idmovimientoAlmacen0
 */
class AlmacenProducto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AlmacenProducto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'almacen_producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idalmacen, idmovimiento_almacen, stock, stock_minimo, stock_maximo', 'required'),
			array('idalmacen, idmovimiento_almacen, stock, stock_minimo, stock_maximo', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idalmacen, idmovimiento_almacen, stock, stock_minimo, stock_maximo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idalmacen0' => array(self::BELONGS_TO, 'Almacen', 'idalmacen'),
			'idmovimientoAlmacen0' => array(self::BELONGS_TO, 'MovimientoAlmacen', 'idmovimiento_almacen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idalmacen' => 'Idalmacen',
			'idmovimiento_almacen' => 'Idmovimiento Almacen',
			'stock' => 'Stock',
			'stock_minimo' => 'Stock Minimo',
			'stock_maximo' => 'Stock Maximo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idalmacen',$this->idalmacen);
		$criteria->compare('idmovimiento_almacen',$this->idmovimiento_almacen);
		$criteria->compare('stock',$this->stock);
		$criteria->compare('stock_minimo',$this->stock_minimo);
		$criteria->compare('stock_maximo',$this->stock_maximo);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

        public static function getstockproducto($idproducto)
        {
            $connection=  Yii::app()->db;
            $sqlStatement="SELECT stock FROM almacen_producto WHERE idproducto='".$idproducto."' LIMIT 1;";
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
            $reader=$command->query();

            $stockProducto;
            foreach($reader as $row)
                {
                foreach ($row as $fila=>$value)
                    {
                        $stockProducto=$value;
                    }
                }
            return $stockProducto;

        }
}