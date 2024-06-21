</main>
</div>

<footer id="footer" role="contentinfo">

  <div class="container">
    <div class="footer_content">
      <div class="logo">
        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/images/logo-white.png'; ?>"></a>
      </div>
      <div class="footer_menus">
        <div class="footer_menu">
          <h4 class="footer_menu_title"><?php echo wp_get_nav_menu_name('footer_menu_1'); ?></h4>
          <?php wp_nav_menu([
            'theme_location' => 'footer_menu_1'
          ]); ?>
        </div>
        <div class="footer_menu have_button">
          <div>
            <h4 class="footer_menu_title"><?php echo wp_get_nav_menu_name('footer_menu_2'); ?></h4>
            <?php wp_nav_menu([
              'theme_location' => 'footer_menu_2'
            ]); ?>
          </div>
          <div class="footer_button">
            <a href="./" class="link_button">
              Book a tour
            </a>
          </div>
        </div>
      </div>
      <div class="footer_button_mobile">
        <a href="./" class="link_button">
          Book a tour
        </a>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="footer_bottom">
      <div class="copy">
        <span class="copy_text">&copy; <?php echo date('Y'); ?></span>
        <?php wp_nav_menu([
          'theme_location' => 'footer_bootom_menu'
        ]); ?>
      </div>
      <div class="social">
        <?php
        $social_arr = [
          'instagram' => [
            'image' => 'icon-instagram.png',
            'url' => '/'
          ],
          'facebook' => [
            'image' => 'icon-facebook.png',
            'url' => '/'
          ],
          'twitter' => [
            'image' => 'icon-twitter.png',
            'url' => '/'
          ],
          'pinterest' => [
            'image' => 'icon-pinterest.png',
            'url' => '/'
          ],
        ]
        ?>
        <?php foreach ($social_arr as $social_key => $social_item) : ?>
          <a href="<?php echo $social_item['url']; ?>">
            <img src="<?php echo get_stylesheet_directory_uri() . '/images/' . $social_item['image']; ?>" alt="<?php echo $social_key; ?>">
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>