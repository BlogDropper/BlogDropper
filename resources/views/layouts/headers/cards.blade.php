<div class="header bg-gradient-primary pb-8 pt-5 pt-md-7">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <a href="{{ route('posts.backend') }}">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Posts</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$posts->count()}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-danger mr-2"><i class="fa fa-arrow-right"></i></span>
                                <span class="text-nowrap">Edit Posts Here</span>
                            </p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <a href="{{ route('cat.index') }}">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Sorted Category</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$cat->count()}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-warning mr-2"><i class="fas fa-arrow-right"></i></span>
                                <span class="text-nowrap">Edit Categories Here</span>
                            </p>
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <a href="{{ route('webusershow.index') }}">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Web-Users</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$webuser->count()}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-yellow mr-2"><i class="fas fa-arrow-right"></i></span>
                                <span class="text-nowrap">Edit WebUsers Here</span>
                            </p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <a href="{{ route('showcomments.index') }}">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Comments</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$comments->count()}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-purple mr-2"><i class="fas fa-arrow-right"></i></span>
                                <span class="text-nowrap">Edit Comments here</span>
                            </p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
