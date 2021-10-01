<?php

/**
 * This is the model class for table "Producto".
 *
 * The followings are the available columns in table 'Producto':
 * @property integer $idproducto
 * @property integer $idcategoria
 * @property integer $idmarca
 * @property integer $idmodelo
 * @property integer $idtipo_moneda
 * @property integer $idigv
 * @property string $descripcion
 * @property string $precio_compra
 * @property string $precio_sin_igv
 * @property string $precio_con_igv
 * @property string $descuento
 * @property string $unidad_medida
 * @property string $foto
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Almacen[] $almacens
 * @property Compra[] $compras
 * @property GuiaRemisionCompra[] $guiaRemisionCompras
 * @property GuiaRemisionVenta[] $guiaRemisionVentas
 * @property OrdenCompra[] $ordenCompras
 * @property Venta[] $ventas
 * @property OfertaProducto[] $ofertaProductos
 * @property Igv $idigv0
 * @property Modelo $idmodelo0
 * @property Modelo $idmarca0
 * @property Modelo $idcategoria0
 * @property TipoMoneda $idtipoMoneda0
 */
class Producto extends CActiveRecord
{

        public static $wordSearch;
        public $cantidad;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Producto the static model class
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
		return 'producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcategoria, idmarca, idmodelo, idtipo_moneda, idigv, precio_sin_igv, precio_con_igv, descuento, foto', 'required'),
			array('idcategoria, idmarca, idmodelo, idtipo_moneda, idigv', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>250),
			array('precio_compra, precio_sin_igv, precio_con_igv, descuento', 'length', 'max'=>9),
			array('unidad_medida', 'length', 'max'=>10),
			array('foto', 'length', 'max'=>45),
			array('estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idproducto, idcategoria, idmarca, idmodelo, idtipo_moneda, idigv, descripcion, precio_compra, precio_sin_igv, precio_con_igv, descuento, unidad_medida, foto, estado', 'safe', 'on'=>'search'),
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
			'almacens' => array(self::MANY_MANY, 'Almacen', 'almacen_producto(idproducto, idalmacen)'),
			'compras' => array(self::MANY_MANY, 'Compra', 'detalle_compra(idproducto, idcompra)'),
			'guiaRemisionCompras' => array(self::MANY_MANY, 'GuiaRemisionCompra', 'detalle_guia_remision_compra(idproducto, idguia_remision_compra)'),
			'guiaRemisionVentas' => array(self::MANY_MANY, 'GuiaRemisionVenta', 'detalle_guia_venta(idproducto, idguia_remision_venta)'),
			'ordenCompras' => array(self::MANY_MANY, 'OrdenCompra', 'detalle_orden_compra(idproducto, idorden_compra)'),
			'ventas' => array(self::MANY_MANY, 'Venta', 'detalle_venta(idproducto, idventa)'),
			'ofertaProductos' => array(self::HAS_MANY, 'OfertaProducto', 'idproducto'),
			'idigv0' => array(self::BELONGS_TO, 'Igv', 'idigv'),
			'idmodelo0' => array(self::BELONGS_TO, 'Modelo', 'idmodelo'),
			'idmarca0' => array(self::BELONGS_TO, 'Modelo', 'idmarca'),
			'idcategoria0' => array(self::BELONGS_TO, 'Modelo', 'idcategoria'),
			'idtipoMoneda0' => array(self::BELONGS_TO, 'TipoMoneda', 'idtipo_moneda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idproducto' => 'Idproducto',
			'idcategoria' => 'Idcategoria',
			'idmarca' => 'Idmarca',
			'idmodelo' => 'Idmodelo',
			'idtipo_moneda' => 'Idtipo Moneda',
			'idigv' => 'Idigv',
			'descripcion' => 'Descripcion',
			'precio_compra' => 'Precio Compra',
			'precio_sin_igv' => 'Precio Sin Igv',
			'precio_con_igv' => 'Precio Con Igv',
			'descuento' => 'Descuento',
			'unidad_medida' => 'Unidad Medida',
			'foto' => 'Foto',
			'estado' => 'Estado',
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
                $criteria->group="descripcion";
		$criteria->compare('idproducto',$this->idproducto);
		$criteria->compare('idcategoria',$this->idcategoria);
		$criteria->compare('idmarca',$this->idmarca);
		$criteria->compare('idmodelo',$this->idmodelo);
		$criteria->compare('idtipo_moneda',$this->idtipo_moneda);
		$criteria->compare('idigv',$this->idigv);
		$criteria->compare('t.descripcion',$this->descripcion,true);
		$criteria->compare('t.precio_compra',$this->precio_compra,true);
		$criteria->compare('t.precio_sin_igv',$this->precio_sin_igv,true);
		$criteria->compare('t.precio_con_igv',$this->precio_con_igv,true);
		$criteria->compare('t.descuento',$this->descuento,true);
		$criteria->compare('t.unidad_medida',$this->unidad_medida,true);
		$criteria->compare('t.estado',$this->estado,true);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

        public function buscar($condicion)
        {
            $criteria=new CDbCriteria;
            $criteria->condition = "descripcion like CONCAT('%','".$condicion."',' %')";
            return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
            echo "condicion....-> ".$condicion."...";
        }

        public function getWordBuscar()
        {
            return self::$wordSearch;
        }



        public static function getdatosproductocombo()
    {
            $cat = new CDbCriteria;
            $cat->condition = 'estado=1 group by descripcion';
            $listCat = array();
            $listCat =CHtml::listData(Producto::model()->findAll($cat),'descripcion','descripcion');
            array_unshift($listCat,'Seleccionar');
            return $listCat;
    }

    public static function getListproductos()
        {
            $connection=  Yii::app()->db;
            $sqlStatement="SELECT descripcion FROM producto ORDER BY descripcion ASC;";
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
            $reader=$command->query();

            $idnomCli = array();
            foreach($reader as $row)
                {
                foreach ($row as $fila=>$value)
                    {
                            array_push($idnomCli, $value);
                    }
                }
            return $idnomCli;

        }





     public static function getidproducto($descrip)
            {
            $ab = Producto::model()->findAllBySql("SELECT * FROM producto WHERE descripcion='".$descrip."' LIMIT 1;");
            $abc = $ab[0]['idproducto'];
            return $abc;
            }


}