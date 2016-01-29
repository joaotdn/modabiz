<?php
function modabiz_module_contatos() {

  if(isset($_POST['submited'])) {

    $nome = filter_var($_POST['nome'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $telefone = filter_var($_POST['telefone'],FILTER_SANITIZE_STRING);
    $cidade = filter_var($_POST['cidade'],FILTER_SANITIZE_STRING);
    $assunto = filter_var($_POST['assunto'],FILTER_SANITIZE_STRING);
    $mensagem = filter_var($_POST['mensagem'],FILTER_SANITIZE_STRING);

    $e_nome = false;
    $e_telefone = false;
    $e_email = false;
    $e_cidade = false;
    $e_mensagem = false;

    if(!empty($nome))
      $e_nome = true;
    if(!empty($telefone))
      $e_telefone = true;
    if(!empty($email))
      $e_email = true;
    if(!empty($cidade))
      $e_cidade = true;
    if(!empty($mensagem))
      $e_mensagem = true;

    if($e_nome && $e_email) {
      $contato_id = get_page_by_title( $nome, 'OBJECT', 'contatos' );

      if( !$contato_id ) {

        $contato_id = wp_insert_post( array(
            "post_title" => $nome,
            "post_type" => 'contatos',
            "post_status" => "publish"
        ));

        update_field('contato_nome', $nome, $contato_id);
        update_field('contato_email', $email, $contato_id);
        update_field('contato_telefone', $telefone, $contato_id);
        update_field('contato_cidade', $cidade, $contato_id);
        update_field('contato_assunto', $assunto, $contato_id);
        update_field('contato_mensagem', $mensagem, $contato_id);


      }

      $confimacao = get_page_by_title("Resposta");
      $confimacao = get_page_link($confimacao->ID);
      wp_redirect($confimacao);
    }
  }
  
}
  
?>