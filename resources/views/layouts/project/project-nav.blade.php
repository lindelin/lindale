@include('layouts.project.project-nav.project-nav',
['url_master' =>
    [
    'top_url' => url("project/$project->id"),
    'info_url' => url("project/$project->id/info"),
    'progress_url' => url("project/$project->id/progress"),
    'tasks_url' => url("project/$project->id/task"),
    'todo_url' => url("project/$project->id/todo"),
    'member_url' => url("project/$project->id/member"),
    'achievement_url' => route('achievement', compact('project')),
    'budget_url' => '#',
    'bbs_url' => '#',
    'concept_url' => '#',
    'wiki_url' => url("project/$project->id/wiki"),
    'config_url' => url("project/$project->id/config"),
]])
