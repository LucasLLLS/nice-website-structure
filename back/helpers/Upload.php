<?php

namespace Back\Helpers;

class Upload {


    private $file;
    private $key;
    private $aws = false;

    public function __construct( $file, $path = false,  $key = false  ){
        $this->file = $file;
        $this->key = $key;
        $this->path = $path ? $path : dirname(__FILE__).'/';
    }

    /*
    $file = $_FILE
    $array boolean // Case $files is array
    return array('msg' => String, 'error' => boolean)
    */
    public function valida( $config = false){

        $config_default['max_file'] = 2;
        $config_default['type_allow'] = array('image/jpeg', 'image/jpeg', 'image/png', 'application/pdf', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        $config = $config ? $config : $config_default;

        if( $this->key !== false ){
            $arquivo_nome = $this->file['name'][$this->key];
            $arquivo_tmp = $this->file['tmp_name'][$this->key];
            $arquivo_type = $this->file['type'][$this->key];
            $arquivo_size = $this->file['size'][$this->key];
            $filename = basename($this->file['name'][$this->key]);
        }else{
            $arquivo_nome = $this->file['name'];
            $arquivo_tmp = $this->file['tmp_name'];
            $arquivo_type = $this->file['type'];
            $arquivo_size = $this->file['size'];
            $filename = basename($this->file['name']);
        }

        $max_file = 1024 * 1024 * $config['max_file']; // 3Mb;
        $type_allow = $config['type_allow'];

        $error = false;

        if ($arquivo_nome == '') {
            $error[] = "Erro no arquivo: ".$arquivo_nome.", ao carregar arquivo.";
        }

        if ($arquivo_size > $max_file) {
            $error[] = "Erro no arquivo: ".$arquivo_nome.", não pode ultrapassar o tamanho de ".$config['max_file']."MB.";
        }

        if( $arquivo_type ){
            if (array_search($arquivo_type, $type_allow) === false) {
                $error[] = "Erro no arquivo: ".$arquivo_nome.",o tipo ( ".$arquivo_type." ) não é inválido, somente ".implode(",", $type_allow)." são aceitos.";
            }
        }else{
            $error[] = "Erro no arquivo: ".$arquivo_nome.", esse arquivo está corrompido ou ultrapassa o tamanho de ".$config['max_file']."MB.";
        }

        if( $error ){
            return array( 'msg' => $error, 'error' => true );
        }else{
            return array( "msg" => false, 'error' => false );
        }

    }

    //return name file
    public function envia( $change_name = false, $force_local = false ){

        if( $this->key !== false){
            $this->file['tmp_name'] = $this->file['tmp_name'][$this->key];
        }

        if( $this->key !== false){
            $this->file['name'] = $this->file['name'][$this->key];
        }


        if(!file_exists($this->file['tmp_name']) || !is_uploaded_file($this->file['tmp_name'])) {
            die('Erro ao accesar dados do arquivo');
        }else{

            $name = $this->file['name'];

            $a = pathinfo($name);

            if( $change_name ){
                $arq_home = $change_name;
            }else{
                $arq_home = md5(microtime() . $name);
            }

            $nome = $arq_home . '.' . strtolower($a['extension']);

            if($this->aws && $force_local == false) {
              $s3 = new \Back\Helpers\AwsAmazon(AWS_ACCESS_KEY, AWS_SECRET_KEY);
              $n = $s3->moveUpload( $this->file, AWS_BRACKET, $nome);
              return $n;
            } else {
              // var_dump($this->file); die();
              move_uploaded_file($this->file["tmp_name"], $this->path. $nome);
              // chmod($this->path. $name, 0777);

              return $nome;
            }
        }
    }

    


    //return boolean
    public function deleta( $filename, $path = false ) {
      if($this->aws){
        $s3 = new \Back\Helpers\AwsAmazon(AWS_ACCESS_KEY, AWS_SECRET_KEY);
        $n = $s3->deleteImage( AWS_BRACKET, $filename);
        return $n;
      }
      if ( file_exists( $path.$filename ) ) {
          unlink( $path.$filename );
          return true;
      } else {
          return false;
      }
    }
}
