<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text size-16">HĐND TỈNH <br> BÌNH THUẬN</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{asset('')}}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Trang chủ</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-calendar-star'></i>
                </div>
                <div class="menu-title">Quản lý kỳ họp</div>
            </a>
            <ul>
                <li> 
                    <a href="{{asset(route('thumoinhan'))}}"><i class="bx bx-right-arrow-alt"></i>Thư mời họp</a>
                </li>
                <li> 
                    <a href="{{asset('2')}}"><i class="bx bx-right-arrow-alt"></i>Tham gia họp</a>
                </li>
                <li>
                    <a href="{{asset('3')}}"><i class="bx bx-right-arrow-alt"></i>Tra cứu văn bản</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Hoạt động giám sát</div>
            </a>
            <ul>
                <li> 
                    <a href="{{asset(route('thamgiagiamsat.index'))}}"><i class="bx bx-right-arrow-alt"></i>Đang giám sát</a>
                </li>
                <li> 
                    <a href="{{asset(route('thamgiagiamsat.lichsu'))}}"><i class="bx bx-right-arrow-alt"></i>Lịch sử giám sát</a>
                </li>
            </ul>
        </li>
        <li>
            <a  href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Khiếu nại - tố cáo</div>
            </a>
            <ul>
                <li> 
                    <a href="{{asset(route('khieu-nai.create'))}}"><i class="bx bx-right-arrow-alt"></i>Thêm mới</a>
                </li>
                <li> 
                    <a href="{{asset(route('khieunaitheodoi'))}}"><i class="bx bx-right-arrow-alt"></i>Đang theo dõi</a>
                </li>
                <li> 
                    <a href="{{asset(route('khieu-nai.index'))}}"><i class="bx bx-right-arrow-alt"></i>Tất cả khiếu nại - tố cáo</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-detail'></i>
                </div>
                <div class="menu-title">Ý kiến cử tri</div>
            </a>
            <ul>
                <li> 
                    <a href="{{asset(route('y-kien-cu-tri.create'))}}"><i class="bx bx-right-arrow-alt"></i>Thêm mới</a>
                </li>
                <li> 
                    <a href="{{asset(route('ykientheodoi'))}}"><i class="bx bx-right-arrow-alt"></i>Đang theo dõi</a>
                </li>
                <li> 
                    <a href="{{asset(route('y-kien-cu-tri.index'))}}"><i class="bx bx-right-arrow-alt"></i>Tất cả khiếu nại - tố cáo</a>
            </ul>
        </li>
        <li>
            <a href="{{route('van-ban.index')}}">
                <div class="parent-icon"><i class="bx bx-file"></i>
                </div>
                <div class="menu-title">Tra cứu văn bản</div>
            </a>
        </li>
        <li>
            <a href="{{route('profile.index')}}">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Thông tin tài khoản</div>
            </a>
        </li>
        <li>
            <a href=" {{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <div class="parent-icon"><i class="bx bx-log-out"></i>
                </div>
                <div class="menu-title">Đăng xuất</div>
            </a>
        </li>
        
    </ul>
    <!--end navigation-->
</div>