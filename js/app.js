$(document).ready(function() {

	/* For hiding the tables... maybe later?
	$('.table-header').click(function() {
		
		$('.table-body').css("display", "block");
	});*/

	let listOfChanges = [];

	$(".content-data").on('input', function() {

		let edittedContent = $(this).attr('name');
		let edittedContentWithValue = edittedContent + "-" + $("input[name=" + edittedContent + "]").val();

		if(!listOfChanges.includes(edittedContentWithValue)) {
			listOfChanges.push(edittedContentWithValue);
		}
  
	});

	$("#update-data").click(function() {
		$(this).prop("disabled", true);
		$("#loader").show();

		if(listOfChanges.length < 1) {
			alert("No changes made.")
		} else {

			$.ajax({
				method: "POST",
				url: "update-group-data.php",
				data: {//groupName-content-date-value
						'changes': listOfChanges
				},
				success: function(response) {
					$("#loader").hide();
					$(this).prop("disabled", false);
					alert(response);
					window.location = "./admin.php"
				}
			});
		}

		
	}); //#update-data

	$("#update-attendance-data").click(function() {
		$(this).prop("disabled", true);
		$("#loader").show();

		if(listOfChanges.length < 1) {
			alert("No changes made.")
		} else {

			$.ajax({
				method: "POST",
				url: "update-group-data.php",
				data: {//groupName-attendance-date-value
						'attendance': listOfChanges
				},
				success: function(response) {
					$("#loader").hide();
					$(this).prop("disabled", false);
					alert(response);
					window.location = "./usa-admin.php"
				}
			});
		}

		
	}); //#update-data
	

	$("#youth-female-title").click(function(){
		$("#youth-female-data").slideToggle("slow")
	});
	$("#adult-female-title").click(function(){
		$("#adult-female-data").slideToggle("slow")
	});
	$("#youth-male-title").click(function(){
		$("#youth-male-data").slideToggle("slow")
	});
	$("#adult-male-title").click(function(){
		$("#adult-male-data").slideToggle("slow")
	});
	$("#branch-church-title").click(function(){
		$("#branch-church-data").slideToggle("slow")
	});


});
