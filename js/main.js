jQuery(document).ready(function($) {
  let showClass = 'show_mobile_menu'
  let container = $('.header_top_right')
  $('.mobile_menu_button .items').on('click', function() {
    if (container.hasClass(showClass)) {
      container.removeClass(showClass)
    } else {
      container.addClass(showClass)
    }
  })
})
