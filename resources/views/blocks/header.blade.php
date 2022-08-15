<header class="shadow">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="info">
                <div class="info-img shadow-xl">
                    <img src="{{asset('image/user.jpg')}}" alt="">
                </div>
                <div class="name">
                    Phan Quang Điện
                </div>
            </div>
            <div class="contact">
                <a href="https://www.facebook.com/profile.php?id=100039245052607"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://github.com/PhanDien1604"><i class="fa-brands fa-github"></i></a>
                <a href="#">0963865764</a>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-secondary ms-2">Đăng xuất</button>
                </form>
            </div>
        </div>
    </div>
</header>
