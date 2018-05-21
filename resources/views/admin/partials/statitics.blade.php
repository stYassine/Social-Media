<div class="col-lg-3 col-md-6 col-sm-6">

    <div class="card card-stats">
        <div class="card-header" data-background-color="orange">
            <i class="material-icons">group</i>
        </div>
        <div class="card-content">
            <p class="category">Users</p>
            <h3 class="title">{{ $users_count }}
            </h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons text-danger">warning</i>
                <a href="{{ route('dashboard.users') }}">View Users...</a>
            </div>
        </div>
    </div>
</div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="green">
                <i class="material-icons">content_paste</i>
            </div>
            <div class="card-content">
                <p class="category">Articles</p>
                <h3 class="title">{{ $articles_count }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">date_range</i> <a href="{{ route('dashboard.articles') }}">View Articles...</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="red">
                <i class="material-icons">photo</i>
            </div>
            <div class="card-content">
                <p class="category">Photos</p>
                <h3 class="title">{{ $photos_count }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">local_offer</i> <a href="{{ route('dashboard.photos') }}">View Photos...</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="blue">
                <i class="fa fa-twitter"></i>
            </div>
            <div class="card-content">
                <p class="category">Comments</p>
                <h3 class="title">{{ $comments_count }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">movie</i> <a href="{{ route('dashboard.comments') }}">View Comments...</a>
                </div>
            </div>
        </div>
    </div>