// source: https://rudrastyh.com/wordpress/load-more-posts-ajax.html

jQuery(function ($) {
  $(".categ-container .all-articles-container #load-more").click(
    function () {
      var button = $(this)
      var grid = $(".articles-grid")
      var data = {
        action: "loadmore",
        query: vant_loadmore_params.posts,
        page: parseInt(vant_loadmore_params.current_page),
      }

      $.ajax({
        url: vant_loadmore_params.ajaxurl,
        data: data,
        type: "POST",
        beforeSend: function (xhr) {
          button.text("Loading...")
        },
        success: function (data) {
          if (data) {
            grid.append(data)
            button.text("Show me more")
            vant_loadmore_params.current_page++
          } else {
            button.remove();
          }
        },
      });
    }
  );
});
