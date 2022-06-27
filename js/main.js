
//Групповой чекбокс
$(".checker").change(function () {
	if ($(this).prop('checked')) {
		$('.check-elem').prop('checked', true);
	} else {
		$('.check-elem').prop('checked', false);
	}
})
$('.check-elem').each(function () {
	$(this).change(function () {
		$('.checker').prop('checked', false);
	})
})

//Верхние опции

$('#set-option-btn').click(function () {
	$('.check-elem').each(function () {
		if ($(this).prop('checked')) {
			if ($('#active').val() == 1) {
				$('#check_status').removeClass("not-active-circle").addClass("active-circle");
			} else if ($('#active').val() == 2) {
				$('#check_status').removeClass("active-circle").addClass("not-active-circle");
			}
		}
	})
})

//Чекбокс статуса в модалке
$('#check').change(function () {
	if ($(this).prop('checked'))
		$('#check_status').removeClass("not-active-circle").addClass("active-circle");
	else
		$('#check_status').addClass("not-active-circle");
})

let path = "";

//Текст внутри модального окна
$('.add-btn').click(function () {
	$('.modal-title').text('Add');
	$('.save').text('Add user');
	path = "/php/add.php";
})
$('.edit-btn').click(function () {
	$('.modal-title').text('Edit');
	$('.save').text('Save change');
	path = "/php/edit.php";
})

$('.save').click(function () {
	let first_name_val = $('input#first-name').val();
	let last_name_val = $('input#last-name').val();
	let role_val = $('select#role').val();

	$.ajax({
		method: "POST",
		url: path,
		cache: false,
		data: {
			first_name: first_name_val,
			last_name: last_name_val,
			role: role_val,
		},
		dataType: 'html',
		success: function (data) {
			if (data == 'Готово')
				location.reload();
			//  $('#errorBlock').removeClass('alert-danger').addClass('alert-success').show().text(data);
			else
				$('#errorBlock').show().text(data);
		}
	})
	// 	.done(function () { });
	// $('#user-form-modal').modal('hide');
	// $('input#first-name').val('');
	// $('input#last-name').val('');

})
