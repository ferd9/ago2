<?php

/**
 * This is the model class for table "compra".
 *
 * The followings are the available columns in table 'compra':
 * @property integer $idcompra
 * @property integer $idproveedor
 * @property integer $idorden_compra
 * @property string $numero_documento
 * @property string $fecha_compra
 * @property string $fecha_registro
 * @property string $estado
 * @property string $usuario
 * @property integer $idtipo_documento
 * @property string $sub_total
 * @property string $igv
 * @property string $total
 * @property string $estado_pago
 * @property string $observacion
 * @property integer $idtipo_pago
 * @property string $descuento_total
 *
 * The followings are the available model relations:
 * @property TipoDocumento $idtipoDocumento0
 * @property OrdenCompra $idordenCompra0
 * @property Proveedor $idproveedor0
 * @property TipoPago $idtipoPago0
 * @property DetalleCompra[] $detalleCompras
 * @property GuiaRemisionCompra[] $guiaRemisionCompras
 */
class Compra extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Compra the static model class
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
		return 'compra';
	}

/*

       protected function beforeSave()
        {
           if(parent::beforeSave())
           {
               if($this->isNewRecord)
               {
               $idPersona = Persona::model()->findByAttributes(array('nombre'=>$_POST['Compra']['idproveedor']));
               $idProveedor = Proveedor::model()->findByAttributes(array('proveedor'=>$idPersona->idpersona));
               $this->idproveedor = $idProveedor->idproveedor;
               }
               return true;
           }else
               return false;

        }

*/
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idproveedor, numero_documento, fecha_compra, fecha_registro, usuario, idtipo_documento', 'required'),
			array('idproveedor, idtipo_documento, idtipo_pago', 'numerical', 'integerOnly'=>true),
			array('numero_documento', 'length', 'max'=>20),
			array('estado, estado_pago', 'length', 'max'=>1),
			array('usuario', 'length', 'max'=>50),
			array('sub_total, igv, total, descuento_total', 'length', 'max'=>9),
			array('observacion', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcompra, idproveedor, numero_documento, fecha_compra, fecha_registro, estado, usuario, idtipo_documento, sub_total, igv, total, estado_pago, observacion, idtipo_pago, descuento_total', 'safe', 'on'=>'search'),
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
			'idtipoDocumento0' => array(self::BELONGS_TO, 'TipoDocumento', 'idtipo_documento'),
			'idproveedor0' => array(self::BELONGS_TO, 'Proveedor', 'idproveedor'),
			'idtipoPago0' => array(self::BELONGS_TO, 'TipoPago', 'idtipo_pago'),
			'detalleCompras' => array(self::HAS_MANY, 'DetalleCompra', 'idcompra'),
			'guiaRemisionCompras' => array(self::HAS_MANY, 'GuiaRemisionCompra', 'idcompra'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcompra' => 'Idcompra',
			'idproveedor' => 'Idproveedor',
			'numero_documento' => 'Numero Documento',
			'fecha_compra' => 'Fecha Compra',
			'fecha_registro' => 'Fecha Registro',
			'estado' => 'Estado',
			'usuario' => 'Usuario',
			'idtipo_documento' => 'Idtipo Documento',
			'sub_total' => 'Sub Total',
			'igv' => 'Igv',
			'total' => 'Total',
			'estado_pago' => 'Estado Pago',
			'observacion' => 'Observacion',
			'idtipo_pago' => 'Idtipo Pago',
			'descuento_total' => 'Descuento Total',
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

		$criteria->compare('idcompra',$this->idcompra);
		$criteria->compare('idproveedor',$this->idproveedor);
		$criteria->compare('numero_documento',$this->numero_documento,true);
		$criteria->compare('fecha_compra',$this->fecha_compra,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('idtipo_documento',$this->idtipo_documento);
		$criteria->compare('sub_total',$this->sub_total,true);
		$criteria->compare('igv',$this->igv,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('estado_pago',$this->estado_pago,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('idtipo_pago',$this->idtipo_pago);
		$criteria->compare('descuento_total',$this->descuento_total,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}