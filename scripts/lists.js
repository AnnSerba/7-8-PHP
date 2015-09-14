function makelist(hrefs, listobject, length) {
	document.writeln('<ul>');
	for (var i = 0; i < listobject.length; i++){
		document.writeln('<li> <a href=\"' + hrefs[i] + '"> ' + listobject[i] + ' </a>');
	}
	document.writeln('</ul>');
}

var hrefs = ['interests.php#films', 'interests.php#books', 'interests.php#music'];
var listobject = ['Любимые фильмы', 'Любимые книги', 'Любимая музыка'];
makelist(hrefs, listobject);
document.getElementById("inter").style.display = 'none';

