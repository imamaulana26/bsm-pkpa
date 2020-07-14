<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="<?= base_url('assets/admin/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
        </div>
        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 242px;"></div>
        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                            <li class="nav-item has-treeview">
                                <a href="<?= site_url('admin/beranda') ?>" class="nav-link" id="beranda">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Beranda</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= site_url('admin/koperasi') ?>" class="nav-link" id="koperasi">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Koperasi</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item has-treeview">
                                <a href="<?= site_url('admin/campaign') ?>" class="nav-link" id="campaign">
                                    <i class="nav-icon fas fa-bullhorn"></i>
                                    <p>Campaign</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= site_url('admin/volunteer') ?>" class="nav-link" id="volunteer">
                                    <i class="nav-icon fas fa-hand-holding-heart"></i>
                                    <p>Volunteer</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= site_url('admin/donatur') ?>" class="nav-link" id="donatur">
                                    <i class="nav-icon fas fa-hands-helping"></i>
                                    <p>Donatur</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= site_url('admin/donasi') ?>" class="nav-link" id="donasi">
                                    <i class="nav-icon fas fa-donate"></i>
                                    <p>Dana Donasi</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= site_url('admin/acara') ?>" class="nav-link" id="acara">
                                    <i class="nav-icon fas fa-award"></i>
                                    <p>Acara</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="." class="nav-link" id="setting">
                                    <i class="nav-icon fas fa-tools"></i>
                                    <p>
                                        Pengaturan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= site_url('admin/setting/kategori') ?>" class="nav-link" id="kategori">
                                            <i class="nav-icon far fa-circle"></i>
                                            <p>Kategori</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('admin/setting/tags') ?>" class="nav-link" id="tags">
                                            <i class="nav-icon far fa-circle"></i>
                                            <p>Tags</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('admin/setting/website') ?>" class="nav-link" id="website">
                                            <i class="nav-icon far fa-circle"></i>
                                            <p>Website</p>
                                        </a>
                                    </li>
                                </ul>
                            </li> -->
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
            </div>
        </div>

        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 23.8474%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
    <!-- /.sidebar -->
</aside>