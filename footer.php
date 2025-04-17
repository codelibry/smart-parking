    <?php

      get_template_part('template-parts/footer/footer');

      wp_footer();    

      echo get_field('body_scripts_bottom', 'option');

    ?>
  </body>

  <?php
      echo get_field('footer_scripts', 'option');
  ?>

</html> 
