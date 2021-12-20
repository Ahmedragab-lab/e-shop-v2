<!DOCTYPE html>
<html lang="en">
   <head>
     @include('Admin.dashlayout.headcss')
   </head>
   <body class="fixed-left">
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div>
        <div id="wrapper">
             <!-- sidebar -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="mdi mdi-close"></i>
                </button>
                <div class="left-side-logo d-block d-lg-none">
                    <div class="text-center">
                        <a href="index.html" class="logo"><img src="{{ asset('assets/images/logo_dark.png') }}" height="20" alt="logo"></a>
                    </div>
                </div>
                <div class="sidebar-inner slimscrollleft">
                   @include('Admin.dashlayout.sidebar')
                   <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
             <!-- content -->
            <div class="content-page">
                <div class="content">
                    @include('Admin.dashlayout.upperbar')
                    <div class="page-content-wrapper ">
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    © 2022 Zinzer <span class="d-none d-md-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Eng Ahmed ragab.</span>
                </footer>
            </div>
        </div>
        @include('Admin.dashlayout.footerjs')
    </body>
</html>
