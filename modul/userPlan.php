<?php
 include("session.php");
?>

<h2>Meine <span class="text-primary">Pläne</span></h2>
<hr/>
<h3>Favoriten</h3>
<p>Du hast noch keinen Plan favorisiert</p>
<hr/>
<h3>Eigene</h3>
<p>Du hast noch keinen Plan erstellt</p>
<hr/>
<h3>Plan erstellen</h3>
<div class="card col-lg-12">
	<div class="row">
		<div class="col-lg-5">
			<p class="text-center" style="margin-top: 10px;">Name des Plans:</p>
		</div>
		<div class="col-lg-7">
			<input class="form-control" style="width: 100%;" type="text"/>
		</div>
	</div>
	<div class="row"><div class="col-lg-12"><hr style="margin-top: 0;"/></div></div>
	<div class="row">
		<div class="col-lg-12">
			Beschreibung: <br> <textarea class="form-control"></textarea>
		</div>
	</div>
	<div class="row"><div class="col-lg-12"><hr/></div></div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card col-lg-12">
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label for="sel1">Übung:</label>
							<select class="form-control" id="sel1">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="usr">Ausführungen:</label>
							<input type="number" class="form-control" id="usr">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="usr">Wiederholungen:</label>
							<input type="number" class="form-control" id="usr">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row"><div class="col-lg-12"><hr/></div></div>
	<div class="row">
		<div class="col-lg-12">
			<a class="btn btn-lg btn-primary btn-block">Plan hinzufügen</a>
		</div>
	</div>
</div>