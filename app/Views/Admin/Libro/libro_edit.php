<form >
    <div class="form-group">
        <label for="exampleFormControlSelect1">Libro</label>
        <form method="post" action="<?php echo base_url('/libro/edit'); ?>">
         <input type="text" name="lib_id" value="<?php echo $libro['lib_id']; ?>" hidden>
        <input type="text" name="titulo" value="<?php echo $libro['lib_titulo']; ?>" hidden>
        <input type="text" name="codigo" value="<?php echo $libro['lib_codigo']; ?>" hidden>
        <input type="text" name="precio" value="<?php echo $libro['lib_precio']; ?>" hidden>
        <input type="text" name="resumen" value="<?php echo $libro['lib_resumen']; ?>" hidden>

    </div>
</form>
