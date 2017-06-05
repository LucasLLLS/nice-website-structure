<?php
header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_HOST']);

require_once dirname(__FILE__) . '/../../../../../../ambiente/config.php';
require_once dirname(__FILE__) . '/../../../../../../vendor/autoload.php';


$upFile = new \Back\Helpers\Upload( $_FILES['upload'], PATH_UPLOADS  );
$validaImagem = $upFile->valida();

// $validaImagem =  \Back\Helpers\Upload::valida( $_FILES["upload"] );

if( $validaImagem['error'] ){
    echo "<script>alert('".$validaImagem['msg']."');</script>";
    $uploadOk = 0;
}else{
    $upFile = new  \Back\Helpers\Upload( $_FILES['upload'], PATH_UPLOADS );
    $file = $upFile->envia();

    if(isset($_GET['CKEditorFuncNum'])){
        $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
        $ckfile = VIEW_UPLOADS. $file;
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction('$CKEditorFuncNum', '$ckfile', '');</script>";
    }
}

//Back to previous site
if(!isset($_GET['CKEditorFuncNum'])){
    echo '<script>history.back();</script>';
}