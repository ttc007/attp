$(document).ready(function(){

	var $table = $('#table'),
		$remove = $('#remove'),
		selections = [];

	function totalTextFormatter(data) {
		return 'Total';
	}

	function totalNameFormatter(data) {
		return data.length;
	}

	function totalPriceFormatter(data) {
		var total = 0;
		$.each(data, function (i, row) {
			total += +(row.price.substring(1));
		});
		return '$' + total;
	}

	function statusFormatter(data, rowData, index) {
		return "<b class='text-success'>"+data+"</b>";
	}

	window.operateEvents = {
		'click .like': function (e, value, row, index) {
			// alert('You click like action, row: ' + JSON.stringify(row));
			window.location = '/marketing/template/edit/'+row.id;
		},
		'click .remove': function (e, value, row, index) {
			$.ajax({
				url: '/api/contact/delete',
				type: 'POST',
				data: {
					id: row.id
				},
			})
			.done(function() {
				$table.bootstrapTable('remove', {
					field: 'id',
					values: [row.id]
				});
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	};

	window.nameEvents = {
		'click .nameclick': function (e, value, row, index) {
			// alert('You click like action, row: ' + JSON.stringify(row));
			window.location = '/marketing/contact/detail/'+row.id;
		},
		'click .remove': function (e, value, row, index) {
			$table.bootstrapTable('remove', {
				field: 'id',
				values: [row.id]
			});
		}
	};

	function operateFormatter(value, row, index) {
		return [
			'<a class="like" href="javascript:void(0)" title="Edit">',
			'<i class="glyphicon glyphicon-edit"></i>',
			'</a>  ',
			// '<a class="remove" href="javascript:void(0)" title="Remove">',
			// '<i class="glyphicon glyphicon-remove"></i>',
			// '</a>'
		].join('');
	}

	function getIdSelections() {
		return $.map($table.bootstrapTable('getSelections'), function (row) {
			return row.id
		});
	}

	var data = getSomething();

	function getSomething(){
	    var result = null;
	    $.ajax({
	        async: false,
	        url: "/api/template_email",
	        data: {app_id:$("#app_id").val()},
	        dataType: "json",
	        success: function(response){
	            result = response;
	            console.log(response);
	        }
	    });
	    return result;
	}
	
	$table.bootstrapTable({
		iconsPrefix: 'font-icon',
		icons: {
			paginationSwitchDown:'font-icon-arrow-square-down',
			paginationSwitchUp: 'font-icon-arrow-square-down up',
			refresh: 'font-icon-refresh',
			toggle: 'font-icon-list-square',
			columns: 'font-icon-list-rotate',
			export: 'font-icon-download',
			detailOpen: 'font-icon-plus',
			detailClose: 'font-icon-minus-1'
		},
		paginationPreText: '<i class="font-icon font-icon-arrow-left"></i>',
		paginationNextText: '<i class="font-icon font-icon-arrow-right"></i>',
		data: data,
		columns: [
			[
				{
					field: 'state',
					checkbox: true,
					rowspan: 2,
					align: 'center',
					valign: 'middle'
				},
				{
					title: 'Item ID',
					field: 'id',
					rowspan: 2,
					align: 'center',
					valign: 'middle',
					sortable: true,
					footerFormatter: totalTextFormatter
				},
				{
					title: 'Item Detail',
					colspan: 5,
					align: 'center'
				}
			],
			[
				{
					field: 'name',
					title: 'Tên mẫu email',
					sortable: true,
					editable: true,
					formatter: statusFormatter,
					// footerFormatter: totalNameFormatter,
					align: 'center',
					// events: nameEvents,
				},
				{
					field: 'subject',
					title: 'Subject',
					sortable: true,
					align: 'center',
					footerFormatter: totalPriceFormatter
				},
				{
					field: 'operate',
					title: 'Item Operate',
					align: 'center',
					events: operateEvents,
					formatter: operateFormatter
				}
			]
		]
	});

	$table.on('check.bs.table uncheck.bs.table ' +
		'check-all.bs.table uncheck-all.bs.table', function () {
		$remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
		// save your data, here just save the current page
		selections = getIdSelections();
		// push or splice the selections if you want to save all data selections
	});

	$remove.click(function () {
		var ids = getIdSelections();
		$.ajax({
			url: '/api/contact/delete',
			type: 'POST',
			data: {
				id: ids
			},
		})
		.done(function() {
			$table.bootstrapTable('remove', {
				field: 'id',
				values: ids
			});
			$remove.prop('disabled', true);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		
	});

	$('#toolbar').find('select').change(function () {
		$table.bootstrapTable('refreshOptions', {
			exportDataType: $(this).val()
		});
	});

/* ========================================================================== */
});
