$(function() {
	$("#form-total").steps(
			{
				headerTag : "h2",
				bodyTag : "section",
				transitionEffect : "fade",
				enableAllSteps : true,
				autoFocus : true,
				transitionEffectSpeed : 500,
				titleTemplate : '<div class="title">#title#</div>',
				labels : {
					previous : 'Back Step',
					next : 'Next Step',
					finish : 'Submit',
					current : ''
				},
				onStepChanging : function(event, currentIndex, newIndex) {
					//alert("currentIndex " + currentIndex + "  newIndex "+ newIndex + " event " + event);
					//test111();
					if (currentIndex < newIndex) {
						
						/*var msg = validationPanForm(currentIndex, newIndex);
						//alert("msg="+msg)
						if (msg == false) {
							return false;
						} else {
							alert(msg);
							return true;
						}
*/
						// saveForm();
					}
					return true;
				},

				onFinishing : function(event, currentIndex) {
					finallySaveForm();
					return true;

				},

			});

	
	
	$("#date").datepicker({
		dateFormat : "MM - DD - yy",
		showOn : "both",
		buttonText : '<i class="zmdi zmdi-chevron-down"></i>',
	});
});

function finallySaveForm() {
	
	 var msg="";
	 
	if (document.forms[0].applModeType.value != 'P' &&  document.forms[0].esignType.value == '' ) {
		msg=msg+'\nSelect esign Type . ';
	}
	if (document.forms[0].status.value == '') {
		msg=msg+'\nSelect status of Application . ';
	}
	if (document.forms[0].pancardMode.value == '') {
		msg=msg+'\nSelect PAN Card Mode . ';
	}
    if(msg!=""){
    	showPoup(msg);
    	return false;
    }
    
    var modeType = $("#tempMode").val();
	if (modeType == 'P' || modeType == 'D') {
		$("#applModeType1").prop('disabled', false);
		$("#applModeType").prop('disabled', false);
		$("#ekycFlag").prop('disabled', false);
		$("#esignType1").prop('disabled', false);
		$("#esignType").prop('disabled', false);
	}
	
    document.forms[0].status.disabled = false;
	document.forms[0].action = "addPreForm";
	document.forms[0].method = "POST";
	document.forms[0].submit();
}
function showPoup(msg){
	var arr = msg.split('.');
	var msg1;
	var val;
	msg1 = "<table>";
	arr.splice(-1,1);
	$.each(arr, function(k) {
		msg1 += "<tr><td>&#187;" + arr[k] + "</td></tr>";
	});
	msg1 += "</table>";
	$("#dialogText1").html(msg1);
	$("#dialogText1").css("color", "red");
	//alert($("#dialogText1").text());

	$('#errorDiv').dialog({
		"width" : "auto"
	});
	$("#errorDiv").dialog("open");
	return false;
}

