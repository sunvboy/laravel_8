<aside class="left-side sidebar-offcanvas">
    <?php $dropdown = getFunctions(); ?>
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel text-center" style="text-align: center;">
            <div class=" image">
                <img src="{{!empty(Auth::user()->image)?Auth::user()->image:asset('backend/img/avatar.png')}}" class="img-circle" alt="User Image" style="object-fit: cover;" />
            </div>
            <div class="pull-left info">
                <p>Hello, {{!empty(Auth::user())?Auth::user()->name:''}}</p>
                <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form hidden">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." />
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu">
            <?php if (in_array('articles', $dropdown)) { ?>
                <li class="treeview <?php if (!empty($module) && $module === 'category_articles') { ?>active<?php } ?> <?php if (!empty($module) && $module === 'articles') { ?>active<?php } ?>">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Quản lý Bài viết</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('articleCategory.index')}}"><i class="fa fa-angle-double-right"></i> Danh mục bài viết</a></li>
                        <li><a href="{{route('article.index')}}"><i class="fa fa-angle-double-right"></i> Bài viết</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array('media', $dropdown)) { ?>
                <li class="treeview <?php if (!empty($module) && $module === 'category_media') { ?>active<?php } ?> <?php if (!empty($module) && $module === 'media') { ?>active<?php } ?>">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Quản lý Media</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('mediaCategory.index')}}"><i class="fa fa-angle-double-right"></i> Danh mục media</a></li>
                        <li><a href="{{route('media.index')}}"><i class="fa fa-angle-double-right"></i> Danh sách</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array('products', $dropdown)) { ?>
                <li class="treeview <?php if (!empty($module) && $module === 'category_products') { ?>active<?php } ?> <?php if (!empty($module) && $module === 'products') { ?>active<?php } ?>">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Quản lý Sản phẩm</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('productCategory.index')}}"><i class="fa fa-angle-double-right"></i> Danh mục sản phẩm</a></li>
                        <li><a href="{{route('product.index')}}"><i class="fa fa-angle-double-right"></i> Sản phẩm</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array('attributes', $dropdown)) { ?>
                <li class="treeview <?php if (!empty($module) && $module === 'category_attributes') { ?>active<?php } ?> <?php if (!empty($module) && $module === 'attributes') { ?>active<?php } ?>">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Quản lý Thuộc tính</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('attributeCategory.index')}}"><i class="fa fa-angle-double-right"></i> Nhóm thuộc tính</a></li>
                        <li><a href="{{route('attribute.index')}}"><i class="fa fa-angle-double-right"></i> Thuộc tính</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array('brands', $dropdown)) { ?>
                <li class="<?php if (!empty($module) && $module === 'brands') { ?>active<?php } ?>">
                    <a href="{{route('brand.index')}}">
                        <i class="fa fa-folder"></i> <span>Quản lý Thương hiệu</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array('orders', $dropdown)) { ?>
                <li class="<?php if (!empty($module) && $module === 'orders') { ?>active<?php } ?>">
                    <a href="{{route('order.index')}}">
                        <i class="fa fa-folder"></i> <span>Quản lý Đơn hàng</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array('coupon', $dropdown)) { ?>
                <li class="<?php if (!empty($module) && $module === 'coupon') { ?>active<?php } ?>">
                    <a href="{{route('coupon.index')}}">
                        <i class="fa fa-folder"></i> <span>Quản lý Mã giảm giá</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array('contact', $dropdown)) { ?>
                <li class="<?php if (!empty($module) && $module === 'contact') { ?>active<?php } ?>">
                    <a href="{{route('contact.index')}}">
                        <i class="fa fa-folder"></i> <span>Quản lý Liên hệ</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array('menu', $dropdown)) { ?>
                <li class="<?php if (!empty($module) && $module === 'menu') { ?>active<?php } ?>">
                    <a href="{{route('menus.index')}}">
                        <i class="fa fa-folder"></i> <span>Quản lý Menu</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array('page', $dropdown)) { ?>
                <li class="<?php if (!empty($module) && $module === 'page') { ?>active<?php } ?>">
                    <a href="{{route('page.index')}}">
                        <i class="fa fa-folder"></i> <span>Quản lý Trang</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array('tags', $dropdown)) { ?>
                <li class="<?php if (!empty($module) && $module === 'tags') { ?>active<?php } ?>">
                    <a href="{{route('tag.index')}}">
                        <i class="fa fa-folder"></i> <span>Quản lý Tags</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array('slide', $dropdown)) { ?>
                <li class="<?php if (!empty($module) && $module === 'slide') { ?>active<?php } ?>">
                    <a href="{{route('slide.index')}}">
                        <i class="fa fa-folder"></i> <span>Quản lý Banner & Slide</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array('address', $dropdown)) { ?>
                <li class="<?php if (!empty($module) && $module === 'address') { ?>active<?php } ?>">
                    <a href="{{route('address.index')}}">
                        <i class="fa fa-folder"></i> <span>Hệ thống cửa hàng</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array('comments', $dropdown)) { ?>
                <li class="<?php if (!empty($module) && $module === 'comments') { ?>active<?php } ?>">
                    <a href="{{route('comment.index')}}">
                        <i class="fa fa-folder"></i> <span>Quản lý Comment</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array('general', $dropdown)) { ?>
                <li class="<?php if (!empty($module) && $module === 'general') { ?>active<?php } ?>">
                    <a href="{{route('general.general')}}">
                        <i class="fa fa-folder"></i> <span>Cấu hình hệ thống</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array('customers', $dropdown)) { ?>
                <li class="<?php if (!empty($module) && $module === 'customers') { ?>active<?php } ?>">
                    <a href="{{route('customer.index')}}">
                        <i class="fa fa-folder"></i> <span>Quản lý khách hàng</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array('users', $dropdown)) { ?>
                <li class="treeview <?php if (!empty($module) && $module === 'users') { ?>active<?php } ?> <?php if (!empty($module) && $module === 'roles') { ?>active<?php } ?> ">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Quản lý thành viên</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('roles.index')}}"><i class="fa fa-angle-double-right"></i> Nhóm thành viên</a></li>
                        <li><a href="{{route('users.index')}}"><i class="fa fa-angle-double-right"></i> Thành viên</a></li>
                    </ul>
                </li>
            <?php } ?>
            @if(env('APP_ENV') == "local")
            <li class="treeview <?php if (!empty($module) && $module === 'permission') { ?>active<?php } ?>  <?php if (!empty($module) && $module === 'module') { ?>active<?php } ?>">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Development</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('permission.index')}}"><i class="fa fa-angle-double-right"></i> Quản lý phân quyền</a></li>
                    <li><a href="{{route('module.index')}}"><i class="fa fa-angle-double-right"></i> Quản lý module</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>