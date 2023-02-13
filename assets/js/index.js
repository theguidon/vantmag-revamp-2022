function vant_index_on_tab_click(index) {
  jQuery(function ($) {
    const tab_ids = [
      'tv-and-film',
      'music',
      'food',
      'theater-and-the-arts',
      'hype',
      'hub',
      'vantage-point',
    ];

    $("#index #all-content #tabs > *").removeClass("active");
    $(`#index #all-content #tabs > *:nth-child(${index + 1})`).addClass("active");

    $("#index #all-content #content-heading").removeClass("active");
    $(`#index #all-content #content-heading:nth-child(${index + 1})`).addClass("active");

    $("#index #all-content .articles-container").removeClass("active");
    $(`#index #all-content #${tab_ids[index]}.articles-container`).addClass("active");
  });
}