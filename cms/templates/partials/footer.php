
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Developed by <a href="http://www.face2face.com.br" target="_blank">F2F</a></strong>
</footer>

</div><!-- ./wrapper -->


<script>$.widget.bridge('uibutton', $.ui.button);</script>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Deseja excluir esse registro ?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                <a class="btn btn-danger btn-ok">Sim</a>
            </div>
        </div>
    </div>
</div>

<!--  MODAL INFOS -->
<div class="modal modal-info" id="modal-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="">Title</h4>
            </div>
            <div class="modal-body">
                Body
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left btn-reload" >Fechar</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">

$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});


if( $('.ckeditor') ){

    $('.ckeditor').each(function(){

        CKEDITOR.replace( $(this).attr('id'), {
            filebrowserBrowseUrl: '<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/ckeditor/plugins/imageuploader/imgbrowser.php',
            filebrowserImageBrowseUrl: '<?php echo BASE_URL_PUBLIC_ADMIN; ?>publc/plugins/ckeditor/plugins/imageuploader/imgbrowser.php?type=Images',
            filebrowserUploadUrl: '<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/ckeditor/plugins/imageuploader/imgupload.php',
            filebrowserImageUploadUrl: '<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/ckeditor/plugins/imageuploader/imgupload.php?type=Images'
        });

    });
}

</script>

</body>
</html>
