<div class="form-container">
	<form id="save-form" method="post" action="save_img.php" autocomplete="off">
		<input type="hidden" id="filters" name="filters" />
		<input type="hidden" id="image-data" name="image-data" />
		<input id="description-field" type="text" id="description" name="description"
			value="" placeholder="description" maxlength="160" />
		<input id="save-button" type="button" onclick="save()" value="save" />
	</form>
</div>