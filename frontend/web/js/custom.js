$(document).ready(function($) {
    'use strict';

    $('.hot').on("click", function(){
        var user = $(this).attr('data-user');
        var encounter = $('#encounter_'+user);
        var rotation = $('#encounter_'+user).attr("rotation");
        var rotate_id = $('#encounter_'+user).attr("rotate_id");
        var swipe = $('#SwipeStatus_'+user);
        var dataUrl = $('#encounter_'+user).attr('data-url');
        var next = parseInt(rotate_id) - 1;
        $('.rotate_'+next).css("transform",'rotate(0deg)');
        //for rotate next match //
        var response = ChooseLike(dataUrl);
        if(response == true)
        {
            swipe.addClass('active');
            encounter.addClass('like');
            encounter.delay(500).fadeOut();
        }
        else
        {
            //swipe.addClass('active');
            encounter.addClass('like');
            encounter.delay(500).fadeOut();
        }
        if(rotate_id == 0)
        {
            $("#encounter_wrapper").css("display",'block');
        }

    });
    $('.not').on("click", function(){
        var user = $(this).attr('data-user');
        var encounter = $('#encounter_'+user);
        var swipe = $('#SwipeStatus_'+user);
        swipe.text("Unliked");
        swipe.removeClass('liked');
        swipe.addClass('unliked');
        swipe.addClass('active');
        encounter.addClass('unlike');
        encounter.delay(500).fadeOut();
    });

    $('.iLikeIt').on("click", function(){
        var user = $(this).attr('data-user');
        var dataUrl = $(this).attr('data-url');
        var icon = $('#iLikeIt_icon_'+user);
        icon.html("<i class='la la-spinner la-spin'></i>");
        var isNew = $('#matchReq').attr('is-new');;


        $.get(dataUrl, function (response)
        {
            if(isNew)
            {
                $("#matchReqtitle").html('<h3>Processing...</h3>');
            }
            icon.html("<i class='la la-spinner la-spin'></i>");
        }).done(function (response) {
            icon.html("<i class='la la-check'></i>").delay(2000);
            if(isNew)
            {
                $("#matchReqtitle").html('<h3><i class="la la-check"></i> Done.</h3>');
                $('#matchReq').slideUp(500,'swing');
            }

        }).fail(function (response) {
            icon.html('<i class="la la-remove"></i>');
            return false;
        });

    }); //like ajax function

    $('.iDontIt').on("click", function(){
        var user = $(this).attr('data-user');
        var dataUrl = $(this).attr('data-url');
        var icon = $('#iLikeIt_icon_'+user);
        icon.html("<i class='la la-spinner la-spin'></i>");
        var isNew = $('#matchReq').attr('is-new');;


        $.get(dataUrl, function (response)
        {
            if(isNew)
            {
                $("#matchReqtitle").html('<h3>Processing...</h3>');
            }
            icon.html("<i class='la la-spinner la-spin'></i>");
        }).done(function (response) {
            icon.html("<i class='la la-remove'></i>").delay(2000);
            if(isNew)
            {
                $("#matchReqtitle").html('<h3><i class="la la-remove"></i> Done.</h3>');
                $('#matchReq').slideUp(500,'swing');
            }

        }).fail(function (response) {
            icon.html('<i class="la la-remove"></i>');
            return false;
        });

    }); //dislike ajax function

    $('.not').mouseover(function(){
        $('.rejIcon').removeClass('la-remove');
        $('.rejIcon').addClass("la-frown-o");
    });
    $('.not').mouseout(function(){
        $('.rejIcon').removeClass('la-frown-o');
        $('.rejIcon').addClass("la-remove");
    });
    $('#range_selection').change(function(){
        $(".range_preview").text($(this).val());
        $(".overlay_result").addClass('active');
        $('#FormNearbySearch').submit();
    });
    $('#age_from').change(function(){
        $("#age_from_preview").text($(this).val());
    });
    $('#age_to').change(function(){
        $("#age_to_preview").text($(this).val());
    });
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
    $('#chat_txt').focus(function(){
        $('.chat_form_txt').addClass('is-focused');
    });

    //chat message ajax
    $('.chat_text_send').on("click", function(){

        var reciever = $(this).attr('data-reciever');

        var msg = $('#chat_text_input').val();
        var action = $('#chat_form').attr('action')+'?reciever='+reciever+'&msg='+msg;
        $.ajax({
            url: action,
            type: 'GET',
            dataType: 'json'
            // data: 'id=10'
        }).done(function(response) {
            if(response.data.success)
            {
                var div = $(".chat-message-field");
                div.append(response.data.message);
                div.scrollTop(div.prop('scrollHeight'));
            }
            else
            {
                $('.chat-message-field').html(response.data.message);
                console.log(response.data.message);
            }
        }).fail(function(response)
        {
            if(response.data.success)
            {
                $('.chat-message-field').html(response.data.message);
            }
            else
            {
                $('.chat-message-field').html(response.data.message);
                console.log(response.data.message);
            }
        });
       // $('.chat_form_txt').addClass('is-focused');
    });

    $('.wlcmsrchinpt').on("click", function(){
        var inpt = $(this).val();
        var url = $('#wlcmsrchurl').val();
        $('#wlcmsrchCntnr').hide('slow');
        $('#wlcmsrchRsltwrp').removeClass('d-none');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',
             data: 'sex='+inpt
        }).done(function(response) {
            $('#wlcmsrchRslt').html(response);
        }).fail(function(response)
        {
            $('#wlcmsrchRslt').html("<p>We Cant Find Someone for you.</p>");

            console.log("error:");

        });
    });

    $('.membershipPaymentBtn').on("click", function(){
        var plan = $(this).attr('data-plan-id');
        var price = $(this).attr('data-plan-price');

        $('#payment_plan_id').val(plan);
        $('#payment_price').val(price);
        $('#do-payment').removeAttr('disabled');
        $('#do-payment').html('Yes, I want to be Vip <i class="la la-angle-double-right"></i>');
        $('.membershipPaymentBtn').text('Select');
        $(this).text('Selected For $'+price);
        $(this).removeClass('bg-smoke').removeClass('text-primary').addClass('bg-green').addClass('text-white');

    });
    $('#coinFrmInpt').keyup(function(){
        var coin = $(this).val();
        var multi = $(this).attr('data-multiple');
        var ammount = coin * multi;
        var perfact = ammount % '5';
        if( Math.floor(perfact) == perfact && $.isNumeric(coin))
        {
            $('.checkCorrectCoin').html('<h3> That`s Good</h3>');
            $('#do-payment').prop('disabled',false);
            $('#do-payment').html('Buy '+coin+' Coin now  <i class="la la-angle-double-right"></i>');
            $('#number_of_coin').val(coin);
            $('#total_price').val(ammount);
        }
        else
        {
            $('.checkCorrectCoin').html('<h3 style="color: red">Wrong!, You can buy coin with multiple of 10</h3>');
            $('#do-payment').prop('disabled',true);
            $('#do-payment').html('Enter Correct Amount <i class="la la-angle-double-right"></i>');
        }
        $('.chngCoin').text(coin);
        $('.chngprice').text(ammount);
    });

    $('.sendGift').on("click", function () {
        var userImage = $(this).attr('data-user-image');
        var userName = $(this).attr('data-user-name');
        var userId = $(this).attr('data-user-id');
        var url  = $('#gift-model-url').val();
        $('.sendGiftNow').text('Select a gift').prop('disabled',true);
        //setup perameter
        $('#gift-model-user-img').attr('src',userImage);
        $('#gift-model-user-name').text(userName);
        $('#gift-model-content').html('<h3> <i class="la la-spinner la-spin"></i> Loading...</h3>');
        $('#gift-model-user-id').val(userId);
        //
        // alert('working');
        $("#giftModel").modal({show : true});

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
           // data: 'sex='+inpt
        }).done(function(response) {
            $('#gift-model-content').html(response);
        }).fail(function(response)
        {
            $('#gift-model-content').html("<p>We Cant Find Someone for you.</p>");

            console.log("error:");

        });

    });

    $('.sendGiftNow').on("click", function(){
        var recieverId = $('#gift-model-user-id').val();
        var giftId = $('#gift-sent-id').val();
        var url = $('#gift-send-url').val()+'?giftId='+giftId+'&reciever='+recieverId;
        $('.sendGiftNow').html(' <i class="la la-spinner la-spin"></i> Sending');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json'
        }).done(function(response) {
            $('.sendGiftNow').html(' <i class="la la-check"></i> Sent Successfully');
        }).fail(function(response)
        {
            $('.sendGiftNow').html(' <i class="la la-remove"></i> Sending Fail');
            console.log("error:");

        });
    });
});

function openMenu() {
    var screen = window.screen.availWidth;
    var siftScrren = "50%";
    if(screen > 720)
    {
        var siftScrren = "50%";
    };
    if(screen < 720 && screen > 620){
        var siftScrren = "80%";
    }
    if(screen < 620){
        var siftScrren = "100%";
    }
    document.getElementById("mobile_menu").style.width = siftScrren;
    $(".overlay_result").addClass('active');
    $(".overlay_result").css("right","212px");
    document.getElementById("overlay_result").style.marginRight = "50%";
}//open menu responsive
function closeMenu(){
    document.getElementById("mobile_menu").style.width = "0";
    $(".overlay_result").css('right','0px');

    document.body.style.backgroundColor = "white";
    $(".overlay_result").removeClass('active');
}//close menu responsive


function openNav() {
    var screen = window.screen.availWidth;
    var siftScrren = "50%";
    if(screen > 720)
    {
        var siftScrren = "50%";
    };
    if(screen < 720 && screen > 620){
        var siftScrren = "80%";
    }
    if(screen < 620){
        var siftScrren = "100%";
    }



    document.getElementById("mySidenav").style.width = siftScrren;
    $(".overlay_result").addClass('active');
    $(".overlay_result").css("right","212px");
    document.getElementById("overlay_result").style.marginRight = "50%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    $(".overlay_result").css('right','0px');

    document.body.style.backgroundColor = "white";
    $(".overlay_result").removeClass('active');
}
function closeChat() {
    document.getElementById("ChatBox").style.width = "0";
}
function openChat(id) {

    var screen = window.screen.availWidth;
    var siftScrren = "40%";
    if(screen > 720)
    {
        var siftScrren = "30%";
    };
    if(screen < 720 && screen > 620){
        var siftScrren = "80%";
    }
    if(screen < 620){
        var siftScrren = "100%";
    }
    document.getElementById("ChatBox").style.width = siftScrren;
    var msg = '';
    var url = $('#loadMsgUrl').val();
    $('.chat_text_send').attr('data-reciever',id);
    var tmp = "<div style='margin-top: 30%' align='center'><h1><i class='la la-spinner la-spin la-5px'></i></h1><h2>Loading Message</h2><p>We tring to fetch your message. please wait</p></div>";
    var NOMsg = "<div style='margin-top: 30%' align='center'><h1><i class='la la-frown-o la-2x'></i></h1><h2>Sorry No Message Found</h2><p>No Conversation Start between You, Please send new message in text section below </p></div>";

    $('.chat-message-field').html(tmp);
    $.ajax({
        url: url,
        type: 'GET',
       // dataType: 'json',
        data: 'reciever='+id
    }).done(function(response){
        if(response.data.success)
        {
            $('.chat-message-field').html(response.data.message);
            $('#current').val(response.data.total);
        }
        else
        {
            $('.chat-message-field').delay(1000).html(response).fadeout(500);
        }
        var div = $("#scrollTop");
        div.scrollTop(div.prop('scrollHeight'));
        console.log(JSON.stringify(response));
    }).fail(function(response)
    {
        alert('fail');
        console.log(JSON.stringify(response));
        console.log("error:");
        return response;

    });
    setInterval(function(){ CheckUpdate(id); }, 3000);

}
function CheckUpdate(reciever)
{
    var current  = $('#current').val();
    var checkUrl = $('#checkUrl').val()+reciever;

    $.get(checkUrl,function(data)
    {


    }).done(function(data)
    {
        if(current < data)
        {

            updateMsg(reciever,data);
            $('#current').val(data);
        }
        else
        {
            return true;
        }

    }).fail( function()
    {
        $('#display-msg').append("<p>Connection Error...</p>");
    } );

};
function updateMsg(id,data)
{
    var msg = '';
    var url = $('#loadMsgUrl').val();
    $('.chat_text_send').attr('data-reciever',id);
    var tmp = "<div style='margin-top: 30%' align='center'><h1><i class='la la-spinner la-spin la-5px'></i></h1><h2>Loading Message</h2><p>We tring to fetch your message. please wait</p></div>";
    var NOMsg = "<div style='margin-top: 30%' align='center'><h1><i class='la la-frown-o la-2x'></i></h1><h2>Sorry No Message Found</h2><p>No Conversation Start between You, Please send new message in text section below </p></div>";
    $('#current').val(data);
    $.ajax({
        url: url,
        type: 'GET',
        // dataType: 'json',
        data: 'reciever='+id
    }).done(function(response){
        if(response.data.success)
        {
            var div = $(".chat-message-field");
            div.append(response.data.message);
            div.scrollTop(div.prop('scrollHeight'));
        }
        else
        {

        }

    }).fail(function(response)
    {
        alert('fail');
        console.log(JSON.stringify(response));
        console.log("error:");
        return response;

    });
}
function ChooseLike(url)
{
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json'
       // data: 'id=10'
    }).done(function(response)
    {
        return response;
       // return response;
    }).fail(function(response)
    {
        return response;
    });


}

function firstSuggestion(url)
{
    var msg = '';

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json'
        // data: 'id=10'
    }).done(function(response) {
        return response;
    }).fail(function(response)
    {

        console.log("error:");
        return response;

    });
}

function SelectGift(id){
    var Gid = id;
    var container = $('#gift_'+Gid);
    var giftName = container.attr('data-gift-name');
    var giftImg = container.attr('data-gift-image');
    var giftCoin = container.attr('data-gift-coin');
    var totalCoin = $('#gift-model-point').val();
    var remaining = totalCoin - giftCoin;

    if(totalCoin < giftCoin)
    {
        $('#gift-model-gift-preview').attr('src',giftImg);
        $('#gift-model-gift-preview-name').text(giftName);
        $('#gift-model-gift-preview-charge').text('You have no enough Coin to send this gift');
        $('.sendGiftNow').text('No Enough Coin');
        $('.sendGiftNow').prop('disabled',true);

    }
    else
    {
        $('#gift-model-gift-preview').attr('src',giftImg);
        $('#gift-model-gift-preview-name').text(giftName);
        $('#gift-model-gift-preview-charge').text(giftCoin);
        $('#gift-model-remain-coin').text(remaining);
        $('#gift-sent-id').val(Gid);
        $('.sendGiftNow').html('SEND <i class="la la-send-o"></i>');
        $('.sendGiftNow').prop('disabled',false);
    }

};



