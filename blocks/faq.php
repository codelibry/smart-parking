<?php
/*
 * Block: FAQ
 */

$title = get_array_value($args, 'title', get_sub_field('faq__title'));

$faqs = get_array_value($args, 'faqs', get_sub_field('faq__list'));

if(!$faqs) {
  return get_template_part('template-parts/error/invalid-block', '', [
    'title' => 'FAQ list is empty'
  ]);
}

?>

<section class="faq | section">
  <div class="container">
    <div class="container container--narrow | mx-auto text-center">
      <?php if($title): ?>
        <div class="faq__title | flow">
          <?php echo $title ?>
        </div>
      <?php endif; ?>
    </div>

    <div class="faq__list | mt-36">
      <?php foreach ($faqs as $faq): ?>
        <details class="accordion">
          <summary class="accordion__button">
            <h4 class="heading-6">
              <?php echo $faq['title'] ?>
            </h4>
            <div class="accordion__icon">
              <?php echo get_inline_svg('accordion-icon.svg') ?>
            </div>
          </summary>
          <div class="accordion__dropdown">
            <div class="accordion__content">
              <?php echo $faq['content'] ?>
            </div>
          </div>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
