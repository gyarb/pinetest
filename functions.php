<?php

function p_a($arr)
{
  echo '<pre>';
  echo print_r($arr);
  echo '</pre>';
}

add_action('wp_enqueue_scripts', 'theme_enqueue_fn');
function theme_enqueue_fn()
{
  wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/styles/css/main.css', array(), filemtime(get_theme_file_path('/styles/css/main.css')));
  wp_enqueue_script('theme-script', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), filemtime(get_theme_file_path('/js/main.js')), true);
}

add_action('after_setup_theme', function () {
  register_nav_menus([
    'footer_menu_1' => 'Footer menu 1',
    'footer_menu_2' => 'Footer menu 2',
    'footer_bootom_menu' => 'Footer bottom menu'
  ]);
});

add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init()
{
  if (function_exists('acf_register_block_type')) {
    acf_register_block_type(array(
      'name'              => 'slider',
      'title'             => __('Slider'),
      'description'       => __('Slider block.'),
      'category'          => 'design',
      'mode'              => 'preview',
      'render_template'   => get_stylesheet_directory() . '/parts/blocks/slider/slider.php',
      'enqueue_assets' => function () {
        wp_enqueue_style('block-slider', get_stylesheet_directory_uri() . '/parts/blocks/slider/styles/css/style.css', array(), filemtime(get_theme_file_path('/parts/blocks/slider/styles/css/style.css')));
        wp_enqueue_script('slick-min', get_stylesheet_directory_uri() . '/parts/blocks/slider/slick/slick.min.js', array(), '', true);
        wp_enqueue_script('block-image-text', get_stylesheet_directory_uri() . '/parts/blocks/slider/js/script.js', array('jquery', 'slick-min'), filemtime(get_theme_file_path('/parts/blocks/slider/js/script.js')), true);
      },
      'example'           => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'slider' => array(
              'is_example' => 1,
              'image' => get_stylesheet_directory_uri() . '/parts/blocks/slider/images/slider.jpg'
            )
          )
        )
      )
    ));
    acf_register_block_type(array(
      'name'              => 'image-and-text',
      'title'             => __('Image + Text'),
      'description'       => __('Image and Text block.'),
      'category'          => 'design',
      'mode'              => 'preview',
      'render_template'   => get_stylesheet_directory() . '/parts/blocks/image-text/image-text.php',
      'enqueue_assets' => function () {
        wp_enqueue_style('block-image-text', get_stylesheet_directory_uri() . '/parts/blocks/image-text/styles/css/style.css', array(), filemtime(get_theme_file_path('/parts/blocks/image-text/styles/css/style.css')));
        wp_enqueue_script('block-image-text', get_stylesheet_directory_uri() . '/parts/blocks/image-text/js/script.js', array('jquery'), filemtime(get_theme_file_path('/parts/blocks/image-text/js/script.js')), true);
      },
      'example'           => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'image-and-text' => array(
              'is_example' => 1,
              'image' => get_stylesheet_directory_uri() . '/parts/blocks/image-text/images/image-text.jpg'
            )
          )
        )
      )
    ));
    acf_register_block_type(array(
      'name'              => 'accordion',
      'title'             => __('Accordion'),
      'description'       => __('Accordion block.'),
      'category'          => 'design',
      'mode'              => 'preview',
      'render_template'   => get_stylesheet_directory() . '/parts/blocks/accordion/accordion.php',
      'enqueue_assets' => function () {
        wp_enqueue_style('block-accordion', get_stylesheet_directory_uri() . '/parts/blocks/accordion/styles/css/style.css', array(), filemtime(get_theme_file_path('/parts/blocks/accordion/styles/css/style.css')));
        wp_enqueue_script('jquery-ui', '//code.jquery.com/ui/1.13.3/jquery-ui.js', array(), '', true);
        wp_enqueue_script('block-accordion', get_stylesheet_directory_uri() . '/parts/blocks/accordion/js/script.js', array('jquery', 'jquery-ui'), filemtime(get_theme_file_path('/parts/blocks/accordion/js/script.js')), true);
      },
      'example' => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'accordion' => array(
              'is_example' => 1,
              'image' => get_stylesheet_directory_uri() . '/parts/blocks/accordion/images/accordion.jpg'
            )
          )
        )
      )
    ));
  }
}

add_action('rest_api_init', 'theme_calculator_rest_api_init_fn');
function theme_calculator_rest_api_init_fn()
{
  register_rest_route('api/v1', '/calculator/', array(
    'methods' => 'GET',
    'callback' => 'theme_get_data_calculator_fn',
    'permission_callback' => '__return_true'
  ));
}

function theme_get_data_calculator_fn($data)
{
  $val_1 = (int) $data['val1'];
  $val_2 = (int) $data['val2'];
  $sing = (int) $data['sing'];

  switch ($sing) {
    case 1:
      $result = $val_1 + $val_2;
      break;
    case 2:
      $result = $val_1 - $val_2;
      break;
    case 3:
      $result = $val_1 * $val_2;
      break;
    case 4:
      $result = $val_2 !== 0 ? round($val_1 / $val_2) : 'Error';
      break;
    default:
      $result = 'Error';
  }

  return $result;
}
