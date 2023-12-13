<div class="card-search card shadow mb-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de Libros</h6>
    </div>

    <?php include('libro_tema.php'); ?>

    <form id="searchForm" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 pb-3 navbar-search">
        <div class="input-group">
            <input type="text" id="code" name="code" class="form-control bg-light border-0 small"
                   aria-label="Search" aria-describedby="basic-addon2" onkeypress="return isNumberKey(event)">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit"  >
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <div id="resultSection"> </div>
</div>

<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script type='text/javascript'>
    $(document).ready(function () {
        $('#searchForm').submit(function (e) {
            e.preventDefault();
            let code = $('#code').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/libro'); ?>",
                data: {code: code},
                success: function (data) {
                    $('#resultSection').html(data);
                }
            });
        });
    });
</script>