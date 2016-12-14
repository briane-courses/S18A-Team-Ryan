 <?php
 	 include "connector.php";
 	 require_once ('mpdf60/mpdf.php');

	 $table = $_SESSION['table'];
	 
	 /*this is the constructor with different options :  mPDF([ string $mode [, mixed $format [, 
	 *float $default_font_size [, string $default_font [, float $margin_left , float $margin_right ,
	 *float $margin_top , float $margin_bottom , float $margin_header , float $margin_footer [,
	 *string $orientation ]]]]]])*/
	 $mpdf = new mPDF('win-1252', 'A4', '', '', 10, '', '', '', '', '');
	 $mpdf -> useOnlyCoreFonts = true;
	 $mpdf -> SetDisplayMode('fullpage');
	 $mpdf -> WriteHTML($table);
	 $mpdf -> Output();// this generates the pdf
 exit;
 ?>