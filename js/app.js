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
					alert(response);
					window.location = "./admin.php"
				}
			});
		}

		
	}); //#update-data


	

});