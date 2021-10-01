<?php
OpenFlashChart2Loader::load();
$cn = ReporteController::conectar();
$vsql = "SELECT * FROM __tmp_grafico_ventas_totales ORDER BY numfecha ASC";
$qry = mysqli_query($cn, $vsql);
$data = array();
$data2 = array();
$fechadata = array();
while($row=mysqli_fetch_array($qry))
{
$data[] = intval($row['cantidad']);
$data2[] = $row['sumatotal'];
$fechadata [] = $row['fechaventa'];
}
$animation_1= isset($_GET['animation_1'])?$_GET['animation_1']:'pop';
$delay_1    = isset($_GET['delay_1'])?$_GET['delay_1']:0.5;
$cascade_1    = isset($_GET['cascade_1'])?$_GET['cascade_1']:1;
 $bar = new bar_filled( '#E2D66A', '#577261' );
 $bar->set_values( $data );
 $bar->set_colour( '#FFEF3F' );
 $bar->set_on_show(new bar_on_show($animation_1, $cascade_1, $delay_1));
 $bar->set_tooltip( 'Cantidad Ventas: #val#');

 $y = new y_axis();
 $y->set_range( 0, 1000, 50 );
 $y->set_colour( '#ff7d14' );
 $y->set_grid_colour( '#faffae' );

 $y_legend = new y_legend( 'Cantidad' );
 $y_legend->set_style( '{font-size: 16px; color: #778877}' );

 $x = new x_axis();
 $x->set_colour( '#ff7d14' );
 $x->set_grid_colour( '#faffae' );
 $x_labels = new x_axis_labels();
 $x_labels->set_steps( 2 );
 $x_labels->set_colour( '#858585' );
 $x->set_labels_from_array($fechadata);

 $x_legend = new x_legend('Año: '.$fecha);
 $x_legend->set_style( '{font-size: 16px; color: #778877}' );

 $title = new title( "Extracto Global Ventas" );
 $title->set_style( "{font-size: 20px; font-family: Times New Roman; font-weight: bold; color: #ff7d14; text-align: center;}" );
 $chart = new open_flash_chart();
 $chart->set_title( $title );
 $chart->add_element( $bar );
 $chart->set_bg_colour( '#FFFFFF' );
 $chart->set_y_axis( $y );
 $chart->set_x_axis( $x );
 $chart->set_x_legend( $x_legend );
 $chart->set_y_legend( $y_legend );
 $this->widget(
  'application.extensions.OpenFlashChart2Widget.OpenFlashChart2Widget',
  array(
    'chart' => $chart,
    'width' => '700',
    'height'=>' 400'
  )
);
?>
