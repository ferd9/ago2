<?php

/**
 * This is the model class for table "ago.almacen".
 *
 * The followings are the available columns in table 'ago.almacen':
 * @property integer $idalmacen
 * @property integer $idempresa
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $fax
 * @property string $anexo
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Empresa $idempresa0
 * @property AlmacenProducto[] $almacenProductos
 * @property MovimientoAlmacen[] $movimientoAlmacens
 * @property Usuario[] $usuarios
 */
class Almacen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Almacen the static model class
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
		return 'almacen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idempresa', 'required'),
			array('idempresa', 'numerical', 'integerOnly'=>true),
			array('nombre, direccion', 'length', 'max'=>200),
                        array('nombre','unique'),
			array('telefono, fax, anexo', 'length', 'max'=>20),
			array('estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idalmacen, idempresa, nombre, direccion, telefono, fax, anexo, estado', 'safe', 'on'=>'search'),
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
			'idempresa0' => array(self::BELONGS_TO, 'Empresa', 'idempresa'),
			'productos' => array(self::MANY_MANY, 'Producto', 'almacen_producto(idalmacen, idproducto)'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'almacen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idalmacen' => 'Idalmacen',
			'idempresa' => 'Empresa Ruc',
			'nombre' => 'Nombre Almacen',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'fax' => 'Fax',
			'anexo' => 'Anexo',
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

		$criteria->compare('t.idalmacen',$this->idalmacen);
		$criteria->compare('idempresa0.ruc',$this->idempresa,true);
		$criteria->compare('t.nombre',$this->nombre,true);
		$criteria->compare('t.direccion',$this->direccion,true);
		$criteria->compare('t.telefono',$this->telefono,true);
		$criteria->compare('t.fax',$this->fax,true);
		$criteria->compare('t.anexo',$this->anexo,true);
		$criteria->compare('t.estado',$this->estado,true);
                $criteria->with=array('idempresa0');

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

        public static function getAlmacen()
        {
                $nomalmacen;
                $connection=  Yii::app()->db;
                $sqlStatement="SELECT a.nombre FROM almacen a INNER JOIN usuario u ON u.almacen=a.idalmacen WHERE u.login='".Yii::app()->user->name."' LIMIT 1;";
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
                $reader=$command->query();

                foreach($reader as $row)
                    {
                    foreach ($row as $fila=>$value)
                        {
                            $nomalmacen = $value;
                        }
                    }
                    return $nomalmacen;
        }

        public static function getdatosalmacencombo()
        {
            $almacenn = self::model()->findAll();
            return  CHtml::listData($almacenn,'idalmacen','nombre');
        }



         public static function getnombreAlmacen($idalmacen)
        {
                $nomalmacen;
                $connection=  Yii::app()->db;
                $sqlStatement="SELECT nombre FROM almacen WHERE idalmacen='".$idalmacen."' LIMIT 1;";
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
                $reader=$command->query();

                foreach($reader as $row)
                    {
                    foreach ($row as $fila=>$value)
                        {
                            $nomalmacen = $value;
                        }
                    }
                    return $nomalmacen;
        }

        public static function getalmacendiferente($idalmacen)
    {
            $cat = new CDbCriteria;
            $cat->condition = "idalmacen<>$idalmacen";
            $listCat = array();
            $listCat =CHtml::listData(Almacen::model()->findAll($cat),'idalmacen','nombre');
            array_unshift($listCat,'Seleccionar');
            return $listCat;
    }
}