<?php

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

require_once __DIR__ . '../../../libs/vendor/phpoffice/phpspreadsheet/src/Bootstrap.php';

$helper = new Sample();
if ($helper->isCli()) {
    $helper->log('This example should only be run from a Web Browser' . PHP_EOL);

    return;
}
// Create new Spreadsheet object
$spreadsheet = new Spreadsheet();

// Set document properties
$spreadsheet->getProperties()->setCreator('Maarten Balliauw')
    ->setLastModifiedBy('Maarten Balliauw')
    ->setTitle('Office 2007 XLSX Test Document')
    ->setSubject('Office 2007 XLSX Test Document')
    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
    ->setKeywords('office 2007 openxml php')
    ->setCategory('Test result file');


require_once "app/modelo/CDocente.php";


// Create new Spreadsheet object
$spreadsheet = new Spreadsheet();
$ODocente = new CDocente(); 
$docentes = $ODocente->listarDocentes(); 

// Add some data
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'CÉDULA')
    ->setCellValue('B1', 'NOMBRE')
    ->setCellValue('C1', 'APELLIDO')
    ->setCellValue('D1', 'FECHA DE NACIMIENTO')
    ->setCellValue('E1', 'SEXO')
    ->setCellValue('F1', 'TELEFONO');


// //Miscellaneous glyphs, UTF-8
    foreach ($docentes['data'] as $posicion => $data ) {
    $posicionNew=$posicion+2;
    if ($data->sexo==1) {
        $sexo='FEMENINO';
    }else{
        $sexo='MASCULINO';
    }
    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue("A$posicionNew" , "$data->cedDoc")
    ->setCellValue("B$posicionNew" , strtoupper("$data->nombre"))
    ->setCellValue("C$posicionNew" , strtoupper("$data->apellido"))
    ->setCellValue("D$posicionNew" , "$data->fecNac")
    ->setCellValue("E$posicionNew" , "$sexo")
    ->setCellValue("F$posicionNew" , "$data->telefono");
    
    }


    

// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Simple');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="01simple.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;








