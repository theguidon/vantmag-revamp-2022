function vant_toggle_search() {
  jQuery(function ($) {
    $("header #search-bg-tint").toggleClass("active")
    $("header #search-bar-container").toggleClass("active")
  })
}