$(document).ready(function () {
    getDistricts();

    $(".editable").on("blur", function () {
        var feeshipId = $(this).data('feeship-id');
        var feeshipValue = $(this).text().trim();

        $.ajax({
            type: 'POST',
            url: "/admin/update-feeship/" + feeshipId,
            data: {
                feeship_value: feeshipValue,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (response) {
                alert(response.message);
            },
        });
    });
});

function getDistricts() {
    // Lấy giá trị của tỉnh/thành phố được chọn
    var provinceId = $("#province").val();

    // Gửi Ajax request để lấy danh sách quận/huyện từ server
    $.ajax({
        type: "GET",
        url: "/admin/get-districts/" + provinceId,
        success: function (data) {
            // Thêm các option vào dropdown quận/huyện
            $("#district").empty();//Xóa tất cả các option hiện tại
            $("#district").append('<option></option>');
            $.each(data, function (index, district) {
                $("#district").append('<option value="' + district.maqh + '">' + district.tenquanhuyen + '</option>');
            });

            // Gọi hàm để lấy danh sách phường/xã của quận/huyện mặc định
            getWards();
        }
    });
}

function getWards() {
    // Lấy giá trị của quận/huyện được chọn
    var districtId = $("#district").val();

    // Gửi Ajax request để lấy danh sách phường/xã từ server
    $.ajax({
        type: "GET",
        url: "/admin/get-wards/" + districtId,
        success: function (data) {
            // Thêm các option vào dropdown phường/xã
            $("#ward").empty();
            $("#ward").append('<option></option>');
            $.each(data, function (index, ward) {
                $("#ward").append('<option value="' + ward.xaid + '">' + ward.tenxaphuongthitran + '</option>');
            });
        }
    });
}
