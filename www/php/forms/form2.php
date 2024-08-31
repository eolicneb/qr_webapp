<?php $tabla = "process" ?>
<form method="post" id="data_form">
    <input type="text" id="tabla" name="tabla" style="display: none;" value="<?= $tabla ?>">
    <p>
      <label for="process">Proceso:</label>
      <input type="text" id="process" name="process" class="form_input" required>
    </p>
    <p>
      <label for="state">Estado:</label>
      <input type="text" id="state" name="state" class="form_input" required>
    </p>
    <p>
      <label for="qr_data">QR data:</label>
      <input type="text" id="qr_data" name="qr_data" class="form_input" required>
    </p>
  <input type="submit" value="Guardar">
</form>