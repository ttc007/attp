$(document).ready(function(){
/* ==========================================================================
	Scroll
	========================================================================== */

	if (!("ontouchstart" in document.documentElement)) {

		document.documentElement.className += " no-touch";

		var jScrollOptions = {
			autoReinitialise: true,
			autoReinitialiseDelay: 100
		};

		$('.scrollable .box-typical-body').jScrollPane(jScrollOptions);
		$('.side-menu').jScrollPane(jScrollOptions);
		$('.side-menu-addl').jScrollPane(jScrollOptions);
		$('.scrollable-block').jScrollPane(jScrollOptions);
	}

/* ==========================================================================
    Header search
    ========================================================================== */

	$('.site-header .site-header-search').each(function(){
		var parent = $(this),
			overlay = parent.find('.overlay');

		overlay.click(function(){
			parent.removeClass('closed');
		});

		parent.clickoutside(function(){
			if (!parent.hasClass('closed')) {
				parent.addClass('closed');
			}
		});
	});

/* ==========================================================================
    Header mobile menu
    ========================================================================== */

	// Dropdowns
	$('.site-header-collapsed .dropdown').each(function(){
		var parent = $(this),
			btn = parent.find('.dropdown-toggle');

		btn.click(function(){
			if (parent.hasClass('mobile-opened')) {
				parent.removeClass('mobile-opened');
			} else {
				parent.addClass('mobile-opened');
			}
		});
	});

	$('.dropdown-more').each(function(){
		var parent = $(this),
			more = parent.find('.dropdown-more-caption'),
			classOpen = 'opened';

		more.click(function(){
			if (parent.hasClass(classOpen)) {
				parent.removeClass(classOpen);
			} else {
				parent.addClass(classOpen);
			}
		});
	});

	// Left mobile menu
	$('.hamburger').click(function(){
		if ($('body').hasClass('menu-left-opened')) {
			$(this).removeClass('is-active');
			$('body').removeClass('menu-left-opened');
			$('html').css('overflow','auto');
		} else {
			$(this).addClass('is-active');
			$('body').addClass('menu-left-opened');
			$('html').css('overflow','hidden');
		}
	});

	$('.mobile-menu-left-overlay').click(function(){
		$('.hamburger').removeClass('is-active');
		$('body').removeClass('menu-left-opened');
		$('html').css('overflow','auto');
	});

	// Right mobile menu
	$('.site-header .burger-right').click(function(){
		if ($('body').hasClass('menu-right-opened')) {
			$('body').removeClass('menu-right-opened');
			$('html').css('overflow','auto');
		} else {
			$('.hamburger').removeClass('is-active');
			$('body').removeClass('menu-left-opened');
			$('body').addClass('menu-right-opened');
			$('html').css('overflow','hidden');
		}
	});

	$('.mobile-menu-right-overlay').click(function(){
		$('body').removeClass('menu-right-opened');
		$('html').css('overflow','auto');
	});

/* ==========================================================================
    Header help
    ========================================================================== */

	$('.help-dropdown').each(function(){
		var parent = $(this),
			btn = parent.find('>button'),
			popup = parent.find('.help-dropdown-popup'),
			jscroll
		;

		btn.click(function(){
			if (parent.hasClass('opened')) {
				parent.removeClass('opened');
				jscroll.destroy();
			} else {
				parent.addClass('opened');

				if (!("ontouchstart" in document.documentElement)) {
					setTimeout(function(){
						jscroll = parent.find('.jscroll').jScrollPane(jScrollOptions).data().jsp;
					},0);
				}
			}
		});

		$('html').click(function(event) {
		    if (
		        !$(event.target).closest('.help-dropdown-popup').length
		        &&
		        !$(event.target).closest('.help-dropdown>button').length
		        &&
		        !$(event.target).is('.help-dropdown-popup')
		        &&
		        !$(event.target).is('.help-dropdown>button')
		    ) {
				if (parent.hasClass('opened')) {
					parent.removeClass('opened');
					jscroll.destroy();
		        }
		    }
		});
	});

/* ==========================================================================
    Side menu list
    ========================================================================== */

	$('.side-menu-list li.with-sub').each(function(){
		var parent = $(this),
			clickLink = parent.find('>span'),
			subMenu = parent.find('>ul');

		clickLink.click(function() {
			if (parent.hasClass('opened')) {
				parent.removeClass('opened');
				subMenu.slideUp();
				subMenu.find('.opened').removeClass('opened');
			} else {
				if (clickLink.parents('.with-sub').size() == 1) {
					$('.side-menu-list .opened').removeClass('opened').find('ul').slideUp();
				}
				parent.addClass('opened');
				subMenu.slideDown();
			}
		});
	});


/* ==========================================================================
    Dashboard
    ========================================================================== */

	$(window).resize(function(){
		$('body').click('click');
	});

	// Collapse box
	$('.box-typical-dashboard').each(function(){
		var parent = $(this),
			btnCollapse = parent.find('.action-btn-collapse');

		btnCollapse.click(function(){
			if (parent.hasClass('box-typical-collapsed')) {
				parent.removeClass('box-typical-collapsed');
			} else {
				parent.addClass('box-typical-collapsed');
			}
		});
	});

	// Full screen box
	$('.box-typical-dashboard').each(function(){
		var parent = $(this),
			btnExpand = parent.find('.action-btn-expand'),
			classExpand = 'box-typical-full-screen';

		btnExpand.click(function(){
			if (parent.hasClass(classExpand)) {
				parent.removeClass(classExpand);
				$('html').css('overflow','auto');
			} else {
				parent.addClass(classExpand);
				$('html').css('overflow','hidden');
			}
		});
	});

/* ==========================================================================
	Select
	========================================================================== */

	if ($('.bootstrap-select').size()) {
		// Bootstrap-select
		$('.bootstrap-select').selectpicker({
			style: '',
			width: '100%',
			size: 8
		});
	}

	if ($('.select2').size()) {
		// Select2
		//$.fn.select2.defaults.set("minimumResultsForSearch", "Infinity");

		$('.select2').not('.manual').select2();

		$(".select2-icon").not('.manual').select2({
			templateSelection: select2Icons,
			templateResult: select2Icons
		});

		$(".select2-arrow").not('.manual').select2({
			theme: "arrow"
		});

		$('.select2-no-search-arrow').select2({
			minimumResultsForSearch: "Infinity",
			theme: "arrow"
		});

		$('.select2-no-search-default').select2({
			minimumResultsForSearch: "Infinity"
		});

		$(".select2-white").not('.manual').select2({
			theme: "white"
		});

		$(".select2-photo").not('.manual').select2({
			templateSelection: select2Photos,
			templateResult: select2Photos
		});
	}

	function select2Icons (state) {
		if (!state.id) { return state.text; }
		var $state = $(
			'<span class="font-icon ' + state.element.getAttribute('data-icon') + '"></span><span>' + state.text + '</span>'
		);
		return $state;
	}

	function select2Photos (state) {
		if (!state.id) { return state.text; }
		var $state = $(
			'<span class="user-item"><img src="' + state.element.getAttribute('data-photo') + '"/>' + state.text + '</span>'
		);
		return $state;
	}

/* ==========================================================================
	Tooltips
	========================================================================== */

	// Tooltip
	$('[data-toggle="tooltip"]').tooltip({
		html: true
	});

	// Popovers
	$('[data-toggle="popover"]').popover({
		trigger: 'focus'
	});
	
/* ==========================================================================
	Full height box
	========================================================================== */

	function boxFullHeight() {
		var sectionHeader = $('.section-header');
		var sectionHeaderHeight = 0;

		if (sectionHeader.size()) {
			sectionHeaderHeight = parseInt(sectionHeader.height()) + parseInt(sectionHeader.css('padding-bottom'));
		}

		$('.box-typical-full-height').css('min-height',
			$(window).height() -
			parseInt($('.page-content').css('padding-top')) -
			parseInt($('.page-content').css('padding-bottom')) -
			sectionHeaderHeight -
			parseInt($('.box-typical-full-height').css('margin-bottom')) - 2
		);
		$('.box-typical-full-height>.tbl, .box-typical-full-height>.box-typical-center').height(parseInt($('.box-typical-full-height').css('min-height')));
	}

	boxFullHeight();

	$(window).resize(function(){
		boxFullHeight();
	});

/* ==========================================================================
	Chat
	========================================================================== */

	function chatHeights() {
		$('.chat-dialog-area').height(
			$(window).height() -
			parseInt($('.page-content').css('padding-top')) -
			parseInt($('.page-content').css('padding-bottom')) -
			parseInt($('.chat-container').css('margin-bottom')) - 2 -
			$('.chat-area-header').outerHeight() -
			$('.chat-area-bottom').outerHeight()
		);
		$('.chat-list-in')
			.height(
				$(window).height() -
				parseInt($('.page-content').css('padding-top')) -
				parseInt($('.page-content').css('padding-bottom')) -
				parseInt($('.chat-container').css('margin-bottom')) - 2 -
				$('.chat-area-header').outerHeight()
			)
			.css('min-height', parseInt($('.chat-dialog-area').css('min-height')) + $('.chat-area-bottom').outerHeight());
	}

	chatHeights();

	$(window).resize(function(){
		chatHeights();
	});

/* ==========================================================================
	Box typical full height with header
	========================================================================== */

	function boxWithHeaderFullHeight() {
		/*$('.box-typical-full-height-with-header').each(function(){
			var box = $(this),
				boxHeader = box.find('.box-typical-header'),
				boxBody = box.find('.box-typical-body');

			boxBody.height(
				$(window).height() -
				parseInt($('.page-content').css('padding-top')) -
				parseInt($('.page-content').css('padding-bottom')) -
				parseInt(box.css('margin-bottom')) - 2 -
				boxHeader.outerHeight()
			);
		});*/
	}

	boxWithHeaderFullHeight();

	$(window).resize(function() {
		boxWithHeaderFullHeight();
	});

/* ==========================================================================
	File manager
	========================================================================== */

	function fileManagerHeight() {
		$('.files-manager').each(function(){
			var box = $(this),
				boxColLeft = box.find('.files-manager-side'),
				boxSubHeader = box.find('.files-manager-header'),
				boxCont = box.find('.files-manager-content-in'),
				boxColRight = box.find('.files-manager-aside');

			var paddings = parseInt($('.page-content').css('padding-top')) +
							parseInt($('.page-content').css('padding-bottom')) +
							parseInt(box.css('margin-bottom')) + 2;

			boxColLeft.height('auto');
			boxCont.height('auto');
			boxColRight.height('auto');

			if ( boxColLeft.height() <= ($(window).height() - paddings) ) {
				boxColLeft.height(
					$(window).height() - paddings
				);
			}

			if ( boxColRight.height() <= ($(window).height() - paddings - boxSubHeader.outerHeight()) ) {
				boxColRight.height(
					$(window).height() -
					paddings -
					boxSubHeader.outerHeight()
				);
			}

			boxCont.height(
				boxColRight.height()
			);
		});
	}

	fileManagerHeight();

	$(window).resize(function(){
		fileManagerHeight();
	});

/* ==========================================================================
	Mail
	========================================================================== */

	function mailBoxHeight() {
		$('.mail-box').each(function(){
			var box = $(this),
				boxHeader = box.find('.mail-box-header'),
				boxColLeft = box.find('.mail-box-list'),
				boxSubHeader = box.find('.mail-box-work-area-header'),
				boxColRight = box.find('.mail-box-work-area-cont');

			boxColLeft.height(
				$(window).height() -
				parseInt($('.page-content').css('padding-top')) -
				parseInt($('.page-content').css('padding-bottom')) -
				parseInt(box.css('margin-bottom')) - 2 -
				boxHeader.outerHeight()
			);

			boxColRight.height(
				$(window).height() -
				parseInt($('.page-content').css('padding-top')) -
				parseInt($('.page-content').css('padding-bottom')) -
				parseInt(box.css('margin-bottom')) - 2 -
				boxHeader.outerHeight() -
				boxSubHeader.outerHeight()
			);
		});
	}

	mailBoxHeight();

	$(window).resize(function(){
		mailBoxHeight();
	});

/* ==========================================================================
	Nestable
	========================================================================== */

	$('.dd-handle').hover(function(){
		$(this).prev('button').addClass('hover');
		$(this).prev('button').prev('button').addClass('hover');
	}, function(){
		$(this).prev('button').removeClass('hover');
		$(this).prev('button').prev('button').removeClass('hover');
	});

/* ==========================================================================
	Addl side menu
	========================================================================== */

	setTimeout(function(){
		if (!("ontouchstart" in document.documentElement)) {
			$('.side-menu-addl').jScrollPane(jScrollOptions);
		}
	},1000);


/* ==========================================================================
	Header notifications
	========================================================================== */

	// Tabs hack
	$('.dropdown-menu-messages a[data-toggle="tab"]').click(function (e) {
		e.stopPropagation();
		e.preventDefault();
		$(this).tab('show');

		// Scroll
		if (!("ontouchstart" in document.documentElement)) {
			jspMessNotif = $('.dropdown-notification.messages .tab-pane.active').jScrollPane(jScrollOptions).data().jsp;
		}
	});

	// Scroll
	var jspMessNotif,
		jspNotif;

	$('.dropdown-notification.messages').on('show.bs.dropdown', function () {
		if (!("ontouchstart" in document.documentElement)) {
			jspMessNotif = $('.dropdown-notification.messages .tab-pane.active').jScrollPane(jScrollOptions).data().jsp;
		}
	});

	$('.dropdown-notification.messages').on('hide.bs.dropdown', function () {
		if (!("ontouchstart" in document.documentElement)) {
			jspMessNotif.destroy();
		}
	});

	$('.dropdown-notification.notif').on('show.bs.dropdown', function () {
		if (!("ontouchstart" in document.documentElement)) {
			jspNotif = $('.dropdown-notification.notif .dropdown-menu-notif-list').jScrollPane(jScrollOptions).data().jsp;
		}
	});

	$('.dropdown-notification.notif').on('hide.bs.dropdown', function () {
		if (!("ontouchstart" in document.documentElement)) {
			jspNotif.destroy();
		}
	});

/* ==========================================================================
	Steps progress
	========================================================================== */

	function stepsProgresMarkup() {
		$('.steps-icon-progress').each(function(){
			var parent = $(this),
				cont = parent.find('ul'),
				padding = 0,
				padLeft = (parent.find('li:first-child').width() - parent.find('li:first-child .caption').width())/2,
				padRight = (parent.find('li:last-child').width() - parent.find('li:last-child .caption').width())/2;

			padding = padLeft;

			if (padLeft > padRight) padding = padRight;

			cont.css({
				marginLeft: -padding,
				marginRight: -padding
			});
		});
	}

	stepsProgresMarkup();

	$(window).resize(function(){
		stepsProgresMarkup();
	});

/* ========================================================================== */

	$('.control-panel-toggle').on('click', function() {
		var self = $(this);
		
		if (self.hasClass('open')) {
			self.removeClass('open');
			$('.control-panel').removeClass('open');
		} else {
			self.addClass('open');
			$('.control-panel').addClass('open');
		}
	});

	$('.control-item-header .icon-toggle, .control-item-header .text').on('click', function() {
		var content = $(this).closest('li').find('.control-item-content');

		if (content.hasClass('open')) {
			content.removeClass('open');
		} else {
			$('.control-item-content.open').removeClass('open');
			content.addClass('open');
		}
	});

	$.browser = {};
	$.browser.chrome = /chrome/.test(navigator.userAgent.toLowerCase());
	$.browser.msie = /msie/.test(navigator.userAgent.toLowerCase());
	$.browser.mozilla = /firefox/.test(navigator.userAgent.toLowerCase());

	if ($.browser.chrome) {
		$('body').addClass('chrome-browser');
	} else if ($.browser.msie) {
		$('body').addClass('msie-browser');
	} else if ($.browser.mozilla) {
		$('body').addClass('mozilla-browser');
	}

	$('#show-hide-sidebar-toggle').on('click', function() {
		if (!$('body').hasClass('sidebar-hidden')) {
			$('body').addClass('sidebar-hidden');
		} else {
			$('body').removeClass('sidebar-hidden');
		}
	});
	
	//Type changes
	$('#typeSelect').on('change', function(){
		var id = $(this).val();
		var list = '<option> </option>';
		 $.getJSON("/api/type/"+id, function(data) {
	        $.each(data['kpi'], function(i, f) {
	            list += '<option data-kpi="'+f.kpi+'" value="'+f.id+'">'+f.name+'</option>';
	        });
	        $('#workSelect').fadeOut().html(list).fadeIn(); 
      	});
	});

	//KPI changes
	$('#workSelect').on('change', function(){
		//var value = $(this).find(':selected').data('kpi');
        var list = $('#workSelect').val();
        var current = 0;
		if(list){
			for (i = 0; i < list.length; ++i) {
	    		 current += $(this).find('[value="'+list[i]+'"]').data('kpi');
			}
		}else{
			current = 0;
		}
			
        $('#kpiInput').val(current);
        $('#kpiLabel').fadeOut().html(current).fadeIn();
	});
	
	//KPI changes
	$('#taskSelect').on('change', function(){
		var value = $(this).find(':selected').data('estimate');
        $('#estimateLabel').fadeOut().html(value).fadeIn();
        var km = $(this).find(':selected').data('km');
        $('#kmLabel').fadeOut().html(km).fadeIn();
        $('#mykm').val(km);
        var type = $('input[name=detailed]:checked').val(); 
        if(type == 2) km = km/2;
        var money = (km/40)*22000;
        if(type == 3) {
        	if(km <= 10) money = 7000;
        	if(km > 10) money = 14000;
        }
        var gasmoney = money.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + 'đ';
        $('#gasLabel').fadeOut().html(gasmoney).fadeIn();
        $('#gasmoney').val(money);
	});
	
	$('.checkbox-detailed input').on('change', function() {
   		var type = $('input[name=detailed]:checked').val(); 
   		var km = $('#mykm').val();
        if(type == 2) km = km/2;
        var money = (km/40)*22000;
        if(type == 3) {
        	if(km <= 10) money = 7000;
        	if(km > 10) money = 14000;
        }
        var gasmoney = money.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + 'đ';
        $('#gasLabel').fadeOut().html(gasmoney).fadeIn();
        $('#gasmoney').val(money);
	});

	$('.overlay-close').on('click', function() {
		$('.overlay').hide(); 
		var body = $('body');
		if (body.hasClass('overlay-up')) {
			body.removeClass('overlay-up');
		}
	
	});
	$('.call-overlay').on('click', function() {
		var self = $(this);
		var body = $('body');
		var action = self.data('overlay');
		$('.outside-overlay').hide();
		if (body.hasClass('overlay-up')) {
			body.removeClass('overlay-up');
		} else {
			body.addClass('overlay-up');
			$('.outside-overlay'+'.'+action).show();
			$('.outside-overlay'+'.'+action).find('.overlay').show();
		}
		return false;
	});
});

function convertToSlug(Text){
  return Text
    .toLowerCase()
    .replace(/ /g,'-')
    .replace(/[^\w-]+/g,'')
    ;
}

function dateFormatByDate(date){
	var month = date.getMonth()+1;
	if(month<10) month ="0"+month;
	var day = date.getDate();
	if(day<10) day = "0"+day;
	var dateFormatByDate = day+"-"+month+"-"+date.getFullYear();
	return dateFormatByDate;
}

function dateFormatByString(string){
	var date = new Date(string);
	return dateFormatByDate(date);
}

function ExportToExcel(mytblId){
   var htmltable= document.getElementById(mytblId);
   var html = htmltable.outerHTML;
   window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
}

function detailFormatter(index, row) {
    var html = [];
    $.each(row, function (key, value) {
        html.push('<p><b>' + key + ':</b> ' + value + '</p>');
    });
    return html.join('');
}
function close(){
  $(".overlay").css('display', 'none');
  $(".outside-overlay").css('display', 'none');
}
function edit(id){
  	$("#form-checked-right").css("display",'block');
  	$("#form-checked").css("display",'none');

    if($("#GLOBAL_YEAR_EDIT").val()!=$("#GLOBAL_YEAR").val()){
      $("#GLOBAL_YEAR_EDIT").val($("#GLOBAL_YEAR").val()).change();
    }
    if(id==undefined) id = $("#food_safety_id").val();
    $.ajax({
        url:'../api/food_safety/'+id,
        data:{year:$("#GLOBAL_YEAR_EDIT").val()},
        type:'GET',
        success:function(data){
	      	$(".overlay").css('display', 'block');
	      	$(".outside-overlay").css('display', 'block');
	      	$("#food_safety_id").val(data.id);
	      	$("#ten_chu_co_so").val(data.ten_chu_co_so);
	      	$("#ten_co_so").val(data.ten_co_so);
	      	$("#village_id").val(data.village_id);
	      	$("#categoryb2_id").val(data.categoryb2_id);
	      	$("#phone").val(data.phone);
	      	$("#certification_date").val(data.certification_date);
	      	$("#so_cap").val(data.so_cap);
	      	$("#ngay_kham_suc_khoe").val(data.ngay_kham_suc_khoe);
	      	$("#ngay_ky_cam_ket").val(data.ngay_ky_cam_ket);
	      	$("[name=status]").val(data.status);
	      	$("#code").val(data.code);
		      
	      	$("#noi_tieu_thu").val(data.noi_tieu_thu);
	      	$("#formCheckedData [name=food_safety_id]").val(data.id);
	      	var checkeds = {};
	      	if(data.checkeds) checkeds = data.checkeds;
	      	renderHistory(checkeds);
      	}
    });
}
function renderHistory(checkeds){
	if(checkeds){
        $("#historyChecked").empty();
        
        $.each(checkeds, function(i, checked){
        	var color = '#d9534f';
        	if (checked.result =='Đạt'){
                color = '#46c35f';
            }
            var dateChecked = checked.day+"-"+checked.month+"-"+checked.year;
            var tr = $("<tr></tr>");

            var aEdit = $(`<td>
            	<a>`+dateChecked+`</a></td>
            `);

            aEdit.click(function(){
            	$("#form-checked").css("display", 'block');
            	$("#formCheckedData [name=checked_id]").val(checked.id);
            	$("#formCheckedData [name=dateChecked]").val(checked.year+"-"+checked.month+"-"+checked.day);
            	console.log(dateChecked);
            	$("#formCheckedData [name=result]").val(checked.result);
            	$("#formCheckedData [name=note]").val(checked.note);
            	$("#formCheckedData [name=penalize]").val(checked.penalize);

            	$("#divTest").empty();
            	$.each(checked.checked_tests, function (i, checked_test){
                	addTest(checked_test.test.id, checked_test.result);
            	});
            });
            tr.append(aEdit);
            tr.append(`
                  <td style='color:`+color+`'>`+checked.result+`</td>
                  <td>-`+(checked.note?checked.note:"")+"<br>-"+
                  (checked.penalize?" Xử phạt:"+checked.penalize:"")+`</td>
            `);
            var td = $(`<td></td>`);
            tr.append(td);
            if(checked.checked_tests){
            	$.each(checked.checked_tests, function (i, checked_test){
                	$(td).append("- "+checked_test.test.name+":"+checked_test.result+"<br>");
            	});
            }

            var tdAction = $("<td></td>");
            
            var aRemove = $(`
            	<a ><i class="fa fa-remove"></i></a>
            `);
            aRemove.click(function(){
            	$.ajax({
            		url: '../checked/remove/'+checked.id,
            		type:"GET",
            		success:function(){
            			tr.remove();
	         			filter();
            		}
            	})
            });

            tdAction.append(aRemove);
            tr.append(tdAction);
            $("#historyChecked").append(tr);
        });
  	} else {
  		$("#historyChecked").append(`<tr><td colspan='4'>
          <div class='text-center'>
            Năm `+$("#GLOBAL_YEAR_EDIT").val()+` chưa kiểm tra cơ sở này.
            </div></td></tr>
        `);
  	}
}
function getHistory(){
  	$("#form-checked").css("display",'none');
	$.ajax({
        url:'../api/food_safety/'+$("#food_safety_id").val(),
        data:{year:$("#GLOBAL_YEAR_EDIT").val()},
        type:'GET',
        success:function(data){
        	var checkeds = {};
	      	if(data.checkeds) checkeds = data.checkeds;
	      	renderHistory(checkeds);
        }
    });
}

function addOrUpdateFoodSafety(){
  var loader = $(`<div class='loader-overlay'><div class='loader'></div></div>`);
  $('body').append(loader);
  $.each($(".divTest"), function (i,divTest){
    var number = i+1;
    var test = "";
    var testRows = $(divTest).find(".testRow");
    $.each(testRows, function(j, testRow){
      test+=$(testRow).find(".test_name").val()+":"+$(testRow).find(".test_value").val();
      if(j!=testRows.length-1) test+="<br>";
    });
    $("[name=test_"+number+"]").val(test);
  });
  callApiAddOrUpdateFoodSafety();
}
function callApiAddOrUpdateFoodSafety(){
    $.ajax({
      url:$("#formAddFoodSafety").attr("action"),
      type:"POST",
      data:$("#formAddFoodSafety").serialize(),
      // async: false,
      success:function(){
        close();
        filter('noAddLoading', 'endLoading');
      }
    });
}

function filter(noAddLoading, endLoading){
    if(noAddLoading!="noAddLoading"){
      var loader = $(`<div class='loader-overlay'><div class='loader'></div></div>`);
      $('body').append(loader);
    }
    
    $.ajax({
        // async: false,
        url: "../api/food_safety/",
        data: {
          category_id:$("#category_id").val(),
          ward_id:$("#ward_id").val(),
          year:$("#GLOBAL_YEAR").val(),
          categoryb2_id:$("#categoryFilter").val(),
          village_id:$("#villageFilter").val()
        },
        dataType: "json",
        success: function(response){
            $("#table").bootstrapTable('refreshOptions', {
              // exportDataType: $("#GLOBAL_YEAR").val(),
              data:response
            });
            if(endLoading=="endLoading"||endLoading==undefined){
              $(".loader-overlay").remove();
            }

        }
    });
}

function addNew(){
  $("#formAddFoodSafety")[0].reset();
  $("#food_safety_id").val(0);
  $("#form-checked-right").css("display",'none');
}

function addChecked(){
	if($("#ngay_kiem_tra").val()==""){
		alert("Ngày kiểm tra là bắt buộc!");
		$("#ngay_kiem_tra").focus();
	} else {
		var loader = $(`<div class='loader-overlay'><div class='loader'></div></div>`);
	  	$('body').append(loader);
	  	var test = "";
	  	$.each($(".divTest"), function (i,divTest){
		    var testRows = $(divTest).find(".testRow");
		    $.each(testRows, function(j, testRow){
		      test+=$(testRow).find(".test_name").val()+":"+$(testRow).find(".test_value").val();
		      if(j!=testRows.length-1) test+="<br>";
		    });
	  	});
	    $("[name=test]").val(test);
		$.ajax({
	      	url:'../store_checked',
	      	type:"POST",
	      	data:$("#formCheckedData").serialize(),
	      	async: false,
	      	success:function(){
	         	getHistory();
	         	filter();
	         	loader.remove();
	      	}
	    });
	}
}
function addCheckedNew(){
  	$("#form-checked").css("display",'block');
  	$("#formCheckedData")[0].reset();
  	$("#divTest").empty();
  	$("#formCheckedData [name=checked_id]").val(0);
}
