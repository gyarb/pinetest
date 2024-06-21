<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'accordion-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'accordion';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

  <?php
  $description = get_field('description');
  $title = get_field('title');
  $accordion = get_field('accordion');
  ?>

  <?php if (isset($accordion['is_example'])) : ?>

    <img src="<?php echo $accordion['image']; ?>" style="width: 100%; height: auto;" alt="Accordion block.">

  <?php else : ?>

    <?php if (!$accordion) : ?>
      <div class="hello_block" style="background: #f5f5f5; padding: 15px;">Hello! Your Accordion block here ...</div>
    <?php else : ?>
      <div class="wrap-accordion">
        <div class="accordion container">
          <div class="col col_text">
            <div class="description">
              <?php echo $description; ?>
            </div>
            <h1 class="title">
              <?php echo $title; ?>
            </h1>
          </div>
          <div class="col col_accordion">
            <?php if ($accordion) : ?>
              <div id="accordion" class="accordion_items">
                <?php foreach ($accordion as $item) : ?>
                  <h3 class="item_title"><?php echo $item['accordeon_item']['heading']; ?></h3>
                  <div class="item_text">
                    <p><?php echo $item['accordeon_item']['text']; ?></p>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

    <?php endif; ?>
  <?php endif; ?>

</div>