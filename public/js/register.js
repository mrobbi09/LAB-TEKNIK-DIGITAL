'use strict';

$(function () {
	// Fungsi untuk tambah tombol icon mata (pakai fontawesome) di input password dengan data-eye
	$("input[type='password'][data-eye]").each(function (i) {
		const $this = $(this);
		const id = 'eye-password-' + i;

		$this.wrap($("<div/>", {
			style: 'position:relative',
			id: id
		}));

		$this.css({
			paddingRight: '40px'  // space buat icon
		});

		// Tombol icon mata (pakai fontawesome)
		const $eyeBtn = $('<i class="fa-regular fa-eye" style="position:absolute;top:50%;right:10px;transform:translateY(-50%);cursor:pointer; color:#555;"></i>');
		$this.after($eyeBtn);

		// Toggle show/hide password
		$eyeBtn.on('click', function () {
			if ($this.attr('type') === 'password') {
				$this.attr('type', 'text');
				$eyeBtn.removeClass('fa-eye').addClass('fa-eye-slash');
			} else {
				$this.attr('type', 'password');
				$eyeBtn.removeClass('fa-eye-slash').addClass('fa-eye');
			}
		});
	});

	// Validasi form registrasi
	const regForm = document.getElementById('regForm');
	if (regForm) {
		const password = document.getElementById('password');
		const confirm = document.getElementById('confirm-password');
		const passwordFeedback = document.getElementById('password-feedback');
		const confirmFeedback = document.getElementById('confirm-feedback');

		regForm.addEventListener('submit', function (event) {
			let valid = true;

			// Password minimal 8 karakter
			if (password.value.length < 8) {
				password.classList.add('is-invalid');
				passwordFeedback.textContent = "Kata sandi minimal 8 karakter!";
				valid = false;
			} else {
				password.classList.remove('is-invalid');
				password.classList.add('is-valid');
			}

			// Konfirmasi password harus sama
			if (confirm.value !== password.value) {
				confirm.classList.add('is-invalid');
				confirmFeedback.textContent = "Konfirmasi kata sandi harus sama!";
				valid = false;
			} else {
				confirm.classList.remove('is-invalid');
				confirm.classList.add('is-valid');
			}

			// Validasi HTML5 form
			if (!regForm.checkValidity()) {
				valid = false;
			}

			if (!valid) {
				event.preventDefault();
				event.stopPropagation();
			}

			regForm.classList.add('was-validated');
		});
	}
});
