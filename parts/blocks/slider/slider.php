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
$id = 'slider-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

  <?php $slider_data = get_field('slider'); ?>

  <?php if (isset($slider_data['is_example'])) : ?>

    <img src="<?php echo $slider_data['image']; ?>" style="width: 100%; height: auto;">

  <?php else : ?>

    <?php if (!$slider_data) : ?>
      <div class="hello_block" style="background: #f5f5f5; padding: 15px;">Hello! Your Slider block here ...</div>
    <?php else : ?>

      <div class="wrap-pine_slider">
        <div class="pine_slider">
          <?php foreach ($slider_data as $item) : ?>
            <div class="slide" style="background-image: url(<?php echo $item['image']; ?>)">
              <div class="slide_content container">
                <?php if ($item['title']) : ?>
                  <div class="title"><?php echo $item['title']; ?></div>
                <?php endif; ?>
                <?php if ($item['text']) : ?>
                  <div class="text"><?php echo $item['text']; ?></div>
                <?php endif; ?>
                <?php if ($item['link']) : ?>
                  <div class="link"><a href="<?php echo $item['link']['link_url']; ?>" class="link_button"><?php echo $item['link']['link_text']; ?></a></div>
                <?php endif; ?>
                <?php if ($item['properties']) : ?>
                  <ul class="properties">
                    <?php foreach ($item['properties'] as $p_item) : ?>
                      <li><?php echo $p_item['property']; ?></li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </div>
            </div>

          <?php endforeach; ?>
        </div>
        <div class="pbar">
          <span class="pbar_number pbar_number_start"></span>
          <div class="pbar_line"><span class="pbar_filler"></span></div>
          <span class="pbar_number pbar_number_end"></span>
        </div>
      </div>

    <?php endif; ?>
  <?php endif; ?>

</div>