var t = 0;

function show(e) {
    "" != t && clearTimeout(t), document.getElementById(e).style.display = "block"
}

function hide(e) {
    t = setTimeout("document.getElementById('" + e + "').style.display = 'none'", 1)
}

function closeflash() {
    return $("#messages").hide(), !1
}

function isValidEmailAddress(t) {
    return !!new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{1,20}$/i).test(t)
}

function validSearchForm() {
    valid = !0;
    var t = $("#search").val();
    return "" != t && void 0 !== t || ($("#search").css("border", "1px solid #f00"), valid = !1), valid
}

function validSearchMobileForm() {
    valid = !0;
    var t = $("#search-mobile").val();
    return "" != t && void 0 !== t || ($("#search-mobile").css("border", "1px solid #f00"), valid = !1), valid
}
var options = {
    url: "/data/searchProductCategoryBrand.json",
    categories: [{
        listLocation: "product",
        header: "--- Products ---"
    }, {
        listLocation: "category",
        header: "--- Categories ---"
    }, {
        listLocation: "brand",
        header: "--- Brands ---"
    }],
    list: {
        match: {
            enabled: !0
        },
        maxNumberOfElements: 10,
        onClickEvent: function() {
            $("form").submit()
        }
    },
    theme: "square"
};

function checkEmail(t) {
    var e = t.id;
    isValidEmailAddress(t.value) || ($("#" + e + "_error").show(), $("#" + e).addClass("error"))
}

function hideError(t) {
    var e = t.id;
    $("#" + e + "_error").hide(), $("#" + e).removeClass("error")
}

function validatePhone(t) {
    if ("" != t) {
        var e = t.split("").length;
        return !!(9 <= (e = t.length) && e <= 14 && /^[\-\+\(\)0-9 ]*$/.test(t))
    }
}

function isNumber(t) {
    if ("" != t) return regex = /^[0-9]+$/, !!t.match(regex)
}

function isWebsiteUrl(t) {
    return urlRule = /^(http:\/\/|https:\/\/|ftp:\/\/|www.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,50}(:[0-9]{1,50})?(\/.*)?$/i, !!/\(?(?:(http|https|ftp):\/\/)?(?:((?:[^\W\s]|\.|-|[:]{1})+)@{1})?((?:www.)?(?:[^\W\s]|\.|-)+[\.][^\W\s]{2,4}|localhost(?=\/)|\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})(?::(\d*))?([\/]?[^\s\?]*[\/]{1})*(?:\/?([^\s\n\?\[\]\{\}\#]*(?:(?=\.)){1}|[^\s\n\?\[\]\{\}\.\#]*)?([\.]{1}[^\s\?\#]*)?)?(?:\?{1}([^\s\n\#\[\]]*))?([\#][^\s\n]*)?\)?/.test(t)
}

function isIpUrl(t) {
    return !!t.match(/^(http:\/\/|https:\/\/|ftp:\/\/|www.)(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3})(.*)$/i)
}

function wishlistAdd(t) {
    $.ajax({
        url: "/cart/add-wishlist",
        type: "post",
        data: "product_id=" + t,
        dataType: "json",
        success: function(t) {
            t.success && addProductNotice(t.title, t.thumb, t.success, "success"), t.info && addProductNotice(t.title, t.thumb, t.info, "warning"), $("#wishlist-total").html(t.total), $("#wishlist-total").attr("title", t.total)
        }
    })
}

function addProductNotice(t, e, r, s) {
    $.jGrowl.defaults.closer = !1;
    var a = e + "<h3>" + r + "</h3>";
    $.jGrowl(a, {
        life: 4e3,
        header: t,
        speed: "slow",
        theme: s
    })
}

function checkPicode(t, e) {
    var r = $("#pincode").val();
    $.ajax({
        url: "/products/check-picode/productId/" + t,
        type: "post",
        dataType: "json",
        data: "pincode=" + r + "&cod=" + e,
        beforeSend: function() {
            $(".check-picode").text("loading")
        },
        complete: function() {
            $(".check-picode").text("Check")
        },
        success: function(t) {
            $(".alert-success").remove(), $(".alert-danger").remove(), t.error && $(".picode").after('<div class="alert alert-danger" style="padding: 2px;width: 250px;font-size: 10px;margin: 0px;"><i class="fa fa-exclamation-circle" style="font-size: 10px;margin-right: 0;"></i> ' + t.error + "</div>"), t.success && $(".picode").after('<div class="alert alert-success" style="padding: 2px;width: 250px;font-size: 12px;margin: 0px;"><img src="/images/cod_' + t.cod + '.jpg" height="18" title="Cash On Dilevery ' + t.codNot + 'Available" alt=""> &nbsp;&nbsp; <i class="fa fa-check-circle" style="font-size: 15px;margin-right: 0;"></i> ' + t.success + "</div>")
        }
    })
}

function writeReview(t) {
    $.ajax({
        url: "/products/write-review/productId/" + t,
        type: "post",
        dataType: "json",
        data: $("#form-review").serialize(),
        beforeSend: function() {
            $("#button-review").button("loading")
        },
        complete: function() {
            $("#button-review").button("reset")
        },
        success: function(t) {
            $(".alert-success").remove(), $(".alert-danger").remove(), t.error && $("#review").after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + t.error + "</div>"), t.success && ($("#review").after('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + t.success + "</div>"), $("input[name='name']").val(""), $("textarea[name='text']").val(""), $("input[name='rating']:checked").prop("checked", !1))
        }
    })
}
$("#search").easyAutocomplete(options), $("#search-mobile").easyAutocomplete(options), $(".easy-autocomplete-container").css("margin-top", "36px"), $(".easy-autocomplete-container").css("z-index", "999"), $(".reviews_button,.write_review_button").click(function() {
    var t = $(".producttab").offset().top;
    $("html, body").animate({
        scrollTop: t
    }, 1e3)
});
var cart = {
    add: function(t, e) {
        $.ajax({
            url: "/cart/add",
            type: "post",
            data: "product_id=" + t + "&quantity=" + (void 0 !== e ? e : 1),
            dataType: "json",
            beforeSend: function() {
                $("#cart > button").button("loading")
            },
            complete: function() {
                $("#cart > button").button("reset")
            },
            success: function(t) {
                $(".alert, .text-danger").remove(), t.error && (parent.addProductNotice(t.title, t.thumb, t.error, "error") || $(".breadcrumb").after('<div class="alert alert-error error">' + t.error + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>')), t.success && (parent.addProductNotice(t.title, t.thumb, t.success, "success") || $(".breadcrumb").after('<div class="alert alert-success success">' + t.success + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>'), setTimeout(function() {
                    $("#cart > button").html('<span id="cart-total"><i class="fa fa-shopping-cart"></i> ' + t.total + "</span>")
                }, 100), $("html, body").animate({
                    scrollTop: 0
                }, "slow"), $(".shopping_cart").load("/cart/shopping-cart"))
            },
            error: function(t, e, r) {
                alert(r + "\r\n" + t.statusText + "\r\n" + t.responseText)
            }
        })
    },
    update: function(t, e) {
        var r = $("#quantity" + t).val();
        $.ajax({
            url: "/cart/edit",
            type: "post",
            data: "productId=" + t + "&url=" + e + "&quantity=" + (void 0 !== r ? r : 1),
            dataType: "json",
            beforeSend: function() {
                $("#update" + t).text("updating..")
            },
            success: function(t) {
                "/cart" == t.url ? location = "/cart" : $(".shopping_cart").load("/cart/shopping-cart")
            },
            error: function(t, e, r) {
                alert(r + "\r\n" + t.statusText + "\r\n" + t.responseText)
            }
        })
    },
    remove: function(t, e) {
        $.ajax({
            url: "/cart/remove",
            type: "post",
            data: "productId=" + t + "&url=" + e,
            dataType: "json",
            beforeSend: function() {
                $("#remove" + t).text("wait..")
            },
            success: function(t) {
                "/cart" == t.url ? location = "/cart" : $(".shopping_cart").load("/cart/shopping-cart")
            },
            error: function(t, e, r) {
                alert(r + "\r\n" + t.statusText + "\r\n" + t.responseText)
            }
        })
    }
};

function pincode() {
    $(".alert-success").remove(), $(".alert-danger").remove(), $.ajax({
        url: "/cart/check-pincode",
        type: "post",
        dataType: "json",
        data: $("#form-pincode").serialize(),
        beforeSend: function() {
            $("#button-pincode").button("loading")
        },
        complete: function() {
            $("#button-pincode").button("reset")
        },
        success: function(t) {
            if (t.commonError && $(".pincode").html('<div class="alert alert-danger" style="padding: 2px;width: 250px;font-size: 10px;margin-left: -15px;"><i class="fa fa-exclamation-circle" style="font-size: 10px;margin-right: 0;"></i> ' + t.commonError + "</div>"), t.error)
                for (i = 0; i < t.error.length; i++) $("#pincode" + t.error[i].productId).after('<br><div class="alert alert-danger" style="padding: 2px;width: 250px;font-size: 10px;margin: 0px;"><i class="fa fa-exclamation-circle" style="font-size: 10px;margin-right: 0;"></i> ' + t.error[i].error + "</div>");
            if (t.success)
                for (j = 0; j < t.success.length; j++) $("#pincode" + t.success[j].productId).after('<br><div class="alert alert-success" style="padding: 2px;width: 250px;font-size: 12px;margin: 0px;"><img src="/images/cod_' + t.success[j].cod + '.jpg" height="18" title="Cash On Dilevery ' + t.success[j].codNot + 'Available" alt=""> &nbsp;&nbsp; <i class="fa fa-check-circle" style="font-size: 15px;margin-right: 0;"></i> ' + t.success[j].success + "</div>")
        }
    })
}

function buyNow(t, e, r) {
    $.ajax({
        url: "/cart/buy-now",
        type: "post",
        dataType: "json",
        data: "product_id=" + t + "&quantity=" + (void 0 !== e ? e : 1),
        beforeSend: function() {
            $(".buyNow" + t).button("loading")
        },
        complete: function() {
            $(".buyNow" + t).button("reset")
        },
        success: function(t) {
            t.success ? location.href = "/checkout" : location.href = r
        }
    })
}
$(".invoice").click(function() {
    var t = $("#orderId").text();
    $.ajax({
        url: "/user/send-invoice",
        type: "post",
        data: "orderId=" + t,
        dataType: "json",
        beforeSend: function() {
            $(".invoice").button("loading")
        },
        complete: function() {
            $(".invoice").button("reset")
        },
        success: function(t) {
            t.success && (parent.addProductNotice("", "", t.success, "success") || $(".breadcrumb").after('<div class="alert alert-success success">' + t.success + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>'), $("html, body").animate({
                scrollTop: 0
            }, "slow")), t.error && (parent.addProductNotice("", "", t.error, "error") || $(".breadcrumb").after('<div class="alert alert-error error">' + t.error + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>'), $("html, body").animate({
                scrollTop: 0
            }, "slow"))
        },
        error: function(t, e, r) {
            alert(r + "\r\n" + t.statusText + "\r\n" + t.responseText)
        }
    })
});

