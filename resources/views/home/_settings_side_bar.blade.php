<nav class="sidebar sidebar-offcanvas" :class="{ active: sidebar }" id="sidebar" data-sidebar="true">
    <ul class="nav">
        <li class="nav-item">
            <div class="nav-link">
                <span class="menu-title text-gray font-weight-bold">{{ trans('user.settings') }}</span>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">{{ trans('user.public-profile') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-lock"></i>
                <span class="menu-title">{{ trans('user.account') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-earth"></i>
                <span class="menu-title">{{ trans('user.location') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-bell"></i>
                <span class="menu-title">{{ trans('config.notification') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <div class="nav-link">
                <span class="menu-title text-gray font-weight-bold">{{ trans('config.developer-config') }}</span>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-shape"></i>
                <span class="menu-title">{{ trans('config.oauth-app') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-key"></i>
                <span class="menu-title">{{ trans('config.oauth-personal') }}</span>
            </a>
        </li>
    </ul>
</nav>