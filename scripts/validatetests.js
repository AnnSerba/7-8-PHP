function validate_form() {
	valid = true;
	if (document.tests.fio.value == "") {
		document.tests.fio.focus();
		window.alert("Введите ваше ФИО");
		valid = false;
	} else
		if (document.tests.group.selectedIndex == 0) {
			document.tests.group.focus();
			window.alert("Выберите группу");
			valid = false;
		} else
			if (document.tests.fiop.value == "") {
				document.tests.fiop.focus();
				window.alert("Введите ответ на первый вопрос");
				valid = false;
			}
			else
				if (document.tests.sq.selectedIndex == 0 ) {
					document.tests.sq.focus();
					window.alert("Выберите ответ на второй вопрос");
					valid = false;
				}
			else {
				var p = 0;
				if (document.tests.checkboxone.checked == true)
					p++;
				if (document.tests.checkboxtwo.checked == true)
					p++;
				if (document.tests.checkboxthree.checked == true)
					p++;
				if (p > 2) {
					window.alert("Максимум - два варианта.");
					valid = false;
				}
			}
	return valid;
}