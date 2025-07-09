            <!-- Topbar Start -->
            <header class="app-topbar">
                <div class="color-line"></div>
                <div class="container-fluid topbar-menu">
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        <!-- Topbar Brand Logo -->
                        <div class="logo-topbar text-center">
                            <!-- Logo light -->
                            <a href="index.php" class="text-dark">
                                <span class="logo-lg">
                                    <div class="d-flex justify-content-center align-items-center gap-1">
                                        <span class="avatar avatar-xs rounded text-bg-dark">
                                            <span class="avatar-title">
                                                <i data-lucide="audio-lines" class="fs-md"></i>
                                            </span>
                                        </span>
                                        <span class="logo-text text-body fw-bold fs-md">HOMER</span>
                                    </div>
                                </span>
                            </a>
                        </div>

                        <div class="d-lg-none d-flex mx-1">
                            <a href="index.php">
                                <img src="assets/images/logo-sm.png" height="28" alt="Logo" />
                            </a>
                        </div>

                        <!-- Sidebar Hover Menu Toggle Button -->
                        <button class="button-collapse-toggle">
                            <i data-lucide="menu" class="fs-22 align-middle"></i>
                        </button>
                    </div>
                    <!-- .d-flex-->

                    <div class="d-flex align-items-center gap-2">
                        <!-- Light/Dark Mode Button -->
                        <div class="topbar-item d-none d-sm-flex">
                            <button class="topbar-link" id="light-dark-mode" type="button">
                                <i data-lucide="moon" class="fs-xxl mode-light-moon"></i>
                                <i data-lucide="sun" class="fs-xxl mode-light-sun"></i>
                            </button>
                        </div>

                        <div class="topbar-item">
                            <!-- Logout -->
                            <a href="logout.php" class="dropdown-item text-danger fw-semibold">
                                <i class="ti ti-logout-2 me-2 fs-17 align-middle"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Topbar End -->