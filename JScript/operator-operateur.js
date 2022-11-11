function increaseOperateurValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value > 9 ? value = 9 : '';
  value++;
  if(value>9){
    document.getElementById("increase").style.color = "grey";
    document.getElementById("decrease").style.color = "green";
  }else{
    document.getElementById("increase").style.color = "green";
    document.getElementById("decrease").style.color = "green";
  }
  document.getElementById('number').value = value;
}

function decreaseOperateurValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 2 ? value = 2 : '';
  value--;
  if(value<2){
    document.getElementById("decrease").style.color = "grey";
    document.getElementById("increase").style.color = "green";
  }else{
    document.getElementById("decrease").style.color = "green";
    document.getElementById("increase").style.color = "green";
  }
  document.getElementById('number').value = value;
}