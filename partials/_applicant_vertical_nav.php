<nav class="navbar navbar-vertical navbar-expand-xl navbar-light" style="display:none;">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle) {
            document.querySelector('.navbar-vertical').className += ' navbar-' + navbarStyle;
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-toggle="tooltip" data-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
        </div><a class="navbar-brand" href="applicant_dashboard.php">
            <div class="d-flex align-items-center py-3"><img class="mr-2" src="../public/img/illustrations/falcon.png" alt="" width="40" /><span class="text-sans-serif">iBursary</span></div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content perfect-scrollbar scrollbar">
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="applicant_dashboard.php">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-home"></span></span><span class="nav-link-text"> Dashboard</span></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="applicant_bursaries.php">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text"> Bursaries</span></div>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="applicant_bursary_applications.php">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-file"></span></span><span class="nav-link-text">Bursary Applications</span></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="applicant_funds_disbursed.php">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-money-bill-alt"></span></span><span class="nav-link-text">Awarded Funds</span></div>
                    </a>
                </li>
            </ul>
            <div class="navbar-vertical-divider">
                <hr class="navbar-vertical-hr my-2" />
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="applicant_mailbox.php">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-envelope"></span></span><span class="nav-link-text"> Mail Box</span></div>
                    </a>
                </li>

            </ul>
            <div class="navbar-vertical-divider">
                <hr class="navbar-vertical-hr my-2" />
            </div>
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item">
                    <a class="nav-link" href="_applicant_logout.php">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-power-off"></span></span><span class="nav-link-text"> Log Out</span></div>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>