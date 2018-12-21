<?php if(!empty($rgb)) { ?>
<svg style="display: none;">
  <filter id="custom_clear_color_1" color-interpolation-filters="sRGB"
          x="0" y="0" height="100%" width="100%">
    <feColorMatrix type="matrix"
      values="<?= $rgb[1]; ?> 1 0 0  0 
              <?= $rgb[2]; ?> 1 0 0  0  
              <?= $rgb[3]; ?> 1 0 0  0 
                            0 0 0 1  0" />
  </filter>
</svg>
<?php } ?>

<style type="text/css">
<?php if(!empty($colors[0])) { ?>
    a,
    ul.left_nav>li>a:hover,
    ul.left_nav>li>a:focus,
    ul.left_nav>li.active>a,
    .sub_menu li.active>a,
    .sub_menu li:hover>a,
    .sub_menu li>ul li.active a,
    .sub_menu li>ul li:hover a,
    .btn-link,
    .app_tile_info .app_price,
    .app_title,
    .block-title,
    #app-details-container h4,
    #app-details-container h3,
    .box-title,
    .modal-content .modal-header,
    .modal-content .modal-body h4,
    .small_menu ul li a:hover,
    .small_menu ul li a:hover i,
    .filter_links a.btn-link:hover,
    .main-wrapper header > ul > li.ClearOS>a.ci-ClearOS:before,
    .pagination>li>a,
    .pagination>li>span {
        color: <?= $colors[0]; ?>;
    }

    .sub_menu li.active,
    .sub_menu li>ul li.active {
        border-left-color: <?= $colors[0]; ?>;
    }
<?php } ?>


<?php if(!empty($colors[0]) || !empty($colors[1])) { ?>
.theme-menu-2-category.btn.btn-default.active,
.btn-success,
.progress-bar,
.theme-app-selected,
.btn-primary,
.pagination>.active>a,
.pagination>.active>span,
.pagination>.active>a:hover,
.pagination>.active>span:hover,
.pagination>.active>a:focus,
.pagination>.active>span:focus {
    <?php if(!empty($colors[0])) { ?>
        background-color: <?= $colors[0]; ?> !important;
    <?php } ?>
    <?php if(!empty($colors[1])) { ?>
        border-color: <?= $colors[1]; ?>;
    <?php } ?>
}
<?php } ?>


<?php if(!empty($colors[1])) { ?>
a:hover,
a:focus,
.btn-link:hover {
    color: <?= $colors[1]; ?>;
}
<?php } ?>


<?php if(!empty($colors[0])) { ?>
.installed_ribbon {
    border: 1px solid <?= $colors[0]; ?>;
    color: <?= $colors[0]; ?>;
}
.block-title:before {
    border-bottom: 1px solid <?= $colors[0]; ?>;
}
#app-details-container h4:before,
#app-details-container h3:before,
.box-title:before,
.modal-content .modal-header:before,
.modal-content .modal-body h4:before {
    border-bottom: 1px solid <?= $colors[0]; ?>;
}
.page-title {
    background: none repeat scroll 0 0 <?= $colors[0]; ?>;
}
.main-wrapper header > ul > li.ClearOS {
    border-bottom: 2px solid <?= $colors[0]; ?>;
}
.main-wrapper header > ul > li.dashboard {
    border-top-color: <?= $colors[0]; ?>;
    border-bottom: 2px solid <?= $colors[0]; ?>;
}
.main-wrapper header > ul > li.marketplace {
    border-bottom: 2px solid <?= $colors[0]; ?>;
}
.main-wrapper header > ul > li.support {
    border-bottom: 2px solid <?= $colors[0]; ?>;
}
.main-wrapper header > ul > li.my-account {
    border-bottom: 2px solid <?= $colors[0]; ?>;
}
.main-wrapper header > ul > li.placeholder {
    border-bottom: 2px solid <?= $colors[0]; ?>;
}
#magic-arrow.magic_arrow_1,
#magic-arrow.magic_arrow_2,
#magic-arrow.magic_arrow_3,
#magic-arrow.magic_arrow_4 {
    border-bottom-color: <?= $colors[0]; ?>;
}

.clearos-svg.clearfoundation path,
.clearos-svg.clearfoundation circle,
.clearos-svg.clearfoundation polygon,
.clearos-svg.clearfoundation rect {
    fill: <?= $colors[0]; ?> !important;
}
<?php } ?>

ul.left_nav > li > a i {
    background-image: url(/themes/ClearOS-Admin/img/cube_sprite.png);
    -webkit-filter: url(#custom_clear_color_1);
    filter:  url(#custom_clear_color_1);
}

</style>
