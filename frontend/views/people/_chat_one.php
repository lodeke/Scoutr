<?php
/**
 * Created by PhpStorm.
 * User: Mayank Singh
 * Date: 1/31/2019
 * Time: 11:42 AM
 */
?>

<div class="chat-box">
    <div class="mCustomScrollbar ps ps--theme_default ps--active-y" style="overflow-y: scroll" data-ps-id="d7876b8d-8438-654d-a729-8085d3d34730">
        <ul class="notification-list chat-message chat-message-field">

        </ul>
        <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
        <div class="ps__scrollbar-y-rail" style="top: 0px; height: 150px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 46px;"></div></div>
    </div>

    <div class="chat_footer">
        <form id="chat_form" class="chat_form_master" action="<?= \yii\helpers\Url::toRoute('message/send-msg') ?>" method="get">
            <input type="hidden" name="reciever" value="1">
            <div class="row no-gutters" style="padding: 15px;">
                <textarea id="chat_text_input" class="chat_text_input col-10 form-control" style="padding: 15px;"  placeholder="hi.. there!"></textarea>
                <button type="button"  data-reciever="1" class="chat_text_send col btn btn-success btn-sm align-content-center justify-content-center">
                    <i class="la la-send"></i>
                </button>
            </div>

        </form>
    </div>
</div>