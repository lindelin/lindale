<nav class="sidebar sidebar-offcanvas" :class="{ active: sidebar }" id="sidebar" data-sidebar="true">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="{{ $project->image() }}" alt="profile image">
                    </div>
                    <div class="text-wrapper">
                        <p class="profile-name">{{ $project->title }}</p>
                        <div>
                            <span class="status-indicator online"></span>
                            <small class="designation text-muted">{{ $project->status_id }}</small>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-block">
                    {{ trans('task.new-task') }}
                    <i class="mdi mdi-plus"></i>
                </button>
            </div>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'profile-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('profile-settings')">
                <i class="menu-icon mdi mdi-view-dashboard-variant"></i>
                <span class="menu-title">{{ trans('header.top') }}</span>
            </a>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'account-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('account-settings')">
                <i class="menu-icon mdi mdi-information-outline"></i>
                <span class="menu-title">{{ trans('header.info') }}</span>
            </a>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'location-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('location-settings')">
                <i class="menu-icon mdi mdi-chart-gantt"></i>
                <span class="menu-title">{{ trans('header.progress') }}</span>
            </a>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'notification-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('notification-settings')">
                <i class="menu-icon mdi mdi-file-tree"></i>
                <span class="menu-title">{{ trans('header.tasks') }}</span>
            </a>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'authorized-clients-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('authorized-clients-settings')">
                <i class="menu-icon mdi mdi-check-all"></i>
                <span class="menu-title">TODOs</span>
            </a>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'oauth-app-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('oauth-app-settings')">
                <i class="menu-icon mdi mdi-account-multiple"></i>
                <span class="menu-title">{{ trans('header.member') }}</span>
            </a>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'oauth-personal-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('oauth-personal-settings')">
                <i class="menu-icon mdi mdi-finance"></i>
                <span class="menu-title">{{ trans('header.achievement') }}</span>
            </a>
        </li>
        <li class="nav-item" :class="{active: sidebarActive === 'oauth-personal-settings'}">
            <a class="nav-link" href="javascript:void(0);" @click="selectedSidebarItem('oauth-personal-settings')">
                <i class="menu-icon mdi mdi-book-open-page-variant"></i>
                <span class="menu-title">Wiki</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-settings"></i>
                <span class="menu-title">{{ trans('header.config') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>