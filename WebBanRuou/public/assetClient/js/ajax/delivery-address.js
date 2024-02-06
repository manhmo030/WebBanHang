$(document).ready(function () {
    getDistricts();

    //checkbox
    $('#trangthai').on('click', function(){
        var trangthai = $(this).val();
        if(trangthai == 'default'){
            alert('Để hủy địa chỉ mặc định này, vui lòng chọn địa chỉ khác làm địa chỉ mặc định mới');
            $(this).prop('checked', true);
        }
    });

    $('#delete-delivery-address').on('click', function(e){
        var trangthai = $('#trangthai').val();
        if(trangthai == 'default'){
            alert('Không thể xóa địa chỉ mặc định');
            e.preventDefault();
        }
    })
});

function getDistricts() {
    var provinceId = $('#province').val(); //lấy id tỉnh đang được chọn
    var districtId = $('#maqh').val(); //lấy id huyện cũ được gửi lên
    $.ajax({
        type: "GET",
        url: "/user/get-districts/" + provinceId,
        success: function (data) {
            // Thêm các option vào dropdown quận/huyện
            $("#district").empty();//Xóa tất cả các option hiện tại
            $('#ward').empty();
            $("#district").append('<option></option>');
            $.each(data, function (index, district) {
                //so sánh id các huyện trong option với id huyện cũ
                var selected = (districtId !== undefined && district.maqh == districtId ? 'selected' : '');
                $('#district').append('<option value="' + district.maqh + '" ' + selected + '>'
                + district.tenquanhuyen + '</option>');
            });
            getWards();
        }

    });

}

function getWards() {
    // Lấy giá trị của quận/huyện được chọn
    var districtId = $('#district').val();
    var wardId = $('#xaid').val();
    // Gửi Ajax request để lấy danh sách phường/xã từ server
    $.ajax({
        type: "GET",
        url: "/user/get-wards/" + districtId,
        success: function (data) {
            // Thêm các option vào dropdown phường/xã
            $("#ward").empty();
            $("#ward").append('<option></option>');
            $.each(data, function (index, ward) {
                var selected = (wardId !== undefined && ward.xaid == wardId ? 'selected' : '');
                $("#ward").append('<option value="' + ward.xaid + '" ' + selected + '>' + ward.tenxaphuongthitran + '</option>');
            });
        }
    });
}
