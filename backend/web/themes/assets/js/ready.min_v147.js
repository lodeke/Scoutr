"use strict";
//var $j = jQuery.noConflict();
function layoutsColors() {
    $(".sidebar").is("[data-background-color]") ? $("html").addClass("sidebar-color") : $("html").removeClass("sidebar-color"), $(".sidebar").is("[data-image]") ? ($(".sidebar").append("<div class='sidebar-background'></div>"), $(".sidebar-background").css("background-image", 'url("' + $(".sidebar").attr("data-image") + '")')) : ($(this).remove(".sidebar-background"), $(".sidebar-background").css("background-image", ""))
}
function legendClickCallback(a) {
    for (var e = (a = a || window.event).target || a.srcElement; "LI" !== e.nodeName;)e = e.parentElement;
    var s = e.parentElement, i = parseInt(s.classList[0].split("-")[0], 10), n = Chart.instances[i], o = Array.prototype.slice.call(s.children).indexOf(e);
    n.legend.options.onClick.call(n, a, n.legend.legendItems[o]), n.isDatasetVisible(o) ? e.classList.remove("hidden") : e.classList.add("hidden")
}
function readURL(a) {
    if (a.files && a.files[0]) {
        var e = new FileReader;
        e.onload = function (e) {
            $(a).parent(".input-file-image").find(".img-upload-preview").attr("src", e.target.result)
        }, e.readAsDataURL(a.files[0])
    }
}
function showPassword(a) {
    var e = $(a).parent().find("input");
    "password" === e.attr("type") ? e.attr("type", "text") : e.attr("type", "password")
}
$(function () {
    $('[data-toggle="tooltip"]').tooltip(), $('[data-toggle="popover"]').popover(), layoutsColors()
}), $(document).ready(function () {
    $(".sidebar").on("data-attribute-changed", function () {
        layoutsColors()
    });
    var a = $j(".sidebar .scrollbar-inner");
    a.length > 0 && a.scrollbar();
    var e = $(".messages-scroll.scrollbar-outer");
    e.length > 0 && e.scrollbar();
    var s = $(".tasks-scroll.scrollbar-outer");
    s.length > 0 && s.scrollbar();
    var i = $(".quick-scroll");
    i.length > 0 && i.scrollbar(), $(".scroll-bar").draggable();
    var n, o = !1, t = !1, l = !1, r = 0, c = 0, d = 0, g = 0;
    o || ((n = $(".sidenav-toggler")).click(function () {
        1 == r ? ($("html").removeClass("nav_open"), n.removeClass("toggled"), r = 0) : ($("html").addClass("nav_open"), n.addClass("toggled"), r = 1)
    }), o = !0);
    c || ((n = $(".quick-sidebar-toggler")).click(function () {
        1 == r ? ($("html").removeClass("quick_sidebar_open"), $(".quick-sidebar-overlay").remove(), n.removeClass("toggled"), c = 0) : ($("html").addClass("quick_sidebar_open"), n.addClass("toggled"), $('<div class="quick-sidebar-overlay"></div>').insertAfter(".quick-sidebar"), c = 1)
    }), $(".wrapper").mouseup(function (a) {
        var e = $(".quick-sidebar");
        a.target.className == e.attr("class") || e.has(a.target).length || ($("html").removeClass("quick_sidebar_open"), $(".quick-sidebar-toggler").removeClass("toggled"), $(".quick-sidebar-overlay").remove(), c = 0)
    }), $(".close-quick-sidebar").on("click", function () {
        $("html").removeClass("quick_sidebar_open"), $(".quick-sidebar-toggler").removeClass("toggled"), $(".quick-sidebar-overlay").remove(), c = 0
    }), c = !0);
    if (!t) {
        var m = $(".topbar-toggler");
        m.on("click", function () {
            1 == d ? ($("html").removeClass("topbar_open"), m.removeClass("toggled"), d = 0) : ($("html").addClass("topbar_open"), m.addClass("toggled"), d = 1)
        }), t = !0
    }
    if (!l) {
        var h = $(".btn-minimize");
        $("html").hasClass("sidebar_minimize") && (g = 1, h.addClass("toggled"), h.html('<i class="la la-ellipsis-v"></i>')), h.on("click", function () {
            1 == g ? ($("html").removeClass("sidebar_minimize"), h.removeClass("toggled"), h.html('<i class="la la-navicon"></i>'), g = 0) : ($("html").addClass("sidebar_minimize"), h.addClass("toggled"), h.html('<i class="la la-ellipsis-v"></i>'), g = 1), $(window).resize()
        }), l = !0
    }
    $(".sidebar").hover(function () {
        $("html").hasClass("sidebar_minimize") && $("html").addClass("sidebar_minimize_hover")
    }, function () {
        $("html").hasClass("sidebar_minimize") && $("html").removeClass("sidebar_minimize_hover")
    }), $(".nav-item a").on("click", function () {
        $(this).parent().find(".collapse").hasClass("show") ? $(this).parent().removeClass("submenu") : $(this).parent().addClass("submenu")
    }), $(".messages-contact .user a").on("click", function () {
        $(".tab-chat").addClass("show-chat")
    }), $(".messages-wrapper .return").on("click", function () {
        $(".tab-chat").removeClass("show-chat")
    }), $('[data-select="checkbox"]').change(function () {
        var target = $(this).attr("data-target");
        $(target).prop("checked", $(this).prop("checked"))
    }), $(".form-group-default .form-control").focus(function () {
        $(this).parent().addClass("active")
    }).blur(function () {
        $(this).parent().removeClass("active")
    })
}), $('.input-file-image input[type="file"').change(function () {
    readURL(this)
}), $(".show-password").on("click", function () {
    showPassword(this)
});
var containerSignIn = $(".container-login"), containerSignUp = $(".container-signup"), showSignIn = !0, showSignUp = !1;
function changeContainer() {
    1 == showSignIn ? containerSignIn.css("display", "block") : containerSignIn.css("display", "none"), 1 == showSignUp ? containerSignUp.css("display", "block") : containerSignUp.css("display", "none")
}
$("#show-signup").on("click", function () {
    showSignUp = !0, showSignIn = !1, changeContainer()
}), $("#show-signin").on("click", function () {
    showSignUp = !1, showSignIn = !0, changeContainer()
}), changeContainer(), $(".form-floating-label .form-control").keyup(function () {
    "" !== $(this).val() ? $(this).addClass("filled") : $(this).removeClass("filled")
});