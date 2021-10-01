<?php

/**
 * This is the model class for table "ago.tipo_documento".
 *
 * The followings are the available columns in table 'ago.tipo_documento':
 * @property integer $idtipo_documento
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Compra[] $compras
 * @property Venta[] $ventas
 */
class TipoDocumento extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TipoDocumento the static model class
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
		return 'tipo_documento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion', 'required'),
			array('descripcion', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtipo_documento, descripcion', 'safe', 'on'=>'search'),
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
			'compras' => array(self::HAS_MANY, 'Compra', 'idtipo_documento'),
			'ventas' => array(self::HAS_MANY, 'Venta', 'idtipo_documento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtipo_documento' => 'Idtipo Documento',
			'descripcion' => 'Descripcion',
		);
	}

        public static function getTipoDocument()
        {
            $tipodocumento = self::model()->findAll();
            return  CHtml::listData($tipodocumento,'idtipo_documento','descripcion');
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

		$criteria->compare('idtipo_documento',$this->idtipo_documento);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

        public static function getTipoDoc($codtipodoc)
        {
            $nomdoc = Cliente::model()->findAllBySql("SELECT descripcion FROM tipo_documento WHERE idtipo_documento='".$codtipodoc."';");
            $nombredoc = $nomdoc[count($nomdoc)-1]['descripcion'];
            return $nombredoc;
        }

         public static function getTipoDocumento()
        {
            $tipodocumento = new CDbCriteria;
            $tipodocumento->condition = "idtipo_documento<>5";
            $tipodocumentoa = self::model()->findAll($tipodocumento);
            $listTipoDoc = array();
            $listTipoDoc = CHtml::listData($tipodocumentoa,'idtipo_documento','descripcion');
            array_unshift($listTipoDoc,'Seleccionar');
            return  $listTipoDoc;
        }


        public static function getTipoDocumentocompra()
        {
            $tipodocumento = new CDbCriteria;
            $tipodocumento->condition = "idtipo_documento<>3 and idtipo_documento<>4";
            $tipodocumentoa = self::model()->findAll($tipodocumento);
            $listTipoDoc = array();
            $listTipoDoc = CHtml::listData($tipodocumentoa,'descripcion','descripcion');
            array_unshift($listTipoDoc,'Seleccionar');
            return  $listTipoDoc;
        }


         public static function getidTipoDocumentocompra($descriptipodoc)
        {
            $des = TipoDocumento::model()->findAllBySql("SELECT idtipo_documento FROM tipo_documento where descripcion='$descriptipodoc';");
            $id = $des[0]['idtipo_documento'];
            return $id;
        }
}