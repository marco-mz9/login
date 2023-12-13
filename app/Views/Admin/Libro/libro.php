<div class="card-table card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de Libros</h6>
    </div>

    <div class="p-4">
        <form>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Temas</label>
                <label for="tem"></label><select id="tem" class="form-control" id="tema" name="tema">
                    <option value="0">Seleccione un tema</option>
                    <?php foreach ($temas as $tema) : ?>
                        <option value="<?php echo $tema['tem_id']; ?>"><?php echo $tema['tem_tema']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </form>
    </div>
    <div id="resultTem"> </div>
</div>

<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script type='text/javascript'>
    $(document).ready(function () {
        $('#tem').change(function (e) {
            e.preventDefault();
            const tema = $('#tem').val();
            let url = "<?php echo base_url('/libro/show/'); ?>" + tema;
            $.ajax({
                type: "GET",
                url: url,
                data: {tema: tema},
                success: function (data) {
                    $('#resultTem').html(data);
                }
            });
        });
    });
</script>