<nav class="navbar navbar-light navbar-glass navbar-top sticky-kit navbar-expand" style="display:none;">
    <button class="btn navbar-toggler-humburger-icon navbar-toggler mr-1 mr-sm-3" type="button" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
    <a class="navbar-brand mr-1 mr-sm-3" href="dashboard.php">
        <div class="d-flex align-items-center"><img class="mr-2" src="../public/img/illustrations/falcon.png" alt="" width="40" /><span class="text-sans-serif">iBursary</span></div>
    </a>
    <ul class="navbar-nav align-items-center d-none d-lg-block">
        <li class="nav-item">
            <div class="search-box">

            </div>
        </li>
    </ul>
    <ul class="navbar-nav navbar-nav-icons ml-auto flex-row align-items-center">

        <li class="nav-item dropdown dropdown-on-hover"><a class="nav-link pr-0" id="navbarDropdownUser" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-xl">
                    <img class="rounded-circle" src="../public/img/team/3-thumb.png" alt="" />
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownUser">
                <div class="bg-white rounded-soft py-2">
                    <a class="dropdown-item font-weight-bold text-success" href="#!">Hello </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="settings.php">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
        </li>
    </ul>
</nav>
<script>
    var navbarPosition = localStorage.getItem('navbarPosition');
    var navbarVertical = document.querySelector('.navbar-vertical');
    var navbarTopVertical = document.querySelector('.content .navbar-top');
    var navbarTop = document.querySelector('[data-layout] .navbar-top');
    var navbarTopCombo = document.querySelector('.content .navbar-top-combo');

    if (navbarPosition === 'top') {
        navbarTop.removeAttribute('style');
        navbarTopVertical.parentNode.removeChild(navbarTopVertical);
        navbarVertical.parentNode.removeChild(navbarVertical);
        navbarTopCombo.parentNode.removeChild(navbarTopCombo);
    } else if (navbarPosition === 'combo') {
        navbarVertical.removeAttribute('style');
        navbarTopCombo.removeAttribute('style');
        navbarTop.parentNode.removeChild(navbarTop);
        navbarTopVertical.parentNode.removeChild(navbarTopVertical);
    } else {
        navbarVertical.removeAttribute('style');
        navbarTopVertical.removeAttribute('style');
        navbarTop.parentNode.removeChild(navbarTop);
        navbarTopCombo.parentNode.removeChild(navbarTopCombo);
    }
</script>