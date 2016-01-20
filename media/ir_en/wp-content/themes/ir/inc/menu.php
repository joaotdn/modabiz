          <figure class="aleft show-for-medium-up">
            <div class="small-12 text-center">
              <a href="<?php echo home_url(); ?>">
                <?php if(is_home()): ?>
                <img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="">
                <?php else: ?>
                <img src="<?php echo get_template_directory_uri();?>/images/logo-white.png" alt="">
                <?php endif; ?>
              </a>
            </div>
          </figure>
          <figure class="aright show-for-medium-up">
            <div class="small-12 text-center">
              <?php
                $page = (get_page_by_title('About Us')) ? get_page_by_title('About Us') : get_page_by_title('Sobre nós');
                if(isset($page)):
              ?>
              <a href="<?php if(!is_home()): echo home_url(); else: echo get_page_link($page->ID); endif; ?>">
                <?php if(!is_home()): echo 'Home'; else: echo $plandd_option['btn-about']; endif; ?>
              </a>
              <?php endif; ?>
            </div>
          </figure>