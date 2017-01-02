<header class="app-bar fixed-top navy bg-teal" data-role="appbar">
    <div class="container">
        <a href="/" class="app-bar-element branding">LOGO</a>

        <ul class="app-bar-menu small-dropdown">
            <li>
                <a href="#" class="dropdown-toggle">顶级菜单1</a>
                <ul class="d-menu" data-role="dropdown" data-no-close="true">
                    <li class="disabled"><a href="overview.html">禁用菜单</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="" class="dropdown-toggle">菜单1</a>
                        <ul class="d-menu" data-role="dropdown">
                            <li><a href="grid.html">菜单1--11</a></li>
                            <li><a href="flexgrid.html">菜单1--22</a></li>
                        </ul>
                    </li>
                    <li><a href="buttons.html">菜单5</a></li>
                    <li class="divider"></li>
                    <li><a href="rtl.html">菜单8</a></li>
                    <li class="disabled"><a href="responsive.html">菜单9</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">顶层菜单2</a>
                <ul class="d-menu" data-role="dropdown" data-no-close="true">
                    <li>
                        <a href="#" class="dropdown-toggle">菜单2</a>
                        <ul class="d-menu" data-role="dropdown" data-no-close="true">
                            <li><a href="appbar.html">菜单2--11</a></li>
                            <li><a href="menu.html">菜单2--22</a></li>
                            <li><a href="fluent-menu.html">菜单2--33</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">菜单2</a>
                        <ul class="d-menu" data-role="dropdown">
                            <li><a href="video-player.html">菜单2--55</a></li>
                            <li><a href="audio-player.html">菜单2--66</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">菜单22</a>
                        <ul class="d-menu" data-role="dropdown">
                            <li><a href="validator.html">菜单23</a></li>
                            <li><a href="draggable.html">菜单24</a></li>
                        </ul>
                    </li>
                    <li><a href="charms.html">菜单5</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="#" class="dropdown-toggle">菜单6</a>
                        <ul class="d-menu" data-role="dropdown">
                            <li><a href="events.html">菜单6-11</a></li>
                            <li><a href="hotkeys.html">菜单6-22</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="dropdown-toggle">顶层菜单3</a>
                <ul class="d-menu" data-role="dropdown" data-no-close="true">
                    <li><a href="templates/start-screen.html">菜单33-11</a></li>
                    <li><a href="templates/news-portal.html">菜单33-22</a></li>
                    <li><a href="templates/login.html">菜单33-33</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="dropdown-toggle">顶层菜单4</a>
                <ul class="d-menu" data-role="dropdown" data-no-close="true">
                    <li><a href="http://forum.metroui.org.ua">菜单4--11</a></li>
                    <li><a href="https://github.com/olton/Metro-UI-CSS">菜单4--22</a></li>
                    <li class="divider"></li>
                    <li><a href="license.html">菜单4--33</a></li>
                </ul>
            </li>
        </ul>

        <!-- <span class="app-bar-pull"></span> -->
        <div class="app-bar-element place-right">
            <span class="dropdown-toggle"><span class="mif-cog"></span> Liner.xie</span>
            <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 220px">
                <ul class="unstyled-list fg-blue">
                    <li><a href="" class="fg-hover-yellow">控制面板</a></li>
                    <li><a href="" class="fg-hover-yellow">其他设置</a></li>
                    <li><a href="{{ url('/logout') }}" class="fg-hover-yellow">退出</a></li>
                </ul>
            </div>
        </div>

    </div>
</header>