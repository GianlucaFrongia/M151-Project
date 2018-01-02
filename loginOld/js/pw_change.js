var request;

$("#pw_change-form").submit(function (event) {
	event.preventDefault();

	if (request) {
		request.abort();
	}

	var $form = $(this);

	var $inputs = $form.find("input, select, button, textarea");

	var serializedData = $form.serialize();

	$inputs.prop("disabled", true);

	request = $.ajax({
		url: "http://localhost/m151-project/login/pw_change_validate.php",
		type: "post",
		data: serializedData
	});

	request.done(function (response, textStatus, jqXHR) {
		if (response == "ok") {
			console.log('easdy');
			window.location.replace("http://localhost/m151-project/dashboard.php");
		} else {
			console.log('not easy');

			$("#error").fadeIn(1000, function () {
				$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   ' + response + ' </div>');
			});
		}
	});

	request.fail(function (jqXHR, textStatus, errorThrown) {
		console.error("Folgender Fehler ist aufgetreten: " + textStatus, errorThrown);
	});
	request.always(function () {
		$inputs.prop("disabled", false);
	});
});