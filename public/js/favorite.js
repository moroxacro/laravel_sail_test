
var url = window.location.href;
//URLからユーザー名を取得
function get_user_name(url) {
    var reg=new RegExp("https?://.*?/(.*?)(?=/)");
    //console.log(url.match(reg)[1]);
    return url.match(reg)[1];
}

function get_post_id(url) {
    var reg=new RegExp("https?://.*?/.*(?<=/)(.*)");
    //console.log(url.match(reg)[1]);
    return url.match(reg)[1];
}

$(document).on('click','.favorite_btn',function(e){
    e.stopPropagation();
    var $this = $(this),
        user_name = get_user_name(url),
        post_id = get_post_id(url);

    //console.log(user_name);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        });
    $.ajax({
        type: 'POST',
        url: '/ajax_post',
        dataType: 'json',
        data: { 
            'user_name': user_name,
            'post_id': post_id,
        },

    }).done(function(res){
        console.log(res);
        location.reload();
    }).fail(function() {
      location.reload();
      console.log(error.statusText);
    });
  });