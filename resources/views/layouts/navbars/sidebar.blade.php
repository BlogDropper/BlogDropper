<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <h1 class="text-blue">Admin Panel</h1>
        </a>
        <!-- Collapse -->
        <div class="mt--3 collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Navigation -->
            <ul class="navbar-nav">
                @if(app()->isDownForMaintenance())
                @else
                <div class="hidewheninmaintenence">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.backend') }}">
                        <i class="ni ni-chat-round text-primary"></i> {{ __('Posts') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cat.index') }}">
                        <i class="ni ni-archive-2 text-primary"></i> {{ __('Categories') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('webusershow.index') }}">
                        <i class="ni ni-single-02 text-primary"></i> {{ __('WebUsers') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('showcomments.index') }}">
                        <i class="ni ni-chat-round text-primary"></i> {{ __('Comments') }}
                    </a>
                </li>
                </div>
                @endif
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fa fa-user-tie" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Admin Navigations') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    <i class="fa fa-user" style="color: #f4645f;"></i>
                                    {{ __('User profile') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    <i class="fa fa-users" style="color: #f4645f;"></i>
                                    {{ __('User Management') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('settings') }}">
                                    <i class="fa fa-wrench" style="color: #f4645f;"></i>
                                    {{ __('Settings') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
