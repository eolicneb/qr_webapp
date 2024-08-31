<?php $tabla = "test01" ?>
<form method="post" id="data_form">
    <input type="text" id="tabla" name="tabla" style="display: none;" value="<?= $tabla ?>">
    <p>
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" class="form_input" required>
    </p>
    <p>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" class="form_input" required>
    </p>
    <p>
      <label for="qr_data">QR data:</label>
      <input type="text" id="qr_data" name="qr_data" class="form_input" required>
    </p>
  <input type="submit" value="Guardar">
</form>