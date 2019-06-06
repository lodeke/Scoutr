//=========================================================//
//        MASTER FORM AJAX FUNCTION
//=========================================================//
$(document).ready(function($) {
    $(".master-form").submit(function(event) {
        event.preventDefault(); // stopping submitting
        event.stopImmediatePropagation();
        var dataVar = $(this).serializeArray();
        var url = $(this).attr('action');
        var msg = '';

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: dataVar
        }).done(function(response) {
                if (response.data.success == true) {
                    msg = "Record Added Successfully";

                    if(response.data.onlyform == true)
                    {
                        commonAlert(msg,'success');
                    }
                    else
                    {
                        commonAlert(msg,'success');
                        $('#addRowModal').modal('hide');
                    }
                   // alert(msg);
                }
            }).fail(function(response) {
                // console.log("error: "+response);
                $('#addRowModal').modal('hide');
                //response.data.success
                msg = "Record Failed to insert. Error : ";;

              //  commonAlert(response.data.message,'warning');
               // console.log(msg);
                console.log(JSON.stringify(response));
            });
        return false;

    });



    //delete reord function
    $(".record-delete").on("click", function(){
        var del_url = $(this).attr("record-delete-url");
        var status = $(this).attr("record-delete-status"); //demo
        var msg = $(this).attr("record-delete-msg");
        var child = $(this).attr("record-delete-child");
        var data_key = $(this).attr("record-data-key");

        if(status == "active")
        {
            if(child == 1) // check if any child entry/record associated with parent record
            {
                // an record associated with this record so cant delete this time
                var msg = "Some item associate with this record.  You Cannot Delete this `Record` this time. Please Remove/Change the Child record of relevant item.";
                commonAlert(msg,"warning");
            }
            else
            {
                $.get(del_url, function (response)
                {
                    //var $toastContent = $('<span><i class="fa fa-check-circle-o"></i> &nbsp;' + data + '</span>');
                    // Materialize.toast($toastContent, 3000, 'toost-unfriend yellow darken-3 white-text');
                }).done(function (response) {

                //   msg = "Done";
                    commonAlert(msg,"success");
                    // $('#'+hide_id).hide(1000,'swing');
                    $('tr[data-key='+data_key+']').hide(1000,'swing');

                }).fail(function (response) {
                  //  msg = "Failed";
                    commonAlert(JSON.stringify(response.responseText),"warning");
                  //  $('#'+hide_id).html("<td colspan='5' style='padding: 15px 20px;'><i class='fa fa-trash'></i> Fail to delete.</td>");

                }).error(function (response) {
                    console.log(response);

                });

            }
        }
        else
        {
            if(status == "demo")
            {
                var msg = "its demo version you cannot delete any record";
            }

            commonAlert(msg,"warning")
        }

    });

    $(".display-home-page").on("change", function(){
        var data_value = $(this).attr("data-status");
        var modalId = $(this).attr("data-display-id");

        if(data_value == "enable")
        {
            data_value = "disable";
        }
        else
        {
            data_value = "enable";

        }
        $(this).attr("data-status",data_value);

        var url = $(this).attr("data-display-url")+"?status="+data_value+"&id="+modalId;
        $.get(url, function (response)
        {
            $("#display_"+modalId).html("Proccessing...");
        }).done(function (response) {
            $("#display_"+modalId).text("");
            msg = "Status Change to "+data_value;
            commonAlert(msg,"success");



        }).fail(function (response) {
            $("#display_"+modalId).text("Error...");
            commonAlert(JSON.stringify(response.responseText),"warning");
        }).error(function (response) {
            console.log(response);

        });
    });


//footer content settings
    $("#footercontent-type").on("change", function(){
        var Value = $("#footercontent-type").val();
        var saveUrl = $("#footerContentU").val()+'?type='+Value;//
        $.get(saveUrl, function (response)
        {
            //var $toastContent = $('<span><i class="fa fa-check-circle-o"></i> &nbsp;' + data + '</span>');
            // Materialize.toast($toastContent, 3000, 'toost-unfriend yellow darken-3 white-text');
        }).done(function (response) {
            $('#displayFooterC').html(response);
        }).fail(function (response) {

        }).error(function (response) {
            console.log(response);

        });

    });

});

//=========================================================//
//        MASTER RECORD DELETE
//=========================================================//
function displayEnable()
{
    var confirms = confirm("Are you sure?");
    var url = "";
    if(confirms == true)
    {
        var msg = "Some item associate with this record.  You Cannot Delete this `Record` this time. Please Remove/Change the Child record of relevant item.";
        commonAlert(msg,"warning");
    }
    else
    {
        alert("cancel");

    }
}
function  delete_record(id,hide_id,status)
{
    var del_url = $('.record-delete').attr("record-delete-url");
    $.ajax({
        url: del_url,
        beforeSend: function( xhr ) {
            $('#'+hide_id).html("<td colspan='5' style='padding: 15px 20px;'><i class='fa fa-circle-o-notch fa-spin'></i> Deleting..</td>");
        }
    }).done(function( data )
    {
        $('#'+hide_id).remove();

    }).fail(function ()
    {

        $('#'+hide_id).html("<td colspan='5' style='padding: 15px 20px;'><i class='fa fa-trash'></i> Fail to delete.</td>");

    });
}



//=========================================================//
//        COMMON ALERT SUCCESS AND FAIL START HERE
//=========================================================//

function commonAlert(msg,type)
{
    var SweetAlert2Demo = function() {

        //== Demos
        var initDemos = function() {
            //== Sweetalert Demo 1
            swal(type+"!!!", msg, {
                icon : type,
                title: type,
                text: msg,
                type: type,
                buttons: {
                    confirm: {
                        className : 'btn btn-'+type
                    }
                }
            });


        };

        return {
            //== Init
            init: function()
            {
                initDemos();
            }
        }
    }();

//== Class Initialization
    jQuery(document).ready(function() {
        SweetAlert2Demo.init();
    });
};

