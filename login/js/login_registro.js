$(document).ready(function () {
	$('#form').on('submit', function (event) {
		var senha = $('#senha').val();
		if (senha.length < 8) {
			$('#senha').css('border-color', 'red');
			event.preventDefault();
		} else {
			$('#senha').css('border-color', '');
		}
	});

	$('#button').click(function (event) {
		var senha = $('#senha').val();
		var confirmeSenha = $('#confirme_senha').val();

		if (senha !== confirmeSenha) {
			alert('As senhas não coincidem. Por favor, insira senhas iguais.');
			event.preventDefault();
		}
	});

	$('#data_nascimento').on('input', function () {
		var val = this.value.replace(/\D/g, '');
		if (val.length > 8) {
			val = val.slice(0, 8);
		}
		if (val.length > 4) {
			val = val.replace(/(\d{2})(\d{2})(\d{4})/, '$1/$2/$3');
		} else if (val.length > 2) {
			val = val.replace(/(\d{2})(\d{2})/, '$1/$2');
		}
		this.value = val;
	});

	$('#senha').on('input', function () {
		var senha = $(this).val();
		if (senha.length < 8) {
			$(this).css('border-color', 'red');
		} else {
			$(this).css('border-color', '');
		}
	});
});
