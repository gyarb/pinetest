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
    $('.pine_slider').slick()

    $('.slick-arrow').text('')

    let start = 1
    const end = $('.slick-slide:not(.slick-cloned, .slider)').length
    const endNum = getNumber(end)
    $('.pbar_number_end').text(endNum)
    setDataPBar(start, end)

    $('.pine_slider').on('afterChange', function(event, slick, currentSlide) {
      start = currentSlide + 1
      setDataPBar(start, end)
    })

    function getNumber(start) {
      return start.toString().padStart(2, 0)
    }

    function getHeightFiller(start, end) {
      return Math.round(start / end * 100)
    }

    function setDataPBar(start, end) {
      const heightFiller = getHeightFiller(start, end)
      const startNum = getNumber(start)
      $('.pbar_filler').css('height', heightFiller + '%')
      $('.pbar_number_start').text(startNum)
    }
  }

  // Initialize dynamic block preview (editor).
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=slider', initializeBlock)
  }

  // Initialize each block on page load (front end).
  $(document).ready(function() {
    $('.slider').each(function() {
      initializeBlock($(this))
    })
  })
})(jQuery)
