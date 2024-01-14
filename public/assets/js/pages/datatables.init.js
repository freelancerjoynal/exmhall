/*$(document).ready(function(){$("#datatable").DataTable(),$("#datatable-buttons").DataTable({lengthChange:!1,buttons:["copy","excel","pdf","colvis"]}).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")});*/

$(document).ready(function(){
	
	if($('#admin_product_warranties_table').length > 0) {
		var admin_product_warranties_table = $("#admin_product_warranties_table").DataTable({
			
			language: {
			search: "_INPUT_",
			searchPlaceholder: "Search"
			},
			"lengthChange": false,
			"autoWidth": false,
			"pageLength": 10,
			"aoColumns": [
				{ "sWidth": "6%", "targets": 0  },
				{ "sWidth": "8%", "targets": 1 },
				{ "sWidth": "8%", "targets": 2  },
				{ "sWidth": "10%", "targets": 3  },
				{ "sWidth": "6%", "targets": 4  },
				{ "sWidth": "14%", "targets": 5  },
				{ "sWidth": "7%", "targets": 6  },
				{ "sWidth": "8%", "targets": 7  },
				{ "sWidth": "6%", "targets": 8  },
			],
			"columnDefs": [
					{
							render: function (data, type, full, meta) {
									return "<div class='text-wrap'>" + data + "</div>";
							},
							targets: 2
					}
			 ],
			 "columnDefs": [
					{
							render: function (data, type, full, meta) {
									return "<div class='text-wrap'>" + data + "</div>";
							},
							targets: 3
					}
			 ],
			 "columnDefs": [
					{
							render: function (data, type, full, meta) {
									return "<div class='text-wrap'>" + data + "</div>";
							},
							targets: 8
					}
			 ],
		});
	}
	
	if($('#masters_classes_table').length > 0) {
		var masters_classes_table = $("#masters_classes_table").DataTable();
	}
	
	
});