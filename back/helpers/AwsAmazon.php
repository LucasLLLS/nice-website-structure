<?php
namespace Back\Helpers;

use Aws\S3 as s3;

class AwsAmazon{

    private $cliente;

    public function __construct( $aws_key = AWS_ACCESS_KEY, $aws_secret = AWS_SECRET_KEY ){
        $this->cliente = s3\S3Client::factory(array(
            'key'    => $aws_key,
            'secret' => $aws_secret
        ));
    }

    public function moveUpload(  $file, $bucket, $name = false ){


        if(!file_exists($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            die('Erro ao accesar dados da Imagem');
        }else{

            $nome = $name ? $name : $file['name'];


            $response = $this->cliente->putObject(array(
                'Bucket' => $bucket,
                'Key'    => $nome,
                'SourceFile' => $file['tmp_name'],
                'ACL'    => 'public-read-write',
            ));


            return $response['ObjectURL'];

        }

    }

    public function deleteImage( $bucket, $url ){

        $n = parse_url( $url );

        $name = str_replace('/', '', $n['path']);

        $result = $this->cliente->deleteObject(array('Bucket' => $bucket, 'Key'    => $name ));

        return true;

    }

    public function checkImage($name,  $bucket = AWS_BRACKET ) {
        $result = $this->cliente->doesObjectExist($bucket, $name);
        return $result;
    }


}
