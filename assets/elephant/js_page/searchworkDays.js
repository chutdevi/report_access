	var data_cur;
	var date1;
	var today;
	var chartpd;
	var tempChart = [];
	var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	$(document).ready(function() {
	    date1 = $('#work-date1').val();
	    tempChart["pd"] = "";
	    tempChart["ln"] = "";
	    tempChart["ol"] = "";
	    today = new Date(date1);
	    //console.log( today.toString("MMMM") );
	    //chartPdworkdays();
	    chartAcworkdays()

	});
	$("#work-date1").datepicker({
	    autoclose: true,
	    minViewMode: 1,
	    format: 'yyyy-mm'
	});

	$('#workBnt-sea').click(function() {

	    date1 = $('#work-date1').val();
	    today = new Date(date1);
	    tempChart["pd"] = "";
	    tempChart["ln"] = "";
	    tempChart["ol"] = "";
	    $('#online-bar').html(`<h5 class="card-title" style="text-align: center;">Click Bar chart on Summary Work days of PD to view data Line fo PD Working  per day. </h5>`);
	    $('#online-bar2').html(`<h5 class="card-title" style="text-align: center;">Click Bar chart on Summary Work days of PD to view data Work days of Line. </h5>`);
	    //let date2 = $('#work-date2').val();

	    console.log(date1.length + " " + date1);
	    //var table_cm = $('#demo-datatables-com').DataTable();
	    if (date1.length > 0) {
	        over_on();
	        $('#tm_mer').html('Please wait...')
	            //$('#online-bar').html('')
	            //$('#online-bar2').html('')
	        $("h4[name=\"headchaer2\"]").html('Line of pd working per day')
	        if (comp_month(date1)) {
	            chartPdworkdays();
	        } else {
	            chartAcworkdays();
	        }
	    } else {
	        over_on();

	        $('#tm_mer').html('กรุณา ใส่ข้อมูลเดือนให้ครบถ้วน')


	        over_off();


	    }
	    //return 0;``
	    //tableView_compare(date1, date2)

	    //console.clear();

	});

	$('#workBnt-exl').click(function() {
	    $('#loader-in').html("Generate Report..");
	    $('#tbd').show();

	    date1 = $('#work-date1').val();
	    today = new Date(date1);

	    if (comp_month(date1)) {
	        GenerateRport();
	    } else {
	        GenerateRport_pa();
	    }


	});

	$(window).on("resize", function(a) {

	    if (!(tempChart["pd"] == "" || tempChart["ln"] == "" || tempChart["ol"] == "")) {
	        if (comp_month(date1)) {
	            setChart_lnwork(tempChart["ln"]);
	            setChart_lnworkC(tempChart["ol"]);
	        } else {
	            setChart_aclnwork(tempChart["ln"]);
	            setChart_aclnworkC(tempChart["ol"]);
	        }
	    } else {
	        $('#online-bar').html(`<h5 class="card-title" style="text-align: center;">Click Bar chart on Summary Work days of PD to view data Line fo PD Working  per day. </h5>`);
	        $('#online-bar2').html(`<h5 class="card-title" style="text-align: center;">Click Bar chart on Summary Work days of PD to view data Work days of Line. </h5>`);
	    }
	    if (comp_month(date1)) {
	        updChart_pdwork(tempChart["pd"]);
	    } else {
	        updChart_acwork(tempChart["pd"]);
	    }
	});

	function GenerateRport() {
	    //$('#demo-datatables-com tbody').html('');
	    date1 = $('#work-date1').val();
	    $.ajax({
	        url: 'http://192.168.161.102/report_access/sep_generate/ajax_excel_workdays',
	        type: 'post',
	        dataType: 'text',
	        data: { "days": date1 + "-01" },
	        success: function(it) {
	            console.log(it);
	            console.log('http://192.168.161.102/report_access/' + it);
	            window.location.href = 'http://192.168.161.102/report_access/' + it;

	            $('#loader-in').html("Please wait...");
	            $('#tbd').css("display", "none");
	            //$('#loader-in').html("Please wait...");
	            //$('#tbd').css("display", "none");		
	        },
	        error: function(it) {
	            console.log(it);
	        }
	    });
	}

	function GenerateRport_pa() {
	    //$('#demo-datatables-com tbody').html('');
	    date1 = $('#work-date1').val();
	    console.log(date1 + '-01')
	    $.ajax({
	        url: 'http://192.168.161.102/report_access/sep_generate/ajax_excel_workdays_ac',
	        type: 'post',
	        dataType: 'text',
	        data: { "days": date1 + "-01" },
	        success: function(it) {
	            console.log(it);
	            console.log('http://192.168.161.102/report_access/' + it);
	            window.location.href = 'http://192.168.161.102/report_access/' + it;

	            $('#loader-in').html("Please wait...");
	            $('#tbd').css("display", "none");
	            //$('#loader-in').html("Please wait...");
	            //$('#tbd').css("display", "none");		
	        },
	        error: function(it) {
	            console.log(it);
	            $('#loader-in').html("GENARATE ERROR !!!!");
	            setTimeout(function() { $('#tbd').css("display", "none"); }, 3000);
	        }
	    });
	}


	function chartPdworkdays() {
	    //$('#demo-datatables-com tbody').html('');
	    date1 = $('#work-date1').val();
	    $.ajax({
	        url: 'http://192.168.161.102/api_system/api_workdays/workdays_pdmonth',
	        type: 'post',
	        dataType: 'json',
	        data: { "dets": date1 + "-01" },
	        success: function(wd) {
	            console.log(wd);
	            setChart_pdwork(wd);
	            tempChart["pd"] = wd;

	            over_off()
	            $('#ldd').css("display", "none");
	        },
	        error: function(it) {
	            console.log(it);
	        }
	    });
	}

	function chartAcworkdays() {
	    //$('#demo-datatables-com tbody').html('');
	    date1 = $('#work-date1').val();
	    $.ajax({
	        url: 'http://192.168.161.102/api_system/api_workdays/workdays_acmonth',
	        type: 'post',
	        dataType: 'json',
	        data: { "dates": date1 + "-01" },
	        success: function(wd) {
	            console.log(wd);
	            setChart_acwork(wd);
	            tempChart["pd"] = wd;

	            over_off()
	            $('#ldd').css("display", "none");
	        },
	        error: function(it) {
	            console.log(it);
	        }
	    });
	}

	function chartLineworkdays(pdS) {
	    //$('#demo-datatables-com tbody').html('');
	    date1 = $('#work-date1').val();
	    $.ajax({
	        url: 'http://192.168.161.102/api_system/api_workdays/workdays_lnmonth',
	        type: 'post',
	        dataType: 'json',
	        data: { "dets": date1 + "-01", "pd": pdS },
	        success: function(wd) {
	            console.log(wd)
	            setChart_lnwork(wd)
	            tempChart["ln"] = wd
	            over_off();
	        },
	        error: function(it) {
	            console.log(it);
	        }
	    });

	}

	function chartLineworkdaysac(pdS) {
	    //$('#demo-datatables-com tbody').html('');
	    date1 = $('#work-date1').val();
	    $.ajax({
	        url: 'http://192.168.161.102/api_system/api_workdays/workdays_lnmonthac',
	        type: 'post',
	        dataType: 'json',
	        data: { "dets": date1 + "-01", "pd": pdS },
	        success: function(wd) {
	            console.log(wd)
	            setChart_aclnwork(wd)
	            tempChart["ln"] = wd
	            over_off();
	        },
	        error: function(it) {
	            console.log(it);
	        }
	    });

	}

	function chartOnlineworkdays(pdS) {
	    //$('#demo-datatables-com tbody').html('');
	    date1 = $('#work-date1').val();
	    $.ajax({
	        url: 'http://192.168.161.102/api_system/api_workdays/workdays_olmonth',
	        type: 'post',
	        dataType: 'json',
	        data: { "dets": date1 + "-01", "pd": pdS },
	        success: function(wd) {
	            console.log(wd);
	            setChart_lnworkC(wd);
	            tempChart["ol"] = wd;
	            //$(window).on("resize", function(a){ setChart_pdwork(wd), setChart_lnwork(),setChart_lnwork2() });
	            chartLineworkdays(pdS)
	                //over_off()  
	                //$('#ldd').css("display", "none");			
	        },
	        error: function(it) {
	            console.log(it["responseText"]);
	        }
	    });

	}

	function chartOnlineworkdaysac(pdS) {
	    //$('#demo-datatables-com tbody').html('');
	    date1 = $('#work-date1').val();
	    $.ajax({
	        url: 'http://192.168.161.102/api_system/api_workdays/workdays_olmonthac',
	        type: 'post',
	        dataType: 'json',
	        data: { "dets": date1 + "-01", "pd": pdS },
	        success: function(wd) {
	            console.log(wd);
	            setChart_aclnworkC(wd);
	            tempChart["ol"] = wd;
	            //$(window).on("resize", function(a){ setChart_pdwork(wd), setChart_lnwork(),setChart_lnwork2() });
	            chartLineworkdaysac(pdS)
	                //over_off()  
	                //$('#ldd').css("display", "none");			
	        },
	        error: function(it) {
	            console.log(it["responseText"]);
	        }
	    });

	}




	function updChart_pdwork(wd) {
	    $('#hero-bar').html('');

	    var chart = Morris.Bar({
	        element: 'hero-bar',
	        data: wd["data"],
	        xkey: 'PD',
	        ykeys: ['THIS_MONTH', 'NEXT1'],
	        labels: [wd["label"][0], wd["label"][1]],
	        barRatio: 1,
	        resize: true,
	        yLabelFormat: function(y) { return y = Math.round(y); },
	        ymin: 0,
	        ymax: new Date(today.getYear(), (today.getMonth() + 1), 0).getDate(),
	        numLines: new Date(today.getYear(), (today.getMonth() + 1), 0).getDate() / 6,
	        xLabelAngle: 35,
	        labelTop: true,
	        nbYkeys2: 1,
	        dataLabels: false,
	        pointSize: 9,
	        smooth: false,
	        gridTextColor: '#003',
	        //dataLabelsPosition:'inside',
	        animate: true,
	        hideHover: 'auto'
	    })
	    $('#hero-bar').append("<div align=\"center\" id=\"ladYL\" style=\"position:absolute;top: -1%; font-weight:600;\">[ Days ]</div>")
	    $('#hero-bar').append("<div align=\"right\" id=\"ladYR\" style=\"position:absolute;top: -1%; width: 100%;font-weight:600;\">[ Days ]</div>")
	    $('#hero-bar').append("<div align=\"center\" id=\"lngd\"></div>")
	    chart.options.labels.forEach(function(label, i) {
	        var legendlabel = $('<span style="display: inline-block; padding: 0px 27px;height: 20px;margin-top: 0px;">' + label + '</span>')
	        var legendItem = $('<span class="mbox" style="display: inline-block;width: 20px;height: 20px; margin-right:15%;"></span>').css('background-color', chart.options.barColors[i]).append(legendlabel)
	        $("#lngd").append(legendItem);
	    });

	    //$('#hero-bar').css("zoom", 1.5);
	    //sstyle.zoom = "90%"
	    //$('#hero-bar').html('');
	    //$('#pdDays').show();
	    //var lengeFn = 
	}

	function setChart_pdwork(wd) {
	    $('#hero-bar').html('');
	    $('#hero-bar').empty();
	    //console.log( new Date( today.getYear(), (today.getMonth()+1), 0  ).getDate() );
	    if (typeof chartpd == 'undefined') { console.log(chartpd); } else { chartpd.destroy(); }
	    chartpd = Morris.Bar({
	            element: 'hero-bar',
	            data: wd["data"],
	            xkey: 'PD',
	            ykeys: ['THIS_MONTH', 'NEXT1'],
	            labels: [wd["label"][0], wd["label"][1]],
	            barRatio: 1,
	            resize: true,
	            yLabelFormat: function(y) { return y = Math.round(y); },
	            ymin: 0,
	            ymax: new Date(today.getYear(), (today.getMonth() + 1), 0).getDate(),
	            numLines: new Date(today.getYear(), (today.getMonth() + 1), 0).getDate() / 6,
	            xLabelAngle: 35,
	            labelTop: true,
	            nbYkeys2: 1,
	            dataLabels: false,
	            pointSize: 9,
	            smooth: false,
	            gridTextColor: '#003',
	            //dataLabelsPosition:'inside',
	            animate: true,
	            hideHover: 'auto'
	        }).on('click', function(i, row) {
	            console.log(i, row['PD']);
	            over_on();
	            $('#tm_mer').html('กรุณา รอสักครู่...'),
	                chartOnlineworkdays(row['PD']),


	                $("h4[name=\"headchaer2\"]").html('Line of ' + row['PD'] + ' working per day')
	                //over_off();
	        })
	        //	$(window).on("resize", function(a){ setChart_pdwork(tempChart["pd"])});

	    // Legend for Bar chart 

	    $('#hero-bar').append("<div align=\"center\" id=\"ladYL\" style=\"position:absolute;top: -1%; font-weight:600;\">[ Days ]</div>")
	    $('#hero-bar').append("<div align=\"right\" id=\"ladYR\" style=\"position:absolute;top: -1%; width: 100%;font-weight:600;\">[ Days ]</div>")
	    $('#hero-bar').append("<div align=\"center\" id=\"lngd\"></div>")
	    chartpd.options.labels.forEach(function(label, i) {
	        var legendlabel = $('<span style="display: inline-block; padding: 0px 27px;height: 20px;margin-top: 0px;">' + label + '</span>')
	        var legendItem = $('<span class="mbox" style="display: inline-block;width: 20px;height: 20px; margin-right:15%;"></span>').css('background-color', chartpd.options.barColors[i]).append(legendlabel)


	        $("#lngd").append(legendItem);
	    });

	    //$('#hero-bar').css("zoom", 1.5);
	    //sstyle.zoom = "90%"
	    //$('#hero-bar').html('');
	    //$('#pdDays').show();
	    //var lengeFn = 
	}

	function setChart_acwork(wd) {
	    $('#hero-bar').html('');
	    $('#hero-bar').empty();
	    console.log(new Date(today.getYear(), (today.getMonth() + 1), 0).getDate());
	    if (typeof chartpd == 'undefined') { console.log(chartpd); } else { chartpd.destroy(); }
	    chartpd = Morris.Bar({
	            element: 'hero-bar',
	            data: wd["data"],
	            xkey: 'PD',
	            ykeys: ['PLAN', 'ACTU'],
	            labels: ['Plan', 'Actual'],
	            barRatio: 1,
	            resize: true,
	            yLabelFormat: function(y) { return y = Math.round(y); },
	            ymin: 0,
	            ymax: new Date(today.getYear(), (today.getMonth() + 1), 0).getDate(),
	            numLines: new Date(today.getYear(), (today.getMonth() + 1), 0).getDate() / 6,
	            xLabelAngle: 35,
	            labelTop: true,
	            //nbYkeys2: 1,
	            //dataLabels: false,
	            //pointSize:9,
	            //smooth:false,
	            gridTextColor: '#003',
	            //dataLabelsPosition:'inside',
	            animate: true,
	            hideHover: 'auto'
	        }).on('click', function(i, row) {
	            console.log(i, row['PD']);
	            over_on();
	            $('#tm_mer').html('Please wait...'),
	                chartOnlineworkdaysac(row['PD']),


	                $("h4[name=\"headchaer2\"]").html('Line of ' + row['PD'] + ' working per day')
	                //over_off();
	        })
	        //	$(window).on("resize", function(a){ setChart_pdwork(tempChart["pd"])});

	    // Legend for Bar chart 

	    $('#hero-bar').append("<div align=\"center\" id=\"ladYL\" style=\"position:absolute;top: -1%; font-weight:600;\">[ Days ]</div>")
	        //$('#hero-bar').append("<div align=\"right\" id=\"ladYR\" style=\"position:absolute;top: -1%; width: 100%;font-weight:600;\">[ Days ]</div>")
	    $('#hero-bar').append("<div align=\"center\" id=\"lngd\"></div>")
	    chartpd.options.labels.forEach(function(label, i) {
	        var legendlabel = $('<span style="display: inline-block; padding: 0px 27px;height: 20px;margin-top: 0px;">' + label + '</span>')
	        var legendItem = $('<span class="mbox" style="display: inline-block;width: 20px;height: 20px; margin-right:15%;"></span>').css('background-color', chartpd.options.barColors[i]).append(legendlabel)


	        $("#lngd").append(legendItem);
	    });

	    //$('#hero-bar').css("zoom", 1.5);
	    //sstyle.zoom = "90%"
	    //$('#hero-bar').html('');
	    //$('#pdDays').show();
	    //var lengeFn = 
	}

	function updChart_acwork(wd) {
	    $('#hero-bar').html('');

	    var chart = Morris.Bar({
	        element: 'hero-bar',
	        data: wd["data"],
	        xkey: 'PD',
	        ykeys: ['PLAN', 'ACTU'],
	        labels: ['Plan', 'Actual'],
	        barRatio: 1,
	        resize: true,
	        yLabelFormat: function(y) { return y = Math.round(y); },
	        ymin: 0,
	        ymax: new Date(today.getYear(), (today.getMonth() + 1), 0).getDate(),
	        numLines: new Date(today.getYear(), (today.getMonth() + 1), 0).getDate() / 6,
	        xLabelAngle: 35,
	        labelTop: true,
	        //nbYkeys2: 1,
	        dataLabels: true,
	        //pointSize:9,
	        //smooth:false,
	        //gridTextColor:'#003',
	        //dataLabelsPosition:'inside',
	        animate: true,
	        hideHover: 'auto'
	    })
	    $('#hero-bar').append("<div align=\"center\" id=\"ladYL\" style=\"position:absolute;top: -1%; font-weight:600;\">[ Days ]</div>")
	        //$('#hero-bar').append("<div align=\"right\" id=\"ladYR\" style=\"position:absolute;top: -1%; width: 100%;font-weight:600;\">[ Days ]</div>")
	    $('#hero-bar').append("<div align=\"center\" id=\"lngd\"></div>")
	    chart.options.labels.forEach(function(label, i) {
	        var legendlabel = $('<span style="display: inline-block; padding: 0px 27px;height: 20px;margin-top: 0px;">' + label + '</span>')
	        var legendItem = $('<span class="mbox" style="display: inline-block;width: 20px;height: 20px; margin-right:15%;"></span>').css('background-color', chart.options.barColors[i]).append(legendlabel)
	        $("#lngd").append(legendItem);
	    });

	    //$('#hero-bar').css("zoom", 1.5);
	    //sstyle.zoom = "90%"
	    //$('#hero-bar').html('');
	    //$('#pdDays').show();
	    //var lengeFn = 
	}

	function setChart_lnwork(wd) {
	    $('#online-bar2').html('');

	    var chart = Morris.Bar({
	            element: 'online-bar2',
	            data: wd["data"],
	            xkey: 'LINE_CD',
	            ykeys: ['THIS_MONTH'],
	            labels: [months[today.getMonth()]],
	            barRatio: 1,
	            resize: true,
	            yLabelFormat: function(y) { return y = Math.round(y); },
	            ymin: 0,
	            ymax: new Date(today.getYear(), (today.getMonth() + 1), 0).getDate(),
	            numLines: 6,
	            xLabelAngle: 35,
	            gridTextColor: '#003',
	            //dataLabelsPosition:'inside',
	            animate: true,
	            hideHover: 'auto'
	        })
	        //$(window).on("resize", function(a){ setChart_lnwork( tempChart["ln"] ) });

	    // Legend for Bar chart

	    $('#online-bar2').append("<div align=\"center\" id=\"ln-ladY2\" style=\"position:absolute;top: -1%; font-weight:600;\">[ Days ]</div>")
	    $('#online-bar2').append("<div align=\"center\" id=\"ln-lad2\"></div>")
	    chart.options.labels.forEach(function(label, i) {
	        var legendlabel = $('<span style="display: inline-block; padding: 0px 27px;height: 20px;margin-top: 0px;">' + label + '</span>')
	        var legendItem = $('<span class="mbox" style="display: inline-block;width: 20px;height: 20px; margin-right:15%;"></span>').css('background-color', chart.options.barColors[i]).append(legendlabel)
	        $("#ln-lad2").append(legendItem);
	    });

	}

	function setChart_aclnwork(wd) {
	    $('#online-bar2').html('');

	    var chart = Morris.Bar({
	            element: 'online-bar2',
	            data: wd["data"],
	            xkey: 'LINE_CD',
	            ykeys: ['PLAN', 'ACTU'],
	            labels: ['Plan', 'Actual'],
	            barRatio: 1,
	            resize: true,
	            yLabelFormat: function(y) { return y = Math.round(y); },
	            ymin: 0,
	            ymax: new Date(today.getYear(), (today.getMonth() + 1), 0).getDate(),
	            numLines: 6,
	            xLabelAngle: 35,
	            gridTextColor: '#003',
	            dataLabels: false,
	            //dataLabelsPosition:'inside',
	            animate: true,
	            hideHover: 'auto'
	        })
	        //$(window).on("resize", function(a){ setChart_lnwork( tempChart["ln"] ) });

	    // Legend for Bar chart

	    $('#online-bar2').append("<div align=\"center\" id=\"ln-ladY2\" style=\"position:absolute;top: -1%; font-weight:600;\">[ Days ]</div>")
	    $('#online-bar2').append("<div align=\"center\" id=\"ln-lad2\"></div>")
	    chart.options.labels.forEach(function(label, i) {
	        var legendlabel = $('<span style="display: inline-block; padding: 0px 27px;height: 20px;margin-top: 0px;">' + label + '</span>')
	        var legendItem = $('<span class="mbox" style="display: inline-block;width: 20px;height: 20px; margin-right:15%;"></span>').css('background-color', chart.options.barColors[i]).append(legendlabel)
	        $("#ln-lad2").append(legendItem);
	    });

	}

	function setChart_lnworkC(wd) {
	    $('#online-bar').html('');

	    var chart = Morris.Bar({
	            element: 'online-bar',
	            data: wd["data"],
	            xkey: "axisX", //["ORDDAYS"],
	            ykeys: ['axisY'],
	            labels: [months[today.getMonth()]],
	            barRatio: 1,
	            resize: true,
	            yLabelFormat: function(y) { return y = Math.round(y); },
	            ymin: 0,
	            ymax: wd["ymax"],
	            numLines: wd["ymax"] / 4,
	            xLabelAngle: 64,
	            labelTop: true,
	            hideHover: 'auto'
	        })
	        //
	        // Legend for Bar chart

	    $('#online-bar').append("<div align=\"center\" id=\"ln-ladY\" style=\"position:absolute;top: -1%; font-weight:600;\">[ Lines ]</div>")
	    $('#online-bar').append("<div align=\"center\" id=\"ln-lngd\"></div>")
	    chart.options.labels.forEach(function(label, i) {
	        var legendlabel = $('<span style="display: inline-block; padding: 0px 27px;height: 20px;margin-top: 0px;">' + label + '</span>')
	        var legendItem = $('<span class="mbox" style="display: inline-block;width: 20px;height: 20px; margin-right:15%;"></span>').css('background-color', chart.options.barColors[i]).append(legendlabel)


	        $("#ln-lngd").append(legendItem);
	    });

	    //$('#pdDays').show();
	    //var lengeFn = 


	}

	function setChart_aclnworkC(wd) {
	    $('#online-bar').html('');

	    var chart = Morris.Bar({
	            element: 'online-bar',
	            data: wd["data"],
	            xkey: "axisX", //["ORDDAYS"],
	            ykeys: ['axisY', 'axisZ'],
	            labels: ['Plan', 'Actual'],
	            barRatio: 1,
	            resize: true,
	            yLabelFormat: function(y) { return y = Math.round(y); },
	            ymin: 0,
	            //ymax: wd["ymax"],
	            //nbYkeys2: 1,
	            numLines: wd["ymax"] / 4,
	            xLabelAngle: 64,
	            labelTop: false,
	            dataLabels: false,
	            hideHover: 'auto'
	        })
	        //
	        // Legend for Bar chart

	    $('#online-bar').append("<div align=\"center\" id=\"ln-ladY\" style=\"position:absolute;top: -1%; font-weight:600;\">[ Lines ]</div>")
	    $('#online-bar').append("<div align=\"center\" id=\"ln-lngd\"></div>")
	    chart.options.labels.forEach(function(label, i) {
	        var legendlabel = $('<span style="display: inline-block; padding: 0px 27px;height: 20px;margin-top: 0px;">' + label + '</span>')
	        var legendItem = $('<span class="mbox" style="display: inline-block;width: 20px;height: 20px; margin-right:15%;"></span>').css('background-color', chart.options.barColors[i]).append(legendlabel)


	        $("#ln-lngd").append(legendItem);
	    });

	    //$('#pdDays').show();
	    //var lengeFn = 	 
	}

	function setChart_lnwork1() {
	    $('#online-bar').html('');

	    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
	    var chart = Morris.Bar({
	        element: 'online-bar',
	        data: [

	        ],
	        xkey: 'x',
	        ykeys: ['y'],
	        labels: [months[today.getMonth()]],
	        barRatio: 1,
	        resize: true,
	        yLabelFormat: function(y) { return y = Math.round(y); },
	        ymin: 0,
	        ymax: new Date(today.getYear(), (today.getMonth() + 1), 0).getDate(),
	        numLines: 6,
	        xLabelAngle: 64,
	        labelTop: true,
	        hideHover: 'auto'
	    })

	}

	function setChart_lnwork2() {
	    $('#online-bar2').html('');
	    var today = new Date();
	    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
	    var chart = Morris.Bar({
	        element: 'online-bar2',
	        data: [

	        ],
	        xkey: 'x',
	        ykeys: ['y'],
	        labels: [months[today.getMonth()]],
	        barRatio: 1,
	        resize: true,
	        yLabelFormat: function(y) { return y = Math.round(y); },
	        ymin: 0,
	        ymax: new Date(today.getYear(), (today.getMonth() + 1), 0).getDate(),
	        numLines: 6,
	        xLabelAngle: 64,
	        labelTop: true,
	        hideHover: 'auto'
	    })
	}

	function getRandomInt(max) {
	    return Math.floor(Math.random() * Math.floor(max));
	}

	function bootstrapTableSimpleExample(dataset) {

	    var datatables = $('#demo-datatables-com');
	    var oor = datatables.DataTable({
	        dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'table-responsive'tr>" + "<'row'<'col-sm-12'p>>",
	        language: {
	            paginate: {
	                previous: '&laquo;',
	                next: '&raquo;'
	            },
	            search: "_INPUT_",
	            searchPlaceholder: "Search…"
	        },
	        "pagingType": "full_numbers",
	        order: [
	            [1, "desc"]
	        ],
	        "lengthMenu": [
	            [25, 50, 100, -1],
	            [25, 50, 100, "All"]
	        ]

	    });
	    oor.clear().draw();

	    for (var cm in dataset) {
	        oor.row.add([
	            dataset[cm]["TERM_NO"],
	            dataset[cm]["EXEC_DATE"],
	            dataset[cm]["ITEM_CD"],
	            dataset[cm]["DATA1"],
	            dataset[cm]["DATA2"]
	        ]).draw(true); 
	    }
	    over_off();
	}

	function over_on() {
		$('body').css("overflow-y", "hidden");
	    // $('#com-sea').css("display", "none");
	    // $('#com-wai').show();

	    $('#myNav').css("width", "100%");
	    $('#myNav').show(); 
	    //timeLoad() ;
	    //myTimer = mTimer;
	}

	function over_off() {
		$('body').css("overflow-y", "auto");
	    // $('#com-wai').css("display", "none");
	    // $('#com-sea').show();

	    $('#myNav').css("width", "0");
	    $('#myNav').hide();
	}

	function comp_month(d) {
	    var tsm = new Date().toString("yyyy-MM");
	    var sem = new Date(d).toString("yyyy-MM");
	    //console.log(sem + "=> " + tsm);
	    return (sem > tsm);
	}