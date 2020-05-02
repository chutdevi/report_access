"use strict";
! function(a) 
{ 
	function aa() 
	{
			var b = a("#demo-datatables-scroller-1");
			b.length && (b = b.DataTable({
				deferRender: !0,
				scrollY: 370,
				scrollCollapse: !0,
				scroller: !0,
				responsive: !0,
				dom: "<'row'<'col-sm-6'i><'col-sm-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-6'l><'col-sm-6'p>>",
				language: {
					paginate: {
						previous: "&laquo;",
						next: "&raquo;"
					},
					search: "_INPUT_",
					searchPlaceholder: "Search…"
				}
			}), a(window).on("resize", function(a) {
				setTimeout(function() {
					b.columns.adjust().responsive.recalc()
				}, 150)
			}))
	}
	aa()
}(jQuery);