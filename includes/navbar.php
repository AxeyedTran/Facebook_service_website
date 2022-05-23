<nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
    <script>
    var navbarStyle = localStorage.getItem("navbarStyle");
    if (navbarStyle && navbarStyle !== 'transparent') {
        document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
    }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span>
            </button>
        </div>
        <a class="navbar-brand" href="/">
            <div class="d-flex align-items-center py-3"><span class="font-sans-serif">KDH Team</span>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mb-2">
                        <div class="col-auto navbar-vertical-label">Personal</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link" href="/home" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fa fa-home"></span></span><span class="nav-link-text ps-1">Home</span>
                        </div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link" href="/profile/info" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fa fa-user"></span></span><span class="nav-link-text ps-1">Profile</span>
                        </div>
                    </a>
                    <!-- parent pages-->
                    
                </li>
                <!-- parent pages-->
                <?php if ($user_level == 4) { ?>

                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mb-2">
                        <div class="col-auto navbar-vertical-label">Administrator</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>

                    <a class="nav-link" href="/administrator/edit-site" role="button">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-cog"></span>
                            </span>
                            <span class="nav-link-text">Site Setting</span>
                        </div>
                    </a>
                    <a class="nav-link dropdown-indicator collapsed" href="#administrator_user" data-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="administrator_user">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fa fa-cog"></span>
                            </span>
                            <span class="nav-link-text">User</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="administrator_user" data-parent="#navbarVerticalCollapse">
                        <li class="nav-item">
                            <a class="nav-link" href="/administrator/user/list">
                                <span class="nav-link-icon">
                                    <span class="fa fa-cog"></span>
                                </span>
                                <span class="nav-link-text ps-1">User List</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/administrator/user/point">
                                <span class="nav-link-icon">
                                    <span class="fa fa-cog"></span>
                                </span>
                                <span class="nav-link-text ps-1">Add Coin</span>
                            </a>
                        </li>
                    </ul>

                    <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mb-2">
                        <div class="col-auto navbar-vertical-label">Service</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- parent pages-->
                    <a class="nav-link" href="administrator/service/list" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fa fa-user"></span></span><span class="nav-link-text ps-1">Order List</span>
                        </div>
                    </a>
                </li>

                    <a class="nav-link dropdown-indicator collapsed" href="#administrator_service_facebook"
                        data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="administrator_service_facebook">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fa fa-cog"></span>
                            </span>
                            <span class="nav-link-text">Services Menu</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="administrator_service_facebook" data-parent="#navbarVerticalCollapse">
                        <li class="nav-item">
                            <a class="nav-link" href="/administrator/service/facebook/like-post/list">
                                <span class="nav-link-icon">
                                    <span class="fa fa-thumbs-up"></span>
                                </span>
                                <span class="nav-link-text ps-1">Like Post List</span>
                            </a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" href="/administrator/service/facebook/follow/list">
                                <span class="nav-link-icon">
                                    <span class="fa fa-user"></span>
                                </span>
                                <span class="nav-link-text ps-1">Followers List</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <?php } ?>


                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mb-2">
                        <div class="col-auto navbar-vertical-label">Buy Services</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link dropdown-indicator" href="#service_facebook" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="service_facebook">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fab fa-facebook-f"></span>
                            </span>
                            <span class="nav-link-text">Facebook Service</span>
                        </div>
                    </a>
                    <ul class="nav collapse show" id="service_facebook" data-parent="#navbarVerticalCollapse">
                        <li class="nav-item">
                            <a class="nav-link" href="/service/facebook/like-post/order">
                                <span class="nav-link-icon">
                                    <span class="fa fa-thumbs-up"></span>
                                </span>
                                <span class="nav-link-text ps-1">Increase Like Post</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="/service/facebook/follow/order">
                                <span class="nav-link-icon">
                                    <span class="fa fa-user"></span>
                                </span>
                                <span class="nav-link-text ps-1">Increase Followers</span>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mb-2">
                        <div class="col-auto navbar-vertical-label">Tools</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- parent pages-->
                    <a class="nav-link" href="/tools/get-id" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fa fa-user"></span></span><span class="nav-link-text ps-1">Get ID</span>
                        </div>
                    </a>
                    <a class="nav-link" href="/tools/get-2fa" target="_blank" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fa fa-cogs"></span></span><span class="nav-link-text ps-1">Get 2fa</span>
                        </div>

                    </a>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mb-2">
                        <div class="col-auto navbar-vertical-label">Support</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- parent pages-->
                    <a class="nav-link" href="/recharge/banking" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fa fa-credit-card"></span></span><span class="nav-link-text ps-1">Recharge</span>
                        </div>
                    </a>
                    <a class="nav-link" href="https://zalo.me/0911323854" target="_blank" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fa fa-address-book"></span></span><span class="nav-link-text ps-1">Contact
                                Admin</span>
                        </div>

                    </a>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mb-2">
                        <div class="col-auto navbar-vertical-label">Logout</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- parent pages-->
                    <a class="nav-link" href="/profile/logout" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fa fa-cog"></span></span><span class="nav-link-text ps-1">Logout</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-xl" style="display: none;">
</nav>
<div class="content">
    <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand" style="display: none;">
        <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse"
            aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                    class="toggle-line"></span></span>
        </button>
        <a class="navbar-brand me-1 me-sm-3" href="/">
            <div class="d-flex align-items-center"><span class="font-sans-serif"><?php echo $site_name; ?></span>
            </div>
        </a>

        <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
            <li class="nav-item"><span class="badge bg-primary"><?=number_format($user_point);?> Coin</span>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link notification-indicator notification-indicator-primary px-0 icon-indicator"
                    id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><span class="fa fa-user" data-fa-transform="shrink-6"
                        style="font-size: 33px;"></span></a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card"
                    aria-labelledby="navbarDropdownNotification">
                    <div class="card card-notification shadow-none" style="max-width: 5rem">
                        <div class="card-header">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h6 class="card-header-title mb-0">Online Members</h6>
                                </div>
                                <div class="col-auto"><span class="card-link fw-normal">User Online: 1 </span>
                                </div>
                            </div>
                        </div>
                        <div class="scrollbar-overlay" style="max-height:19rem;">
                            <div class="list-group list-group-flush fw-normal fs--1">
                                <div class="list-group-title border-bottom">Online List</div>
                                <div class="list-group-item">
                                    <a class="notification notification-flush notification-read" href="#">
                                        <div class="notification-avatar">
                                            <div class="avatar avatar-2xl me-3">
                                                <img class="rounded-circle" src="https://github.com/AxeyedTran/kha_web/blob/main/people.png?raw=true" alt="" />
                                            </div>
                                        </div>
                                        <div class="notification-body">
                                            <p class="mb-1"><strong><?=$user_username;?></strong> is online now</p>
                                            <span class="notification-time"><span class="me-2" role="img"
                                                    aria-label="Emoji"></span>IP: </span><?=$user_ip;?></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>



            <li class="nav-item dropdown">
                <a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-xl">
                        <img class="rounded-circle"
                            src="https://github.com/AxeyedTran/kha_web/blob/main/people.png?raw=true"
                            alt="" />
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                    <div class="bg-white dark__bg-1000 rounded-2 py-2">
                        <a class="dropdown-item fw-bold text-warning" href="#"><span
                                class="fas fa-crown me-1"></span><span><?=$user_level_type;?></span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/home">Home</a>
                        <a class="dropdown-item" href="/profile/info">Profile</a>
                        <a class="dropdown-item" href="/recharge/banking">Recharge</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/profile/logout">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg" style="display: none;"
        data-move-target="#navbarVerticalNav" data-navbar-top="combo">
    </nav>
    <script>
    var navbarPosition = localStorage.getItem('navbarPosition');
    var navbarVertical = document.querySelector('.navbar-vertical');
    var navbarTopVertical = document.querySelector('.content .navbar-top');
    var navbarTop = document.querySelector('[data-layout] .navbar-top');
    var navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');
    if (navbarPosition === 'top') {
        navbarTop.removeAttribute('style');
        navbarTopVertical.remove(navbarTopVertical);
        navbarVertical.remove(navbarVertical);
        navbarTopCombo.remove(navbarTopCombo);
    } else if (navbarPosition === 'combo') {
        navbarVertical.removeAttribute('style');
        navbarTopCombo.removeAttribute('style');
        navbarTop.remove(navbarTop);
        navbarTopVertical.remove(navbarTopVertical);
    } else {
        navbarVertical.removeAttribute('style');
        navbarTopVertical.removeAttribute('style');
        navbarTop.remove(navbarTop);
        navbarTopCombo.remove(navbarTopCombo);
    }
    </script>