<?php
    require './connection_params.php';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }
    $needed_form = "form1.php";
    if (array_key_exists("form", $_GET)) {
        $needed_form = htmlspecialchars($_GET['form']) . ".php";
    }

    ob_start();
    // importa la variable $tabla y el html del form
    include './forms/' . $needed_form;
    $form = ob_get_contents();
    ob_end_clean();

    $sql = "SELECT * FROM $tabla";
    $result = $conn->query($sql);

    $conn->close();
?>
<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="/static/mady_icon.png">
    <title>Control de procesos - Madygraf</title>
    <link rel="stylesheet" type="text/css" href="/static/client.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/static/html5-qrcode.min.js"></script>
    <script type="module" src="/static/qr_scan.js"></script>
</head>
<body>
    <div class="container">
        <div class="main-col">
            <!-- div class="data_list">
                <div class="data_list_title">
                    <h3>Items en <?= $tabla ?></h3>
                </div>
                <?php
                    function toListItem($row) {
                        $vals = array();
                        foreach($row as $field => $val) { $vals[] = $val; }
                        return implode(", ", $vals);
                    }
                    if ($result->num_rows > 0) {
                        echo "<ul>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<li>" . toListItem($row) . "</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "No se encontraron resultados.";
                    }
                ?>
            </div -->

            <!-- Container para los formularios -->
            <div class="form_container">
                <div class="form_title">
                    <h3>Carga de datos a <?= $tabla ?></h3>
                </div>
                <?php
                echo $form;
                ?>
            </div>
        </div>

        <div class="switch-col">
            <!-- Container para el scanner -->
            <div style="height: 500px">
                <h4>QR scan</h4>
                <div id="reader"></div>
            </div>
        </div>
    </div>

    <script>
        var addListElement = function(item_elements) {
            var lista = document.querySelector('.data_list ul');
            if (lista === null) return;
            var nuevoItem = document.createElement('li');
            nuevoItem.textContent = item_elements.join(", ");
            console.log("nuevo item", nuevoItem.textContent);
            lista.appendChild(nuevoItem);
        }

        $(document).ready(function() {
          $("#data_form").submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
              url: "/php/saver.php",
              type: $(this).attr("method"),
              data: formData,
              success: function(response) {
                if (response===""){
                    var valores = $(".form_input").map(function() {return $(this).val();}).get();
                    addListElement(valores);
                    console.log("form data", valores);
                    // limpia los inputs del form
                    $(".form_input").each((i,e) => { $(e).val(""); });
                } else {
                    console.log("response", response);
                    alert("Error al procesar los datos: \n\n" + response);
                }
              },
              error: function(xhr, status, error) {
                alert("Error al procesar los datos: \n\n" + error);
              }
            });
          });
        });
    </script>
</body>