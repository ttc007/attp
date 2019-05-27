function themCompanyView(){
	$("#themCompanyView").css('display','block');
	$("#themCompanyBtn").css('display','none');
	$("#companyInfo").css('display','none');
	$("#divBtn").css('display','none');
}
function themCompanyCancel(){
	$("#themCompanyView").css('display','none');
	$("#themCompanyBtn").css('display','block');
	$("#companyInfo").css('display','block');
	$("#divBtn").css('display','block');
}
function themCompany(){
	$.ajax({
		url:'/api/contact/them1company',
		type:'POST',
		data:{
			contact_id:$("#contact_id").val(),
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
            $("#infoContact").css('display','none');
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
                url:'/api/contact/'+$("#contact_id").val(),
                type:"PUT",
                data:{
                    name:$("#infoName").val(),
                    phone:$("#infoPhone").val(),
                    address:$("#infoAddress").val(),
                    email:$("#infoEmail").val(),
                    app_id:$("#app_id").val()
                },
                success:function (data){
                	console.log(data);
                    $("#infoUpdateView").css('display','none');
                    $("#infoContact").css('display','block');
                    $("#nameText").text(data.website);
                    $("#phoneText").text(data.phone);
                    $("#addressText").text(data.address);
                    $("#emailText").text(data.email);
                    $("#emailTo").text(data.email);
                }
            });
	}
}

function createCompany(){
    if($("#name").val()==''){
      $(".alert").removeClass('hidden');
      $(".alert").addClass('alert-warning');
      $(".alert").removeClass('alert-aquamarine');
      $(".alert").text('Tên không được để trống ');
      $("#name").focus();
      $('html, body').animate({
            scrollTop: $("#top1").offset().top
        }, 100);
    } else{
      $.ajax({
        url:'/api/company/',
        type:"POST",
        data:{
          name:$("#name").val(),
          phone:$("#phone").val(),
          address:$("#address").val(),
          email:$("#email").val(),
          app_id:$("#app_id").val(),
          contact_id:$("#contact_id").val(),
        },
        success:function (data){
          	location.reload();
        }
      });
    }
  }

 function select_contract_view(){
 	$("#select_contract_view").css('display','block');
 	$("#divBtn1").css('display','none');
 }
function select_cancel(){
	$("#select_contract_view").css('display','none');
 	$("#divBtn1").css('display','block');
}

function select_contract(){
 	$.ajax({
 		url:'/api/contact/them1hopdong',
 		type:'POST',
 		data:{
 			contact_id:$("#contact_id").val(),
 			contract_id:$("#contract_id").val()
 		},
 		success:function(data){
 			$("#contract_list").append(`
 				<p style="background: #fafafa" class="text-center p-2 mb-2">
 					<a class="text-info" href="/sales/contract/`+data.id+`/show">
                                            `+data.name+`</a></p>
 			`);
 			$("#select_contract_view").css('display','none');
 			$("#divBtn1").css('display','block');
 		}
 	});
 }

function create_contract(){
	$.ajax({
		url:'/api/contract',
		type:'POST',
		data:{
			name:$("#inputNameContract1").val(),
			expected_sales:$("#inputSaleContract1").val(),
			status:$("#inputStatus1").val(),
			user_id:$("#user_id").val(),
			company_id:$("#company_id").val(),
			contact_id:$("#contact_id").val(),
			app_id:$("#app_id").val(),
			campaign_id:0
		},
		success:function(data){
			location.reload();
		}
	});
}