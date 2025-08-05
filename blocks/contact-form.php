<?php

$title = get_array_value($args, 'title', get_field('contact-us__title'));
$form_id = get_array_value($args, 'form_id', get_field('contact-us__form'));

if(!$form_id) {
  return;
}

?>

<div class="pt-100 pb-100 black" id="contact-form-anchor">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="large-6 large-offset-3 medium-10 medium-offset-1 text-center cell">
                <?php if($title): ?>
                    <div><?php echo $title ?></div>
                <?php endif; ?>
            </div>
        </div>
        
        <?php echo do_shortcode("[contact-form-7 id='$form_id']"); ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const fileInputs = document.querySelectorAll('input[type="file"]');

  fileInputs.forEach(function (fileInput) {
    const labelWrapper = fileInput.closest('label');

    // Skip if the file input isn't inside a label
    if (!labelWrapper) return;

    // Create the filename display element
    const filenameDisplay = document.createElement('span');
    filenameDisplay.className = 'filename-display';
    labelWrapper.appendChild(filenameDisplay);

    // Add change event to update filename
    fileInput.addEventListener('change', function () {
      if (fileInput.files.length > 0) {
        labelWrapper.classList.add('file-attached');

        // Show first 8 characters of the file name only
        const fullName = fileInput.files[0].name;
        filenameDisplay.textContent = fullName.slice(0, 20) + '...';
      } else {
        labelWrapper.classList.remove('file-attached');
        filenameDisplay.textContent = '';
      }
    });
  });
});
</script>
