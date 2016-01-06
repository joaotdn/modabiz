<?php
add_action('wp_ajax_nopriv_lookbook_presente', 'lookbook_presente');
add_action('wp_ajax_lookbook_presente', 'lookbook_presente');

function lookbook_presente() {
	global $plandd_option;
	$form_data = $_GET['form_data'];
	$params = array();
	parse_str($form_data, $params);

	$valEmail = false;
	$valGift = false;

	if(array_key_exists('email', $params) && !empty($params['email'])) {
		$email = filter_var($params['email'],FILTER_VALIDATE_EMAIL);
		if($email) {
			$valEmail = true;
		} else {
			echo "Email inválido. Tente novamente.";
			exit();
		}
	}

	if(array_key_exists('item-gift', $params) && !empty($params['item-gift'])) {
		$gift = filter_var($params['item-gift'],FILTER_SANITIZE_STRING);
		if($gift) {
			$valGift = true;
		}
	} else {
		echo "Nenhum item foi selecionado para o envio";
		exit();
	}

	if($valEmail && $valGift) {
		if(wp_mail( $email, '[ '. get_bloginfo('name') .' ] - Pedido do presente', $params['mensagem'] . "\nLink do pedido: " . $gift  ))
			echo "true";
			wp_redirect( home_url() );
	}

	exit();
}
?>