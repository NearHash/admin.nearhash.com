<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{ asset('favicon.png') }}" />

    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7c0ec42130.js" crossorigin="anonymous"></script>

    {{-- material icons  --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('extra_css')

</head>
<body>

    <div class="sidebar shadow">
        
        <div class="logo-container mb-3">
            <img class="logo" class="" src="{{ asset('logo.png') }}" alt="">
        </div>
        <aside class="p-2 pt-0 content-fm">
            <ul class="text-light m-0 p-0">
                <li class=""><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
            </ul>
            <ul class="m-0 p-0">
                <li id="admin"  class="dropNav {{ Request::segment(2) == 'admin-users'  ?  'open-drop' : null }}">
                    <a href="javascript:void(0)" onclick="dropTagAction('admin')">
                        <i class="fa fa-users"></i>
                        <span>Admin Management</span>
                        <i class="fa fa-angle-right aside-icon " id="admin-icon"></i>
                    </a>
                    <ul>
                        <li class="{{ Route::currentRouteName() == 'admin.admin-users.index' || Route::currentRouteName() == 'admin.admin-users.create' ? 'active-link' : null;}}">
                            <p><a href="{{ route('admin.admin-users.index') }}">Admin Users</a></p>
                        </li>
                        <li><p>Additional</p></li>
                        <li><p>Additional</p></li>
                    </ul>
                </li>
                <li id="ecom"  class="dropNav {{ Request::segment(2) == 'users'  ?  'open-drop' : null }}">
                    <a href="javascript:void(0)" onclick="dropTagAction('ecom')">
                        <i class="fa fa-users"></i>
                        <span>User Management</span>
                        <i class="fa fa-angle-right aside-icon " id="ecom-icon"></i>
                    </a>
                    <ul>
                        <li><p><a href="{{ route('admin.users.index') }}">Users</a></p></li>
                        <li><p>Additional</p></li>
                        <li><p>Additional</p></li>
                    </ul>
                </li>
                <li id="comp" class="dropNav" >
                    <a href="javascript:void(0)" onclick="dropTagAction('comp')">
                        <i class="fa fa-diamond"></i>
                        <span>Ads Management</span>
                        <i class="fa fa-angle-right aside-icon " id="comp-icon"></i>
                    </a>
                    <ul>
                        <li><p>Ads</p></li>
                        <li><p>Panels</p></li>
                        <li><p>Generals</p></li>
                        <li><p>Generals</p></li>
                        <li><p>Generals</p></li>
                    </ul>
                </li>
                <li id="chart"  class="dropNav">
                    <a href="javascript:void(0)" onclick="dropTagAction('chart')">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>Privacy Management</span>
                        <i class="fa fa-angle-right aside-icon " id="chart-icon"></i>
                    </a>
                    <ul>
                        <li><p>Users Info</p></li>
                        <li><p>Posts guard</p></li>
                        <li><p>Bar chart</p></li>
                        <li><p>Histogram chart</p></li>
                    </ul>
                </li>
                <li id="user"  class="dropNav">
                    <a href="javascript:void(0)" onclick="dropTagAction('user')">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Bussiness</span>
                        <i class="fa fa-angle-right aside-icon " id="user-icon"></i>
                    </a>
                    <ul>
                        <li><p>Posts</p></li>
                        <li><p>Limition</p></li>
                        <li><p>Diagram</p></li>
                        <li><p>History</p></li>
                        <li><p>Targets</p></li>
                    </ul>
                </li>
                <li id="task"  class="dropNav">
                    <a href="javascript:void(0)" onclick="dropTagAction('task')">
                        <i class="fa fa-tasks"></i>
                        <span>Tasks</span>
                        <i class="fa fa-angle-right aside-icon " id="task-icon"></i>
                    </a>
                    <ul>
                        <li><p>Line chart</p></li>
                        <li><p>Histogram chart</p></li>
                        <li><p>Bar chart</p></li>
                        <li><p>Histogram chart</p></li>
                    </ul>
                </li>
                <li id="even"  class="dropNav">
                    <a href="javascript:void(0)" onclick="dropTagAction('even')">
                        <i class="fa fa-calendar-check"></i>
                        <span>Events</span>
                        <i class="fa fa-angle-right aside-icon " id="even-icon"></i>
                    </a>
                    <ul>
                        <li><p>Line chart</p></li>
                        <li><p>Histogram chart</p></li>
                        <li><p>Histogram chart</p></li>
                        <li><p>Bar chart</p></li>
                        <li><p>Histogram chart</p></li>
                    </ul>
                </li>
                <li id="setting"  class="dropNav">
                    <a href="javascript:void(0)" onclick="dropTagAction('setting')">
                        <i class="fa-solid fa-gear"></i>
                        <span>Setting </span>
                        <i class="fa fa-angle-right aside-icon " id="setting-icon"></i>
                    </a>
                    <ul>
                        <li><p>Tools</p></li>
                        <li><p>Features</p></li>
                        <li><p>Bar chart</p></li>
                        <li><p>Histogram chart</p></li>
                        <li><p>Histogram chart</p></li>
                        <li><p>Histogram chart</p></li>
                        <li><p>Histogram chart</p></li>
                        <li><p>Histogram chart</p></li>
                        <li><p>Histogram chart</p></li>
                        <li><p>Histogram chart</p></li>
                    </ul>
                </li>
            </ul>
        </aside>

    </div>

    
    <div class="main">
        <nav class="header">
            <div class="menuContainer d-flex align-items-center">
                <span class="menu pt-2" ><i class="fa-solid fa-bars fs-4"></i></span>
            </div>
            <div class="dropdown">
                <a class="text-decoration-none text-dark" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{-- <img style="width: 40px;" src="{{ asset('images/red_setting_icon.png') }}" alt=""> <span class="fs-6 ms-2">Aung Zaw Phyo</span> --}}
                    <span class="material-symbols-rounded p-2" style="font-size: 25px">
                        account_circle
                    </span>
                </a>
                <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                    <li class="d-flex flex-column justify-content-center align-items-center p-2">
                        <div>Aung Zaw Phyo</div>
                        <div class="my-2">User Analyst</div>
                        
                        <form action="#" method="POST">
                            <button class="btn btn-link text-decoration-none d-flex justify-content-center align-items-center"><i class="fa fa-fw fa-power-off"></i> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="p-3">
            <div class="body mt-2">

                @yield('content')
                
            </div>
        </div>
        <footer class="shadow-lg">
            Copyright © 2022 <b style="color: var(--primary)">NearHash</b>. All rights reserved.
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('js/layout.js') }}"></script>

    <script>
        $(document).ready(
            function () {
                $('.back-btn').on('click', function () { 
                    window.history.go(-1)
                    return false
                })
            }
        )
    </script>

    @yield('script')

</body>
</html>

