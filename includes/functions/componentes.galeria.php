<?php
/**
 * Funciona no perfil Instagram. Deve retornar o vetor de imagens
 * com as imagens mais recentes relacionadas a hash digitada
 */
add_action('wp_ajax_nopriv_get_video_galeria', 'get_video_galeria');
add_action('wp_ajax_get_video_galeria', 'get_video_galeria');

function get_video_galeria() {
	global $plandd_option;
	$video_id = $_GET['video_id'];
	$video = get_field('galeria_video',$video_id);

	echo '<div class="divide-20"></div><div class="flex-video small-12 left">'. $video .'</div>';

	exit();
}

//AutoPlay no video
function Oembed_youtube_no_title($html,$url,$args){
    $url_string = parse_url($url, PHP_URL_QUERY);
    parse_str($url_string, $id);
    if (isset($id['v'])) {
        return '<iframe width="'.$args['width'].'" height="'.$args['height'].'" src="http://www.youtube.com/embed/'.$id['v'].'?autoplay=1&vq=hd1080&rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>';
    }
    return $html;
}
add_filter('oembed_result','Oembed_youtube_no_title',10,3);
?>