function test(selection, check, radio) {
  var result=0;
    if(selection==1){
      result++;
    }
    if(check[1].checked==true&&
      check[2].checked==true&&
      check[3].checked==true&&
      check[0].checked==false&&
      check[4].checked==false){
      result++;
    }
    if(radio==true){
      result++;
    }
    document.getElementById('content').innerHTML="Ваш результат: "+result;
}
