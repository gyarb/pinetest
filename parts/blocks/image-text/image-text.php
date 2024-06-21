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
$id = 'image-and-text-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'image-and-text';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

  <?php
  $location = get_field('location');
  $image = get_field('image');
  $title = get_field('title');
  $description = get_field('description');
  $indicators = get_field('indicators');
  $calculator = get_field('calculator');
  $result_text = get_field('result_text');

  $example = get_field('image-and-text');
  ?>

  <?php if (isset($example['is_example'])) : ?>

    <img src="<?php echo $example['image']; ?>" style="width: 100%; height: auto;" alt="Image and Text block.">

  <?php else : ?>

    <?php if (!$image && !$title) : ?>
      <div class="hello_block" style="background: #f5f5f5; padding: 15px;">Hello! Your Image and Text block here ...</div>
    <?php else : ?>

      <div class="wrap-image_text">
        <div class="image_text container <?php echo 'image_location_' . $location ?>">
          <div class="col col_image">
            <div class="image">
              <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
            </div>
          </div>
          <div class="col col_text">
            <div class="col_text_content">
              <?php if ($description) : ?>
                <div class="description"><?php echo $description; ?></div>
              <?php endif; ?>
              <?php if ($title) : ?>
                <div class="title"><?php echo $title; ?></div>
              <?php endif; ?>
              <?php if ($indicators) : ?>
                <div class="indicators">
                  <?php foreach ($indicators as $indicator) : ?>
                    <?php
                    $show_class = '';
                    foreach ($indicator['visibility'] as $v_item) {
                      $show_class .= ' show-' . $v_item;
                    }
                    ?>
                    <div class="col show-none<?php echo $show_class; ?>">
                      <span class="indicator_amount"><?php echo $indicator['amount']; ?></span>
                      <span class="indicator_description"><?php echo $indicator['description']; ?></span>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
              <?php if ($calculator) : ?>
                <div class="calculator">
                  <div class="title"><?php echo $calculator['title']; ?></div>
                  <form class="calculator_form" action="" method="">
                    <input type="text" id="val1" value="1200">
                    <select name="sings" id="sings" class="calculator_select">
                      <?php foreach ($calculator['signs'] as $key_sing => $sing) : ?>
                        <option value="<?php echo $sing['value']; ?>" <?php echo !$key_sing ? 'selected="selected"' : ''; ?>><?php echo $sing['label']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <input type="text" id="val2" value="1100">
                  </form>
                  <div class="result">
                    <span class="result_text"><?php echo $calculator['result_text']; ?>:</span>
                    <span class="result_data" id="result"></span>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

    <?php endif; ?>
  <?php endif; ?>

</div>