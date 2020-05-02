<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
    die('This example should only be run from a Web Browser');
require_once dirname(__FILE__) . '/PHPExcel-1.8.1/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
$data_col = array();
//var_dump($tle); exit;

$col_name = array();

foreach ( range('A', 'Z') as $cm ) { array_push($col_name, $cm); }
foreach ( range('A', 'Z') as $cm ) { array_push($col_name, "A".$cm); }
foreach ( range('A', 'Z') as $cm ) { array_push($col_name, "B".$cm); }
$i   = 0;   
$ind = 0;
foreach ($tle as $inTil => $til) 
{
            $objPHPExcel->createSheet();
            $objPHPExcel->setActiveSheetIndex($ind);
            $objPHPExcel->getActiveSheet()->setTitle( "$til" );
            $row = 3;
            $sheetIndex  =  strtolower(str_replace(' ', '_', $tle[$ind])); 
            $count_index =  0;
            $count_data  =  count( $exp[$sheetIndex] ) + ($row-1) ;
             //exit;
            $objPHPExcel->getActiveSheet()->setShowGridlines(False);

    if ($count_data > 0) 
    {      
        $count_index =  count( (array)$exp[$sheetIndex][0] ) - 1 ;
            //echo $count_index;
        $objPHPExcel->getActiveSheet()->getRowDimension( 1 )->setRowHeight( 30 );
        $objPHPExcel->getActiveSheet()->getRowDimension( 2 )->setRowHeight( 8 ); //          ->setWrapText(true)
        $objPHPExcel->getActiveSheet()
                ->getStyle('1')
                ->getAlignment()
     
                ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);       
                                   


        $objPHPExcel->getActiveSheet()->getSheetView()->setZoomScale(90);    
        $objPHPExcel->getActiveSheet()->setAutoFilter('A2:'.$col_name[$count_index].'2');

        $objPHPExcel->getActiveSheet()->freezePane('A3');

        $objPHPExcel->getActiveSheet()->getStyle('A1:'.$col_name[$count_index].'1')->applyFromArray(array('fill'    => Style_Fill($hcl)));
        $objPHPExcel->getActiveSheet()->getStyle('A2:'.$col_name[$count_index].'2')->applyFromArray(array('fill'    => Style_Fill('FFFFCC')));
        $objPHPExcel->getActiveSheet()->getStyle('A1:'.$col_name[$count_index].'2')->applyFromArray(array('borders' => array('allborders' => Style_border(PHPExcel_Style_Border::BORDER_THIN,'FFFF99'))));


        $objPHPExcel->getActiveSheet()->getStyle( 'A1:'.$col_name[$count_index].$count_data )->applyFromArray(array('borders' => array('outline'   => Style_border(PHPExcel_Style_Border::BORDER_THICK,'000000'))));
        $objPHPExcel->getActiveSheet()->getStyle( 'A'. $row . ':' .$col_name[$count_index].$count_data )->applyFromArray(array('borders' => array('inside'   => Style_border(PHPExcel_Style_Border::BORDER_HAIR,'000000')))); 
                                             
                                        
            foreach ($exp[$sheetIndex] as $key => $value) 
            {
                
                $col = 0;
                foreach ($value as $body => $val)
                {
                        $objPHPExcel->setActiveSheetIndex($ind)->setCellValue($col_name[$col++].($row), $val);
                        if($row % 2 == 0)
                        $objPHPExcel->getActiveSheet()->getStyle('A'. $row . ':' . $col_name[$count_index] . $row)->applyFromArray(array('fill' => Style_Fill( $cor ) ) );                                                                    
                }
                $objPHPExcel->getActiveSheet()->getRowDimension( $row )->setRowHeight( 25 );
                $row++;
                
            }
            $objPHPExcel->getActiveSheet()->getStyle('A1:'.$col_name[$count_index]."1")->applyFromArray(array('font' => Style_Font(9,'FFFFFF',true,'Calibri')));  
            $objPHPExcel->getActiveSheet()->getStyle('A3:'.$col_name[$count_index].$count_data)->applyFromArray(array('font' => Style_Font(10,'000000',false,'Ebrima')));


                
            $objPHPExcel->getActiveSheet()
                ->getStyle('A3:'.$col_name[$count_index].$count_data)
                ->getAlignment()
                ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

            foreach ( (array)$exp[$sheetIndex][0] as $key => $val ) 
            {
                //var_dump($key); 
                $objPHPExcel->setActiveSheetIndex($inTil)->setCellValue($col_name[$i++]."1", str_replace("_", " ", strtoupper($key)));       
            }  
            foreach(range(0 , $count_index) as $columnID) 
                 $objPHPExcel->getActiveSheet()->getColumnDimension($col_name[$columnID])->setAutoSize(true);                             
            //var_dump($list_act_report); exit;
    } else {

                    $objPHPExcel->setActiveSheetIndex($ind)->setCellValue('A1', "No data ".$til.".");
                    $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray(array('font' => Style_Font(48,'000000',true,'Franklin Gothic Book')));
                    //echo "Non data."; exit;
    }
// $objPHPExcel->getActiveSheet()->setTitle($title);
$ind++;


}

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->removeSheetByIndex(count($tle));
$today = date("My");
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save($fln);

echo $fln;
//output_file($filename);
exit;
function output_file($namefile){
        //$namefile = "Query_pods_data.sql";
        $file = $namefile; 
        //echo basename($file); exit;
        header("Content-Description: File Transfer"); 
        header("Content-Type: application/octet-stream"); 
        header("Content-Disposition: attachment; filename=".basename($file) ); 
        readfile ($file);
        exit;
}
function Style_Fill($color=null) {

    return array( 'type'  => PHPExcel_Style_Fill::FILL_SOLID,                           
                  'color' => array('rgb' => $color)                                    
                );                                   
}

function Style_Font($size=11, $color='FFFFFF', $bol=false, $fname='Consolas') {

    return  array(
                    'name' => $fname,
                    'size' => $size,
                    'bold' => $bol,
                    'color' => array('rgb' => $color)
                 );                               
}

function Style_border($line='BORDER_THICK', $color='000000')
{
    return array( 'style' => $line, 'color' => array('rgb' => $color)) ;
}
// END Template Class

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */