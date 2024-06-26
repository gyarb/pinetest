;(function($) {
  /**
     * initializeBlock
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */

  var initializeBlock = function($block) {
    $block.find('#accordion').accordion()
  }

  // Initialize dynamic block preview (editor).
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=accordion', initializeBlock)
  }

  // Initialize each block on page load (front end).
  $(document).ready(function() {
    $('.accordion').each(function() {
      initializeBlock($(this))
    })
  })
})(jQuery)
