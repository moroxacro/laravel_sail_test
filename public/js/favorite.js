
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

    //通信が成功したとき
    })
    .done((res) => { // resの部分にコントローラーから返ってきた値が入る
    console.log(res);
        if (res.action == "登録") {
            $('.post-description p').removeClass('off');
            $(this).children().html(res.likes_count);
        } else {
            $('.post-description p').addClass('off');
            $(this).children().html(res.likes_count);
        }
    
    })
    .fail((error) => {
      //location.reload();
      console.log(error);
      console.log(error.statusText);
    });
});
