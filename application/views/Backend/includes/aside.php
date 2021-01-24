<?php $user = get_active_user(); ?>
<input type="hidden" id="csrf_test_name" data-csrf="<?=$this->security->get_csrf_hash();?>">
<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <a href="javascript:void(0)">
                        <img class="img-responsive"
                             src="<?php echo base_url("assets"); ?>/assets/images/221.jpg"
                             alt="<?php echo convertToSEO($user->full_name); ?>"/>
                    </a>
                </div><!-- .avatar -->
            </div>
            <div class="media-body">
                <div class="foldable">
                    <h5><a href="javascript:void(0)" class="username"><?php echo $user->full_name; ?></a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <small>İşlemler</small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="<?php echo base_url('admin'); ?>">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Anasayfa</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color"
                                       href="<?php echo base_url("backend/users/update_form/$user->id"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>Profilim</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("logout"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>Çıkış</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">


                <?php if (isAllowedViewModule("dashboard")) { ?>
                    <li class="dashboard" >
                        <a href="<?php echo base_url("admin"); ?>">
                            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                <?php } ?>

                <?php if (isAllowedViewModule("settings")) { ?>
                    <li class="settings">
                        <a href="<?php echo base_url("backend/settings"); ?>">
                            <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                            <span class="menu-text">Site Ayarları</span>
                        </a>
                    </li>
                <?php } ?>


                <?php if (isAllowedViewModule("emailsettings")) { ?>

                    <li class="emailsettings">
                        <a href="<?php echo base_url("backend/emailsettings"); ?>">
                            <i class="menu-icon zmdi zmdi-email zmdi-hc-lg"></i>
                            <span class="menu-text">E-posta Ayarları</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if (isAllowedViewModule("galleries")) { ?>

                    <li class="galleries">
                        <a href="<?php echo base_url("backend/galleries"); ?>">
                            <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                            <span class="menu-text">Galeri İşlemleri</span>
                        </a>
                    </li>

                <?php } ?>



                <?php if (isAllowedViewModule("slides")) { ?>

                    <li class="slides">
                        <a href="<?php echo base_url("backend/slides"); ?>">
                            <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                            <span class="menu-text">Slider</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if (isAllowedViewModule("product")) { ?>

                    <li class="product" >
                        <a href="<?php echo base_url("backend/product"); ?>">
                            <i class="menu-icon fa fa-cubes"></i>
                            <span class="menu-text">Ürünler</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if (isAllowedViewModule("services")) { ?>

                    <li class="services">
                        <a href="<?php echo base_url("backend/services"); ?>">
                            <i class="menu-icon fa fa-cutlery"></i>
                            <span class="menu-text">Hizmetlerimiz</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if (isAllowedViewModule("portfolio") && isAllowedViewModule("portfolio_categories")) { ?>

                    <li class="portfoliohome has-submenu">
                        <a href="javascript:void(0)" class="submenu-toggle">
                            <i class="menu-icon fa fa-asterisk"></i>
                            <span class="menu-text">Portfolyo İşlemleri</span>
                            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                        </a>
                        <ul  class="submenu">
                            <li class="portfolio_categories">
                                <a href="<?php echo base_url("backend/portfolio_categories"); ?>">
                                    <span class="menu-text">Portfolyo Kategorileri</span>
                                </a>
                            </li>
                            <li class="portfolio">
                                <a href="<?php echo base_url("backend/portfolio"); ?>">
                                    <span class="menu-text">Portfolyo</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                <?php } ?>


                <?php if (isAllowedViewModule("news")) { ?>

                    <li class="news">
                        <a href="<?php echo base_url("backend/news"); ?>">
                            <i class="menu-icon fa fa-newspaper-o"></i>
                            <span class="menu-text">Haberler</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if (isAllowedViewModule("courses")) { ?>

                    <li class="courses">
                        <a href="<?php echo base_url("backend/courses"); ?>">
                            <i class="menu-icon fa fa-calendar"></i>
                            <span class="menu-text">Eğitimler</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if (isAllowedViewModule("references")) { ?>

                    <li class="references">
                        <a href="<?php echo base_url("backend/references"); ?>">
                            <i class="menu-icon zmdi zmdi-check zmdi-hc-lg"></i>
                            <span class="menu-text">Referanslar</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if (isAllowedViewModule("brands")) { ?>

                    <li class="brands">
                        <a href="<?php echo base_url("backend/brands"); ?>">
                            <i class="menu-icon zmdi zmdi-puzzle-piece zmdi-hc-lg"></i>
                            <span class="menu-text">Markalar</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if (isAllowedViewModule("user_roles")) { ?>

                    <li class="user_roles">
                        <a href="<?php echo base_url("backend/user_roles"); ?>">
                            <i class="menu-icon fa fa-eye"></i>
                            <span class="menu-text">Kullanıcı Rolü</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if (isAllowedViewModule("users")) { ?>

                    <li class="users">
                        <a href="<?php echo base_url("backend/users"); ?>">
                            <i class="menu-icon fa fa-user-secret"></i>
                            <span class="menu-text">Kullanıcılar</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if (isAllowedViewModule("members")) { ?>

                    <li class="members">
                        <a href="<?php echo base_url("backend/members"); ?>">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text">Aboneler</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if (isAllowedViewModule("testimonials")) { ?>

                    <li class="testimonials">
                        <a href="<?php echo base_url("backend/testimonials"); ?>">
                            <i class="menu-icon fa fa-comments"></i>
                            <span class="menu-text">Ziyaretçi Notları</span>
                        </a>
                    </li>

                <?php } ?>



                <?php if (isAllowedViewModule("popups")) { ?>

                    <li class="popups">
                        <a href="<?php echo base_url("backend/popups"); ?>">
                            <i class="menu-icon zmdi zmdi-lamp zmdi-hc-lg"></i>
                            <span class="menu-text">Popup Hizmeti</span>
                        </a>
                    </li>

                <?php } ?>


                <li >
                    <a href="<?php echo base_url();?>>">
                        <i class="menu-icon zmdi zmdi-view-web zmdi-hc-lg"></i>
                        <span class="menu-text">Ana Sayfa</span>
                    </a>
                </li>


            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>
