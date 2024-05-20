function vant_index_on_tab_click(slug) {
  jQuery(function ($) {
    $("#index #all-content .tab-selection button").removeClass("active")
    $(`#index #all-content .tab-selection button#${slug}`).addClass("active")
  })
}