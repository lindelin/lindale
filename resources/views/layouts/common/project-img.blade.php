@if($project->image != '')
    <a href="#" class="thumbnail">
        <img src="{{ asset('storage/'.$project->image) }}">
    </a>
@else
    <a href="#" class="thumbnail">
        <img src="{{ asset(Colorable::lindaleImage()) }}">
    </a>
@endif