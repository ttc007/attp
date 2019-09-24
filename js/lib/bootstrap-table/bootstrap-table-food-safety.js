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

	function sttFormatter(data, rowData, index){
		return index+1;
	}

	function statusFormatter(data, rowData, index) {
		var color = "#46c35f";
		if(data=="Tạm nghỉ") {
			color = `red`;
		} else if(!data) {
			data = "Đang hoạt động";
		}

		var trave = `<span style='color:`+color+`'>`+data+`</span>`;
		return trave;
	}
	function nameFormatter(data, rowData, index) {
		return	'<div class="dropdown dropdown-status">' +
				'<button class="nameclick btn" type="button" data-toggle="dropdown"'+
				'aria-haspopup="true" aria-expanded="false">' +
					data +
				'</button>' +
				'<div class="text-left pt-2">'+
				'<b>Mã số: '+ (rowData.code?rowData.code:"") + "</b>"+
				'<br>Tên cơ sở:'+ rowData.ten_chu_co_so+
				'<br>Số điện thoại:'+ (rowData.phone?rowData.phone:"-")+
				'<br>Thôn:'+ (rowData.village?rowData.village.name:"-")+
				'<br>Nhóm:'+ (rowData.category_2?rowData.category_2.name:"-")+
				'<br>Ngày kí cam kết(3 năm):'+ (rowData.certification_date?rowData.certification_date:"-")+
				'<br>Ngày khám sức khỏe(1 năm):'+ ( rowData.ngay_kham_suc_khoe? rowData.ngay_kham_suc_khoe:"-")+
				'<br>Ngày tập huấn kiến thức(3năm):'+ (rowData.ngay_ky_cam_ket?rowData.ngay_ky_cam_ket:"-")+
				'<br>Số cấp:'+(rowData.so_cap?rowData.so_cap:"-")+
				'</div></div>';
	}

	window.operateEvents = {
		'click .like': function (e, value, row, index) {
			// alert('You click like action, row: ' + JSON.stringify(row));
			// window.location = '/food_safety/'+row.id;
		},
		'click .remove': function (e, value, row, index) {
			swal({
				type:'warning',
				title:'Warning',
				text:'Bạn chắc chắn muốn xóa cơ sở này?',
				showCancelButton:true
			}).then(function(){
				$.ajax({
					url: '/api/food_safety/delete',
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
			})
			
		}
	};

	window.nameEvents = {
		'click .nameclick': function (e, value, row, index) {
			// alert('You click like action, row: ' + JSON.stringify(row));
			window.location = '/food_safety/'+row.id;
		},
		'click .remove': function (e, value, row, index) {
			$table.bootstrapTable('remove', {
				field: 'id',
				values: [row.id]
			});
		}
	};

	function operateFormatter(value, row, index) {
		if($("#role").val()=='Guest' || $("#ward_id").val()!=$("#auth_ward_role").val()) return "";
		return [
			'<a class="like call-overlay" data-overlay="contact" onclick="edit('+row.id+')" title="Edit">',
			'<i class="glyphicon glyphicon-edit"></i>',
			'</a>  ',
			'<a class="remove" href="javascript:void(0)" title="Remove">',
			'<i class="glyphicon glyphicon-remove"></i>',
			'</a>'
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
	        url: 'http://localhost/attp/' +"api/food_safety/",
	        data: {
	        	category_id:$("#category_id").val(),
	        	ward_id:$("#ward_id").val(),
                year:$("#GLOBAL_YEAR").val()
	        },
	        dataType: "json",
	        success: function(response){
	            result = response;
	        }
	    });
	    return result;
	}

	function certificationDateFormatter(data){

	}
        
    function ngaykiemtraFormatter(value, row, index){
        var year = $("#GLOBAL_YEAR").val();
        var trave = "<div class='text-left'>";
        $.each(row.checkeds, function(i,checked){
        	if(true){
	        	trave +="<div><b style='color:#636c72'>Lần:"+(i+1)+"</b>:<b>"+checked.day+"-"+checked.month+"-"+checked.year+"</b> -- ";
	            
	            if(checked.result=="Chưa đạt") trave += "Kết quả:<b class='text-danger'>Chưa đạt</b>";
	            if(checked.result=="Đạt") trave += "Kết quả:<b class='text-success'>Đạt</b>";
	            
	            if(checked.note!=null) trave +=`<br>`+checked.note;
	            if(checked.penalize!=null) trave +=`<br> Xử phạt:`+checked.penalize;
	            if(checked.checked_tests.lenth>0){
	            	trave+="<br><span class='test-nhanh-title'>Test nhanh</span><br>";
	            	$.each(checked.checked_tests, function(t, checked_test){
	            		console.log(checked_test);
	            		trave += "<span class='test-nhanh'>"+
	            				checked_test.name+":"+checked_test.result+"</span><br>";
	            	});
	            } else {
	            	trave+="<br><span class='test-nhanh-title'>Test nhanh</span>: Không test";
	            }
        	}
        });
     	trave +="</div></div>";
        return trave;
    }

    $data_field = [
			[
				{
					field: 'ten_chu_co_so',
					title: 'STT',
					sortable: true,
					editable: true,
					formatter: sttFormatter,
					footerFormatter: totalNameFormatter,
					align: 'center',
					events: nameEvents,
				},
				{
					field: 'ten_chu_co_so',
					title: 'Tên chủ cơ sở',
					sortable: true,
					editable: true,
					formatter: nameFormatter,
					footerFormatter: totalNameFormatter,
					align: 'center',
					events: nameEvents,
				},
				{
					field: 'ngay_xac_nhan_hien_thuc',
					title: 'Lịch sử kiểm tra năm '+ $("#GLOBAL_YEAR").val(),
					sortable: true,
					align: 'left',
					formatter: ngaykiemtraFormatter
				},
				{
					field: 'status',
					title: 'Trạng thái',
					sortable: true,
					align: 'left',
					formatter: statusFormatter
				},
				{
					field: 'operate',
					title: 'Hành động',
					align: 'center',
					events: operateEvents,
					formatter: operateFormatter
				}
			]
		];
	if($("#category_id_page").val()=='Nông nghiệp')
		$data_field = [
			[
				{
					field: 'ten_chu_co_so',
					title: 'Tên chủ cơ sở',
					sortable: true,
					editable: true,
					formatter: statusFormatter,
					footerFormatter: totalNameFormatter,
					align: 'center',
					events: nameEvents,
				},
				{
					field: 'ten_co_so',
					title: 'Tên cơ sở',
					sortable: true,
					editable: true,
					formatter: statusFormatter,
					footerFormatter: totalNameFormatter,
					align: 'center',
					events: nameEvents,
				},
				{
					field: 'phone',
					title: 'Số điện thoại',
					sortable: true,
					align: 'center',
					footerFormatter: totalPriceFormatter
				},
				{
					field: 'village',
					title: 'Địa chỉ',
					sortable: true,
					align: 'center',
					footerFormatter: totalPriceFormatter
				},
				{
					field: 'category_2',
					title: 'Nhóm',
					sortable: true,
					align: 'center',
					// footerFormatter: totalPriceFormatter
				},
				{
					field: 'certification_date',
					title: 'Ngày ký<br> cam kêt<br>(3 năm)',
					sortable: true,
					align: 'center',
					footerFormatter: certificationDateFormatter
				},
				{
					field: 'noi_tieu_thu',
					title: 'Nơi tiêu thụ',
					sortable: true,
					align: 'center',
					footerFormatter: totalPriceFormatter
				},
				{
					field: 'ngay_kham_suc_khoe',
					title: 'Ngày khám<br> sức khỏe<br>(1 năm)',
					sortable: true,
					align: 'center',
					// footerFormatter: totalPriceFormatter
				},
				{
					field: 'ngay_ky_cam_ket',
					title: 'Ngày tập huấn<br> kiến thức<br>(3năm)',
					sortable: true,
					align: 'center',
					// footerFormatter: totalPriceFormatter
				},
				{
					field: 'ngay_xac_nhan_hien_thuc',
					title: 'Ngày kiểm tra ',
					sortable: true,
					align: 'center',
					formatter: ngaykiemtraFormatter
				},
				{
					field: 'operate',
					title: 'Hành động',
					align: 'center',
					events: operateEvents,
					formatter: operateFormatter
				}
			]
		];

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
		columns: $data_field,
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
		console.log($(this).val());
	});

});


