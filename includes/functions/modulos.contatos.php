<?php
function modabiz_module_contatos() {

  if(isset($_POST['submited'])) {
    global $post;
    global $plandd_option;

    $nome = filter_var($_POST['nome'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $telefone = filter_var($_POST['telefone'],FILTER_SANITIZE_STRING);
    //$cidade = filter_var($_POST['cidade'],FILTER_SANITIZE_STRING);
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
    //if(!empty($cidade))
     // $e_cidade = true;
    if(!empty($mensagem))
      $e_mensagem = true;

    if($e_nome && $e_email && $e_mensagem) {
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
        //update_field('contato_cidade', $cidade, $contato_id);
        update_field('contato_assunto', $assunto, $contato_id);
        update_field('contato_mensagem', $mensagem, $contato_id);

        // dados para enviar email para o cliente
        $assunto = $plandd_option['mail-resposta-assunto'];
        $var_remetente = array("<% nome %>","<% email %>");
        $remetente = array($nome,$email);
        $mensagem = str_replace($var_remetente, $remetente, $plandd_option['temp-emails-resposta']);

        // dados para enviar e-mails para usuário
        $emails = get_field('contato_emails',$post->ID);
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

      print("true");

      wp_redirect($confimacao);

    } else {

      $output = "";

      if(!$e_nome) {
        $output .= "<span>O campo <strong>nome</strong> está vazio ou incorreto.</span>";
      }

      if(!$e_email) {
        $output .= "<span>O campo <strong>e-mail</strong> está vazio ou incorreto.</span>";
      }

      if(!$e_mensagem) {
        $output .= "<span>O campo <strong>mensagem</strong> está vazio ou incorreto.</span>";
      }

      print($output);

    }
  }

}
?>