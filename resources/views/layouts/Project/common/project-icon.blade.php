<div class="row">
    @if($project->image != '')
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="#" class="thumbnail">
                <img src="{{ asset('storage/'.$project->image) }}" alt="...">
            </a>
        </div>
    @else
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="#" class="thumbnail">
                <img src="{{ asset('img/plus.png') }}" alt="...">
            </a>
        </div>
    @endif
</div>