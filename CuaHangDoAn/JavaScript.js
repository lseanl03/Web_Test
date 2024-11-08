//Check đăng ký
function CheckDangKy() {
    var userName = document.querySelector('input[name="user_name"]').value;
    var password = document.querySelector('input[name="password"]').value;
    var rePassword = document.querySelector('input[name="re_password"]').value;

    if (userName === "" || password === "" || rePassword === "") {
        alert("Vui lòng nhập đầy đủ thông tin.");
        return false;
    }
    else if(password !== rePassword){
        alert("Mật khẩu nhập lại không trùng khớp, vui lòng nhập lại.");
        return false; 
    }
    return true;
}

//Check đăng nhập
function CheckDangNhap() {
    var userName = document.querySelector('input[name="user_name"]').value;
    var password = document.querySelector('input[name="password"]').value;

    if (userName === "" || password === "") {
        alert("Vui lòng nhập đầy đủ thông tin.");
        return false;
    }
    return true;
}
//Chuyển màu button đăng ký
document.addEventListener("DOMContentLoaded", function(){
    var loginButton = document.querySelector(".btn_register");
    var color = loginButton.style.backgroundColor;
    
    loginButton.addEventListener("mouseenter", function(){
        loginButton.style.backgroundColor  = "orange"; 
    });

    loginButton.addEventListener("mousedown", function(){
        loginButton.style.backgroundColor  = "red"; 
    });

    loginButton.addEventListener("mouseleave", function(){
        loginButton.style.backgroundColor  = color; 
    });

});

//Chuyển màu button đăng nhập
document.addEventListener("DOMContentLoaded", function(){
    var loginButton = document.querySelector(".btn_login");
    var color = loginButton.style.backgroundColor;

    loginButton.addEventListener("mouseenter", function(){
        loginButton.style.backgroundColor  = "orange"; 
    });

    loginButton.addEventListener("mousedown", function(){
        loginButton.style.backgroundColor  = "red"; 
    });
    
    loginButton.addEventListener("mouseleave", function(){
        loginButton.style.backgroundColor  = color; 
    });
});

//Check thêm loại đồ ăn
function CheckThemLoaiDoAn() {
    var input = document.querySelector('#them_loai_do_an').value; 
    if (input === "") {
        alert("Bạn chưa nhập thông tin thêm loại đồ ăn.");
        return false;
    }
    return true;
}


//Check sửa loại đồ ăn
function CheckSuaLoaiDoAn() {
    var select = document.querySelector('select[name="ten_loai_do_an_cu"]').value;
    var input = document.querySelector('#sua_loai_do_an').value; 
    if (select === "" || input === "") {
        alert("Bạn chưa nhập thông tin sửa loại đồ ăn.");
        return false;
    }
    return true;
}

//Check xóa loại đồ ăn
function CheckXoaLoaiDoAn() {
    var select = document.querySelector('select[name="ten_loai_do_an_xoa"]').value;
    if (select === "") {
        alert("Bạn chưa nhập thông tin xóa loại đồ ăn.");
        return false;
    }

    return true;
}

//Check thêm đồ ăn
function CheckThemDoAn() {
    var select = document.querySelector('select[name="ten_loai_do_an"]').value;
    var ten_do_an = document.querySelector('input[name="ten_do_an"]').value;
    var gia = document.querySelector('input[name="gia"]').value;
    var mo_ta = document.querySelector('input[name="mo_ta"]').value;

    if (select === "" || ten_do_an === "" || gia === "" || mo_ta === "") {
        alert("Vui lòng nhập đầy đủ thông tin.");
        return false;
    }
    return true;
}

//Check sửa đồ ăn
function CheckSuaDoAn() {
    var select = document.querySelector('select[name="ten_do_an_cu"]').value;
    var ten_do_an = document.querySelector('input[name="ten_do_an_moi"]').value;
    var gia = document.querySelector('input[name="gia_moi"]').value;
    var mo_ta = document.querySelector('input[name="mo_ta_moi"]').value;

    if (select === "" || ten_do_an === "" || gia === "" || mo_ta === "") {
        alert("Vui lòng nhập đầy đủ thông tin.");
        return false;
    }
    return true;
}

//Check xóa đồ ăn
function CheckXoaDoAn() {
    var select = document.querySelector('select[name="ten_do_an_xoa"]').value;

    if (select === "") {
        alert("Vui lòng nhập đầy đủ thông tin.");
        return false;
    }
    return true;
}
function abc(){
    
}
//Cập nhập tên đồ ăn khi chọn đồ ăn cần sửa
function UpdateValue(){
    var select = document.querySelector('select[name="ten_do_an_cu"]');
    var option = select.options[select.selectedIndex];

    document.querySelector('input[name="ten_do_an_moi"]').value = option.value;
}
//Tải thông tin khi reset trang Loại đồ ăn
function OnLoadDoAn() {

    document.querySelector('select[name="ten_do_an_cu"]').selectedIndex = -1;
    document.querySelector('select[name="ten_loai_do_an"]').selectedIndex = -1;
    document.querySelector('select[name="ten_do_an_xoa"]').selectedIndex = -1;
}
//Tải thông tin khi reset trang Đồ ăn

function OnLoadLoaiDoAn(){
    document.querySelector('select[name="ten_loai_do_an_cu"]').selectedIndex = -1;
    document.querySelector('select[name="ten_loai_do_an_xoa"]').selectedIndex = -1;
}

//Đặt món ăn
function DatDoAn(ten_do_an) {

    var check = confirm("Bạn có muốn đặt đồ ăn " + ten_do_an + " không?");
    if (check) {
        alert(`Bạn đã đặt thành công đồ ăn ` + ten_do_an) + `!`;
        return true;
    } 
    else {
        return false;
    }
}
//Bỏ chọn đồ ăn
function BoChonDoAn(ten_do_an) {

    var check = confirm("Bạn có chắc chắn muốn bỏ chọn đồ ăn " + ten_do_an + " không?");
    if (check) {
        alert(`Bạn đã bỏ chọn thành công đồ ăn ` + ten_do_an) + `!`;
        return true;
    } 
    else {
        return false;
    }
}

//Đổi đơn hàng
function DoiDonHangAn(ten_do_an) {

    var check = confirm("Bạn có muốn đổi đồ ăn " + ten_do_an + " không?");
    if (check) {
        return true;
    } 
    else {
        return false;
    }
}
//Đổi đồ ăn
function DoiDoAn(ten_do_an_cu, ten_do_an_moi) {

    var check = confirm("Bạn có chắc chắn muốn đổi đồ ăn" +ten_do_an_cu+ " thành "+ ten_do_an_moi+ " không?");
    if (check) {
        alert(`Bạn đã đổi thành công đồ ăn` + ten_do_an_cu + ` thành ` + ten_do_an_moi+ `!`);
        return true;
    } 
    else {
        return false;
    }
}

//Thanh toán
function ThanhToan(tong_tien) {
    if(tong_tien > 0){
        var check = confirm("Tổng số tiền bạn phải trả là "+tong_tien+" bạn chắc chắn muốn thanh toán chứ!?");
        if (check) {
            alert(`Thanh toán thành công, Cảm ơn và hẹn gặp lại bạn!`);
            return true;
        } 
        else {
            return false;
        }
    }
    else{
        alert(`Bạn chưa đặt mua đồ ăn nào!`);
        return false;
    }
}

//Bỏ chọn tất cả đồ ăn
function BoChonTatCaDoAn(tong_tien){
    if(tong_tien > 0){
        var check = confirm("Bạn có chắc muốn bỏ chọn tất cả đồ ăn đã đặt mua chứ!?");
        if (check) {
            alert(`Đã bỏ chọn tất cả thành công`);
            return true;
        } 
        else {
            return false;
        }
    }
    else{
        alert(`Bạn chưa đặt mua đồ ăn nào!`);
        return false;
    }

}

