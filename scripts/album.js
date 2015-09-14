var path = "photos/";
arrayImg = new Array(15);
for (var i = 1; i < 16; i++)
	arrayImg[i-1] = path + i + ".jpg";
titles = new Array(15);
for (var i = 1; i < 16; i++)
	titles[i-1] = "Image" + i;
for (var i = 0; i < 15; i++)
	document.writeln('<fieldset><legend class=\"align\">'+titles[i]+' </legend><img src=\"'+arrayImg[i]+'\" title=\"Создание сайта\" alt\"Изображение!\"></fieldset>'); 
