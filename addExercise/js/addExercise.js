var request;

$("#exercise").submit(function(event) {
  event.preventDefault();

  if (request) {
    request.abort();
  }

  var $form = $(this);

  var $inputs = $form.find("input, select, button, textarea");

  var serializedData = $form.serialize();

  $inputs.prop("disabled", true);

  request = $.ajax({
    url: "http://localhost/m151-project/modul/addexercise.php",
    type: "post",
    data: serializedData
  });

  request.done(function(response, textStatus, jqXHR) {
    console.log("Deine Übung wurde hinzugefügt!");
  });

  request.fail(function(jqXHR, textStatus, errorThrown) {
    console.error("Folgender Fehler ist aufgetreten: " + textStatus, errorThrown);
  });
  request.always(function() {
    $inputs.prop("disabled", false);
  });
});
