var ppp = -1; // Post per page
var pageNumber = 1;

function load_posts() {
  pageNumber++;
  var str =
    "&pageNumber=" + pageNumber + "&ppp=" + ppp + "&action=load_all_creations";
  $.ajax({
    type: "POST",
    dataType: "html",
    url: ajax_posts.ajaxurl,
    data: str,
    success: function (data) {
      var $data = $(data);
      if ($data.length) {
        $("#creations_list").html($data);
      } else {
        $(".see_all").attr("disabled", true);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
    },
  });
  return false;
}

$(document).ready(function () {
  $(".see_all").on("click", function () {
    load_posts();
    $(this).remove();
  });
});
