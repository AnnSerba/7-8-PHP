/**
 * Created by Андрей on 03.04.2015.
 */

function Slider(){
        $("#imLeft").click(function(){
            var i = $("#kindaSliderMaybe").attr('alt');
            if (i == 1) {
                i = 15;
            } else {
                i--;
            }
            $("#kindaSliderMaybe").attr('alt', i);
            $("#kindaSliderMaybe").fadeOut(400, function(){
                $("#kindaSliderMaybe").attr('src', 'photos/' + i + ".jpg");
            });
            document.getElementById("imgInfo").innerHTML = "Фото " + i + " из 15";

            $("#kindaSliderMaybe").fadeIn(400);
        });
        $("#imRight").click(function(){
            var i = $("#kindaSliderMaybe").attr('alt');
            if (i == 15) {
                i = 1;
            } else {
                i++;
            }
            $("#kindaSliderMaybe").attr('alt', i);
            $("#kindaSliderMaybe").fadeOut(400, function(){
                $("#kindaSliderMaybe").attr('src', 'photos/' + i + ".jpg");
            });
            document.getElementById("imgInfo").innerHTML = "Фото " + i + " из 15";

            $("#kindaSliderMaybe").fadeIn(400);
        });
}

function validate_form() {

    var valid = true;
    if (document.contact_form.sex[0].checked == false && document.contact_form.sex[1].checked == false && valid == true){
        valid = false;
    }
    if (validate_fio('hintName') == false)
        valid = false;
    if (validate_email('hintMail') == false)
        valid = false;
    if (validate_mes() == false)
        valid = false;
    if (validate_phone('hintPhone') == false)
        valid = false;
    if (document.getElementById("datepicker").value == ""){
        document.getElementById("datepicker").style.backgroundColor = "#FF6347";
        valid = false;
    }
    if (valid == false) {
        window.alert("Поля не заполнены или заполнены неверно. Незаполненные отмечены красным.")
        event.preventDefault();
    } else {
        $('#overlay').fadeIn(400, // сначала плавно показываем темную подложку
            function(){ // после выполнения предыидущей анимации
                $('#modal_form')
                    .css('display', 'block') // убираем у модального окна display: none;
                    .animate({opacity: 1, top: '50%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
            });
        document.getElementById("confirmText").innerHTML = "Вы подтверждаете отправку <br> данных на " + document.getElementById("email").value + "?";
        $('#yep').click(function(){
            $('#modal_form')
                .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
                function() { // после анимации
                    $(this).css('display', 'none'); // делаем ему display: none;
                    $('#overlay').fadeOut(400); // скрываем подложку
                })

        });
        $('#nope').click(function(){
            $('#modal_form')
                .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
                function() { // после анимации
                    $(this).css('display', 'none'); // делаем ему display: none;
                    $('#overlay').fadeOut(400); // скрываем подложку
                })
        });
    }

    return valid;
}

function hideHints(){
    for (var i = 0; i < hideHints.arguments.length; i++) {
        document.getElementById(hideHints.arguments[i]).innerHTML = "";
    }
}

var hids = ['hintName', 'hintPhone', 'hintMail'];
var hints = ['Например, Ракаускайте Игорь Григориевич', 'Например, 7912344514. Номер начинается на 7 или 3', 'Например, name@domen.com'];

function validate_fio(hint){
    var regExp = /^[а-яА-ЯёЁa-zA-Z]+\s+[а-яА-ЯёЁa-zA-Z]+\s+[а-яА-ЯёЁa-zA-Z]+\s*$/;
    if (!(regExp.test(document.contact_form.fio.value))) {
        document.contact_form.fio.style.backgroundColor = "#FF6347";
        document.getElementById(hint).innerHTML = hints[hids.indexOf(hint)];
        return false;
    } else {
        document.contact_form.fio.style.backgroundColor = "#F0FFF0";
        document.getElementById(hint).innerHTML = "";
        return true;
    }
}

function validate_phone(hint){
    var regExp = /^[73]\d{8,10}$/;
    if (!(regExp.test(document.contact_form.phone.value))) {
        document.contact_form.phone.style.backgroundColor = "#FF6347";
        document.getElementById(hint).innerHTML = hints[hids.indexOf(hint)];
        return false;
    } else {
        document.contact_form.phone.style.backgroundColor = "#F0FFF0";
        document.getElementById(hint).innerHTML = "";
        return true;
}
}

function validate_mes(){
    if (document.contact_form.mes.value == "") {
        document.contact_form.mes.style.backgroundColor = "#FF6347";
        return false;
    } else {
        document.contact_form.mes.style.backgroundColor = "#F0FFF0";
        return true;
    }
}

function validate_email(hint){
    var regExp = /^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/;
    if (!regExp.test(document.contact_form.email.value)) {
        document.contact_form.email.style.backgroundColor = "#FF6347";
        document.getElementById(hint).innerHTML = hints[hids.indexOf(hint)];
        return false;
    } else {
        document.contact_form.email.style.backgroundColor = "#F0FFF0";
        document.getElementById(hint).innerHTML = "";
        return true;
    }
}



function showList() {
    if (document.getElementById("inter").style.display != 'none'){
        document.getElementById("inter").style.display = 'none';
    } else {
        document.getElementById("inter").style.display = 'block';
    }
}



function setBackground(id) {
    return;
}

function restore(id){
    document.body.style.background = 'url(images/background.jpg) fixed';
}


function lsNull() {
    var pages = ['index', 'about', 'contacts', 'interests', 'study', 'tests'];
    for (var i = 0; i < pages.length; i++) {
        var iValue = localStorage[pages[i]] || 0;
        localStorage.setItem(pages[i], iValue);
    }
}

function startClockAndShowHistory(page) {
    window.setInterval(function () {
        var week = new Array("sun", "mon", "tue", "thu",
            "tue", "fri", "sat");
        var date = new Date();
        var stringDate = document.getElementById('currentDate');
        stringDate.innerHTML = ad0(date.getDate()) + '.' + ad0(date.getMonth() + 1) + '.' + (date.getFullYear() - 2000) + ', ' + week[date.getDay()] + " "
            + ad0(date.getHours()) + ':' + ad0(date.getMinutes()) + ':' + ad0(date.getSeconds());
    }, 1);
    function ad0(add) {
        if (add < 10)
            add = "0" + add;
        return add;
    }
}
function setCookie(name, value) {
    document.cookie = name + "=" + value;
}

function getCookie(name) {
    var r = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
    if (r) return r[2];
    else return 0;
}

function saveToCookies(name) {
    lsNull();
    localStorage.setItem(name, parseInt(localStorage.getItem(name)) + 1);
    if (getCookie(name)=="0")
        setCookie(name, 1);
    else
        setCookie(name, (parseInt(getCookie(name))+ 1));
}

