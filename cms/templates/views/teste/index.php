<div class="box">
    <div class="box-header">
        <a href="<?php echo   \Back\Helpers\Links::CMS( 'teste/new' ); ?>" class="btn btn-success"> Novo registro</a>
    </div>

    <div class="box-body">

        <?php if(isset($flash['error_form'])) { ?>
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Alert!</h4>
              <?php echo $flash['error_form']; ?>
            </div>
        <?php } ?>


        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (count($items) > 0) {
                    foreach ($items as $res) {
                        ?>
                        <tr>
                            <td><?php echo $res['id']; ?></td>
                            <td><?php echo $res['titulo']; ?></td>

                            <td>
                                <div class="btn-group">

                                    <a href="<?php echo   \Back\Helpers\Links::CMS( 'teste/edit/'.$res['id'] ); ?>" class="btn btn-info">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <button class="btn btn-danger del-item" type="button" data-href="<?php echo   \Back\Helpers\Links::CMS( 'teste/delet/'.$res['id'] ); ?>" data-toggle="modal" data-target="#confirm-delete" >
                                        <i class="fa fa-trash"></i>
                                    </button>

                                </div>
                            </td>
                        </tr>
                        <?php } } else { ?>
                            <tr>
                                <td colspan="6">
                                    <p style="text-align: center">Nenhum registro encontrado!</p>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
