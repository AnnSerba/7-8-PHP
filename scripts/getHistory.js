
function getLocalStorangeTec(){
	var history='История '+localStorage.getItem('История')+'<br>';
	history+='Главная '+localStorage.getItem('Главная')+'<br>';
	history+='Обо мне '+localStorage.getItem('Обо мне')+'<br>';
	history+='Контакт '+localStorage.getItem('Контакт')+'<br>';
	history+='Мои интересы '+localStorage.getItem('Мои интересы')+'<br>';
	history+='Фото альбом '+localStorage.getItem('Фото-альбом')+'<br>';
	history+='Учёба '+localStorage.getItem('Учёба')+'<br>';
	history+='Тест '+localStorage.getItem('Тест')+'<br>';
	document.getElementById('tecHistory').innerHTML=history;
}
function getCookieAll(){
	var history='История '+getCookie('История')+'<br>';
	history+='Главная '+getCookie('Главная')+'<br>';
	history+='Обо мне '+getCookie('Обо мне')+'<br>';
	history+='Контакт '+getCookie('Контакт')+'<br>';
	history+='Мои интересы '+getCookie('Мои интересы')+'<br>';
	history+='Фото-альбом '+getCookie('Фото-альбом')+'<br>';
	history+='Учёба '+getCookie('Учёба')+'<br>';
	history+='Тест '+getCookie('Тест')+'<br>';
	document.getElementById('allHistory').innerHTML=history;
}
