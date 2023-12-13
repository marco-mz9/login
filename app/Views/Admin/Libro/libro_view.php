

<!--    <div class="input-group ">-->
<!--        <a href="--><?php //echo base_url('/libro'); ?><!--" class="btn btn-primary">Volver</a>-->
<!--    </div>-->
    
<div class="card shadow m-2">
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            <?php echo $libro['lib_titulo'] ?>
        </h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <?php echo $libro['lib_resumen'] ?>
    </div>
</div>