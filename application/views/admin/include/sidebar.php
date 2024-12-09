<nav class="pcoded-navbar  ">
    <?php
    $cur_tab = $this->uri->segment(2) == '' ? 'dashboard' : $this->uri->segment(2);
    ?>
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <div>
                <div class="main-menu-header">
                    <i class="fa fa-user"></i>
                    <div class="user-details">
                        <span>
                            <?= ucwords($this->session->userdata('name')); ?>
                        </span>
                        <div id="more-details">
                            <?= ucwords($this->session->userdata('role_name')); ?><i
                                class="fa fa-chevron-down m-l-5"></i>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="<?= site_url('admin/auth/logout'); ?>"><i
                                    class="feather icon-log-out m-r-5"></i>Logout</a></li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item">
                    <a href="<?= site_url('admin/dashboard'); ?>" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
              
                <?php if ($this->session->userdata('role') === '1'): ?>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-users"></i></span><span class="pcoded-mtext">User</span></a>
                        <ul class="pcoded-submenu">
                            <!-- <li><a href="<?= base_url('admin/users/add'); ?>">Add User</a></li> -->
                            <li><a href="<?= base_url('admin/users'); ?>">View User</a></li>
                        </ul>
                    </li>

                 
                  

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Blog</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= base_url('admin/blog/add_blog'); ?>"><span class="pcoded-micon"><i
                                            class="feather icon-plus"></i></span><span class="pcoded-mtext">Add
                                        Blog</span></a></li>
                            <li><a href="<?= base_url('admin/blog/blog_view'); ?>"><span class="pcoded-micon"><i
                                            class="feather icon-eye"></i></span><span class="pcoded-mtext">View
                                        Blog</span></a></li>
                        </ul>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Services</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= base_url('admin/service/add_service'); ?>"><span class="pcoded-micon"><i
                                            class="feather icon-plus"></i></span><span class="pcoded-mtext">Add
                                            Services</span></a></li>
                            <li><a href="<?= base_url('admin/service/service_view'); ?>"><span class="pcoded-micon"><i
                                            class="feather icon-eye"></i></span><span class="pcoded-mtext">View
                                            Services</span></a></li>
                        </ul>
                    </li>
                

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Seo</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= base_url('admin/seo/add_seo'); ?>"><span class="pcoded-micon"><i
                                            class="feather icon-plus"></i></span><span class="pcoded-mtext">Add
                                        Seo</span></a></li>
                            <li><a href="<?= base_url('admin/seo/seo_view'); ?>"><span class="pcoded-micon"><i
                                            class="feather icon-eye"></i></span><span class="pcoded-mtext">View
                                        Seo</span></a></li>
                        </ul>
                    </li>
                  
                    <li class="nav-item pcoded-hasmenu">
                        <a href="<?= base_url('admin/contact/contact_view'); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Contact</span></a>
                        <ul class="pcoded-submenu">
                            
                        </ul>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="<?= base_url('admin/contact/consultation_view'); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-credit-card"></i></span><span class="pcoded-mtext">consultation </span></a>
                        <ul class="pcoded-submenu">
                            
                        </ul>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>