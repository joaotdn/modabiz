<?php
function modabiz_module_corriculos() {
  if(isset($_POST['submited'])) {
    global $post;
    global $plandd_option;

    $nome = filter_var($_POST['nome'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $telefone = filter_var($_POST['telefone'],FILTER_SANITIZE_STRING);
    //$cidade = filter_var($_POST['cidade'],FILTER_SANITIZE_STRING);
    $curriculo = (isset($_FILES)) ? $_FILES['curriculo']['name'] : false;
    $mensagem = filter_var($_POST['mensagem'],FILTER_SANITIZE_STRING);

    $e_nome = false;
    $e_telefone = false;
    $e_email = false;
    $e_cidade = false;
    $e_mensagem = false;
    $e_curriculo = false;

    if(!empty($nome))
      $e_nome = true;
    if(!empty($telefone))
      $e_telefone = true;
    if(!empty($email))
      $e_email = true;
    //if(!empty($cidade))
      //$e_cidade = true;
    if(!empty($curriculo))
      $e_curriculo = true;
    if(!empty($mensagem))
      $e_mensagem = true;

    if(isset($_FILES)) {
      if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
        $uploadedfile = $_FILES['curriculo'];
        $upload_overrides = array( 'test_form' => false );
        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
        $curriculo_url = $movefile['url'];
    }

    if($e_nome && $e_email) {
      $curriculo_id = get_page_by_title( $nome, 'OBJECT', 'curriculos' );

      if( !$curriculo_id ) {

        $curriculo_id = wp_insert_post( array(
            "post_title" => $nome,
            "post_type" => 'curriculos',
            "post_status" => "publish"
        ));

        update_field('curriculo_nome', $nome, $curriculo_id);
        update_field('curriculo_email', $email, $curriculo_id);
        update_field('curriculo_telefone', $telefone, $curriculo_id);
        //update_field('curriculo_cidade', $cidade, $curriculo_id);
        update_field('curriculo_mensagem', $mensagem, $curriculo_id);
        
        if(isset($curriculo_url) && !empty($curriculo_url))
          update_field('curriculo_curriculo', $curriculo_url, $curriculo_id);

        // dados para enviar email para o cliente
        $assunto = $plandd_option['mail-resposta-assunto'];
        $var_remetente = array("<% nome %>","<% email %>");
        $remetente = array($nome,$email);
        $mensagem = str_replace($var_remetente, $remetente, $plandd_option['temp-emails-resposta']);

        // dados para enviar e-mails para usuário
        $emails = get_field('curriculo_email',$post->ID);
        $user_assunto = $plandd_option['mail-notica-assunto'];
        $user_mensagem = str_replace($var_remetente, $remetente, $plandd_option['temp-emails-notifica']);

        // enviar e-mail de auto resposta
        if(!empty($assunto) && !empty($mensagem)) {
          wp_mail( $email, $assunto, $mensagem );
        }

        // enviar e-mail de notificação
        if(!empty($user_assunto) && !empty($user_mensagem) && isset($emails)) {
          wp_mail( $emails, $user_assunto, $user_mensagem );
        }

      }

      $confimacao = get_page_by_title("Resposta");
      $confimacao = get_page_link($confimacao->ID);
      wp_redirect($confimacao);
    }
  }
}
?>