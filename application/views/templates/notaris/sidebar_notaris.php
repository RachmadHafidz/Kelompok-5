<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-fw fa-black-tie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-NOTARIS </div>
    </a>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!--Query Menu-->
    <?php
    $tipe_id = $this->session->userdata('tipe_id');
    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                        FROM `user_menu` JOIN `user_akses_menu`
                        ON `user_menu`.`id` = `user_akses_menu`.`menu_id`
                        WHERE `user_akses_menu`.`tipe_id` = $tipe_id
                        ORDER BY `user_akses_menu`.`menu_id` ASC
       ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!--Looping Menu-->
    <?php foreach ($menu as $m) : ?>

        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!--Sub Menu-->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
            FROM `user_sub_menu` JOIN `user_menu`
            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
            WHERE `user_sub_menu`.`menu_id` = $menuId
            AND `user_sub_menu`.`aktif` = 1
        ";
        $SubMmenu = $this->db->query($querySubMenu)->result_array();
        ?>
        <?php foreach ($SubMmenu as $sm) : ?>
            <?php if ($judul == $sm['judul']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['judul']; ?></span></a>
                </li>


            <?php endforeach; ?>

            <hr class="sidebar-divider">

        <?php endforeach; ?>




        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->