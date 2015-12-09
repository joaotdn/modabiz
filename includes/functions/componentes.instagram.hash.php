<?php
// INSTAGRAM
//******************************************************

/**
 * Funciona na hashtag. Deve retornar o vetor de imagens
 * com as imagens mais recentes relacionadas a hash digitada
 */
add_action('wp_ajax_nopriv_redux_hashtag_typeahead', 'redux_hashtag_typeahead');
add_action('wp_ajax_redux_hashtag_typeahead', 'redux_hashtag_typeahead');

function redux_hashtag_typeahead() {
	global $plandd_option;
	$value = $_REQUEST['thisValue'];
	$j = 0;

	$var = file_get_contents('https://api.instagram.com/v1/tags/'. $value .'/media/recent?access_token='. $plandd_option['instagram-token']);
	$var = json_decode($var);
	foreach($var->data as $user) {
		?>
		<li class="inst-th">
			<figure class="small-12 left rel">
				<img src="<?php echo $var->data[$j]->images->thumbnail->url; ?>" alt="<?php echo $var->data[$j]->user->username; ?>" />
			</figure>
			<a href="#" class="unthis" target="_blank"></a>
			<a href="<?php echo $var->data[$j]->link; ?>" class="el el-instagram" target="_blank"></a>
		</li>
		<?php
		$j++;
	}

	exit();
}

/**
 * Atualize as imagens da hashtag
 */
add_action('wp_ajax_nopriv_store_hash_imgs', 'store_hash_imgs');
add_action('wp_ajax_store_hash_imgs', 'store_hash_imgs');

function store_hash_imgs() {
	global $plandd_option;
	$obj = $_REQUEST['obj'];
	$len = count($obj);

	//Verifique se a opção existe
	if( !get_option( 'hashtag_object' ) ) {
		add_option( 'hashtag_object', $obj );
		exit();
	}

	//verifique se a opção é válida
	if($len <= 0) {
		exit();
	} else {
		//Os dados da opção serão substituidos pelos dados enviados
		update_option( 'hashtag_object', $obj );
	}

	exit();
}
?>