<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="list-group">
            <a href="#" class="list-group-item">
                <span class="badge">{{ $allCount }}</span>
                <span class="glyphicon glyphicon-user lindale-color"></span>
                <span class="lindale-color">{{ trans('member.all-members') }}</span>
            </a>
            <a href="#" class="list-group-item">
                <span class="badge">1</span>
                <span class="glyphicon glyphicon-king lindale-color"></span>
                <span class="lindale-color">{{ trans('member.pl') }}</span>
            </a>
            <a href="#" class="list-group-item">
                <span class="badge">{{ $slCount }}</span>
                <span class="glyphicon glyphicon-queen lindale-color"></span>
                <span class="lindale-color">{{ trans('member.sl') }}</span>
            </a>
            <a href="#" class="list-group-item">
                <span class="badge">{{ $paCount }}</span>
                <span class="glyphicon glyphicon-bishop lindale-color"></span>
                <span class="lindale-color">{{ trans_choice('member.pa', $paCount) }}</span>
            </a>
            <a href="#" class="list-group-item">
                <span class="badge">{{ $pmCount }}</span>
                <span class="glyphicon glyphicon-pawn lindale-color"></span>
                <span class="lindale-color">{{ trans_choice('member.pm', $pmCount) }}</span>
            </a>
        </div>
    </div>
</div>