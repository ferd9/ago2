<?php

/**
 * This is the model class for table "save_us_ab".
 *
 * The followings are the available columns in table 'save_us_ab':
 * @property integer $idplana
 * @property integer $idproducto
 * @property string $nomproducto
 * @property string $precio
 * @property integer $idmoneda
 * @property string $moneda
 * @property string $nro_serie
 * @property string $codigo_barras
 * @property integer $idtipo_adquisicion
 * @property string $tipo_adquisicion
 * @property string $idtipo_ingreso
 * @property string $tipo_ingreso
 * @property integer $garantia
 * @property string $descripcion
 * @property integer $cantidad
 * @property integer $almacen
 * @property string $usuario
 */
class SaveUsAb extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SaveUsAb the static model class
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
		return 'save_us_ab';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idproducto, idmoneda, idtipo_adquisicion, garantia, cantidad, almacen', 'numerical', 'integerOnly'=>true),
			array('nomproducto, descripcion', 'length', 'max'=>300),
			array('precio', 'length', 'max'=>9),
			array('moneda, tipo_adquisicion, tipo_ingreso', 'length', 'max'=>20),
			array('nro_serie, codigo_barras', 'length', 'max'=>70),
			array('idtipo_ingreso', 'length', 'max'=>1),
			array('usuario', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idplana, idproducto, nomproducto, precio, idmoneda, moneda, nro_serie, codigo_barras, idtipo_adquisicion, tipo_adquisicion, idtipo_ingreso, tipo_ingreso, garantia, descripcion, cantidad, almacen, usuario', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idplana' => 'Idplana',
			'idproducto' => 'Idproducto',
			'nomproducto' => 'Nomproducto',
			'precio' => 'Precio',
			'idmoneda' => 'Idmoneda',
			'moneda' => 'Moneda',
			'nro_serie' => 'Nro Serie',
			'codigo_barras' => 'Codigo Barras',
			'idtipo_adquisicion' => 'Idtipo Adquisicion',
			'tipo_adquisicion' => 'Tipo Adquisicion',
			'idtipo_ingreso' => 'Idtipo Ingreso',
			'tipo_ingreso' => 'Tipo Ingreso',
			'garantia' => 'Garantia',
			'descripcion' => 'Descripcion',
			'cantidad' => 'Cantidad',
			'almacen' => 'Almacen',
			'usuario' => 'Usuario',
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
                $usera = Yii::app()->user->name;
                $criteria->condition="usuario ='$usera'";
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}