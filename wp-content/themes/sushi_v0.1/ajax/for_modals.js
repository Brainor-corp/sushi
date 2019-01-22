

//offeredit_modal
$(document).ready(function(){
    $(document).on('click', '.ajax_to_modal', function (e) {
        e.preventDefault();
        var m_url=$(this).data("amAjaxUrl");
        var m_success=$(this).data("amAjaxSuccess");
        var m_modal=$(this).data("amAjaxModal");
        var m_data=$(this).data("amAjaxData");

        $.ajax({
            type: 'post',
            url: m_url,
            data: {ajax_data:m_data},//здесь мы передаем стандартным пост методом без сериализации. В конечном скрипте данные будут лежать в $_POST['ajax_data']
            cache: false,
            beforeSend: function() {
                // document.getElementById('ajax-loading-gif').style.display = 'block';
            },
            success: function(html){
                // document.getElementById('ajax-loading-gif').style.display = 'none';
                $(m_success).html(html);
                $(m_modal).foundation('open');
            }
        });
    });
});



