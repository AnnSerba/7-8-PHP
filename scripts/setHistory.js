function setLocalStorangeTec(page){
	if(localStorage.getItem('История')==null){
		localStorage.setItem('История','0');
	}
	if(localStorage.getItem('Главная')==null){
		localStorage.setItem('Главная','0');
	}
	if(localStorage.getItem('Обо мне')==null){
		localStorage.setItem('Обо мне','0');
	}
	if(localStorage.getItem('Контакт')==null){
		localStorage.setItem('Контакт','0');
	}
	if(localStorage.getItem('Мои интересы')==null){
		localStorage.setItem('Мои интересы','0');
	}
	if(localStorage.getItem('Фото-альбом')==null){
		localStorage.setItem('Фото-альбом','0');
	}
	if(localStorage.getItem('Учёба')==null){
		localStorage.setItem('Учёба','0');
	}
	if(localStorage.getItem('Тест')==null){
		localStorage.setItem('Тест','0');
	}
	localStorage.setItem(page,parseInt(localStorage.getItem(page),10)+1)
}
function setCookieAll (name) {
	if(getCookie('История')==null){
		setCookie('История',0,10);
	}
	if(getCookie('Главная')==null){
		setCookie('Главная',0,10);
	}
	if(getCookie('Обо мне')==null){
		setCookie('Обо мне',0,10);
	}
	if(getCookie('Контакт')==null){
		setCookie('Контакт',0,10);
	}
	if(getCookie('Мои интересы')==null){
		setCookie('Мои интересы',0,10);
	}
	if(getCookie('Фото-альбом')==null){
		setCookie('Фото-альбом',0,10);
	}
	if(getCookie('Учёба')==null){
		setCookie('Учёба',0,10);
	}
	if(getCookie('Тест')==null){
		setCookie('Тест',0,10);
	}
	setCookie(name,parseInt(getCookie(name),10)+1,10)
}
