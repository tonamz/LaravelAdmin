<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">
                <li class="menu-title">General</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fe-airplay"></i>
                        <span> Dashboards </span>
                    </a>
                </li>
                <li class="menu-title mt-2">System</li>

                @permission('view-access-management')
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-users "></i>
                        <span>Access Management</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.access.user.index') }}">User Management</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.access.role.index') }}">Role Management</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.access.permission.index') }}">Permission Management</a>
                        </li>
                    </ul>
                </li>
                @endauth
                <li>
                    <a href="{{ route('admin.modules.index') }}">
                        <i class="fe-edit-2 "></i>
                        <span> Module </span>
                    </a>
                </li>
                <!-- <li>
                    <a href="{{ route('admin.menus.index') }}">
                        <i class="fe-menu "></i>
                        <span> Menus </span>
                    </a>
                </li> -->
                <li>
                    <a href="{{ route('admin.pages.index') }}">
                        <i class="fe-file "></i>
                        <span> Pages </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.settings.edit', 1 ) }}">
                        <i class="fe-settings "></i>
                        <span> Setting</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="far fa-comment-dots "></i>
                        <span>Blog Management</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.blogCategories.index') }}">Blog Category Management</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.blogTags.index') }}">Blog Tag Management</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.blogs.index') }}">Blog Management</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.faqs.index')}}">
                        <i class="fas fa-question-circle "></i>
                        <span> Faq Management</span>
                    </a>
                </li>
             




               
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->