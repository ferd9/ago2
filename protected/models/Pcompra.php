<?php

/**
 * This is the model class for table "pcompra".
 *
 * The followings are the available columns in table 'pcompra':
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
 * @property string $cambio
 * @property integer $garantia
 * @property string $descripcion
 * @property integer $cantidad
 * @property integer $almacen
 * @property string $usuario
 * @property string $accion_save
 */
class Pcompra extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pcompra the static model class
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
		return 'pcompra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idproducto, idmoneda, idtipo_adquisicion, garantia,cantidad, almacen', 'numerical', 'integerOnly'=>true),
			array('nomproducto, descripcion', 'length', 'max'=>300),
			array('precio, cambio', 'length', 'max'=>9),
			array('moneda, tipo_adquisicion', 'length', 'max'=>20),
			array('nro_serie, codigo_barras', 'length', 'max'=>70),
			array('usuario', 'length', 'max'=>50),
			array('accion_save', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idplana, idproducto, nomproducto, precio, idmoneda, moneda, nro_serie, codigo_barras, idtipo_adquisicion, tipo_adquisicion, cambio, garantia, descripcion, cantidad, almacen, usuario, accion_save', 'safe', 'on'=>'search'),
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
			'cambio' => 'Cambio',
			'garantia' => 'Garantia',
			'descripcion' => 'Descripcion',
			'cantidad' => 'Cantidad',
			'almacen' => 'Almacen',
			'usuario' => 'Usuario',
			'accion_save' => 'Accion Save',
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
                $usuario= Yii::app()->user->name;
                $criteria->condition="usuario='$usuario'";
		$criteria->compare('nomproducto',$this->nomproducto);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('moneda',$this->moneda);
		$criteria->compare('tipo_adquisicion',$this->tipo_adquisicion);
		$criteria->compare('almacen',$this->almacen);
		$criteria->compare('usuario',$this->usuario);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}


        protected function beforeSave()
        {
            if(parent::beforeSave())
           {
               if($this->isNewRecord)
               {
                   $idtipoAdquisiscion = TipoAdquisicion::model()->findByAttributes(array('idtipo_adquisicion'=>$_POST['Pcompra']['tipo_adquisicion']));    //Persona::model()->findByAttributes(array('nombre'=>$_POST['Compra']['idproveedor']));
                   $idAlmacen = Usuario::model()->findByAttributes(array('login'=>Yii::app()->user->name));
                   $this->idtipo_adquisicion = $idtipoAdquisiscion->idtipo_adquisicion;
                   $this->tipo_adquisicion = $idtipoAdquisiscion->descripcion;
                   $this->almacen = $idAlmacen->almacen;
                   $this->usuario = Yii::app()->user->name;

               }
               return true;
           }else
               return false;
        }
}