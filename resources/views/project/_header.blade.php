<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ route('home') }}">
            <img src="{{ asset('img/logo.png') }}" alt="logo"/>
            <span>Lindalë</span>
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('home') }}">
            <img src="{{ asset('img/logo.png') }}" alt="logo" />
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                    </div>
                    <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                </div>
            </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
            {{--<li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-file-document-box"></i>
                    <span class="count">7</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                    <div class="dropdown-item">
                        <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                        </p>
                        <span class="badge badge-info badge-pill float-right">View all</span>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="../../images/faces/face4.jpg" alt="image" class="profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow">
                            <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
                                <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                            </h6>
                            <p class="font-weight-light small-text">
                                The meeting is cancelled
                            </p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="../../images/faces/face2.jpg" alt="image" class="profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow">
                            <h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
                                <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                            </h6>
                            <p class="font-weight-light small-text">
                                New product launch
                            </p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="../../images/faces/face3.jpg" alt="image" class="profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow">
                            <h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
                                <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                            </h6>
                            <p class="font-weight-light small-text">
                                Upcoming board meeting
                            </p>
                        </div>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-bell"></i>
                    <span class="count">4</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <a class="dropdown-item">
                        <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                        </p>
                        <span class="badge badge-pill badge-warning float-right">View all</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                                <i class="mdi mdi-alert-circle-outline mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                            <p class="font-weight-light small-text">
                                Just now
                            </p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-warning">
                                <i class="mdi mdi-comment-text-outline mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
                            <p class="font-weight-light small-text">
                                Private message
                            </p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-info">
                                <i class="mdi mdi-email-outline mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
                            <p class="font-weight-light small-text">
                                2 days ago
                            </p>
                        </div>
                    </a>
                </div>
            </li>--}}
            <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="{{ auth()->user()->photoPath() }}" alt="{{ auth()->user()->name }}">
                    <span class="profile-text ml-2">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-item p-0">
                        <div class="d-flex border-bottom">
                            <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                                <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                            </div>
                            <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                <i class="mdi mdi-chart-gantt mr-0 text-gray"></i>
                            </div>
                            <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                <a href="{{ route('settings') }}" @click="showLoader"><i class="mdi mdi-settings mr-0 text-gray"></i></a>
                            </div>
                        </div>
                    </div>
                    <a class="dropdown-item" @click="showLoader">
                        <i class="mdi mdi-lock"></i>
                        {{ trans('user.account') }}
                    </a>
                    <a href="{{ url('/logout') }}" class="dropdown-item" @click="showLoader">
                        <i class="mdi mdi-logout"></i>
                        {{ trans('auth.logout') }}
                    </a>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link" @click="fullScreen">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>
        </ul>
        <div>
            <a class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" id="MenuDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="mdi mdi-account"></span>
            </a>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" v-if="hasSidebar" @click="menuButtonHasClicked">
                <transition name="custom-classes-transition"
                            enter-active-class="animated zoomIn"
                            leave-active-class="animated zoomOut"
                            mode="out-in"
                            :duration="300">
                    <span class="mdi mdi-close" v-if="sidebar" :key="sidebar"></span>
                    <span class="mdi mdi-menu" v-else :key="sidebar"></span>
                </transition>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdownAnimation" aria-labelledby="MenuDropdown">
                <a class="dropdown-item p-0">
                    <div class="d-flex border-bottom">
                        <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                            <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                        </div>
                        <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                            <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                        </div>
                        <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                            <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                        </div>
                    </div>
                </a>
                <a href="{{ route('home') }}" class="dropdown-item mt-2" @click="showLoader">
                    <i class="mdi mdi-view-dashboard"></i>
                    Dashboard
                </a>
                <a href="{{ route('projects') }}" class="dropdown-item" @click="showLoader">
                    <i class="mdi mdi-folder-multiple-outline"></i>
                    Projects
                </a>
                <a href="{{ route('tasks') }}" class="dropdown-item" @click="showLoader">
                    <i class="mdi mdi-file-tree"></i>
                    Tasks
                </a>
                {{--<a class="dropdown-item mt-2">
                    Manage Accounts
                </a>
                <a class="dropdown-item">
                    Change Password
                </a>
                <a class="dropdown-item">
                    Check Inbox
                </a>--}}
                <div class="dropdown-divider"></div>
                <a href="{{ url('/logout') }}" class="dropdown-item" @click="showLoader">
                    <i class="mdi mdi-logout"></i>
                    {{ trans('auth.logout') }}
                </a>
            </div>
        </div>
    </div>
</nav>