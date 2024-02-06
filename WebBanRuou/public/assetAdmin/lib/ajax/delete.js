$(document).ready(function () {
    $('.delete-product').on('click', function (e) {
        e.preventDefault();
        var productId = $(this).data('id');

        $.ajax({
            type: 'DELETE',
            url: '/admin/delete-product-ajax/' + productId,
            success: function (data) {
                console.log(data.message);
                $(this).closest('tr').remove();
            },
            error: function (error) {
                console.log(error.responseJSON.message);
            }
        });
    });
});
