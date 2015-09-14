function getDateTime(){
	var options = {
  era: 'long',
  year: 'numeric',
  month: 'long',
  day: 'numeric',
  weekday: 'long',
  timezone: 'UTC',
  hour: 'numeric',
  minute: 'numeric',
  second: 'numeric'
};
	var date = new Date();
//Возвратим текущий день месяца
	document.getElementById('datatime').innerHTML=date.toLocaleString("ru", options);
}