var operator = parseInt(document.getElementById('number').value, 10);
var time = parseInt(document.getElementById('hour').value, 10) + parseInt(document.getElementById('minute').value, 10);

document.getElementById('result').value = time;