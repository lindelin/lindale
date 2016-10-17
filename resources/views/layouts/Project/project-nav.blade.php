@include('layouts.Project.project-nav.project-nav',
['url_master' =>
    [
    'top_url' => url("project/$project->id"),
    'info_url' => url("project/$project->id/info"),
    'progress_url' => '#',
    'tasks_url' => '#',
    'todo_url' => url("project/$project->id/todo"),
    'member_url' => url("project/$project->id/member"),
    'achievement_url' => '#',
    'budget_url' => '#',
    'bbs_url' => '#',
    'concept_url' => '#',
    'wiki_url' => url("project/$project->id/wiki"),
    'config_url' => '#'
]])
