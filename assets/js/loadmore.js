// source: https://rudrastyh.com/wordpress/load-more-posts-ajax.html

jQuery(function ($) {
  const ajax_object = (button, grid, data) => {
    return {
      url: vant_loadmore_params.ajaxurl,
      data: data,
      type: "POST",
      beforeSend: function (xhr) {
        button.text("Loading...")
        button.prop("disabled", true)
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
      complete: function (data) {
        button.prop("disabled", false)
      }
    }
  }

  $(".categ-container .all-articles-container #load-more").click(
    function () {
      var button = $(this)
      var grid = $(".articles-grid")
      var data = {
        action: "loadmore",
        query: vant_loadmore_params.posts,
        page: parseInt(vant_loadmore_params.current_page),
      }

      $.ajax(ajax_object(button, grid, data));
    }
  )

  $("#search-results #load-more").click(
    function () {
      var button = $(this)
      var grid = $(".articles-grid")
      var data = {
        action: "loadmore",
        query: vant_loadmore_params.posts,
        page: parseInt(vant_loadmore_params.current_page),
        from: 'search',
        s: $("#search-results #search-field input").val(),
      }

      $.ajax(ajax_object(button, grid, data));
    }
  )
})
