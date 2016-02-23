<?php
function modabiz_module_revendedores() {
  if(isset($_POST['submited_cpf']) || isset($_POST['submited_cnpj'])) {
    
    $nome = filter_var($_POST['nome'],FILTER_SANITIZE_STRING);
    $telefone = filter_var($_POST['telefone'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $endereco = filter_var($_POST['endereco'],FILTER_SANITIZE_STRING);
    $bairro = filter_var($_POST['bairro'],FILTER_SANITIZE_STRING);
    $complemento = filter_var($_POST['complemento'],FILTER_SANITIZE_STRING);
    $estado = filter_var($_POST['estado'],FILTER_SANITIZE_STRING);
    $cidade = filter_var($_POST['cidade'],FILTER_SANITIZE_STRING);
    
    $newsletter = $_POST['newsletter'];
    $sms = $_POST['sms'];

    if(isset($_FILES))
      $file = (isset($_FILES)) ? $_FILES['comprovante']['name'] : false;
    if(isset($_POST['nascimento']))
      $nascimento = filter_var($_POST['nascimento'],FILTER_SANITIZE_STRING);

    if(isset($_POST['empresa']))
      $empresa = filter_var($_POST['empresa'],FILTER_SANITIZE_STRING);
    if(isset($_POST['cnpj']))
      $cnpj = filter_var($_POST['cnpj'],FILTER_SANITIZE_STRING);

    $e_nome = false;
    $e_telefone = false;
    $e_email = false;
    $e_endereco = false;
    $e_bairro = false;
    $e_complemento = false;
    $e_estado = false;
    $e_cidade = false;

    if(!empty($nome))
      $e_nome = true;
    if(!empty($telefone))
      $e_telefone = true;
    if(!empty($email))
      $e_email = true;
    if(!empty($endereco))
      $e_endereco = true;
    if(!empty($bairro))
      $e_bairro = true;
    if(!empty($complemento))
      $e_complemento = true;
    if(!empty($estado))
      $e_estado = true;
    if(!empty($cidade))
      $e_cidade = true;

    if(isset($_FILES)) {
      if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
        $uploadedfile = $_FILES['comprovante'];
        $upload_overrides = array( 'test_form' => false );
        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
        $comprovante_url = $movefile['url'];
    }

    //Publica novos posts, o titulo é o nome do revendedor
    if($e_nome && $e_cidade && $e_estado && $e_complemento && $e_email && $e_telefone && $e_endereco) {

      $revendedor_id = get_page_by_title( $nome, 'OBJECT', 'revendedores' );

      if( !$revendedor_id ) {

        $revendedor_id = wp_insert_post( array(
            "post_title" => $nome,
            "post_type" => 'revendedores',
            "post_status" => "publish"
        ));

        update_field('revendedor_pessoa', $_POST['form_type'], $revendedor_id);
        update_field('revendedor_nome', $nome, $revendedor_id);
        update_field('revendedor_email', $email, $revendedor_id);
        update_field('revendedor_telefone', $telefone, $revendedor_id);
        update_field('revendedor_endereco', $endereco, $revendedor_id);
        update_field('revendedor_bairro', $bairro, $revendedor_id);
        update_field('revendedor_complemento', $complemento, $revendedor_id);
        update_field('revendedor_estado', $estado, $revendedor_id);
        update_field('revendedor_cidade', $cidade, $revendedor_id);

        if(isset($empresa) && !empty($empresa))
          update_field('revendedor_empresa', $empresa, $revendedor_id);

        if(isset($cnpj) && !empty($cnpj))
          update_field('revendedor_cnpj', $cnpj, $revendedor_id);
        
        if(isset($nascimento) && !empty($nascimento))
          update_field('revendedor_aniversario', $nascimento, $revendedor_id);
        
        if(isset($comprovante_url) && !empty($comprovante_url))
          update_field('revendedor_comprovante', $comprovante_url, $revendedor_id);

        // dados para enviar email para o cliente
        $assunto = $plandd_option['mail-resposta-assunto'];
        $var_remetente = array("<% nome %>","<% email %>");
        $remetente = array($nome,$email);
        $mensagem = str_replace($var_remetente, $remetente, $plandd_option['temp-emails-resposta']);

        // dados para enviar e-mails para usuário
        $emails = get_field('reven_emails',$post->ID);
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