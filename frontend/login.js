const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
}); 

const registerForm = document.querySelector('.sign-up form');

registerForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn chặn form submit mặc định

    const email = registerForm.querySelector('input[type="email"]').value;
    const password = registerForm.querySelector('input[type="password"]').value;

    // Kiểm tra xem các trường thông tin đã được điền đầy đủ
    if (email.trim() === '' || password.trim() === '') {
        alert('Vui lòng điền đầy đủ thông tin để đăng ký.');
        return;
    }

    // Kiểm tra xem email đã tồn tại trong localStorage chưa
    if (localStorage.getItem(email)) {
        alert('Email đã tồn tại. Vui lòng sử dụng email khác.');
        return;
    }

    // Lưu thông tin tài khoản vào localStorage
    localStorage.setItem(email, JSON.stringify({ email: email, password: password }));

    alert('Đăng ký thành công!');
    registerForm.reset(); // Reset form sau khi đăng ký thành công
});

const loginForm = document.querySelector('.sign-in form');

loginForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn chặn form submit mặc định

    const email = loginForm.querySelector('input[type="email"]').value;
    const password = loginForm.querySelector('input[type="password"]').value;

    // Kiểm tra xem email có tồn tại trong localStorage không
    if (!localStorage.getItem(email)) {
        alert('Email không tồn tại. Vui lòng đăng ký trước.');
        return;
    }

    // Kiểm tra mật khẩu
    const storedData = JSON.parse(localStorage.getItem(email));
    if (password !== storedData.password) {
        alert('Mật khẩu không chính xác. Vui lòng thử lại.');
        return;
    }

    localStorage.setItem('isLoggedIn', 'true'); // Đánh dấu đã đăng nhập
    window.location.href = 'index.php'; // Chuyển hướng đến trang chính sau khi đăng nhập thành công
});

