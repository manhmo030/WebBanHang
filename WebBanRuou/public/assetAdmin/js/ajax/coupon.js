$(document).ready(function () {
    $('#delete-coupon').on('click', function (e) {
        e.preventDefault();
        var selectedItems = $("input[name='items[]']:checked").map(function () {
            return $(this).val();
        }).get();
        if(selectedItems.length == 0){
            alert('Bạn cần chọn ít nhất 1 mục để xóa');
        }
        $.ajax({
            method: 'POST',
            url: '/admin/delete-coupon-ajax',
            data: {
                selected_items: selectedItems,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $(".danhsach[data-coupon-id='" + selectedItems[i] + "']").remove();
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

});
