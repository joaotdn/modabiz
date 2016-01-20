		<nav class="small-12">
            <ul class="inline-list no-margin text-center">
            	<?php 
            		$facebook = $plandd_option['inst-facebook'];
            		$instagram = $plandd_option['inst-instagram'];

            		if(!empty($facebook))
            			echo '<li><a href="'. $facebook .'" title="Facebook" class="primary" target="_blank">Facebook</a></li>';
            		if(!empty($instagram))
            			echo '<li><a href="'. $instagram .'" title="Instagram" class="primary" target="_blank">Instagram</a></li>';
            	 ?>
            </ul>
        </nav>