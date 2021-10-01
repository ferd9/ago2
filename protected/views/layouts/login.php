<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/css/style.css" />
<!--[if lt IE 8.]>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/css/style-ie.css" />
<![endif]-->
<!--[if lt IE 7.]>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/css/style-ie6.css" />
<![endif]-->
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/favicon.ico" type="image/x-icon" />
</head>
<body>
<div id="form_logo">
 <img  src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/logorya.png" width="250px" heigth="100px"/>
</div>
 
 <div id="main_body">
<div class="form_title">
    <strong>Ingreso</strong>
</div>
<div class="form_box">
<?php
echo $content;
?>
</div>
</div>
 </body>
</html>