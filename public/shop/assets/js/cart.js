$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function AddCart(id) {
    var qty = $('#number').val();
    $.ajax({
        url: 'dat-hang/them-sp-vao-gio-hang/' + id,
        type: 'GET',
        dataType: "json",
        data: {
            qty: qty
        },
    }).done(function (response) {
        RenderCart(response.html);
        if (response.message) {
            alertify.success('Không đủ số lượng');
        } else {
            alertify.success('Thêm sp thành công');

        }
    });
}

$(document).on("click", ".del-icon i", function () {
    var id = $(this).data("id");
    $.ajax({
        url: 'dat-hang/xoa-sp-gio-hang/' + id,
        type: 'GET',
        dataType: "json",
    }).done(function (response) {
        RenderCart(response.html);
        $('#list-cart').html(response.html2);
        alertify.success('Xóa sản phẩm thành công');
    });
});

function RenderCart(response) {
    $("#item-cart").html(response);
    $("#total-quanty-show").text($("#total-quanty-cart").val());
}
//// --------------------------- ///

function removeViewCart(id) {
    $.ajax({
        url: 'dat-hang/xoa-sp-gio-hang/' + id,
        type: 'GET',
        dataType: 'json'
    }).done(function (response) {
        RenderCart(response.html);
        RenderViewCart(response.html2);
        alertify.success('Xóa sản phẩm thành công');
    });

}

function SaveListItemCart(id) {
    $.ajax({
        url: '/dat-hang/cap-nhat-gio-hang/' + id + '/ ' + $("#quanty-item-" + id).val(),
        type: 'GET',
        dataType: 'json'
    }).done(function (response) {
        RenderCart(response.html);
        RenderViewCart(response.html2);
        alertify.success('Đã cập nhật sản phẩm ');
    });
}

function RenderViewCart(response) {
    $("#list-cart").empty();
    $("#list-cart").html(response);
    // quantity change js
    $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
    $('.pro-qty').append('<span class="inc qtybtn">+</span>');
    $('.qtybtn').on('click', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
}
