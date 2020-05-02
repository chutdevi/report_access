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
//var_dump($list_act_report); exit;

$col_name = array();

foreach ( range('A', 'Z') as $cm ) { array_push($col_name, $cm); }
foreach ( range('A', 'Z') as $cm ) { array_push($col_name, "A".$cm); }
foreach ( range('A', 'Z') as $cm ) { array_push($col_name, "B".$cm); }
$i   = 0;   
$ind = 0;
foreach ($title as $inTil => $til) 
{
             $objPHPExcel->createSheet();
             $objPHPExcel->setActiveSheetIndex($ind);
             if($til == "BH") $objPHPExcel->getActiveSheet()->setTitle( date('M Y') . "(TBKK)(SM)($til)" ); else $objPHPExcel->getActiveSheet()->setTitle( date('M Y') . "(TBKK)($til)" );
          
            
            $sheetIndex  =  strtolower(str_replace(' ', '_', $title[$ind])); 
            $i   = 1;
            //$count_index = 0;
            $count_ck  =  count($list_act_report[$sheetIndex]);
            //echo $count_data . " = " . (count($list_act_report[$sheetIndex][0])) . "<br>";

                    $objPHPExcel->getActiveSheet()
                        ->getPageSetup()
                        ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
                    $objPHPExcel->getActiveSheet()
                        ->getPageSetup()
                        ->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
                    $objPHPExcel->getActiveSheet()
                        ->getPageMargins()->setTop(0.23);
                    $objPHPExcel->getActiveSheet()
                        ->getPageMargins()->setRight(0.19);
                    $objPHPExcel->getActiveSheet()
                        ->getPageMargins()->setLeft(0.19);
                    $objPHPExcel->getActiveSheet()
                        ->getPageMargins()->setBottom(0.23);

                    $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(True);
                    $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
                    $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
                    $objPHPExcel->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);       
                    $objPHPExcel->getActiveSheet()->setShowGridlines(False);



    $st_col = 10;
    $st_dat = 13;
    $row = $st_dat;
    $ind_sum = array();


                    $objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(2,($st_col+1));

    if ($count_ck > 0) 
    {      
            

            $count_index =  count($list_act_report[$sheetIndex][0]);
            $count_data  =  $count_ck + $st_dat;

            $objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight( 70 ) ;
            $objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight( 10 ) ;
            $objPHPExcel->getActiveSheet()->getRowDimension(3)->setRowHeight( 10 ) ;    
            foreach(range(4, 8) as $rw ) $objPHPExcel->getActiveSheet()->getRowDimension( $rw )->setRowHeight( 35 ) ;            
            $objPHPExcel->getActiveSheet()->getRowDimension(9)->setRowHeight( 10 ) ;




            $objPHPExcel->getActiveSheet()->getRowDimension( ($st_col+0) )->setRowHeight( 46 );
            $objPHPExcel->getActiveSheet()->getRowDimension( ($st_col+1) )->setRowHeight( 46 );

            $objPHPExcel->getActiveSheet()->getRowDimension( ($st_col+2) )->setRowHeight( 12 );

            Style_Alignment( $st_col, 3, True, $objPHPExcel);
            Style_Alignment(($st_col+1), 3, True, $objPHPExcel);                  
            Style_Alignment("2:8", 9, False, $objPHPExcel);

            Style_Alignment("B".$st_dat .":"."E".$count_data, 7, False, $objPHPExcel);
            Style_Alignment("F".$st_dat .":".$col_name[$count_index-2].$count_data, 4, False, $objPHPExcel);
            Style_Alignment( $col_name[$count_index-1]. $st_dat . ":" . $col_name[$count_index] . $count_data, 7, False, $objPHPExcel );


            $objPHPExcel->getActiveSheet()->getSheetView()->setZoomScale(50);    
            $objPHPExcel->getActiveSheet()->setAutoFilter('B'. ( $st_col + 2 ) . ':' . $col_name[$count_index] . ( $st_col + 2 ) );
            $objPHPExcel->getActiveSheet()->freezePane('A' . $st_dat );

            $objPHPExcel->getActiveSheet()->setCellValue('B2', "Sales RoyaltyReport for " .  str_replace("_", "'", date('M_y', strtotime( "-1 month", strtotime( date('01-m-Y') ) ) ) )  );
            $objPHPExcel->getActiveSheet()->setCellValue('B4', "TBKK(Thailand) CO.,LTD.");
            $objPHPExcel->getActiveSheet()->setCellValue('B5', "Attn : Mr.Takuya Takahashi  (TBK Co.,Ltd.)");
            $objPHPExcel->getActiveSheet()->setCellValue('B6', "Fax No. +81-42-7391478");
            $objPHPExcel->getActiveSheet()->setCellValue('B7', "From : Pachara M. TBKK (Thailand) Co.,Ltd.");
            $objPHPExcel->getActiveSheet()->setCellValue('B8', "Report Royalty TBK Co.,Ltd. For " . str_replace("_", "'", date('M_y', strtotime( "-1 month", strtotime( date('01-m-Y') ) ) ) )  );



            $objPHPExcel->getActiveSheet()->getStyle( 'B' . '2' . ':' . 'E' . '2' )
                                          ->applyFromArray(array('borders' => array('outline'   => Style_border(PHPExcel_Style_Border::BORDER_THICK,'000000' ) ) ) ); 

                                                 
           // $objPHPExcel->getActiveSheet()->getStyle('A1:'.$col_name[$count_index].'1')->applyFromArray(array('fill'    => Style_Fill($colhead)));
           // $objPHPExcel->getActiveSheet()->getStyle('A2:'.$col_name[$count_index].'2')->applyFromArray(array('fill'    => Style_Fill('FFFFCC')));
           // $objPHPExcel->getActiveSheet()->getStyle('A1:'.$col_name[$count_index].'2')->applyFromArray(array('borders' => array('allborders' => Style_border(PHPExcel_Style_Border::BORDER_THIN,'FFFF99'))));

            foreach ( $list_act_report[$sheetIndex][0] as $key => $val ) 
            {
                //var_dump($key); 
                $objPHPExcel->setActiveSheetIndex($inTil)->setCellValue($col_name[$i++].$st_col, str_replace("_", " ", strtoupper($key)));       
            }            
            //exit;
            $st_code = $list_act_report[$sheetIndex][0]["CODE"];


            //array_push( $ind_sum,   array($st_code."_st" => $row) );
            $ind_sum[$st_code]["st"] = $row;
            foreach ($list_act_report[$sheetIndex] as $key => $value) 
            {
                

                $col = 1;
                 if( $st_code == $value["CODE"] ){
                        foreach ($value as $body => $val)
                        {

                            if( $body == "FORMULA1" )
                            {
                              if( $til == 'PCL' ) $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=F".$row." * 0.02 ");
                                   
                              elseif( $til == 'BRAKE IMCT' || $til == 'BRAKE IGCE' ) $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "51.04");

                              else $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=F".$row." * 0.0025 ");

                            }
                            elseif( $body == "FORMULA3" )
                            {
                              $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=F".$row."-"."I".$row ."-" . "J".$row);
                            }  
                            elseif( $body == "FORMULA5" )
                            {
                              $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=ROUND(K".$row."*"."M".$row ."," . "2)");
                            } 
                            elseif( $body == "FORMULA6" )
                            {
                             $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=ROUND(K".$row."*"."N".$row ."," . "2)");
                            } 
                            elseif( $body == "FORMULA7" )
                            {
                              $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=ROUND(G".$row."*"."O".$row ."," . "2)");
                            } 
                            elseif( $body == "FORMULA8" )
                            {
                              $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=ROUND(G".$row."*"."P".$row ."," . "2)");
                            }            
                            elseif( $body == "NON-BOI" && $val == "#")
                            {
                              $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=Q".$row);
                            }
                            elseif( substr($body, 0,3) == "BOI" && $val == "#")
                            {
                              $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=Q".$row);
                            }                                                                                                                                                                                              
                            else  
                              $objPHPExcel->setActiveSheetIndex($ind)->setCellValue($col_name[$col++].($row), $val);                                                                    
                        

                        }
                }else{


                    $ind_sum[$st_code]["en"] = $row-1;
                    $st_code = $value["CODE"];
                    $ind_sum[$st_code]["st"] = ( ++$row );
                    


                        foreach ($value as $body => $val)
                        {
                           
                            if( $body == "FORMULA1" )
                            {
                              if( $til == 'PCL' ) $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=F".$row." * 0.02 ");
                                   
                              elseif( $til == 'IMCT' || $til == 'IGCE' ) $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "51.04");

                              else $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=F".$row." * 0.0025 ");

                            }
                            elseif( $body == "FORMULA3" )
                            {
                              $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=F".$row."-"."I".$row ."-" . "J".$row);
                            }  
                            elseif( $body == "FORMULA5" )
                            {
                              $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=ROUND(K".$row."*"."M".$row ."," . "2)");
                            } 
                            elseif( $body == "FORMULA6" )
                            {
                             $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=ROUND(K".$row."*"."N".$row ."," . "2)");
                            } 
                            elseif( $body == "FORMULA7" )
                            {
                              $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=ROUND(G".$row."*"."O".$row ."," . "2)");
                            } 
                            elseif( $body == "FORMULA8" )
                            {
                              $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=ROUND(G".$row."*"."P".$row ."," . "2)");
                            }            
                            elseif( $body == "NON-BOI" && $val == "#")
                            {
                              $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=Q".$row);
                            }
                            elseif( substr($body, 0,3) == "BOI" && $val == "#")
                            {
                              $objPHPExcel->getActiveSheet()->setCellValue($col_name[$col++].($row), "=Q".$row);
                            }                                                                                                                                                                                              
                            else  
                              $objPHPExcel->setActiveSheetIndex($ind)->setCellValue($col_name[$col++].($row), $val);                                                                   
                        
                        }
                }
                 $row++;
               
                
            }
            $ind_sum[$st_code]["en"] = $row-1;
            $objPHPExcel->getActiveSheet()->getStyle("B" . $st_dat . ":" . "B" . ( $count_data + count($ind_sum) - 1 ) )->applyFromArray(array('fill'    => Style_Fill('b3ffb3')));
            
             
            $end_area = ( $count_data + count($ind_sum) + 11 );

            foreach(range($st_dat, ( $count_data + count($ind_sum) ) ) as $rw ) $objPHPExcel->getActiveSheet()->getRowDimension( $rw )->setRowHeight( 35 ) ;


           $objPHPExcel->getActiveSheet()->setCellValue('I'.$st_col, "Trans Packing");
           $objPHPExcel->getActiveSheet()->setCellValue('J'.$st_col, "Material JPN Cost");
           $objPHPExcel->getActiveSheet()->setCellValue('K'.$st_col, "Value of Royalty");
           $objPHPExcel->getActiveSheet()->setCellValue('L'.$st_col, "Drawing");

           $objPHPExcel->getActiveSheet()->setCellValue('M'.$st_col, "Ratio");
           $objPHPExcel->getActiveSheet()->setCellValue('O'.$st_col, "Unit Royalty");
           $objPHPExcel->getActiveSheet()->setCellValue('Q'.$st_col, "Royalty Amount");


           $objPHPExcel->getActiveSheet()->setCellValue('S'.$st_col, "Tpy of BOI");

           $objPHPExcel->getActiveSheet()->setCellValue('M'.($st_col+1), "TBK");
           $objPHPExcel->getActiveSheet()->setCellValue('N'.($st_col+1), "HIT");
           $objPHPExcel->getActiveSheet()->setCellValue('O'.($st_col+1), "TBK");
           $objPHPExcel->getActiveSheet()->setCellValue('P'.($st_col+1), "HIT");
           $objPHPExcel->getActiveSheet()->setCellValue('Q'.($st_col+1), "TBK");
           $objPHPExcel->getActiveSheet()->setCellValue('R'.($st_col+1), "HIT");


           if($til == "SM")
           {
            $objPHPExcel->getActiveSheet()->setCellValue('S'.($st_col+1), "NON-BOI");
            $objPHPExcel->getActiveSheet()->setCellValue('T'.($st_col+1), "Gear project 1473(2)/2550");
            $objPHPExcel->getActiveSheet()->setCellValue('U'.($st_col+1), "Suzuki/Kubota 2138(2)/2554 ");
            $objPHPExcel->getActiveSheet()->setCellValue('V'.($st_col+1), "Gear 4M4X 2756(2) 2555");
            $objPHPExcel->getActiveSheet()->setCellValue('W'.($st_col+1), "Gear Idle D  1833(2)/2556");
            $objPHPExcel->getActiveSheet()->setCellValue('X'.($st_col+1), "Oil Pump Assy 1458(2)/2558");
            $objPHPExcel->getActiveSheet()->setCellValue('Y'.($st_col+1), "Bracket;cam  1834(2)/2556");
            $objPHPExcel->getActiveSheet()->setCellValue('Z'.($st_col+1), "Gears, etc 2495(2)/2557");
           }
           elseif($til == "BRAKE IGCE")
           {
            $objPHPExcel->getActiveSheet()->setCellValue('S'.($st_col+1), "59-1097-1-00-1-0 Brake Set");
            $objPHPExcel->getActiveSheet()->setCellValue('T'.($st_col+1), "Brake Assy 2453(2)/2556");

           }
           elseif($til == "BRAKE IMCT")
           {
            $objPHPExcel->getActiveSheet()->setCellValue('S'.($st_col+1), "59-1097-1-00-1-0 Brake Set");
            $objPHPExcel->getActiveSheet()->setCellValue('T'.($st_col+1), "Brake Assy 2453(2)/2556");

           }  
           elseif($til == "BH")
           {
            $objPHPExcel->getActiveSheet()->setCellValue('S'.($st_col+1), "NON-BOI");
            $objPHPExcel->getActiveSheet()->setCellValue('T'.($st_col+1), "Bearing housing 2198(2)/2557");
            $objPHPExcel->getActiveSheet()->setCellValue('U'.($st_col+1), "Bearing housing 1260(2)/2552");

           }                     
           //$objPHPExcel->getActiveSheet()->setCellValue('M'.($st_col+1), "TBK");
           // var_dump($ind_sum); exit;
            $objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray(array('font'     =>    Style_Font(24,'000000',True,False,'Arial Narrow',True )));
            $objPHPExcel->getActiveSheet()->getStyle('B4')->applyFromArray(array('font'     =>    Style_Font(20,'000000',True,False,'Arial Narrow',False )));
            $objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray(array('font'     =>    Style_Font(20,'000000',False,False,'Arial Narrow',False )));
            $objPHPExcel->getActiveSheet()->getStyle('B6:B7')->applyFromArray(array('font'  =>    Style_Font(20,'000000',False,False,'Arial Narrow',True )));
            $objPHPExcel->getActiveSheet()->getStyle('B8')->applyFromArray(array('font'     =>    Style_Font(20,'000000',True,False,'Arial Narrow',False )));

            $objPHPExcel->getActiveSheet()->getStyle('B'.$st_col.':'.$col_name[$count_index].($st_col+1) )->applyFromArray(array('font'  =>    Style_Font(18,'000000',True,False,'Arial Narrow' )));  
            $objPHPExcel->getActiveSheet()->getStyle('B'.$st_dat.':'.$col_name[4]. ( $count_data + count($ind_sum) + 1 ))->applyFromArray(array('font' => Style_Font(18,'000000',False,False,'Arial Narrow')));
            $objPHPExcel->getActiveSheet()->getStyle($col_name[5].$st_dat.':'.$col_name[$count_index]. ( $count_data + count($ind_sum) + 1 ))->applyFromArray(array('font' => Style_Font(18,'000000',True,False,'Arial Narrow')));

            $objPHPExcel->getActiveSheet()->getStyle("G" . $st_dat .':' ."G". ( $count_data + count($ind_sum) - 1 ) )->getNumberFormat()->setFormatCode('_-* #,##0_-;-* #,##0_-;_-* "-"_-;_-@_-');
            $objPHPExcel->getActiveSheet()->getStyle("F" . $st_dat .':' .$col_name[$count_index-2].( $count_data + count($ind_sum) - 1 ) )->getNumberFormat()->setFormatCode('_-* #,##0.00_-;-* #,##0.00_-;_-* "-"_-;_-@_-');


            $objPHPExcel->getActiveSheet()->mergeCells('M' . $st_col . ':' . 'N' . $st_col );
            $objPHPExcel->getActiveSheet()->mergeCells('O' . $st_col . ':' . 'P' . $st_col );
            $objPHPExcel->getActiveSheet()->mergeCells('Q' . $st_col . ':' . 'R' . $st_col );

            if( $til != "PCL")
            $objPHPExcel->getActiveSheet()->mergeCells('S' . $st_col . ':' . $col_name[$count_index-2] . $st_col );






            $objPHPExcel->getActiveSheet()->getRowDimension( ( $count_data + count($ind_sum) + 0 ) )->setRowHeight( 65 );
            $objPHPExcel->getActiveSheet()->getRowDimension( ( $count_data + count($ind_sum) + 1 ) )->setRowHeight( 65 );

            $objPHPExcel->getActiveSheet()->getRowDimension( ( $count_data + count($ind_sum) + 2 ) )->setRowHeight( 15 );

            foreach ( range( ( $count_data + count($ind_sum) + 3 ), ( $count_data + count($ind_sum) + 4 ) ) as $value ) $objPHPExcel->getActiveSheet()->getRowDimension( $value )->setRowHeight( 30 );
            foreach ( range( ( $count_data + count($ind_sum) + 5 ), ( $count_data + count($ind_sum) + 6 ) ) as $value ) $objPHPExcel->getActiveSheet()->getRowDimension( $value )->setRowHeight( 40 );
                
            
            $objPHPExcel->getActiveSheet()->getRowDimension( ( $count_data + count($ind_sum) + 7  ) )->setRowHeight( 25 );
            $objPHPExcel->getActiveSheet()->getRowDimension( ( $count_data + count($ind_sum) + 8  ) )->setRowHeight( 30  );
            $objPHPExcel->getActiveSheet()->getRowDimension( ( $count_data + count($ind_sum) + 9  ) )->setRowHeight( 80  );
            $objPHPExcel->getActiveSheet()->getRowDimension( ( $count_data + count($ind_sum) + 10 ) )->setRowHeight( 25 );
            $objPHPExcel->getActiveSheet()->getRowDimension( ( $count_data + count($ind_sum) + 11 ) )->setRowHeight( 8  );
//            foreach(range(0 , $count_index) as $columnID) 
//                $objPHPExcel->getActiveSheet()->getColumnDimension($col_name[$columnID]) ->setAutoSize(true);    

            //$objPHPExcel->getActiveSheet()->getStyle('J3:J'.$count_data)->getNumberFormat()->setFormatCode('_-* #,##0_-;[RED](#,##0)_-;_-* "-"??_-;_-@_-');
            //$objPHPExcel->getActiveSheet()->getStyle('L3:O'.$count_data)->getNumberFormat()->setFormatCode('_-* #,##0.00_-;[RED](#,##0.00)_-;_-* "-"??_-;_-@_-');


                 //$objPHPExcel->getActiveSheet()->getStyle( 'E'.$st_dat.':'.$col_name[$count_index].$count_data )->getNumberFormat()->setFormatCode('_-* #,##0_-;[Red](#,##0)_-;_-* "-"??_-;_-@_-');
                                               

                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('1.71');
                //$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('2.71');
                //$objPHPExcel->getActiveSheet()->getColumnDimension($col_name[$count_index])->setWidth('2.71');     #A
                 $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('13.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('21.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('43.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('22.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth('22.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth('31.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth('31.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth('22.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth('22.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth('13.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth('13.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth('8.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth('8.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth('10.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth('10.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth('26.71');
                 $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth('10.71');

                $objPHPExcel->getActiveSheet()->getStyle( 'B' . $st_col . ':' . $col_name[$count_index].( $st_col + 2 ) )
                                              ->applyFromArray(array('borders' => array('inside'   => Style_border(PHPExcel_Style_Border::BORDER_HAIR ,'000000'))));

                $objPHPExcel->getActiveSheet()->getStyle( 'B' . ($st_col+2) . ':' . $col_name[$count_index].( $st_col + 2 ) )
                                              ->applyFromArray(array('borders' => array('bottom'   => Style_border(PHPExcel_Style_Border::BORDER_THIN ,'000000'))));


                $objPHPExcel->getActiveSheet()->getStyle( 'B' . $st_dat . ':' . $col_name[$count_index].( $count_data + count($ind_sum) + 1 ) )
                                              ->applyFromArray(array('borders' => array('inside'   => Style_border(PHPExcel_Style_Border::BORDER_HAIR ,'000000'))));

                                              
                $objPHPExcel->getActiveSheet()->getStyle( 'B' . $st_col . ':' . $col_name[$count_index] . ( $count_data + count($ind_sum) + 1 ) )
                                          ->applyFromArray(array('borders' => array('outline'   => Style_border(PHPExcel_Style_Border::BORDER_THICK,'000000' ) ) ) );

                $objPHPExcel->getActiveSheet()->getStyle( $col_name[$count_index-2] . $st_col . ":" . $col_name[$count_index-2] .  ( $count_data + count($ind_sum) + 1 ) )
                                          ->applyFromArray(array('borders' => array('right'     => Style_border(PHPExcel_Style_Border::BORDER_THICK,'000000' ) ) ) );


                $objPHPExcel->getActiveSheet()->getStyle( "B" . ( $count_data + count($ind_sum) + 0 ) . ":" . $col_name[$count_index] . ( $count_data + count($ind_sum) + 0 )   )
                                          ->applyFromArray(array('borders' => array('bottom'     => Style_border(PHPExcel_Style_Border::BORDER_THICK,'000000' ) ) ) );

                $objPHPExcel->getActiveSheet()->getStyle( "B" . ( $count_data + count($ind_sum) + 1 ) . ":" . $col_name[$count_index] . ( $count_data + count($ind_sum) + 1 )    )
                                          ->applyFromArray(array('borders' => array('bottom'     => Style_border(PHPExcel_Style_Border::BORDER_THICK,'000000' ) ) ) );


                $objPHPExcel->getActiveSheet()->getStyle( "E" . ( $count_data + count($ind_sum) + 3 ) . ":" . "J" . ( $count_data + count($ind_sum) + 3 )    )
                                          ->applyFromArray(array('borders' => array('outline'     => Style_border(PHPExcel_Style_Border::BORDER_THICK,'000000' ) ) ) );

                $objPHPExcel->getActiveSheet()->getStyle( "E" . ( $count_data + count($ind_sum) + 4 ) . ":" . "J" . ( $count_data + count($ind_sum) + 4 )    )
                                          ->applyFromArray(array('borders' => array('outline'     => Style_border(PHPExcel_Style_Border::BORDER_THICK,'000000' ) ) ) );
                $objPHPExcel->getActiveSheet()->getStyle( "E" . ( $count_data + count($ind_sum) + 5 ) . ":" . "J" . ( $count_data + count($ind_sum) + 6 )    )
                                          ->applyFromArray(array('borders' => array('outline'     => Style_border(PHPExcel_Style_Border::BORDER_THICK,'000000' ) ) ) );
                foreach (range(( $count_data + count($ind_sum) + 7 ), ( $count_data + count($ind_sum) + 10 ) ) as $key ) 
                {
                     $objPHPExcel->getActiveSheet()->getStyle( "E" . $key. ":" . "J" . $key   )
                                          ->applyFromArray(array('borders' => array('outline'     => Style_border(PHPExcel_Style_Border::BORDER_THICK,'000000' ) ) ) );
                }

                $objPHPExcel->getActiveSheet()->getStyle( "G" . ( $count_data + count($ind_sum) + 4 ) . ":" . "H" . ( $count_data + count($ind_sum) + 7 )    )
                                          ->applyFromArray(array('borders' => array('outline'     => Style_border(PHPExcel_Style_Border::BORDER_THICK,'000000' ) ) ) );

                $objPHPExcel->getActiveSheet()->getStyle( "E" . ( $count_data + count($ind_sum) + 8 ) . ":" . "G" . ( $count_data + count($ind_sum) + 10 )    )
                                          ->applyFromArray(array('borders' => array('outline'     => Style_border(PHPExcel_Style_Border::BORDER_THICK,'000000' ) ) ) );

            $objPHPExcel->getActiveSheet()->getStyle("B" . ( $st_col + 2 ) . ":" . $col_name[$count_index] . ( $st_col + 2 ) )->applyFromArray(array('fill'    => Style_Fill('507c7c')));








            //$objPHPExcel->getActiveSheet()->getStyle("B" . ( $count_data + count($ind_sum) + 0 ) . ":" . $col_name[$count_index] . ( $count_data + count($ind_sum) + 0 ) )->applyFromArray(array('fill'    => Style_Fill('adc2eb')));


                 foreach( range(18, $count_index) as $rw) $objPHPExcel->getActiveSheet()->getColumnDimension($col_name[$rw])->setWidth('23.29'); 
                 
    
                 if( $til == "SM" ) $objPHPExcel->getActiveSheet()->getColumnDimension($col_name[18])->setWidth('25.29');

            $summary_TBK = "=SUM(";
            $summary_HIT = "=SUM(";
            $summary_BOI = array( "18_boi" => "=SUM(",
                                  "19_boi" => "=SUM(",
                                  "20_boi" => "=SUM(",
                                  "21_boi" => "=SUM(",
                                  "22_boi" => "=SUM(",
                                  "23_boi" => "=SUM(",
                                  "24_boi" => "=SUM(",
                                  "25_boi" => "=SUM("
                                );
            foreach($ind_sum as $idx => $val)
            {
              //var_dump($val);
                $row = ($val["en"]+1);
                $objPHPExcel->getActiveSheet()->getRowDimension( $row )->setRowHeight( 50 );
                $objPHPExcel->getActiveSheet()->getStyle( 'B' . $row . ':' . $col_name[$count_index] . $row )
                                     ->applyFromArray(array('borders' => array('top'    => Style_border(PHPExcel_Style_Border::BORDER_THIN,'000000' ),
                                                                               'bottom' => Style_border(PHPExcel_Style_Border::BORDER_THIN,'000000' )
                                                                              ) ) ); 

                $objPHPExcel->getActiveSheet()->setCellValue("G".($row), "=SUBTOTAL(9,"."G".$val["st"].":"."G".$val["en"].")");
                $objPHPExcel->getActiveSheet()->setCellValue("H".($row), "=SUBTOTAL(9,"."H".$val["st"].":"."H".$val["en"].")");  
                $objPHPExcel->getActiveSheet()->setCellValue("Q".($row), "=SUBTOTAL(9,"."Q".$val["st"].":"."Q".$val["en"].")");
                $objPHPExcel->getActiveSheet()->setCellValue("R".($row), "=SUBTOTAL(9,"."R".$val["st"].":"."R".$val["en"].")");

                $summary_TBK .= "Q".($row) . ",";
                $summary_HIT .= "R".($row) . ",";

                if($til != "PCL")
                {

                  foreach (range(18, ($count_index-2)) as  $fml) 
                  {
                    //array_push($summary_BOI, var)
                    $objPHPExcel->getActiveSheet()->setCellValue($col_name[$fml].($row), "=SUBTOTAL(9,".$col_name[$fml].$val["st"].":".$col_name[$fml].$val["en"].")");

                    if( $fml )
                    $summary_BOI[$fml."_boi"] .= $col_name[$fml].($row) . "," ;

                  }

                }


                Style_Alignment('B' . $row, 7, False, $objPHPExcel);
                $objPHPExcel->getActiveSheet()->setCellValue("B".($row), "TOTAL OF SELLING FOR " . $idx );   



                $objPHPExcel->getActiveSheet()->getStyle('B' . $row . ':' . $col_name[$count_index] . $row )->applyFromArray(array('fill'    => Style_Fill('ffcc80')));
                $objPHPExcel->getActiveSheet()->getStyle('B' . $row . ':' . $col_name[$count_index] . $row )->applyFromArray(array('font'  =>    Style_Font(18,'000000',True,False,'Arial Narrow' )));
                $objPHPExcel->getActiveSheet()->getStyle("G" . $row )->getNumberFormat()->setFormatCode('_-* #,##0.00_-;-* #,##0.00_-;_-* "-"_-;_-@_-');
                $objPHPExcel->getActiveSheet()->getStyle("H" . $row . ":" . $col_name[$count_index-2] . $row )->getNumberFormat()->setFormatCode('_-"THB" #,##0.00_-;-"THB" #,##0.00_-;_-* "-"_-;_-@_-');

                $objPHPExcel->getActiveSheet()->mergeCells('B' . $row . ':' . 'F' . $row );
                $objPHPExcel->getActiveSheet()->mergeCells('I' . $row . ':' . 'P' . $row );  
            }
            $summary_TBK = substr($summary_TBK, 0, strlen($summary_TBK)-1 ) . ")";
            $summary_HIT = substr($summary_HIT, 0, strlen($summary_HIT)-1 ) . ")";   


             Style_Alignment('B' . ( $count_data + count($ind_sum) + 0 ) . ':' . 'B' . ( $count_data + count($ind_sum) + 1 ) , 7, False, $objPHPExcel);
             Style_Alignment('Q' . ( $count_data + count($ind_sum) + 1 ) , 1, False, $objPHPExcel ); 

             $objPHPExcel->getActiveSheet()->setCellValue("B" . ( $count_data + count($ind_sum) + 0 ) , "TOTAL SALES ROYALTY  TBK");
             $objPHPExcel->getActiveSheet()->setCellValue("B" . ( $count_data + count($ind_sum) + 1 ) , "GRAND TOTAL SALE ROYALTY " . str_replace("_", "'", date('M_y', strtotime( "-1 month", strtotime( date('01-m-Y') ) ) ) ) );

             $objPHPExcel->getActiveSheet()->getStyle("B" . ( $count_data + count($ind_sum) + 0 ) . ":" . $col_name[$count_index] . ( $count_data + count($ind_sum) + 1 ) )->applyFromArray(array('fill'    => Style_Fill('adc2eb')));
             $objPHPExcel->getActiveSheet()->getStyle("B" . ( $count_data + count($ind_sum) + 0 ) . ":" . $col_name[$count_index] . ( $count_data + count($ind_sum) + 1 ) )->applyFromArray(array('font'  =>    Style_Font(18,'000000',True,False,'Arial Narrow' )));
             $objPHPExcel->getActiveSheet()->getStyle("Q" . ( $count_data + count($ind_sum) + 0 ) . ":" . $col_name[$count_index-2] . ( $count_data + count($ind_sum) + 1 ) )->getNumberFormat()->setFormatCode('_-"THB" #,##0.00_-;-"THB" #,##0.00_-;_-* "-"_-;_-@_-');

             $objPHPExcel->getActiveSheet()->mergeCells('B' . ( $count_data + count($ind_sum) + 0 ) . ':' . 'P' . ( $count_data + count($ind_sum) + 0 ) );
             $objPHPExcel->getActiveSheet()->mergeCells('B' . ( $count_data + count($ind_sum) + 1 ) . ':' . 'P' . ( $count_data + count($ind_sum) + 1 ) );
             $objPHPExcel->getActiveSheet()->mergeCells('Q' . ( $count_data + count($ind_sum) + 1 ) . ':' . 'R' . ( $count_data + count($ind_sum) + 1 ) );
                if($til != "PCL")
                {

                  foreach (range(18, ($count_index-2)) as  $fml) 
                  {
                    //array_push($summary_BOI, var)
                    $objPHPExcel->getActiveSheet()->setCellValue($col_name[$fml] . ( $count_data + count($ind_sum) + 0 ) , substr($summary_BOI[$fml."_boi"], 0,strlen( $summary_BOI[$fml."_boi"] )-1  ) . ")" );

                    $objPHPExcel->getActiveSheet()->setCellValue($col_name[$fml] . ( $count_data + count($ind_sum) + 1 ) ,"=". $col_name[$fml] . ( $count_data + count($ind_sum) + 0 ) );

                  }

                }

                $objPHPExcel->getActiveSheet()->setCellValue("Q" . ( $count_data + count($ind_sum) + 0 ) , $summary_TBK);
                $objPHPExcel->getActiveSheet()->setCellValue("R" . ( $count_data + count($ind_sum) + 0 ) , $summary_HIT);

                $objPHPExcel->getActiveSheet()->setCellValue("Q" . ( $count_data + count($ind_sum) + 1 ) , "="."Q" . ( $count_data + count($ind_sum) + 0 ) . "+" . "R" . ( $count_data + count($ind_sum) + 0 ));
                //$objPHPExcel->getActiveSheet()->setCellValue("R" . ( $count_data + count($ind_sum) + 1 ) , $summary_HIT);

                 $objPHPExcel->getActiveSheet()->setCellValue("E" . ( $count_data + count($ind_sum) + 3 ) , "Report by sale & Marketing Dept.");
                 $objPHPExcel->getActiveSheet()->setCellValue("E" . ( $count_data + count($ind_sum) + 4 ) , "Report by");
                 $objPHPExcel->getActiveSheet()->setCellValue("G" . ( $count_data + count($ind_sum) + 4 ) , "Checked by");
                 $objPHPExcel->getActiveSheet()->setCellValue("I" . ( $count_data + count($ind_sum) + 4 ) , "Approved by");

                 $objPHPExcel->getActiveSheet()->setCellValue("E" . ( $count_data + count($ind_sum) + 7 ) , "Date :");
                 $objPHPExcel->getActiveSheet()->setCellValue("G" . ( $count_data + count($ind_sum) + 7 ) , "Date :");
                 $objPHPExcel->getActiveSheet()->setCellValue("I" . ( $count_data + count($ind_sum) + 7 ) , "Date :");

                 $objPHPExcel->getActiveSheet()->setCellValue("E" . ( $count_data + count($ind_sum) + 8 ) , "Acknowledged By");
                 $objPHPExcel->getActiveSheet()->setCellValue("H" . ( $count_data + count($ind_sum) + 8 ) , "Approved By");


                 $objPHPExcel->getActiveSheet()->setCellValue("E" . ( $count_data + count($ind_sum) + 10 ) , "Date :");
                 $objPHPExcel->getActiveSheet()->setCellValue("H" . ( $count_data + count($ind_sum) + 10 ) , "Date :");
             //echo $summary_TBK. "<br>" . $summary_HIT . "<hr>";
                 if( $til == "SM" || $til == "BH")
                 {
                  $objPHPExcel->getActiveSheet()->setCellValue("B" . ( $count_data + count($ind_sum) + 3 ) , "1)");
                  $objPHPExcel->getActiveSheet()->setCellValue("C" . ( $count_data + count($ind_sum) + 3 ) , "Paid TBKK");
                  $objPHPExcel->getActiveSheet()->setCellValue("D" . ( $count_data + count($ind_sum) + 3 ) , "end June (Report Oct-Mar)");
                  $objPHPExcel->getActiveSheet()->setCellValue("D" . ( $count_data + count($ind_sum) + 4 ) , "end Dec (Report Apr-Sep)");

                  $objPHPExcel->getActiveSheet()->setCellValue("B" . ( $count_data + count($ind_sum) + 5 ) , "2)");
                  $objPHPExcel->getActiveSheet()->setCellValue("C" . ( $count_data + count($ind_sum) + 5 ) , "Paid HIT");
                  $objPHPExcel->getActiveSheet()->setCellValue("D" . ( $count_data + count($ind_sum) + 5 ) , "end Feb (Report July-Dec)");
                  $objPHPExcel->getActiveSheet()->setCellValue("D" . ( $count_data + count($ind_sum) + 6 ) , "end Aug (Report Jan-June)");
                 }
                 elseif( $til == "BRAKE IGCE" || $til == "BRAKE IMCT")
                 {
                  $objPHPExcel->getActiveSheet()->setCellValue("B" . ( $count_data + count($ind_sum) + 3 ) , "Term Payment");
                  $objPHPExcel->getActiveSheet()->setCellValue("C" . ( $count_data + count($ind_sum) + 4 ) , "January - June   Pay end of September");
                  $objPHPExcel->getActiveSheet()->setCellValue("C" . ( $count_data + count($ind_sum) + 5 ) , "July - December Pay end of March");
                 }



                 Style_Alignment('B' . ( $count_data + count($ind_sum) + 3). ":" . 'D' . ( $count_data + count($ind_sum) + 5) , 9, False, $objPHPExcel);
                 Style_Alignment('B' . ( $count_data + count($ind_sum) + 6). ":" . 'D' . ( $count_data + count($ind_sum) + 6) , 8, False, $objPHPExcel);

                 Style_Alignment('E' . ( $count_data + count($ind_sum) + 3 ), 3, False, $objPHPExcel);
                 Style_Alignment("E" . ( $count_data + count($ind_sum) + 4 ), 3, False, $objPHPExcel);
                 Style_Alignment("G" . ( $count_data + count($ind_sum) + 4 ), 3, False, $objPHPExcel);
                 Style_Alignment("I" . ( $count_data + count($ind_sum) + 4 ), 3, False, $objPHPExcel);

                 Style_Alignment("E" . ( $count_data + count($ind_sum) + 8 ), 3, False, $objPHPExcel);
                 Style_Alignment("H" . ( $count_data + count($ind_sum) + 8 ), 3, False, $objPHPExcel);

                 Style_Alignment("E" . ( $count_data + count($ind_sum) + 7  ) . ":" . "I" . ( $count_data + count($ind_sum) + 7  ) , 9, False, $objPHPExcel);
                 Style_Alignment("E" . ( $count_data + count($ind_sum) + 10 ) . ":" . "I" . ( $count_data + count($ind_sum) + 10 ) , 9, False, $objPHPExcel);



                 $objPHPExcel->getActiveSheet()->getStyle('E' . ( $count_data + count($ind_sum) + 3 ) )->applyFromArray(array('font'  =>    Style_Font(22,'000000',True,False,'Arial Narrow' )));
                 $objPHPExcel->getActiveSheet()->getStyle('E' . ( $count_data + count($ind_sum) + 4 ).":"."I".( $count_data + count($ind_sum) + 4 ) )->applyFromArray(array('font'  =>    Style_Font(20,'000000',True,False,'Arial Narrow' )));
                 $objPHPExcel->getActiveSheet()->getStyle('E' . ( $count_data + count($ind_sum) + 7 ).":"."I".( $count_data + count($ind_sum) + 7 ) )->applyFromArray(array('font'  =>    Style_Font(18,'000000',True,False,'Arial Narrow' )));
                 $objPHPExcel->getActiveSheet()->getStyle('E' . ( $count_data + count($ind_sum) + 8 ).":"."I".( $count_data + count($ind_sum) + 8 ) )->applyFromArray(array('font'  =>    Style_Font(20,'000000',True,False,'Arial Narrow' )));
                 $objPHPExcel->getActiveSheet()->getStyle('E' . ( $count_data + count($ind_sum) + 10 ).":"."I".( $count_data + count($ind_sum) + 10 ) )->applyFromArray(array('font'  =>    Style_Font(18,'000000',True,False,'Arial Narrow' )));
                 $objPHPExcel->getActiveSheet()->getStyle('B' . ( $count_data + count($ind_sum) + 3 ).":"."D".( $count_data + count($ind_sum) + 6  ) )->applyFromArray(array('font' =>    Style_Font(18,'000000',False,False,'Arial Narrow' )));

             //var_dump($summary_BOI);
     
                 $objPHPExcel->getActiveSheet()->mergeCells('E' . ( $count_data + count($ind_sum) + 3) . ':' . 'J' . ( $count_data + count($ind_sum) + 3 ) );

                 $objPHPExcel->getActiveSheet()->mergeCells('E' . ( $count_data + count($ind_sum) + 4) . ':' . 'F' . ( $count_data + count($ind_sum) + 4 ) );
                 $objPHPExcel->getActiveSheet()->mergeCells('G' . ( $count_data + count($ind_sum) + 4) . ':' . 'H' . ( $count_data + count($ind_sum) + 4 ) );
                 $objPHPExcel->getActiveSheet()->mergeCells('I' . ( $count_data + count($ind_sum) + 4) . ':' . 'J' . ( $count_data + count($ind_sum) + 4 ) );

                 $objPHPExcel->getActiveSheet()->mergeCells('E' . ( $count_data + count($ind_sum) + 8) . ':' . 'G' . ( $count_data + count($ind_sum) + 8 ) );
                 $objPHPExcel->getActiveSheet()->mergeCells('H' . ( $count_data + count($ind_sum) + 8) . ':' . 'J' . ( $count_data + count($ind_sum) + 8 ) );
  
    

   
    
                

             //exit;
                      
            
                   Style_group_Col($col_name, ($count_index-1), $objPHPExcel);
                   Style_group_Col($col_name, $count_index, $objPHPExcel);            


            foreach(range('B', 'L') as $clm)
            {
                 $objPHPExcel->getActiveSheet()->mergeCells( $clm .($st_col). ':' . $clm . ($st_col+1) );
            }



                    
                        

                $objPHPExcel->getActiveSheet()->getPageSetup()->setPrintArea( 'B2' .':' . $col_name[($count_index - 2 )] . ( $count_data + count($ind_sum) + 11 ) ); 





    } else {

                    $objPHPExcel->setActiveSheetIndex($ind)->setCellValue('A1', "No data ".$til.".");
                    $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray(array('font' => Style_Font(48,'000000',true,'Franklin Gothic Book')));
                    //echo "Non data."; exit;
    }
// $objPHPExcel->getActiveSheet()->setTitle($title);
$ind++;


}
//exit;
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->removeSheetByIndex(count($title));
$today = date("My");
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('excel/'.$filename.'-'.date('dmy').'.xlsx');


output_file("excel/".$filename.'-'.date('dmy').'.xlsx');
exit;


function output_file($namefile){
        $file = $namefile; 
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

function Style_Font($size=11, $color='FFFFFF', $bol=false, $ita=false, $fname='Calibri', $reg=false) {

    if( $reg == True )
    {
            return  array(
                            'name'  => $fname,
                            'size'  => $size,
                            'bold'  => $bol,
                            'italic'=> $ita,
                            'color' => array('rgb' => $color),
                            'underline' => PHPExcel_Style_Font::UNDERLINE_SINGLE
                         );  
    }else{
            return  array(
                            'name'  => $fname,
                            'size'  => $size,
                            'bold'  => $bol,
                            'italic'=> $ita,
                            'color' => array('rgb' => $color)
                         );  
    }                             

}
function Style_border($line='BORDER_THICK', $color='000000')
{
    return array( 'style' => $line, 'color' => array('rgb' => $color)) ;
}

function Style_Alignment($cell='A1', $sty=1, $swt=false, $objPHPExcel= null)
{
    switch ($sty) {
        case 1: #bottom->center
                $objPHPExcel->getActiveSheet()
                    ->getStyle($cell)
                    ->getAlignment()
                    ->setWrapText($swt)
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM)
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            break;
        case 2: #top->center
                $objPHPExcel->getActiveSheet()
                    ->getStyle($cell)
                    ->getAlignment()
                    ->setWrapText($swt)
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            break;
        case 3: #center->center
                $objPHPExcel->getActiveSheet()
                    ->getStyle($cell)
                    ->getAlignment()
                    ->setWrapText($swt)
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            break;
        case 4: #bottom->right
                $objPHPExcel->getActiveSheet()
                    ->getStyle($cell)
                    ->getAlignment()
                    ->setWrapText($swt)
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM)
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   // echo $sty; exit;
            break;
        case 5: #top->right
                $objPHPExcel->getActiveSheet()
                    ->getStyle($cell)
                    ->getAlignment()
                    ->setWrapText($swt)
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            break;
        case 6: #center->right
                $objPHPExcel->getActiveSheet()
                    ->getStyle($cell)
                    ->getAlignment()
                    ->setWrapText($swt)
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            break;
        case 7: #bottom->left
                $objPHPExcel->getActiveSheet()
                    ->getStyle($cell)
                    ->getAlignment()
                    ->setWrapText($swt)
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM)
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   // echo $cell; exit;
            break;
        case 8: #top->left
                $objPHPExcel->getActiveSheet()
                    ->getStyle($cell)
                    ->getAlignment()
                    ->setWrapText($swt)
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            break;
        case 9: #center->left
                $objPHPExcel->getActiveSheet()
                    ->getStyle($cell)
                    ->getAlignment()
                    ->setWrapText($swt)
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            break;                                                                                           
        default:
            echo "No Style_Alignment type!!"."<hr>"; exit;
            break;
    }

}

function Style_group_Col($cell=null, $index=0, $objPHPExcel=null, $level=1, $vi=false, $co=true)
{
    $objPHPExcel->getActiveSheet()->getColumnDimension ($cell[$index])->setOutlineLevel($level);
    $objPHPExcel->getActiveSheet()->getColumnDimension ($cell[$index])->setVisible($vi);
    $objPHPExcel->getActiveSheet()->getColumnDimension ($cell[$index])->setCollapsed($co); 
}
function Style_group_lv1_Row($index=0, $objPHPExcel=null, $vi=false, $co=true)
{
    $objPHPExcel->getActiveSheet()->getRowDimension ($index)->setOutlineLevel(1);
    $objPHPExcel->getActiveSheet()->getRowDimension ($index)->setVisible($vi);
    $objPHPExcel->getActiveSheet()->getRowDimension ($index)->setCollapsed($co); 
}
// END Template Class

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */