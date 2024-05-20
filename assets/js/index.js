function vant_index_on_tab_click(slug) {
  jQuery(function ($) {
    $("#index #all-content .tab-selection button").removeClass("active")
    $(`#index #all-content .tab-selection button#${slug}`).addClass("active")

    $("#index #all-content .tab.articles-grid").removeClass("active")
    $(`#index #all-content #${slug}-tab`).addClass("active")

    $("#index #all-content .load-more").removeClass("active")
    $(`#index #all-content #${slug}-load-more`).addClass("active")
  })
}