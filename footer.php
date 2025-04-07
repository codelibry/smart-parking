    <?php

      get_template_part('template-parts/footer/footer');

      wp_footer();    

      the_field('body_scripts_bottom', 'option');

    ?>
  </body>
</html> 
