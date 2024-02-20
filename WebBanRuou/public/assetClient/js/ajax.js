$(document).ready(function () {
    // Xử lý sự kiện khi nhấn nút "Add to Cart"
    $(".add-to-cart").click(function (e) {
        e.preventDefault(); // Ngăn chặn chuyển hướng khi nhấn vào thẻ a

        var productId = $(this).data("product-id");

        // Thực hiện AJAX để thêm vào giỏ hàng
        $.ajax({
            type: "POST",
            url: "/user/add-cart-ajax",
            data: {
                product_id: productId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                alert(response.message);

            },
            error: function (error) {
                if (error.status === 401) {
                    window.location.href = "/user/login"; // Chuyển hướng đến trang đăng nhập
                }
            }
        });
    });
    //xóa giỏ hàng
    $(".delete-to-cart").click(function (e) {
        e.preventDefault(); // Ngăn chặn chuyển hướng khi nhấn vào thẻ a
        var clickedButton = $(this);
        var cartDetailId = $(this).data("cartdetail-id");

        //Thực hiện AJAX để thêm vào giỏ hàng
        $.ajax({
            type: "POST",
            url: "/user/delete-cart-ajax",
            data: {
                cartDetail_id: cartDetailId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // alert(response.message);
                clickedButton.closest(".product").remove();
                updateSubTotal(response.subtotal);
            },

        });
    });

    //update giỏ hàng
    $('.update-to-cart').on('click', function (e) {
        e.preventDefault(); // Ngăn chặn hành vi mặc định của nút
        var cartItems = {};
        // Lặp qua tất cả các sản phẩm trong giỏ hàng và thu thập thông tin cần thiết
        $('.pro-qty').each(function () {
            var itemId = $(this).data('cartdetail-id');
            var quantity = $('#quantity-' + itemId).val();
            cartItems[itemId] = quantity;
        });

        $.ajax({
            method: 'POST',
            url: '/user/update-cart-ajax',
            data: {
                cart_items: cartItems,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // alert(response.message);
                updatedCartItems(response.updatedCartItems);
                updateSubTotal(response.subTotal);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});

function updateSubTotal(newSubTotal) {
    $('#subTotal').text(newSubTotal);  // cách dưới cũng đc
    // var subTotalElement = document.getElementById('subTotal');
    // subTotalElement.innerHTML = '$' + newSubTotal;
}

function updatedCartItems(updatedCartItems) {
    updatedCartItems.forEach(function (cartItem) {
        // Lấy thông tin cần thiết từ mục giỏ hàng
        var cartItemId = cartItem.mactgiohang;
        var total = cartItem.total;

        // Cập nhật thông tin của mục giỏ hàng trên giao diện người dùng
        $('#total-' + cartItemId).text(total);
    });
}
