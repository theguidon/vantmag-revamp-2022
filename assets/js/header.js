function vant_toggle_search() {
  jQuery(function ($) {
    $("header #search-bg-tint").toggleClass("active")
    $("header #search-bar-container").toggleClass("active")
  })
}

function vant_toggle_mobile_menu(isOpen) {
  jQuery(function ($) {
    $("header #close-icon").toggleClass("active")
    $("header #hamburger-icon").toggleClass("active")

    $("header #mobile-menu").toggleClass("active")

    $("html, body").toggleClass("no-scroll")
  })
}