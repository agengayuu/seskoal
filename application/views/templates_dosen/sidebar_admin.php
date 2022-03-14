<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">SIAK SESKOAL</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <?php

            $grupuser = $this->db->get_where('user', ['id_grup_user' =>
            $this->session->userdata('id_grup_user')])->row_array();

            $grupuser = $this->session->userdata('id_grup_user');
            $querymenu = "SELECT `user_menu`.`id_menu`, `nama_menu`
                    FROM `user_menu`
                    JOIN `user_akses_menu`
                    ON `user_menu`.`id_menu` = `user_akses_menu`.`id_menu`
                    WHERE `user_akses_menu`.`id_grup_user` = $grupuser
                    ORDER BY `user_akses_menu`.`id_menu`  ASC
                     ";

            $menu = $this->db->query($querymenu)->result_array();
            //print_r($menu); die;

            //var_dump($menu);die;
            ?>

            <!-- LOOPING MENU  -->
            <?php foreach ($menu as $m) : ?>
                <?php
                if ($this->session->userdata('id_grup_user') == '1') { ?>
                    <div class="sidebar-heading">
                        <?= $m['nama_menu'] ?>
                    </div>

                <?php } ?>


                <!-- loopig sub menu sesuai menu -->
                <?php
                $menuid = $m['id_menu'];
                $querysubmenu = "SELECT * FROM `user_submenu`
            JOIN `user_menu`
            ON `user_submenu`.`id_menu` = `user_menu`.`id_menu`
            WHERE `user_submenu`.`id_menu` = $menuid
            AND `user_submenu`.`is_active`  = 1 ";

                $submenu = $this->db->query($querysubmenu)->result_array();

                //    print_r($submenu);die;
                ?>

                <?php foreach ($submenu as $sm) : ?>
                    <?php
                    // echo "<pre>";
                    //      print_r($sm['url']);die;
                    ?>
                    <li class="nav-item test">
                        <a class="nav-link pb-0" href="<?= base_url() . $sm['url']; ?>">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['title']; ?></span></a>
                    </li>
                <?php endforeach; ?>
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

            <?php endforeach; ?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Akademik</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sub-Akademik:</h6>
                        <a class="collapse-item" href="utilities-color.html">Jadwal Kuliah </a>
                        <a class="collapse-item" href="utilities-border.html">Jadwal Ruang</a>
                        <a class="collapse-item" href="utilities-animation.html">Rekapitulasi Studi</a>
                    </div>
                </div>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['username']; ?></span>
                                <img class="img-profile rounded-circle" src="">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->