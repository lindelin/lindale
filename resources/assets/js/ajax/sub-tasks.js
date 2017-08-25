$(function()
{
    $('#sub-task-form').submit(function(event) {
        // HTMLでの送信をキャンセル
        event.preventDefault();
        $.subTaskApi.formData = $(this);
        $.subTaskApi.apiAction();

    });
});

$.subTaskApi = {

    /**
     * AJAXに送信するために溜めるデータ
     */
    ajaxOption : {},

    /**
     * AJAXに送信するために溜めるデータ
     */
    ajaxData : {},

    /**
     * FORMに入力されているデータ
     */
    formData : {},

    results : {},

    /**
     * AjaxでAPIをたたく
     */
    apiAction : function()
    {
        // 送信ボタンを取得
        var $button = $.subTaskApi.formData.find('button');

        $.ajaxSetup({

            url: $.subTaskApi.formData.attr('action'),
            type: $.subTaskApi.formData.attr('method'),
            data: $.subTaskApi.formData.serialize(),
            global : false,
            cache : false,
            async : false,

            // 送信前
            beforeSend: function(xhr, settings) {
                // ボタンを無効化し、二重送信を防止
                $button.attr('disabled', true);
            },
            // 応答後
            complete: function(xhr, textStatus) {
                // ボタンを有効化し、再送信を許可
                $button.attr('disabled', false);
            },
            success : function(resp){

                console.log(resp);
                if(resp.status === 'NG'){

                }else{
                }
            }
        });

        $.ajax();

        return false;
    }
};
