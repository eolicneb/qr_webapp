<?php
    $servername = getenv('MYSQL_HOST');
    $username = getenv('MYSQL_USER');
    $password = getenv('MYSQL_PASSWORD');
    $dbname = getenv('MYSQL_DATABASE');
?>
<script>
    console.log("Parametros de conexion a db cargados para usuario '<?= $username ?>' en esquema '<?= $dbname ?>'");
</script>