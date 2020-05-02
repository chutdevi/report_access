<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
header("Content-Type:text/html; charset=UTF-8");
ini_set('mssql.charset', 'UTF-8');
date_default_timezone_set("Asia/Bangkok");
class WORKDAYS_REPORT_QUERY
{
   


   public function __construct()
   {
   		//echo "Load Complete!"; exit;

   }
		
/* @MySQL@  */
	public function ORACLE_GETDATA_PDWORKDAYS($datS)
		{
			$dateType = array();
			foreach( range(-3,3) as $ind )
			{
				$thisMonth  = (int)date('m');
				$runsMonth  = (int)date('m', strtotime(" (0 + $ind) month", strtotime($datS) ));
				if( $thisMonth >= $runsMonth) array_push($dateType, 1);
				else array_push($dateType, 2);
			}
			$sql_str = sprintf("SELECT
								   A.PD
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[0]} THEN A.D_DATE END ) PREVIOUS3
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[1]} THEN A.D_DATE END ) PREVIOUS2
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[2]} THEN A.D_DATE END ) PREVIOUS1
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[3]} THEN A.D_DATE END ) THIS_MONTH
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[4]} THEN A.D_DATE END ) NEXT1
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[5]} THEN A.D_DATE END ) NEXT2
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[6]} THEN A.D_DATE END ) NEXT3

								FROM 
								  ( SELECT
								      2 TYPE
								     ,TR.PLANT_CD AS PLANT_CD
								     ,VC.PARENT_SEC_CD AS PD
								     ,TR.OPR_DATE AS D_DATE
								     ,SUM(TR.ACPT_QTY) AS QTY
								   FROM
								      T_OPR_RSLT TR
								     ,VM_DEPARTMENT_CLASS VC
								   WHERE 
								       TR.WS_CD = VC.COMP_SEC_CD(+)
								   AND TO_CHAR(OPR_DATE,'YYYY/MM/DD') BETWEEN '%s' AND  '%s'
								   GROUP BY
								      TR.PLANT_CD 
								     ,VC.PARENT_SEC_CD
								     ,TR.OPR_DATE 
								   
								   UNION ALL
								   
								   SELECT
								     1 TYPE
								    ,TL.PLANT_CD     AS PLANT_CD
								    ,VC.PARENT_SEC_CD    AS PD
								    ,TL.ACPT_PLAN_DATE AS D_DATE
								    ,SUM(TL.ODR_QTY)   AS QTY
								  FROM
								     T_OD TL
								    ,VM_DEPARTMENT_CLASS VC
								  WHERE
								    TL.SOURCE_CD(+) = VC.COMP_SEC_CD
								  AND TO_CHAR(TL.ACPT_PLAN_DATE,'YYYY/MM/DD') BETWEEN '%s' AND  '%s'
								  AND NOT(TL.ODR_STS_TYP = 9 AND TL.TOTAL_RCV_QTY = 0)
								  GROUP BY
								    VC.PARENT_SEC_CD
								   ,TL.PLANT_CD
								   ,TL.ACPT_PLAN_DATE
								  ) A
								WHERE A.PD IS NOT NULL
								GROUP BY 
								 A.PD
								ORDER BY 1,2"
								,date('m', strtotime("- 3 month", strtotime( $datS ) ) )
								,date('m', strtotime("- 2 month", strtotime( $datS ) ) )
								,date('m', strtotime("- 1 month", strtotime( $datS ) ) )
								,date('m', strtotime("- 0 month", strtotime( $datS ) ) )
								,date('m', strtotime("+ 1 month", strtotime( $datS ) ) )
								,date('m', strtotime("+ 2 month", strtotime( $datS ) ) )
								,date('m', strtotime("+ 3 month", strtotime( $datS ) ) ) 
							   	,date('Y/m/d', strtotime("- 3 month", strtotime( $datS ) ) )
							   	,date('Y/m/d', strtotime("+ 3 month", strtotime( $datS ) ) )
							   	,date('Y/m/d', strtotime("- 3 month", strtotime( $datS ) ) )
							   	,date('Y/m/d', strtotime("+ 3 month", strtotime( $datS ) ) )							   
			);

			return $sql_str;
		}
	
	public function ORACLE_GETDATA_LINE_WORK($datS, $pdS)
		{
	
		
			$daterequest = date( 'Y/m/d', strtotime($datS) );
			$lastmonth   = date('t', strtotime($daterequest));
			$thisMonth  = (int)date('m');
			$runsMonth  = (int)date('m', strtotime($daterequest));		
			$dateType = ( $thisMonth <= $runsMonth) ? 1 : 2;
			//echo date('t dS', strtotime($daterequest) ); exit;
			$strSum["l1"] = date( 'Y/m/d', strtotime($datS) );
			$strSum["l2"] = date( 'Y/m/t', strtotime($datS) );
			// foreach( range(1,$lastmonth) as $ind )
			// {
			// 	$alias1  = date('dS', strtotime("+".($ind-1)." day", strtotime($daterequest) ) );
			// 	$dateCn  = date('Y/m/d', strtotime("+".($ind-1)." day", strtotime($daterequest) ) );
			// 	$strSum["l1"] .= sprintf( ",SUM( CASE WHEN  RN.date%s  > 0 THEN 1 END ) AS \"%s\" \n",$ind, $alias1 );
			// 	$strSum["l2"] .= sprintf( ",NVL(SUM(CASE WHEN A.STATUS = $dateType AND TO_CHAR(A.PDATE,'YYYY/MM/DD') = '%s' THEN A.QTY END ),0)  AS date%s \n", $dateCn, $ind, $ind );
			// 	//$strSum["l2"] .= sprintf( ",NVL(SUM(CASE WHEN A.STATUS = $dateType AND TO_CHAR(A.PDATE,'YYYY/MM/DD') = TO_CHAR(TRUNC(ADD_MONTHS('%s',1),'MM')+%s,'YYYY/MM/DD') THEN A.QTY END ),0)  AS date%s \n", $daterequest, $ind, $ind );

			// }
			
			$sql_str = sprintf("SELECT
							  RN.PD
							 ,RN.ORDDATE
							 ,RN.ORDDAYS
							 ,SUM( CASE WHEN  RN.ONLINE_WLK  > 0 THEN 1 END ) AS THIS_MONTH	 

							FROM
							(
							        SELECT
							        A.PLANT AS PLANT
							        ,VM.PARENT_SEC_CD AS PD
							        ,A.LINE_CD AS LINE_CD
							        ,A.LINE_NAME AS LINE_NAME
							        ,TO_CHAR(A.PDATE,'YYYY/MM/DD') AS ORDDATE
							        ,LOWER(  TO_CHAR(A.PDATE,'DDTH') ) AS ORDDAYS
							        ,NVL(SUM(CASE WHEN A.STATUS = $dateType THEN A.QTY END ),0)  AS ONLINE_WLK

															FROM
																(SELECT
																 1 AS STATUS
																,TD.PLANT_CD AS PLANT
																,TD.SOURCE_CD AS LINE_CD
																,VD.SEC_NM AS LINE_NAME
																,TD.ITEM_CD
																,MI.ITEM_NAME
																--,MP.MODEL
																,TD.ACPT_PLAN_DATE AS PDATE
																,TD.ODR_QTY AS QTY
																FROM
																 (SELECT * FROM T_OD WHERE OD_TYP = 2 AND OUTSIDE_TYP = 1 AND NOT (ODR_STS_TYP = 9 AND TOTAL_RCV_QTY = 0)) TD
																,VM_DEPARTMENT VD
																,M_ITEM MI
																--,M_PLANT_ITEM MP
																WHERE
																    TD.ITEM_CD   = MI.ITEM_CD(+)
																AND TD.SOURCE_CD = VD.SEC_CD(+)
																AND NOT(TD.ODR_STS_TYP = 9 AND TD.TOTAL_RCV_QTY = 0)

																UNION ALL

																SELECT
																 2 AS STATUS
																,TR.PLANT_CD AS PLANT
																,TR.WS_CD AS LINE_CD
																,VD.SEC_NM AS LINE_NAME
																,TR.ITEM_CD AS ITEM_CD
																,MI.ITEM_NAME AS ITEM_NAME
																,TR.OPR_DATE AS PDATE
																,TR.ACPT_QTY AS QTY
																FROM
																 T_OPR_RSLT TR
																,M_ITEM MI
																,VM_DEPARTMENT VD
																WHERE
																TR.ITEM_CD = MI.ITEM_CD(+)
																AND TR.WS_CD = VD.SEC_CD(+)		
																						
																) A
																,VM_DEPARTMENT_CLASS VM
																,VM_DEPARTMENT VDD
																,M_PLANT_ITEM MP
															WHERE
																A.LINE_CD = VM.COMP_SEC_CD(+)
																AND A.LINE_CD = VDD.SEC_CD(+)
																AND A.ITEM_CD = MP.ITEM_CD(+)
							                 				 	AND TO_CHAR(A.PDATE,'YYYY/MM/DD') BETWEEN '%s' AND '%s'  
																AND VM.PARENT_SEC_CD IS NOT NULL
																--AND VM.PARENT_SEC_CD = 'K1PD01'
																--AND A.ITEM_CD = '5JX371-3590'
															GROUP BY
																 A.PLANT
																,VM.PARENT_SEC_CD
																,A.LINE_CD
																,A.LINE_NAME
												                ,TO_CHAR(A.PDATE,'YYYY/MM/DD')
												                ,TO_CHAR(A.PDATE,'DDTH')
																--,A.ITEM_CD
																--,MP.MODEL
															ORDER BY
																 A.PLANT
																,VM.PARENT_SEC_CD
																,A.LINE_CD
							                  --,A.PDATE
															) RN
															WHERE RN.PD = '%s'
															GROUP BY RN.PD, RN.ORDDATE,RN.ORDDAYS
															ORDER BY 1, 2"
								,$strSum['l1']
								,$strSum['l2']
								,$pdS
			);
			//echo( $sql_str );exit;
			return $sql_str;
		}		
// END Template Class
	public function ORACLE_GETDATA_MAXLINE_WORK($pdS)
		{	
			$sql_str = sprintf("SELECT COUNT(VM.COMP_SEC_CD) MAXLINES FROM VM_DEPARTMENT_CLASS VM WHERE VM.PARENT_SEC_CD  = '%s'" ,$pdS);
			return $sql_str;
		}		

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */

	public function ORACLE_GETDATA_REPORT_ITEM($datS)
		{
			$daterequest = date( 'Y/m/d', strtotime($datS) );
			$lastmonth   = date('t', strtotime($daterequest));
			$thisMonth  = (int)date('m');
			$runsMonth  = (int)date('m', strtotime($daterequest));		
			$dateType = ( $thisMonth <= $runsMonth) ? 1 : 2;
			//echo date('t dS', strtotime($daterequest) ); exit;
			$strSum["l1"] = date( 'Y/m/d', strtotime($datS) );
			$strSum["l2"] = date( 'Y/m/t', strtotime($datS) );
			$srtDays="";
			foreach( range(1,$lastmonth) as $ind )
			{
				$alias1  = date('dS', strtotime("+".($ind-1)." day", strtotime($daterequest) ) );
				$dateCn  = date('Y/m/d', strtotime("+".($ind-1)." day", strtotime($daterequest) ) );
				$srtDays .= sprintf( ",NVL(SUM(CASE WHEN A.STATUS = $dateType AND TO_CHAR(A.PDATE,'YYYY/MM/DD') = '%s' THEN A.QTY END ),0)  AS \"%s\" \n",$dateCn, $alias1 );
				//$strSum["l2"] .= sprintf( ",NVL(SUM(CASE WHEN A.STATUS = $dateType AND TO_CHAR(A.PDATE,'YYYY/MM/DD') = TO_CHAR(TRUNC(ADD_MONTHS('%s',1),'MM')+%s,'YYYY/MM/DD') THEN A.QTY END ),0)  AS date%s \n", $daterequest, $ind, $ind );
			}			
			$sql_str = sprintf("
			SELECT
			 VM.PARENT_SEC_CD AS PD
			,A.LINE_CD AS \"LINE CD\"
			,A.LINE_NAME AS \"LINE NAME\"
			,MP.MODEL
			,A.ITEM_CD AS \"ITEM CD\"
			,A.ITEM_NAME AS \"ITEM NAME\"
			--
			%s
			FROM
			(SELECT
			 1 AS STATUS
			,TD.PLANT_CD AS PLANT
			,TD.SOURCE_CD AS LINE_CD
			,VD.SEC_NM AS LINE_NAME
			,TD.ITEM_CD
			,MI.ITEM_NAME
			--,MP.MODEL
			,TD.ACPT_PLAN_DATE AS PDATE
			,TD.ODR_QTY AS QTY
			FROM
			 (SELECT * FROM T_OD WHERE OD_TYP = 2 AND OUTSIDE_TYP = 1 AND NOT (ODR_STS_TYP = 9 AND TOTAL_RCV_QTY = 0)) TD
			,VM_DEPARTMENT VD
			,M_ITEM MI
			--,M_PLANT_ITEM MP 
			WHERE
			    TD.ITEM_CD   = MI.ITEM_CD(+)
			AND TD.SOURCE_CD = VD.SEC_CD(+)
			AND NOT(TD.ODR_STS_TYP = 9 AND TD.TOTAL_RCV_QTY = 0)

			UNION ALL

			SELECT
			 2 AS STATUS
			,TR.PLANT_CD AS PLANT
			,TR.WS_CD AS LINE_CD
			,VD.SEC_NM AS LINE_NAME
			,TR.ITEM_CD AS ITEM_CD
			,MI.ITEM_NAME AS ITEM_NAME
			--,MP.MODEL
			,TR.OPR_DATE AS PDATE
			,TR.ACPT_QTY AS QTY
			FROM
			 T_OPR_RSLT TR
			,M_ITEM MI
			,VM_DEPARTMENT VD
			--,M_PLANT_ITEM MP
			WHERE
			TR.ITEM_CD = MI.ITEM_CD(+)
			AND TR.WS_CD = VD.SEC_CD(+)
			--AND TR.ITEM_CD = MP.ITEM_CD(+)
			) A
			,VM_DEPARTMENT_CLASS VM
			,VM_DEPARTMENT VDD
			,M_PLANT_ITEM MP
			WHERE
			A.LINE_CD = VM.COMP_SEC_CD(+)
			AND A.LINE_CD = VDD.SEC_CD(+)
			AND A.PLANT = MP.PLANT_CD
			AND A.ITEM_CD = MP.ITEM_CD(+)
			--AND VM.PARENT_SEC_CD = 'K1PD01'
			--AND A.ITEM_CD = '5JX371-3590'
			GROUP BY
			 VM.PARENT_SEC_CD
			,A.LINE_CD
			,A.LINE_NAME
			,A.ITEM_CD
			,A.ITEM_NAME
			,MP.MODEL
			ORDER BY
			 VM.PARENT_SEC_CD
			,A.LINE_CD
			,A.ITEM_CD"
			,$srtDays
			);
			//echo $sql_str; exit;
			return $sql_str;
		}

	public function ORACLE_GETDATA_REPORT_ONLI($datS)
		{
			$daterequest = date( 'Y/m/d', strtotime($datS) );
			$lastmonth   = date('t', strtotime($daterequest));
			$thisMonth  = (int)date('m');
			$runsMonth  = (int)date('m', strtotime($daterequest));		
			$dateType = ( $thisMonth <= $runsMonth) ? 1 : 2;
			//echo date('t dS', strtotime($daterequest) ); exit;
			$strSum["l1"] = "";
			$strSum["l2"] = "";
			foreach( range(1,$lastmonth) as $ind )
			{
				$alias1  = date('dS', strtotime("+".($ind-1)." day", strtotime($daterequest) ) );
				$dateCn  = date('Y/m/d', strtotime("+".($ind-1)." day", strtotime($daterequest) ) );
				$strSum["l1"] .= sprintf( ",CASE WHEN  RN.date%s  > 0 THEN 1 ELSE 0 END  AS \"%s\" \n",$ind, $alias1 );
				$strSum["l2"] .= sprintf( ",NVL(SUM(CASE WHEN A.STATUS = $dateType AND TO_CHAR(A.PDATE,'YYYY/MM/DD') = '%s' THEN A.QTY END ),0)  AS date%s \n", $dateCn, $ind );
				//$strSum["l2"] .= sprintf( ",NVL(SUM(CASE WHEN A.STATUS = $dateType AND TO_CHAR(A.PDATE,'YYYY/MM/DD') = TO_CHAR(TRUNC(ADD_MONTHS('%s',1),'MM')+%s,'YYYY/MM/DD') THEN A.QTY END ),0)  AS date%s \n", $daterequest, $ind, $ind );

			}
			
			$sql_str = sprintf("
			SELECT
			 RN.PD
			,RN.LINE_CD AS \"LINE CD\"
			,null AS \" \"
			,null AS \"  \"
			%s
			FROM
			(

			SELECT
			 A.PLANT AS PLANT
			,VM.PARENT_SEC_CD AS PD
			,A.LINE_CD AS LINE_CD
			,A.LINE_NAME AS LINE_NAME
			
			%s

			FROM
			(SELECT
			 1 AS STATUS
			,TD.PLANT_CD AS PLANT
			,TD.SOURCE_CD AS LINE_CD
			,VD.SEC_NM AS LINE_NAME
			,TD.ITEM_CD
			,MI.ITEM_NAME
			--,MP.MODEL
			,TD.ACPT_PLAN_DATE AS PDATE
			,TD.ODR_QTY AS QTY
			FROM
			 (SELECT * FROM T_OD WHERE OD_TYP = 2 AND OUTSIDE_TYP = 1 AND NOT (ODR_STS_TYP = 9 AND TOTAL_RCV_QTY = 0)) TD
			,VM_DEPARTMENT VD
			,M_ITEM MI
			--,M_PLANT_ITEM MP
			WHERE
			    TD.ITEM_CD   = MI.ITEM_CD(+)
			AND TD.SOURCE_CD = VD.SEC_CD(+)
			AND NOT(TD.ODR_STS_TYP = 9 AND TD.TOTAL_RCV_QTY = 0)

			) A
			,VM_DEPARTMENT_CLASS VM
			,VM_DEPARTMENT VDD
			,M_PLANT_ITEM MP
			WHERE
			A.LINE_CD = VM.COMP_SEC_CD(+)
			AND A.LINE_CD = VDD.SEC_CD(+)
			AND A.ITEM_CD = MP.ITEM_CD(+)
			AND VM.PARENT_SEC_CD IS NOT NULL
			--AND VM.PARENT_SEC_CD = 'K1PD01'
			--AND A.ITEM_CD = '5JX371-3590'
			GROUP BY
			 A.PLANT
			,VM.PARENT_SEC_CD
			,A.LINE_CD
			,A.LINE_NAME
			--,MP.MODEL
			ORDER BY
			 A.PLANT
			,VM.PARENT_SEC_CD
			,A.LINE_CD


			) RN

			ORDER BY 1, 2"
			,$strSum["l1"]
			,$strSum["l2"]  	
		);
		return $sql_str;
		}

	public function ORACLE_GETDATA_REPORT_LINE($datS)
		{
			$dateType  = array();
			$monthname = array();
			foreach( range(-3,3) as $ind )
			{
				$thisMonth  = (int)date('ym');
				$runsMonth  = (int)date('ym', strtotime( $ind . " month", strtotime($datS) ));
				array_push( $monthname, date('F' , strtotime( $ind . " month", strtotime($datS) )) );
				if( $thisMonth > $runsMonth) array_push($dateType, 2);
				else array_push($dateType, 1);
			}
			
			$sql_str = sprintf("SELECT
								   VC.PARENT_SEC_CD PD
								 , A.LINE_CD AS \"LINE CD\"
								 , NULL AS \" \"
								 , NULL AS \"  \"  
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[0]} THEN A.D_DATE END ) {$monthname[0]}
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[1]} THEN A.D_DATE END ) {$monthname[1]}
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[2]} THEN A.D_DATE END ) {$monthname[2]}
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[3]} THEN A.D_DATE END ) {$monthname[3]}
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[4]} THEN A.D_DATE END ) {$monthname[4]}
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[5]} THEN A.D_DATE END ) {$monthname[5]}
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[6]} THEN A.D_DATE END ) {$monthname[6]}

								FROM 
								( SELECT
								  2 TYPE
								 ,PLANT_CD AS PLANT_CD
								 ,WS_CD AS LINE_CD
								 ,OPR_DATE AS D_DATE
								 ,SUM(ACPT_QTY) AS QTY
								 FROM
								T_OPR_RSLT 
								 WHERE TO_CHAR(OPR_DATE,'YYYY/MM/DD') BETWEEN '%s' AND  '%s'

								GROUP BY
								  PLANT_CD 
								 ,WS_CD 
								 ,OPR_DATE 
								 
								 UNION ALL
								 
								 SELECT
								   1 TYPE
								  ,TL.PLANT_CD     AS PLANT_CD
								  ,TL.SOURCE_CD    AS LINE_CD
								  ,TL.ACPT_PLAN_DATE AS D_DATE
								  ,SUM(TL.ODR_QTY)   AS QTY
								FROM
								 T_OD TL

								WHERE
								 TO_CHAR(TL.ACPT_PLAN_DATE,'YYYY/MM/DD') BETWEEN '%s' AND  '%s'
								AND NOT(TL.ODR_STS_TYP = 9 AND TL.TOTAL_RCV_QTY = 0)
								GROUP BY
								  TL.SOURCE_CD
								 ,TL.PLANT_CD
								 ,TL.ACPT_PLAN_DATE
								) A
								,VM_DEPARTMENT_CLASS VC

								WHERE
								A.LINE_CD = VC.COMP_SEC_CD(+)
								AND VC.PARENT_SEC_CD IS NOT NULL

								GROUP BY 
								 VC.PARENT_SEC_CD
								,A.LINE_CD
								ORDER BY 1,2"
								,date('m', strtotime("- 3 month", strtotime( $datS ) ) )
								,date('m', strtotime("- 2 month", strtotime( $datS ) ) )
								,date('m', strtotime("- 1 month", strtotime( $datS ) ) )
								,date('m', strtotime("- 0 month", strtotime( $datS ) ) )
								,date('m', strtotime("+ 1 month", strtotime( $datS ) ) )
								,date('m', strtotime("+ 2 month", strtotime( $datS ) ) )
								,date('m', strtotime("+ 3 month", strtotime( $datS ) ) ) 
							   	,date('Y/m/d', strtotime("- 3 month", strtotime( $datS ) ) )
							   	,date('Y/m/d', strtotime("+ 4 month", strtotime( $datS ) ) )
							   	,date('Y/m/d', strtotime("- 3 month", strtotime( $datS ) ) )
							   	,date('Y/m/d', strtotime("+ 4 month", strtotime( $datS ) ) )
			);
			//echo( $sql_str );exit;
			return $sql_str;
		}		

	public function ORACLE_GETDATA_REPORT_ITEM_PA($datS, $type)
		{
			$daterequest = date( 'Y/m/d', strtotime($datS) );
			$lastmonth   = date('t', strtotime($daterequest));
			$thisMonth  = (int)date('m');
			$runsMonth  = (int)date('m', strtotime($daterequest));		
			$dateType = ( $thisMonth <= $runsMonth) ? 1 : 2;
			//echo date('t dS', strtotime($daterequest) ); exit;
			$strSum["l1"] = date( 'Y/m/d', strtotime($datS) );
			$strSum["l2"] = date( 'Y/m/t', strtotime($datS) );
			$srtDays="";
			foreach( range(1,$lastmonth) as $ind )
			{
				$alias1  = date('dS', strtotime("+".($ind-1)." day", strtotime($daterequest) ) );
				$dateCn  = date('Y/m/d', strtotime("+".($ind-1)." day", strtotime($daterequest) ) );
				$srtDays .= sprintf( ",NVL(SUM(CASE WHEN A.STATUS = $type AND TO_CHAR(A.PDATE,'YYYY/MM/DD') = '%s' THEN A.QTY END ),0)  AS \"%s\" \n",$dateCn, $alias1 );
				//$strSum["l2"] .= sprintf( ",NVL(SUM(CASE WHEN A.STATUS = $dateType AND TO_CHAR(A.PDATE,'YYYY/MM/DD') = TO_CHAR(TRUNC(ADD_MONTHS('%s',1),'MM')+%s,'YYYY/MM/DD') THEN A.QTY END ),0)  AS date%s \n", $daterequest, $ind, $ind );
			}			
			$sql_str = sprintf("
			SELECT
			 VM.PARENT_SEC_CD AS PD
			,A.LINE_CD AS \"LINE CD\"
			,A.LINE_NAME AS \"LINE NAME\"
			,MP.MODEL
			,A.ITEM_CD AS \"ITEM CD\"
			,A.ITEM_NAME AS \"ITEM NAME\"
			--
			%s
			FROM
			(SELECT
			 1 AS STATUS
			,TD.PLANT_CD AS PLANT
			,TD.SOURCE_CD AS LINE_CD
			,VD.SEC_NM AS LINE_NAME
			,TD.ITEM_CD
			,MI.ITEM_NAME
			--,MP.MODEL
			,TD.ACPT_PLAN_DATE AS PDATE
			,TD.ODR_QTY AS QTY
			FROM
			 (SELECT * FROM T_OD WHERE OD_TYP = 2 AND OUTSIDE_TYP = 1 AND NOT (ODR_STS_TYP = 9 AND TOTAL_RCV_QTY = 0)) TD
			,VM_DEPARTMENT VD
			,M_ITEM MI
			--,M_PLANT_ITEM MP
			WHERE
			    TD.ITEM_CD   = MI.ITEM_CD(+)
			AND TD.SOURCE_CD = VD.SEC_CD(+)
			AND NOT(TD.ODR_STS_TYP = 9 AND TD.TOTAL_RCV_QTY = 0)

			UNION ALL

			SELECT
			 2 AS STATUS
			,TR.PLANT_CD AS PLANT
			,TR.WS_CD AS LINE_CD
			,VD.SEC_NM AS LINE_NAME
			,TR.ITEM_CD AS ITEM_CD
			,MI.ITEM_NAME AS ITEM_NAME
			--,MP.MODEL
			,TR.OPR_DATE AS PDATE
			,TR.ACPT_QTY AS QTY
			FROM
			 T_OPR_RSLT TR
			,M_ITEM MI
			,VM_DEPARTMENT VD
			--,M_PLANT_ITEM MP
			WHERE
			TR.ITEM_CD = MI.ITEM_CD(+)
			AND TR.WS_CD = VD.SEC_CD(+)
			--AND TR.ITEM_CD = MP.ITEM_CD(+)
			) A
			,VM_DEPARTMENT_CLASS VM
			,VM_DEPARTMENT VDD
			,M_PLANT_ITEM MP
			WHERE
			A.LINE_CD = VM.COMP_SEC_CD(+)
			AND A.LINE_CD = VDD.SEC_CD(+)
			AND A.PLANT = MP.PLANT_CD
			AND A.ITEM_CD = MP.ITEM_CD(+)
			--AND VM.PARENT_SEC_CD = 'K1PD01'
			--AND A.ITEM_CD = '5JX371-3590'
			GROUP BY
			 VM.PARENT_SEC_CD
			,A.LINE_CD
			,A.LINE_NAME
			,A.ITEM_CD
			,A.ITEM_NAME
			,MP.MODEL
			ORDER BY
			 VM.PARENT_SEC_CD
			,A.LINE_CD
			,A.ITEM_CD"
			,$srtDays
			);
			//echo $sql_str; exit;
			return $sql_str;
		}

	public function ORACLE_GETDATA_REPORT_ONLI_PA($datS, $type)
		{
			$daterequest = date( 'Y/m/d', strtotime($datS) );
			$lastmonth   = date('t', strtotime($daterequest));
			$thisMonth  = (int)date('m');
			$runsMonth  = (int)date('m', strtotime($daterequest));		
			$dateType = ( $thisMonth <= $runsMonth) ? 1 : 2;
			//echo date('t dS', strtotime($daterequest) ); exit;
			$strSum["l1"] = "";
			$strSum["l2"] = "";
			foreach( range(1,$lastmonth) as $ind )
			{
				$alias1  = date('dS', strtotime("+".($ind-1)." day", strtotime($daterequest) ) );
				$dateCn  = date('Y/m/d', strtotime("+".($ind-1)." day", strtotime($daterequest) ) );
				$strSum["l1"] .= sprintf( ",CASE WHEN  RN.date%s  > 0 THEN 1 ELSE 0 END  AS \"%s\" \n",$ind, $alias1 );
				$strSum["l2"] .= sprintf( ",NVL(SUM(CASE WHEN A.STATUS = $type AND TO_CHAR(A.PDATE,'YYYY/MM/DD') = '%s' THEN A.QTY END ),0)  AS date%s \n", $dateCn, $ind );
				//$strSum["l2"] .= sprintf( ",NVL(SUM(CASE WHEN A.STATUS = $dateType AND TO_CHAR(A.PDATE,'YYYY/MM/DD') = TO_CHAR(TRUNC(ADD_MONTHS('%s',1),'MM')+%s,'YYYY/MM/DD') THEN A.QTY END ),0)  AS date%s \n", $daterequest, $ind, $ind );

			}
			
			$sql_str = sprintf("
			SELECT
			 RN.PD
			,RN.LINE_CD AS \"LINE CD\"
			,null AS \" \"
			,null AS \"  \"
			%s
			FROM
			(

			SELECT
			 A.PLANT AS PLANT
			,VM.PARENT_SEC_CD AS PD
			,A.LINE_CD AS LINE_CD
			,A.LINE_NAME AS LINE_NAME
			
			%s

			FROM
			(SELECT
			 2 AS STATUS
			,TR.PLANT_CD AS PLANT
			,TR.WS_CD AS LINE_CD
			,VD.SEC_NM AS LINE_NAME
			,TR.ITEM_CD AS ITEM_CD
			,MI.ITEM_NAME AS ITEM_NAME
			--,MP.MODEL
			,TR.OPR_DATE AS PDATE
			,TR.ACPT_QTY AS QTY
			FROM
			 T_OPR_RSLT TR
			,M_ITEM MI
			,VM_DEPARTMENT VD
			--,M_PLANT_ITEM MP
			WHERE
			TR.ITEM_CD = MI.ITEM_CD(+)
			AND TR.WS_CD = VD.SEC_CD(+)
								 
		    UNION ALL
								 

			SELECT
			 1 AS STATUS
			,TD.PLANT_CD AS PLANT
			,TD.SOURCE_CD AS LINE_CD
			,VD.SEC_NM AS LINE_NAME
			,TD.ITEM_CD
			,MI.ITEM_NAME
			--,MP.MODEL
			,TD.ACPT_PLAN_DATE AS PDATE
			,TD.ODR_QTY AS QTY
			FROM
			 (SELECT * FROM T_OD WHERE OD_TYP = 2 AND OUTSIDE_TYP = 1 AND NOT (ODR_STS_TYP = 9 AND TOTAL_RCV_QTY = 0)) TD
			,VM_DEPARTMENT VD
			,M_ITEM MI
			--,M_PLANT_ITEM MP
			WHERE
			    TD.ITEM_CD   = MI.ITEM_CD(+)
			AND TD.SOURCE_CD = VD.SEC_CD(+)
			AND NOT(TD.ODR_STS_TYP = 9 AND TD.TOTAL_RCV_QTY = 0)

			) A
			,VM_DEPARTMENT_CLASS VM
			,VM_DEPARTMENT VDD
			,M_PLANT_ITEM MP
			WHERE
			A.LINE_CD = VM.COMP_SEC_CD(+)
			AND A.LINE_CD = VDD.SEC_CD(+)
			AND A.ITEM_CD = MP.ITEM_CD(+)
			AND VM.PARENT_SEC_CD IS NOT NULL
			--AND VM.PARENT_SEC_CD = 'K1PD01'
			--AND A.ITEM_CD = '5JX371-3590'
			GROUP BY
			 A.PLANT
			,VM.PARENT_SEC_CD
			,A.LINE_CD
			,A.LINE_NAME
			--,MP.MODEL
			ORDER BY
			 A.PLANT
			,VM.PARENT_SEC_CD
			,A.LINE_CD


			) RN

			ORDER BY 1, 2"
			,$strSum["l1"]
			,$strSum["l2"]  	
		);
		return $sql_str;
		}

	public function ORACLE_GETDATA_REPORT_LINE_PA($datS)
		{
			$dateType  = array();
			$monthname = array();
			foreach( range(-5,1) as $ind )
			{
				$thisMonth  = (int)date('ym');
				$runsMonth  = (int)date('ym', strtotime( $ind . " month", strtotime($datS) ));
				array_push( $monthname, date('F' , strtotime( $ind . " month", strtotime($datS) )) );
				if( $thisMonth >= $runsMonth) array_push($dateType, 2);
				else array_push($dateType, 1);
			}
			
			$sql_str = sprintf("SELECT
								   VC.PARENT_SEC_CD PD
								 , A.LINE_CD AS \"LINE CD\"
								 , NULL AS \" \"
								 , NULL AS \"  \"  
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[0]} THEN A.D_DATE END ) {$monthname[0]}
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[1]} THEN A.D_DATE END ) {$monthname[1]}
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[2]} THEN A.D_DATE END ) {$monthname[2]}
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[3]} THEN A.D_DATE END ) {$monthname[3]}
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[4]} THEN A.D_DATE END ) {$monthname[4]}
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[5]} THEN A.D_DATE END ) {$monthname[5]}
								 , COUNT ( CASE WHEN TO_CHAR(A.D_DATE,'MM') = '%s' AND A.TYPE = {$dateType[6]} THEN A.D_DATE END ) {$monthname[6]}

								FROM 
								( SELECT
								  2 TYPE
								 ,PLANT_CD AS PLANT_CD
								 ,WS_CD AS LINE_CD
								 ,OPR_DATE AS D_DATE
								 ,SUM(ACPT_QTY) AS QTY
								 FROM
								T_OPR_RSLT 
								 WHERE TO_CHAR(OPR_DATE,'YYYY/MM/DD') BETWEEN '%s' AND  '%s'

								GROUP BY
								  PLANT_CD 
								 ,WS_CD 
								 ,OPR_DATE 
								 
								 UNION ALL
								 
								 SELECT
								   1 TYPE
								  ,TL.PLANT_CD     AS PLANT_CD
								  ,TL.SOURCE_CD    AS LINE_CD
								  ,TL.ACPT_PLAN_DATE AS D_DATE
								  ,SUM(TL.ODR_QTY)   AS QTY
								FROM
								 T_OD TL

								WHERE
								 TO_CHAR(TL.ACPT_PLAN_DATE,'YYYY/MM/DD') BETWEEN '%s' AND  '%s'
								AND NOT(TL.ODR_STS_TYP = 9 AND TL.TOTAL_RCV_QTY = 0)
								GROUP BY
								  TL.SOURCE_CD
								 ,TL.PLANT_CD
								 ,TL.ACPT_PLAN_DATE
								) A
								,VM_DEPARTMENT_CLASS VC

								WHERE
								A.LINE_CD = VC.COMP_SEC_CD(+)
								AND VC.PARENT_SEC_CD IS NOT NULL

								GROUP BY 
								 VC.PARENT_SEC_CD
								,A.LINE_CD
								ORDER BY 1,2"
								,date('m', strtotime("- 5 month", strtotime( $datS ) ) )
								,date('m', strtotime("- 4 month", strtotime( $datS ) ) )
								,date('m', strtotime("- 3 month", strtotime( $datS ) ) )
								,date('m', strtotime("- 2 month", strtotime( $datS ) ) )
								,date('m', strtotime("- 1 month", strtotime( $datS ) ) )
								,date('m', strtotime("+ 0 month", strtotime( $datS ) ) )
								,date('m', strtotime("+ 1 month", strtotime( $datS ) ) ) 
							   	,date('Y/m/d', strtotime("- 5 month", strtotime( $datS ) ) )
							   	,date('Y/m/d', strtotime("+ 2 month", strtotime( $datS ) ) )
							   	,date('Y/m/d', strtotime("- 5 month", strtotime( $datS ) ) )
							   	,date('Y/m/d', strtotime("+ 2 month", strtotime( $datS ) ) )
			);
			//echo( $sql_str );exit;
			return $sql_str;
		}		





	public function ORACLE_GETDATE_HOLIDAYS_FM($m)
		{
			return sprintf("
				SELECT CAL_DATE
				, LOWER( TO_CHAR(TO_DATE(CAL_DATE,'YYYY-MM-DD'), 'DAY' ) ) FND
				, TO_CHAR(TO_DATE(CAL_DATE,'YYYY-MM-DD'), 'Dy' ) ND
				, LOWER( TO_CHAR(TO_DATE(CAL_DATE,'YYYY-MM-DD'), 'DDTH' ) ) DD 
				 FROM M_CAL 
				 WHERE CAL_NO = 1 
				 AND HOLIDAY_FLG = 1 
				 AND TO_CHAR( TO_DATE(CAL_DATE,'YYYY-MM-DD'), 'YYYY/MM') = '%s' "
				 ,$m);
		}
	
	public function ORACLE_GETDATE_SATURDAY_WD($m) 
		{
			return sprintf("SELECT 
							CAL_DATE
							, LOWER( TO_CHAR(TO_DATE(CAL_DATE,'YYYY-MM-DD'), 'DAY' ) ) FND
							, TO_CHAR(TO_DATE(CAL_DATE,'YYYY-MM-DD'), 'Dy' ) ND
							, LOWER( TO_CHAR(TO_DATE(CAL_DATE,'YYYY-MM-DD'), 'DDTH' ) ) DD 

							FROM 
							M_CAL WHERE CAL_NO = 1 
							AND HOLIDAY_FLG = 0 
							AND TO_CHAR( TO_DATE(CAL_DATE,'YYYY-MM-DD'), 'YYYY/MM') = '%s' 
							AND TO_CHAR( TO_DATE(CAL_DATE,'YYYY-MM-DD'), 'Dy') = 'Sat' 
							"
							,$m);
		}
	public function ORACLE_GETDATE_CALENDA_WD($m, $s, $e) 
		{
			$sq="";
			foreach( range($s, $e) as $x => $nx  )
			{
				$dc  = date('Ym', strtotime( $nx . "month", strtotime($m) ) );
				$sq .= sprintf(",COUNT ( CASE WHEN TO_CHAR(TO_DATE(CAL_DATE,'YYYY-MM-DD'), 'YYYYMM') = '%s' THEN CAL_DATE END ) M%s \n", $dc, ($x+1) );
			}
			return sprintf("SELECT 
							%s
							FROM M_CAL WHERE CAL_NO = 1 AND HOLIDAY_FLG = 0"
							,substr($sq,1)
						  );
		}

}
