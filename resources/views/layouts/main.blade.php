<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    {{--<link rel="icon" href="../../favicon.ico">--}}


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('Resources/css/Bootstrap/bootstrap.min.css') }}">
    <script src="{{ asset('Resources/js/Jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('css/application.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('Resources/css/Font/font-awesome.min.css') }}">

    {{--<link rel="stylesheet" href="{{ asset('Resources/css/Font/fontiran.css') }}">--}}

    <!-- Hi_Frameworkwork Styles -->
    <link rel="stylesheet" href="{{ asset('Hi_Framework/dist/Hi_Framework.css') }}">

    {{--<script--}}
            {{--src="https://code.jquery.com/jquery-2.2.4.min.js"--}}
            {{--integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="--}}
            {{--crossorigin="anonymous"></script>--}}
    @yield('css_resources')
    {{--on pages we wanna user bootstrap-select the following should be included--}}
    {{--<link rel="stylesheet" href="{{ asset('Hi_Framework/components/Dropdown/Other Libraries/bootstrap-select/bootstrap.min.css') }}">--}}

</head>

<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <div class="row">
                <div class="col-10 Topbar px-0 hi-shadow-2">
                    <div class="Topbar_paddings">
                        <div class="row Topbar_rowOfItems">

                            {{--============[ navbar button in topbar ]===========--}}
                            <div class="col-1 Topbar_button pl-0">
                                <i class="fa fa-bars fa-2x text-white" aria-hidden="true"></i>
                            </div>

                            {{--============[ Profile icon in topbar ]===========--}}
                            <div class="col-1 text-right Topbar_avatar_container px-0">
                                <img class="rounded-circle Topbar_avatar" src="{{ asset('images/avatar.png') }}">
                            </div>

                            {{--============[ Profile dropdown in topbar ]===========--}}
                            <div class="col-2 Topbar_dropdown_container">
                                <div class="Topbar_dropdown dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        حمید وتر
                                    </button>
                                    <div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu hi-shadow-2" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item text-right py-1" href="#"><i class="fa fa-user ml-2" aria-hidden="true"></i> پروفایل من</a>
                                        <a class="dropdown-item text-right py-1" href="#"><i class="fa fa-file-text-o ml-2" aria-hidden="true"></i> مدیران</a>
                                        <a class="dropdown-item text-right py-1" href="#"><i class="fa fa-download ml-2" aria-hidden="true"></i> نسخه پشتیبانی</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-right py-1" href="#"><i class="fa fa-power-off ml-2" aria-hidden="true"></i>خروج</a>
                                    </div>
                                </div>
                            </div>

                            {{--============[ Search in topbar ]===========--}}
                            <div class="col-3 pull-4  pt-2">
                                @yield('search')
                                {{--<div class="hi-search-1">--}}
                                    {{--<input placeholder="جست و جو کنید..." class="hi-search_field" type="text">--}}
                                    {{--<button class="hi-button-btn1 pull-left"><i class="fa fa-search white-text hi-fontSize-19" aria-hidden="true"></i></button>--}}
                                {{--</div>--}}
                            </div>

                            {{--============[ Notifications with Badge in topbar ]===========--}}
                            <div class="col-1 pull-4 pt-0">
                                <button class="hi-button-btn1 Topbar_notificationBtn pull-left pt-3 px-2">
                                    <span class="badge badge-pill badge-danger">۱۰۰</span>
                                    <i class="fa fa-envelope-o white-text hi-fontSize-23" aria-hidden="true"></i>
                                </button>
                            </div>

                            {{--============[ Logout in topbar ]===========--}}
                            <div class="col-1 pull-4 pt-2">
                                <button class="hi-button-btn1 Topbar_logoutBtn py-1 px-2">
                                    <i class="fa fa-power-off white-text hi-fontSize-23" aria-hidden="true"></i>
                                </button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            {{--============[ This is the main content ]===========--}}
            <main class="row" id="MainBody">
                <div class="col-12">
                    <div class="row mb-1">
                        <div class="col-12 px-4">
                            @yield('breadcrumb')
                        </div>
                    </div>
                    @yield('content')
                </div>
            </main>
        </div>

        {{--============[ This is the Navigation Menu of dashboard ]===========--}}
        <nav class="col-2 Sidebar">
            <div class="Sidebar_logo">
                <a href="#">
                    <h1 class="white-text">داشبرد مدیریتی</h1>
                    <img class="img-fluid hi-size-4" src="{{ asset('images/logo.png') }}">
                </a>
            </div>

            {{--============[ Navigation Menu ]===========--}}
            <div class="Sidebar_menu">

                <div class="text-right" id="accordion" role="tablist" aria-multiselectable="true">

                    {{--============[ Home Menu of dashboard ]===========--}}
                    <h5 role="tab" class="pt-2 mt-4" id="home">
                        <a class="Sidebar_menu_link" href="{{url('/home')}}" >
                            صفحه اول<i class="fa fa-tachometer ml-4" aria-hidden="true"></i>
                        </a>
                    </h5>

                    {{--============[ Posts Menu of dashboard ]===========--}}
                    <h5 role="tab" class="pt-2" id="posts" data-toggle="collapse" data-parent="#accordion" href="#postsMenu" aria-expanded="false" aria-controls="postsMenu">
                        <a class="Sidebar_menu_link">
                            <i class="fa fa-chevron-left hi-fontSize-14" aria-hidden="true"></i>پست ها<i class="fa fa-pencil-square-o ml-4" aria-hidden="true"></i>
                        </a>
                    </h5>

                    <div id="postsMenu" class="collapse white-text" role="tabpanel" aria-labelledby="posts">
                        <ul>
                            <li class="subMenu">
                                <a>همه پست ها</a>
                            </li>
                            <li class="subMenu">
                                <a>پست جدید</a>
                            </li>
                            <li class="subMenu">
                                <a>پیش نویس ها</a>
                            </li>
                            <li class="subMenu">
                                <a>دسته بندی ها</a>
                            </li>
                            <li class="subMenu">
                                <a>تگ ها</a>
                            </li>
                            <li class="subMenu">
                                <a>نسخه پشتیبانی</a>
                            </li>
                        </ul>

                    </div>

                    {{--============[ Gallery Menu of dashboard ]===========--}}
                    <h5 role="tab" class="pt-2" id="gallery" data-toggle="collapse" data-parent="#accordion" href="#galleryMenu" aria-expanded="false" aria-controls="galleryMenu">
                        <a class="Sidebar_menu_link">
                            <i class="fa fa-chevron-left hi-fontSize-14" aria-hidden="true"></i>گالری<i class="fa fa-picture-o ml-4" aria-hidden="true"></i>
                        </a>
                    </h5>

                    <div id="galleryMenu" class="collapse white-text" role="tabpanel" aria-labelledby="gallery">
                        <ul>
                            <li class="subMenu">
                                <a>همه فایل ها</a>
                            </li>
                            <li class="subMenu">
                                <a>فایل جدید</a>
                            </li>
                        </ul>
                    </div>

                    {{--============[ Messages Menu of dashboard ]===========--}}
                    <h5 role="tab" class="pt-3" id="messages" data-toggle="collapse" data-parent="#accordion" href="#messagesMenu" aria-expanded="false" aria-controls="messagesMenu">
                        <a class="Sidebar_menu_link">
                            <i class="fa fa-chevron-left hi-fontSize-14" aria-hidden="true"></i><span class="badge badge-pill badge-default mr-2 countBadge">{{ \App\Inbox::whereSeen(0)->count() }}</span>پیام ها<i class="fa fa-envelope-o ml-4" aria-hidden="true"></i>
                        </a>
                    </h5>

                    <div id="messagesMenu" class="collapse white-text" role="tabpanel" aria-labelledby="messages">
                        <ul>
                            <li class="subMenu">
                                <a>صندوق ورودی</a>
                            </li>
                            <li class="subMenu">
                                <a>صندوق خروجی</a>
                            </li>
                        </ul>
                    </div>

                    {{--============[ Users Menu of dashboard ]===========--}}
                    <h5 role="tab" class="pt-2" id="users" data-toggle="collapse" data-parent="#accordion" href="#usersMenu" aria-expanded="false" aria-controls="usersMenu">
                        <a class="Sidebar_menu_link">
                            <i class="fa fa-chevron-left hi-fontSize-14" aria-hidden="true"></i>کاربران<i class="fa fa-user-o ml-4" aria-hidden="true"></i>
                        </a>
                    </h5>

                    <div id="usersMenu" class="collapse white-text" role="tabpanel" aria-labelledby="users">
                        <ul>
                            <li class="subMenu">
                                <a>همه کاربران</a>
                            </li>
                            <li class="subMenu">
                                <a>کاربر جدید</a>
                            </li>
                            <li class="subMenu">
                                <a>نسخه پشتیبانی</a>
                            </li>
                        </ul>
                    </div>

                    {{--============[ Comments page of dashboard ]===========--}}
                    <h5 role="tab" class="pt-2" id="comments">
                        <a class="Sidebar_menu_link" data-parent="#accordion" href="#comments">
                            <span class="badge badge-pill badge-default mr-2 countBadge">{{ \App\Comment::whereStatus('not-checked')->count() }}</span>نظرات<i class="fa fa-commenting-o ml-4" aria-hidden="true"></i>
                        </a>
                    </h5>
                    {{--============[ Admin Menu of dashboard ]===========--}}
                    <h5 role="tab" class="pt-2" id="admins" data-toggle="collapse" data-parent="#accordion" href="#adminsMenu" aria-expanded="false" aria-controls="adminsMenu">
                        <a class="Sidebar_menu_link">
                            <i class="fa fa-chevron-left hi-fontSize-14" aria-hidden="true"></i>مدیران<i class="fa fa-user-circle-o ml-4" aria-hidden="true"></i>
                        </a>
                    </h5>
                    <div id="adminsMenu" class="collapse white-text" role="tabpanel" aria-labelledby="admins">
                        <ul>
                            <li class="subMenu">
                                <a>همه مدیران</a>
                            </li>
                            <li class="subMenu">
                                <a>مدیر جدید</a>
                            </li>
                            <li class="subMenu">
                                <a>پروفایل من</a>
                            </li>
                            <li class="subMenu">
                                <a>نسخه پشتیبانی</a>
                            </li>
                        </ul>

                    </div>

                    {{--============[ Settings Menu of dashboard ]===========--}}
                    <h5 role="tab" class="pt-2" id="settings" data-toggle="collapse" data-parent="#accordion" href="#settingsMenu" aria-expanded="false" aria-controls="settingsMenu">
                        <a class="Sidebar_menu_link">
                            <i class="fa fa-chevron-left mr-5 hi-fontSize-14" aria-hidden="true"></i>تنظیمات<i class="fa fa-cog ml-4" aria-hidden="true"></i>
                        </a>
                    </h5>

                    <div id="settingsMenu" class="collapse white-text" role="tabpanel" aria-labelledby="settings">
                        <ul>
                            <li class="subMenu">
                                <a>تنظیمات سایت</a>
                            </li>
                            <li class="subMenu">
                                <a>اسلایدر اول</a>
                            </li>
                            <li class="subMenu">
                                <a>اسلایدر دوم</a>
                            </li>
                            <li class="subMenu">
                                <a>سوالات متداول</a>
                            </li>
                        </ul>
                    </div>

                    {{--============[ Backup Menu of dashboard ]===========--}}
                    <h5 role="tab" class="pt-3" id="backup">
                        <a class="Sidebar_menu_link" data-parent="#accordion" href="#backup">
                             پشتیبانی<i class="fa fa-download ml-4" aria-hidden="true"></i>
                        </a>
                    </h5>
                    <h5 role="tab" class="pt-3" id="backup">
                        <a class="Sidebar_menu_link" data-parent="#accordion" href="#backup">
                            پیوند ها<i class="fa fa-link ml-4" aria-hidden="true"></i>
                        </a>
                    </h5>
                </div>

            </div>
        </nav>
    </div>


    {{--==========[ Gallery Modal ]========= --}}

    @yield('gallery')


</div>



{{--<script src="{{ asset('Resources/js/Jquery/jquery-3.2.0.min.js') }}"></script>--}}
<script src="{{ asset('Resources/js/Jquery/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('js/layout/sidebar.js') }}"></script>
<script src="{{ asset('js/jquery.easydropdown.js') }}"></script>
<script src="{{ asset('js/public.js') }}"></script>
<script src="{{ asset('js/Alert/modernizr.custom.js') }}"></script>
<script src="{{ asset('js/Alert/bounce.min.js') }}"></script>
<script src="{{ asset('js/Alert/classie.js') }}"></script>
<script src="{{ asset('js/Alert/notificationFx.js') }}"></script>
<script src="{{ asset('Resources/js/Bootstrap/tether.min.js') }}"></script>
<script src="{{ asset('Resources/js/Bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('Hi_Framework/css/Animation/Other Libraries/Waves/waves.min.js') }}"></script>
<script src="{{ asset('Hi_Framework/css/Animation/Other Libraries/Animate/dropdownAnim.js') }}"></script>
@yield('js_resources')
<script src="{{ asset('Hi_Framework/components/Dropdown/Other Libraries/bootstrap-select/bootstrap-select.js') }}"></script>
<script src="{{ asset('js/application.js') }}"></script>

@yield('javascript')
{{--on pages we wanna user bootstrap-select the following should be included--}}
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
{{--<script src="{{ asset('Hi_Framework/components/Dropdown/Other Libraries/bootstrap-select/bootstrap.min.js') }}"></script>--}}

</body>
</html>
