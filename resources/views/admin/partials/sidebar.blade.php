<div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                    <?php 
                        $request =Request::path();

                        $route_name =substr($request, 10, strlen($request));
                        
                    ?>
                </a>
            </div>
            
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ strlen($route_name) < 3  ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="{{ $route_name == 'users' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.users') }}">
                            <i class="material-icons">person</i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="{{ $route_name == 'articles' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.articles') }}">
                            <i class="material-icons">content_paste</i>
                            <p>Articles</p>
                        </a>
                    </li>
                    <li class="{{ $route_name == 'photos' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.photos') }}">
                            <i class="material-icons">photo</i>
                            <p>Photos</p>
                        </a>
                    </li>
                    <li class="{{ $route_name == 'videos' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.photos') }}">
                            <i class="material-icons">movie</i>
                            <p>Videos</p>
                        </a>
                    </li>
                    <li class="{{ $route_name == 'comments' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.comments') }}">
                            <i class="material-icons">comment</i>
                            <p>Comments</p>
                        </a>
                    </li>
                    <li class="{{ $route_name == 'likes' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.likes') }}">
                            <i class="material-icons text-gray">thumb_up</i>
                            <p>Likes</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="upgrade.html">
                            <i class="material-icons">exit_to_app</i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
            
            
        </div>