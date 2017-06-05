
<div class="box">
    <div class="box-body">

        <form action="<?php echo  \Back\Helpers\Links::CMS( 'teste/'.( isset($content->id) ? $content->id : '' ) ); ?>" method="post" enctype="multipart/form-data" class="fm_require_js">

            <?php  if( isset($content) && $content ): ?>
                <input type="hidden" name="_METHOD" value="PUT">
            <?php endif; ?>


            <?php  if( isset($content) && $content ): ?>
                <input type="hidden" name="_METHOD" value="PUT">
            <?php endif; ?>
            <div class="form-group">
                <label for="">Imagem</label>
                <input type="file" id="exampleInputFile" name="imagem">
                <p class="help-block">PNG/GIF/JPG </p>

                 <?php
                    if(isset($content) && !is_null($content->imagem)):
                ?>
                    <img src="<?php echo VIEW_UPLOADS.$content->imagem; ?>" style="max-width: 200px;" class="img-responsive" alt="">

                <?php endif; ?>
            </div>


            <div class="form-group">
                <label for="">Titulo</label>

                <input type="text" name="titulo" class="form-control" placeholder="Titulo" value="<?php echo isset($content->titulo) ? ($content->titulo) : ''; ?>" >

            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
