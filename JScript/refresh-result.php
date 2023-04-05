<script>

    var operator = parseInt(document.getElementById('number').value, 10);
    var time = (parseInt(document.getElementById('hour').value, 10) * 100 + parseInt(document.getElementById('minute').value, 10)) / 100;

    OldRange = (2 - 0.1);  
    NewRange = (1 - 0.1);  
    percent = (((time - 0.1) * NewRange) / OldRange) + 0.1;

    result = (10*operator) * time;

    document.getElementById('result').value = result.toFixed(0);

</script>

<input type="number" id="result" value="0" disabled/>