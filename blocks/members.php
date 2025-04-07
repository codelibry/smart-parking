<?php

$title = get_field('members__title');
$groups = get_field('members__groups');

if(!$groups || empty($groups)) {
  return;
}

?>

<div class="pt-100 pb-50 relative light-blue">
    <div class="grid-container relative z2">
        <?php if($title): ?>
            <div class="grid-x grid-padding-x pb-60">
                <div class="large-8 cell">
                    <h3><?php echo $title ?></h3>
                </div>
            </div>
        <?php endif; ?>

        <?php foreach ($groups as $group): 
            $group_title = $group['group-title'];
            $group_members = $group['group-members'];
        ?>
            <div class="grid-x grid-padding-x card-block mb-50">
                <?php if($group_title): ?>
                    <div class="large-3 medium-12 flex align-top cell">
                        <h2><?php echo $group_title ?></h2>
                    </div>
                <?php endif; ?>

                <div class="large-9 medium-12 cell">
                    <div class="grid-x grid-padding-x">
                        <?php foreach ($group_members as $member): 
                            $image = $member['image'];
                            $name = $member['name'];
                            $position = $member['position'];
                            $description = $member['description'];
                        ?>

                            <div class="large-6 medium-6 cell">
                                <div class="card profile large text-center">
                                    <img class="photo" <?php acf_image_attrs($image) ?>>
                                    <h4 class="mb-10">
                                        <?php echo $name ?>
                                        <small><?php echo $position ?></small>
                                    </h4>
                                    <p><small><?php echo $description ?></small></p>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
