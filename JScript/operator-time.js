function increaseTimeValue() {
  var minutes = parseInt(document.getElementById('minute').value, 10);
  var hour = parseInt(document.getElementById('hour').value, 10);
  minutes = isNaN(minutes) ? 0 : minutes;
  if(minutes>40 && !(hour>1)){
      hour = hour + 1;
      minutes = 0;
  }else{
          if(hour>1){
          document.getElementById("increasetime").style.color = "grey";

          }else{
          minutes = minutes + 10;
          document.getElementById("increasetime").style.color = "green";
          document.getElementById("decreasetime").style.color = "green";
          }


  }
  document.getElementById('minute').value = minutes;
  document.getElementById('hour').value = hour;
}

function decreaseTimeValue() {
  var minutes = parseInt(document.getElementById('minute').value, 10);
  var hour = parseInt(document.getElementById('hour').value, 10);
  minutes = isNaN(minutes) ? 0 : minutes;
  if(minutes < 10 && !(hour<1)){
      hour = hour - 1;
      minutes = 50;
  }else{
          if(hour<1){
            if(minutes<20){
            document.getElementById("decreasetime").style.color = "grey";
            
            }else{
              minutes = minutes - 10;
              document.getElementById("decreasetime").style.color = "green";
              document.getElementById("increasetime").style.color = "green";
            }

          }else{
              minutes = minutes - 10;
              document.getElementById("decreasetime").style.color = "green";
              document.getElementById("increasetime").style.color = "green";
          }
  }
  document.getElementById('minute').value = minutes;
  document.getElementById('hour').value = hour;
}