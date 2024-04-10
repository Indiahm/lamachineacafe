<?

function checkEmptyFields ($field, $message = 'Veuillez renseigner cette information.')
{
	$result	= ['class' => '', 'message' => ''];

	if (isset($_POST[$field]) && empty($_POST[$field])) {
		$result = [
			'class' => 'is-invalid',
			'message' => '<span class="invalid-feedback">' . $message . '</span>'
		];
	}

	return $result;
}
