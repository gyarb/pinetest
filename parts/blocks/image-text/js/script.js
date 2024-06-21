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
    $('.calculator_select').each(function() {
      const _this = $(this),
        selectOption = _this.find('option'),
        selectOptionLength = selectOption.length,
        duration = 50

      _this.hide()
      _this.wrap('<div class="calculator_select"></div>')
      $('<div>', {
        class: 'new-select',
        text: _this.children('option:selected').text()
      }).insertAfter(_this)

      const selectHead = _this.next('.new-select')
      $('<div>', {
        class: 'new-select__list'
      }).insertAfter(selectHead)

      const selectList = selectHead.next('.new-select__list')
      for (let i = 0; i < selectOptionLength; i++) {
        $('<div>', {
          class: 'new-select__item',
          html: $('<span>', {
            text: selectOption.eq(i).text()
          })
        })
          .attr('data-value', selectOption.eq(i).val())
          .appendTo(selectList)
      }

      const selectItem = selectList.find('.new-select__item')
      selectList.slideUp(0)
      selectHead.on('click', function() {
        if (!$(this).hasClass('on')) {
          $(this).addClass('on')
          selectList.slideDown(duration)

          selectItem.unbind()
          selectItem.bind('click', function() {
            let chooseItem = $(this).data('value')

            $('select').val(chooseItem).attr('selected', 'selected')
            selectHead.text($(this).find('span').text())

            selectList.slideUp(duration)
            selectHead.removeClass('on')

            getDataCalculator()
          })
        } else {
          $(this).removeClass('on')
          selectList.slideUp(duration)
        }
      })
    })

    getDataCalculator()

    $('#val1, #val2').on('input', function() {
      getDataCalculator()
    })

    $('#sings').on('change', function() {
      getDataCalculator()
    })

    function getDataCalculator() {
      const val1 = $('#val1').val()
      const val2 = $('#val2').val()
      const sing = $('#sings').val()
      fetch(
        `/wp-json/api/v1/calculator/?val1=${val1}&val2=${val2}&sing=${sing}`
      )
        .then(response => response.json())
        .then(result => displayResult(result))
    }

    function displayResult(result) {
      $('#result').text(result)
    }
  }

  // Initialize dynamic block preview (editor).
  if (window.acf) {
    window.acf.addAction(
      'render_block_preview/type=image-and-text',
      initializeBlock
    )
  }

  // // Initialize each block on page load (front end).
  $(document).ready(function() {
    $('.calculator').each(function() {
      initializeBlock($(this))
    })
  })
})(jQuery)
