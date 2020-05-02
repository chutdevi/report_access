var data_cur;
var data_file;
var setFilter = 0;
var dataFilter = [];
var searchClick = 0;
var btl;
$(document).ready(function(){
		var b;
		Settingfilter();
		
		$("#dateship").change(function(){
			$('#tbd').show();
			
			Settingfilter();
		});
		$("#bnt-shipFind").click(function()
		{
			$('#tbd').show();
			$('#shtable').css("display","none");
			//table = $('#indt-datatables').DataTable();
			//table.clear().draw();
			//table.destroy();
			setConditionSearch()
		});	
		$("button[name=\"button-shipping\"]").click(function()
		{
			var idnbt = $(this).attr("id");
			$('#shtable').css("display", "none");
			$('#loader-in').html("Generate Report..");
			$('#tbd').show();
			switch(idnbt) {
			  case "bntship-excel":
				generate_excel({fil:"shipping",hcl:"0288d1",cor:"fff2d7" });
				break;
			  case "bntship-csv":
				generate_csv({fil:"shipping"});
				break;
			  //default:
				// code block
			}			
			//$('#tbd').show();
			//$('#shtable').css("display","none");
			//table = $('#indt-datatables').DataTable();
			//table.clear().draw();
			//table.destroy();
			//setConditionSearch()
		});		
		
		

	});

function shipfind(){
    $.ajax({
		url     : 'http://192.168.161.102/api_system/Api_shipping/ship_item',
		type    : 'post',
		dataType: 'json',
		data    :  { "st" : data_cur[0], "en" : data_cur[1]   } ,
		success : function(it)
					{
						dataFilter["itm"] = it["itm"];
						dataFilter["inv"] = it["inv"];
						dataFilter["cus"] = it["cus"];
						//console.log(dataFilter);
						
						ShippingItemcode();
						ShippingInvoicecode();
						ShippingCustcode();
						//console.log('http://192.168.161.102/report_access/' + it);
						//window.location.href = 'http://192.168.161.102/report_access/' +it;
	
						//'over_off();
						$('#tbd').css("display", "none");
						$('#ldd').css("display", "none");
					},
		error : function(it)
			{
				console.log(it);   
			}
		});  	
}
	
function Settingfilter(){
	data_cur = $('#dateship').val().split(' - ');
	$('#shtable').css("display","none");
	console.log(data_cur);
	
	shipfind();
}	
		
function ShippingItemcode(){
	var inpItem = $('#demo-select2-10')
	var str_option = "<option value=\"0\">Select all production item.</option>\n";
	var selectItm = dataFilter["itm"];

	inpItem.html('');
	for(var cm in selectItm)
	{
		str_option += `<option value=\"${selectItm[cm]['ITEM_CD']}\">${selectItm[cm]['ITEM_CD']}</option>\n`;		
	}
	inpItem.append(str_option);
	setFilter++;
}	

function ShippingInvoicecode(){
	var inpItem = $('#demo-select2-13')
	var str_option = "<option value=\"0\">Select all invoice.</option>\n";
	var selectItm = dataFilter["inv"];

	inpItem.html('');
	for(var cm in selectItm)
	{
		str_option += `<option value=\"${selectItm[cm]['INV']}\">${selectItm[cm]['INV']}</option>\n`;		
	}
	inpItem.append(str_option);
	setFilter++;
}

function ShippingCustcode(){
	var inpItem = $('#demo-select2-14')
	var str_option = "<option value=\"0\">Select all customers.</option>\n";
	var selectItm = dataFilter["cus"];
	//console.log(selectItm[0]);
	inpItem.html('');
	for(var cm in selectItm)
	{
		str_option += `<option value=\"${selectItm[cm]['CUST_CD']}\">${selectItm[cm]['CUST_CD']}</option>\n`;		
	}
	//sconsole.log(str_option);
	inpItem.append(str_option);
	setFilter++;
}	
	
function setConditionSearch(){
	var Condi = "";
	Condi +=  $("#demo-select2-10 option:selected" ).val() == '0'   ? "" : `AND td.ITEM_CD = '${$("#demo-select2-10 option:selected" ).val()}'\n`;
	Condi +=  $("#demo-select2-13 option:selected" ).val() == '0'   ? "" : `AND td.INVOICE_NO = '${$("#demo-select2-13 option:selected" ).val()}'\n`;
	Condi +=  $("#demo-select2-14 option:selected" ).val() == '0'   ? "" : `AND td.CUST_CD = '${$("#demo-select2-14 option:selected" ).val()}'\n`;
	Condi +=  $("#lotship" ).val() == ''   ? "" : `AND ts.LOT_NUMBER = '${$("#lotship" ).val()}'\n`;
		
	$.ajax({
		url     : 'http://192.168.161.102/api_system/api_shipping/ship_data',
		type    : 'post',
		dataType: 'json',
		data    :  { "st" : data_cur[0], "en" : data_cur[1], "cn" : Condi  } ,
		success : function(it)
					{
						console.log(it.length);
						data_file = it;
						if( (it.length > 0) && (it.length <= 26000) )
						{
							bootstrapTableSimpleExample(it);
						}
						else if( it.length > 26000 )
						{
							alert(`ข้อมูลทั้งหมด  ${it.length} แถว ซึ่งมากเกินไปที่จะแสดง `);
							$('#tbd').css("display", "none");
						}
						else
							$('#tbd').css("display", "none");
					},
				error : function(it)
					{
						console.log(it);   
					}
				});  
}
	
function bootstrapTableSimpleExample(dataset){
	console.log(dataset);
	if(searchClick == 1) b.destroy();
	$('#indt-datatables tbody').html('');
	for (var ind in dataset)
	{
		var dataStr="";
		dataStr = `<tr>
					<td style="text-align: center;">${dataset[ind]["ITEM_CD"]}</td>
					<td style="text-align: center;">${dataset[ind]["LOT_NUMBER"]}</td>
					<td style="text-align: center;">${dataset[ind]["INVOICE_NO"]}</td>
					<td style="text-align: center;">${dataset[ind]["DELIVERY_DATE"]}</td>
					<td style="text-align: center;">${dataset[ind]["SHIP_PLAN_DATE"]}</td>
					<td style="text-align: right;">${numberWithCommas( parseInt(dataset[ind]["SHIP_QTY"]))}</td>
					<td style="text-align: center;">${dataset[ind]["SLIP_CD"]}</td>
					<td style="text-align: center;">${dataset[ind]["CREATED_DATE"]}</td>
					<td style="text-align: center;">${dataset[ind]["CUST_ODR_NO"]}</td>
					<td style="text-align: center;">${dataset[ind]["CUST_CD"]}</td>
					<td style="text-align: right;">${numberWithCommas( parseInt(dataset[ind]["TOTAL"]))}</td>
				 </tr>`						
			$('#indt-datatables tbody').append(dataStr);
	}
		
		b = $('#indt-datatables');
		b = b.DataTable({
		responsive: true,
		dom: "<'row'<'col-sm-6'l><'col-sm-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-6'i><'col-sm-6'p>>",
		language: {
			paginate: {
				previous: "&laquo;",
				next: "&raquo;"
			},
			search: "_INPUT_",
			searchPlaceholder: "Search…"
			},
		initComplete: function() {
			this.api().columns().every(function() {
				var b = this,
					
					c = b.header(),
					d = $('<select class="demo-select2" name="tableship"><option value="">' + $(c).text() + "</option></select>").appendTo($(b.footer()).empty()).on("change", function() {
						var c = $.fn.dataTable.util.escapeRegex($(this).val());
						b.search(c ? "^" + c + "$" : "", !0, !1).draw()
					});
				b.data().unique().sort().each(function(a, b) {
					d.append('<option value="' + a + '">' + a + "</option>")
				})
			})
		}				
		}),$(".demo-select2").select2();
				
		$(window).on("resize", function(a) {
			setTimeout(function() {
			b.columns.adjust().responsive.recalc()
		}, 150)});
			
		setTimeout(function() {
			b.columns.adjust().responsive.recalc()
		}, 80);


		$('select[name="tableship"]').change(function(){
			setTimeout(function() {
				b.columns.adjust().responsive.recalc()
			}, 150);
		});
		searchClick = 1;	 
		$('#tbd').css("display", "none");
		$('#shtable').show();		
}	

function generate_excel(dataSyle){
	$.ajax({
	url     : 'http://192.168.161.102/report_access/sep_generate/ajax_excel_vol2',
	type    : 'post',
	dataType: 'text',
	data    :  { "parm1" : JSON.stringify(data_file), "styles" : JSON.stringify(dataSyle)  } ,
	success : function(it)
				{
					console.log(it);
					console.log('http://192.168.161.102/report_access/' + it);
					window.location.href = 'http://192.168.161.102/report_access/' +it;
					
					
					$('#loader-in').html("Please wait...");
					$('#tbd').css("display", "none");
					$('#shtable').show();
				},
	error : function(it)
		{
			console.log(it);   
		}
	});  
}

function generate_csv(dataSyle){
	$.ajax({
	url     : 'http://192.168.161.102/report_access/sep_generate/ajax_csv_vol2',
	type    : 'post',
	dataType: 'text',
	data    :  { "parm1" : JSON.stringify(data_file), "styles" : JSON.stringify(dataSyle)  } ,
	success : function(it)
				{
					console.log(it);
					console.log('http://192.168.161.102/report_access/' + it);
					window.location.href = 'http://192.168.161.102/report_access/' +it;
					
					
					$('#loader-in').html("Please wait...");
					$('#tbd').css("display", "none");
					$('#shtable').show();
				},
	error : function(it)
		{
			console.log(it);   
		}
	});  
}