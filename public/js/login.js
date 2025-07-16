'use strict';

$(function() {

	$("input[type='password'][data-eye]").each(function(i) {
		var $this = $(this),
			id = 'eye-password-' + i,
			el = $('#' + id);

		$this.wrap($("<div/>", {
			style: 'position:relative',
			id: id
		}));

		$this.css({
			paddingRight: 60
		});

		// GANTI: Tambahkan tombol icon mata (font awesome) daripada teks 'Show'
		$this.after($("<div/>", {
			html: '<i class="fas fa-eye"></i>', // Menggunakan Font Awesome icon
			class: 'btn btn-primary btn-sm',
			id: 'passeye-toggle-' + i,
		}).css({
			position: 'absolute',
			right: 10,
			top: ($this.outerHeight() / 2) - 12,
			padding: '2px 7px',
			fontSize: 12,
			cursor: 'pointer',
		}));

		$this.after($("<input/>", {
			type: 'hidden',
			id: 'passeye-' + i
		}));

		var invalid_feedback = $this.parent().parent().find('.invalid-feedback');

		if (invalid_feedback.length) {
			$this.after(invalid_feedback.clone());
		}

		$this.on("keyup paste", function () {
			$("#passeye-" + i).val($(this).val());
		});

		// GANTI: Tambahkan logika toggle icon mata dan mata tertutup
		$("#passeye-toggle-" + i).on("click", function () {
			const icon = $(this).find("i"); // Ambil elemen <i> di dalam tombol

			if ($this.hasClass("show")) {
				$this.attr('type', 'password');
				$this.removeClass("show");
				$(this).removeClass("btn-outline-primary");
				icon.removeClass("fa-eye-slash").addClass("fa-eye"); // Ubah ke ikon mata
			} else {
				$this.attr('type', 'text');
				$this.val($("#passeye-" + i).val());
				$this.addClass("show");
				$(this).addClass("btn-outline-primary");
				icon.removeClass("fa-eye").addClass("fa-eye-slash"); // Ubah ke ikon mata tertutup
			}
		});
	});

	$(".my-login-validation").submit(function () {
		var form = $(this);
		if (form[0].checkValidity() === false) {
			event.preventDefault();
			event.stopPropagation();
		}
		form.addClass('was-validated');
	});
});
