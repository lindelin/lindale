<nav class="sidebar sidebar-offcanvas" :class="{ active: sidebar }" id="sidebar" data-sidebar="true">
    <ul class="nav">
        <li class="nav-item">
            <div class="nav-link">
                <span class="menu-title text-gray font-weight-bold">{{ trans('user.settings') }}</span>
            </div>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'profile-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('profile-settings')">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">{{ trans('user.public-profile') }}</span>
            </a>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'account-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('account-settings')">
                <i class="menu-icon mdi mdi-lock"></i>
                <span class="menu-title">{{ trans('user.account') }}</span>
            </a>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'location-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('location-settings')">
                <i class="menu-icon mdi mdi-earth"></i>
                <span class="menu-title">{{ trans('user.location') }}</span>
            </a>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'notification-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('notification-settings')">
                <i class="menu-icon mdi mdi-bell"></i>
                <span class="menu-title">{{ trans('config.notification') }}</span>
            </a>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'authorized-clients-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('authorized-clients-settings')">
                <i class="menu-icon mdi mdi-apps"></i>
                <span class="menu-title">{{ trans('config.authorized-clients') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <div class="nav-link">
                <span class="menu-title text-gray font-weight-bold">{{ trans('config.developer-config') }}</span>
            </div>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'oauth-app-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('oauth-app-settings')">
                <i class="menu-icon mdi mdi-shape"></i>
                <span class="menu-title">{{ trans('config.oauth-app') }}</span>
            </a>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'oauth-personal-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('oauth-personal-settings')">
                <i class="menu-icon mdi mdi-key"></i>
                <span class="menu-title">{{ trans('config.oauth-personal') }}</span>
            </a>
        </li>
    </ul>
</nav>