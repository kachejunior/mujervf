<?php

/** PHPExcel */
require_once 'excel_pdf/PHPExcel.php';
/** PHPExcel_IOFactory */
require_once 'excel_pdf/PHPExcel/IOFactory.php';
 
class Php_excel
{      
    function import($filename)
    {
        … 
    }
 
    function export(…)
    {
         $objPHPExcel = new PHPExcel();                      //creando un objeto excel
		$objPHPExcel->getProperties()->setCreator("Yanoski");//propiedades
		$objPHPExcel->setActiveSheetIndex(0);               //poniendo active hoja 1
		$objPHPExcel->getActiveSheet()->setTitle("Hoja1");  //título de la hoja 1

		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row, $value);                                         //poniendo algo en una celda

		$styleArray = array('font' => array('bold' => true));
		$objPHPExcel->getActiveSheet()->getStyle('A1:Z1')-> applyFromArray($styleArray);                  //poniendo en negritas una fila

		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
												//poniendo una columna con tamaño auto según el contenido

		//creando un objeto writer para exportar el excel, y direccionando salida hacia el cliente web para invocar diálogo de salvar:
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$tablename.$ext);
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output');
    }    
}
?>
