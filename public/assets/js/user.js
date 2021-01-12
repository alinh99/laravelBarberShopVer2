var user = [{
        id: "USER1",
        username: "admin",
        name: "Nguyễn Thanh Bình",
        email: "binhnt.it28@gmail",
        password: "1",
        role: "admin",
    },
    {
        id: "USER2",
        username: "user",
        name: "Nguyễn Thị Việt Ánh",
        email: "vietanh7200@gmail",
        password: "1",
        role: "user",
    },
];

// đẩy mảng user vào local
var saveUser = function() {
    localStorage.setItem("listUser", JSON.stringify(user));
};
//lấy list user
var loadUser = function() {
    user = JSON.parse(localStorage.getItem("listUser"));
};
if (localStorage.getItem("listUser") != null) {
    loadUser();
}
saveUser();
// chức năng đăng kí
var signIn = function() {
    var User = {
        id: "USER" + parseInt(user.length + 1),
        username: document.getElementById("usernamed").value,
        name: document.getElementById("hotend").value,
        password: document.getElementById("passwordd").value,
        email: document.getElementById("emaild").value,
        address: "",
        role: "user",
    };
    alert("Đăng kí thành công");
    user.push(User);
    localStorage.setItem("listUser", JSON.stringify(user));
    // Save();
    //  window.location.href ='signup.html';
    window.location.reload();
};
// chức năng cập nhật thông tin của người dùng

var signupArr = [];
var saveLogin = function() {
    localStorage.setItem("signup", JSON.stringify(signupArr));
};

var loadLogin = function() {
    signupArr = JSON.parse(localStorage.getItem("signup"));
};
if (localStorage.getItem("signup") != null) {
    loadLogin();
}
saveLogin();

var signUp = function() {
    var k = -1;
    // var User1 ="";
    for (var i in user) {
        var data = JSON.parse(JSON.stringify(user[i]));

        if (
            document.getElementById("name").value == data.username &&
            document.getElementById("password").value == data.password &&
            data.role == "admin"
        ) {
            k = i;
            alert("đăng nhập thành công");

            window.location.href = "./admin/index.html";
        }
        if (
            document.getElementById("name").value == data.username &&
            document.getElementById("password").value == data.password &&
            data.role == "user"
        ) {
            alert("đăng nhập thành công");
            k = i;
            window.location.href = "../profile.html";

            var userLogin = {
                username: document.getElementById("name").value,
                password: document.getElementById("password").value,
            };

            signupArr.push(userLogin);

            localStorage.setItem("signup", JSON.stringify(signupArr));

            saveLogin();
        }
    }

    if (k == -1) {
        alert("đăng nhập không thành công");
    }
};

function getName() {
    for (var i in user) {
        if (String(user[i].username) == String(signupArr[0].username)) {
            document.getElementById("matkhau").innerHTML =
                '<button class="btn btn-outline-danger" onclick="changePassword(' +
                i +
                ')">Đổi</buttoon>';
            document.getElementById("thanh2").innerHTML = user[i].name;
            document.getElementById("username").value = user[i].username;
            document.getElementById("hoten").value = user[i].name;
            document.getElementById("email").value = user[i].email;


            document.getElementById("update").innerHTML =
                '<button class="btn btn-primary form-btn" onclick="updateInfo(' +
                i +
                ')" type="submit">SAVE</button>';
        }
    }
    document.getElementById("doimk").innerHTML =
        '<button class="mt-2 btn btn-outline-danger"  type="button" data-toggle="modal" data-target="#changePassword">Đổi password</button>';

    document.getElementById("username").setAttribute("disabled", "disabled");
}
getName();

function updateInfo(i) {
    alert("Cập nhật thành công");
    var h = user[i];

    (h.name = document.getElementById("hoten").value),
    (h.email = document.getElementById("email").value),
    localStorage.setItem("listUser", JSON.stringify(user));
    window.location.reload();
}

function changePassword(i) {
    var k = user[i];

    if (
        document.getElementById("oldpass").value == k.password &&
        document.getElementById("newpass").value ==
        document.getElementById("changepass").value
    ) {
        alert("đổi mật khẩu thành công");

        (k.password = document.getElementById("newpass").value),
        localStorage.setItem("listUser", JSON.stringify(user));
        window.location.reload();
    }

    if (document.getElementById("oldpass").value != k.password) {
        alert("mật khẩu cũ không đúng");
    }
    if (
        document.getElementById("newpass").value !=
        document.getElementById("changepass").value
    ) {
        alert("nhập lại mật khẩu không đúng");
    }
}

function checkLogin() {
    var check = signupArr;

    if (check != "") {
        window.location.href = "../profile.html";
    }

    if (check == "") {
        window.location.href = "../sign-in.html";
    }
}

function logOut() {
    signupArr = [];
    localStorage.setItem("signup", JSON.stringify(signupArr));
    saveLogin();
}

function nangCap() {
    alert(
        "Chức nâng đã được nâng cấp, sử dụng 'The Contenful Delivery' API rồi nha :D"
    );
}