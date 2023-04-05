<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mono Secur | STAFF | utilisateurs</title>
    <link rel="stylesheet" href="https://monosecur.tk/CSStyle/staff/utilisateurs.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="ContextMenu.js"></script>
</head>
<body>
    <?php include ($_SERVER['DOCUMENT_ROOT']."/staff/contextmenu.php"); ?>
    <table id="table">

            <script>
          setInterval('reload_table()', 1000);
                  function reload_table(){
                          $('#table').load('https://monosecur.tk/staff/users.php');
                  }
        </script>
    </table>
    <?php include ($_SERVER['DOCUMENT_ROOT']."/config/user_connect.php"); ?>
</body>
</html>
