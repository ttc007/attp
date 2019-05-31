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
		var classBtn = '',
			classDropup = '',
			pageSize = 10;
		if (rowData['status'] === 'Chưa thực hiện') classBtn = '';
		if (rowData['status'] === 'Đang thực hiện') classBtn = 'btn-primary';
		if (rowData['status'] === 'Đã hoàn thành') classBtn = 'btn-success';
		//if (data === 'Reject') classBtn = 'btn-warning';

		if (index >= pageSize / 2) {
			classDropup = 'dropup';
		}

		return	'<div class="dropdown dropdown-status ' +
				classDropup +
				' ">' +
				'<button class="nameclick btn ' +
				classBtn +
				' " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
				data +
				'</button>' +
				'</div>';
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
	        url: "/api/food_safety/",
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
            if(year=="2018"){
                    if(row.ngay_xac_nhan_hien_thuc==null) return 'Chưa kiểm tra';
                    var trave = row.ngay_xac_nhan_hien_thuc+`(`;
                    if(row.ket_qua_kiem_tra_1=="Chưa đạt")trave+= "<b class='text-danger'>"+row.ket_qua_kiem_tra_1+"</b>";
                    if(row.ket_qua_kiem_tra_1=="Đạt")trave+= "<b class='text-success'>"+row.ket_qua_kiem_tra_1+"</b>";
                    if (row.ghi_chu_1!=null)trave+=` - `+row.ghi_chu_1;
                    if (row.hinh_thuc_xu_phat_1!=null)trave+=` - Xử phạt:`+row.hinh_thuc_xu_phat_1;
                    trave+=`)`;
                    return trave;
            }else{
                var trave="";
                $.each(row.check_dates,function(i,v){
                    if(year==v.year&&v.ngay_xac_nhan_hien_thuc) {
                            trave = v.ngay_xac_nhan_hien_thuc+"(";
                            if(v.ket_qua_kiem_tra_1=="Chưa đạt")trave+= "<b class='text-danger'>Chưa đạt</b>";
                            if(v.ket_qua_kiem_tra_1=="Đạt")trave+= "<b class='text-success'>Đạt</b>";
                            if(v.ghi_chu_1!=null)trave+=` - `+v.ghi_chu_1;
                            if(v.hinh_thuc_xu_phat_1!=null)trave+=` - Xử phạt:`+v.hinh_thuc_xu_phat_1;
                            trave+=`)`;
                    }
                });
                return trave;
            }
        }

        function ngaykiemtraFormatter2(value, row, index){
            var year = $("#GLOBAL_YEAR").val();
            if(year=="2018"){
                    if(row.ngay_kiem_tra_2==null) return '';
                    var trave = row.ngay_kiem_tra_2+`(`;
                    if(row.ket_qua_kiem_tra_2=="Chưa đạt")trave+= "<b class='text-danger'>"+row.ket_qua_kiem_tra_2+"</b>";
                    if(row.ket_qua_kiem_tra_2=="Đạt")trave+= "<b class='text-success'>"+row.ket_qua_kiem_tra_2+"</b>";
                    if (row.ghi_chu_2!=null)trave+=` - `+row.ghi_chu_2;
                    if (row.hinh_thuc_xu_phat_2!=null)trave+=` - Xử phạt:`+row.hinh_thuc_xu_phat_2;
                    trave+=`)`;
                    return trave;
            }else{
                var trave="";
                $.each(row.check_dates,function(i,v){
                    if(year==v.year&&v.ngay_kiem_tra_2) {
                            trave = v.ngay_kiem_tra_2+"(";
                            if(v.ket_qua_kiem_tra_2=="Chưa đạt")trave+= "<b class='text-danger'>"+v.ket_qua_kiem_tra_2+"</b>";
                            if(v.ket_qua_kiem_tra_2=="Đạt")trave+= "<b class='text-success'>"+v.ket_qua_kiem_tra_2+"</b>";
                            if(v.ghi_chu_2!=null)trave+=` - `+v.ghi_chu_2;
                            if(v.hinh_thuc_xu_phat_2!=null)trave+=` - Xử phạt:`+v.hinh_thuc_xu_phat_2;
                            trave+=`)`;
                    }
                });
                return trave;
            }
        }

        function ngaykiemtraFormatter3(value, row, index){
            var year = $("#GLOBAL_YEAR").val();
            if(year=="2018"){
                    if(row.ngay_kiem_tra_3==null) return '';
                    var trave = row.ngay_kiem_tra_3+`(`;
                    if(row.ket_qua_kiem_tra_3=="Chưa đạt")trave+= "<b class='text-danger'>"+row.ket_qua_kiem_tra_3+"</b>";
                    if(row.ket_qua_kiem_tra_3=="Đạt")trave+= "<b class='text-success'>"+row.ket_qua_kiem_tra_3+"</b>";
                    if (row.ghi_chu_3!=null)trave+=` - `+row.ghi_chu_3;
                    if (row.hinh_thuc_xu_phat_3!=null)trave+=` - Xử phạt:`+row.hinh_thuc_xu_phat_3;
                    trave+=`)`;
                    return trave;
            }else{
                var trave="";
                $.each(row.check_dates,function(i,v){
                    if(year==v.year&&v.ngay_kiem_tra_2) {
                            trave = v.ngay_kiem_tra_3+"(";
                            if(v.ket_qua_kiem_tra_3=="Chưa đạt")trave+= "<b class='text-danger'>"+v.ket_qua_kiem_tra_3+"</b>";
                            if(v.ket_qua_kiem_tra_3=="Đạt")trave+= "<b class='text-success'>"+v.ket_qua_kiem_tra_3+"</b>";
                            if(v.ghi_chu_3!=null)trave+=` - `+v.ghi_chu_3;
                            if(v.hinh_thuc_xu_phat_3!=null)trave+=` - Xử phạt:`+v.hinh_thuc_xu_phat_3;
                            trave+=`)`;
                    }
                });
                return trave;
            }
        }
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
					field: 'so_cap',
					title: 'Số cấp',
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
					title: 'Ngày kiểm tra lần 1',
					sortable: true,
					align: 'center',
					formatter: ngaykiemtraFormatter
				},
				{
					field: 'ngay_xac_nhan_hien_thuc',
					title: 'Ngày kiểm tra lần 2',
					sortable: true,
					align: 'center',
					formatter: ngaykiemtraFormatter2
				},
				{
					field: 'ngay_xac_nhan_hien_thuc',
					title: 'Ngày kiểm tra lần 3',
					sortable: true,
					align: 'center',
					formatter: ngaykiemtraFormatter3
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
	});


});


