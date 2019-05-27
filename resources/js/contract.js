function themCompanyView(){
	$("#themCompanyView").css('display','block');
	$("#themCompanyBtn").css('display','none');
	$("#companyInfo").css('display','none');
}

function themCompany(){
	$.ajax({
		url:'/api/contract/them1company',
		type:'POST',
		data:{
			contract_id:$("#contract_id").val(),
			company_id:$("#company_id").val()
		},
		success:function (data){
			console.log(data);
			location.reload();
		}
	});
}

function infoUpdateView(){
            $("#infoUpdateView").css('display','block');
            $("#infoContract").css('display','none');
        } 


function infoUpdate(){
    if($("#infoName").val()==''){
            swal({
                title: 'Warning!',
                text:'Tên công ty không được để trống',
                type:'danger'
            });
    } else{
            $.ajax({
                url:'/api/contract/update/'+$("#contract_id").val(),
                type:"POST",
                data:{
                    name:$("#infoName").val(),
                    expected_sales:$("#expected_sales").val(),
                    status:$("#status").val(),
                    app_id:$("#app_id").val()
                },
                success:function (data){
                	console.log(data);
                    $("#infoUpdateView").css('display','none');
                    $("#infoContract").css('display','block');
                    $("#nameText").text(data.name);
                    $("#expectedText").text(data.expected_sales);
                    $("#statusText").text(data.status);
                }
            });
	}
}