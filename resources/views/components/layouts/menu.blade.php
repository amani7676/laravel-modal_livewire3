<nav class="navbar navbar-expand-lg modern-navbar">
    <div class="container">


        <!-- دکمه موبایل -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">


            <!-- منوی اصلی -->
            <ul class="nav-menu ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-home"></i>
                        صفحه اصلی
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-list"></i>
                        لیست اقامتگران
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-chart-bar"></i>
                        آمار تخت ها
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-file-alt"></i>
                        گزارش‌ها
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">
                                <i class="fas fa-users"></i>
                                اقامتگران
                            </a></li>
                        <li><a class="dropdown-item" href="#">
                                <i class="fas fa-sign-out-alt"></i>
                                اقامتگران خروجی
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-calendar-plus"></i>
                        رزرو کردن
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-exchange-alt"></i>
                        جابجایی
                    </a>
                </li>
            </ul>

            <!-- بخش جستجو -->
            <div class="search-container">
                <input type="text" class="search-input ml-5" placeholder="جستجو..." id="ajaxSearch">
                <button class="search-btn" type="button">
                    <i class="fas fa-search"></i>
                </button>
                <div id="ajaxResults" class="search-results" style="display: none;"></div>
            </div>
        </div>
    </div>
</nav>

