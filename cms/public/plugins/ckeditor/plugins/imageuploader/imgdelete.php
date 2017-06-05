<?php
header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_HOST']);

require_once dirname(__FILE__) . '/../../../../../../_src/ambiente/ambiente.php';
require_once dirname(__FILE__) . '/../../../../../../vendor/autoload.php';


$imgSrc = $_GET["img"];

// ckeck if file exists
if(file_exists(IMG_PATH.$imgSrc)):

    $upFile = new  \Back\Helpers\Upload( false );
    $upFile->deleta( $imgSrc );
    header('Location: ' . $_SERVER['HTTP_REFERER']);

else:    ?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Image Browser :: Delete</title>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
<script>
swal({
    title: "An error occurred.",
    text: "The file you want to delete does not exist. Please try again or choose another image.",
    type: "error",
    closeOnConfirm: false
},
function(){
    history.back();
});
</script>
</body>
</html>
<?php endif; ?>
