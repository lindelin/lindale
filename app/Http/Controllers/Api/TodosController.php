<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\MyTodoCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodosController extends Controller
{
    /**
     * My Todos
     * @param Request $request
     * @return MyTodoCollection
     */
    public function myTodoCollection(Request $request)
    {
        return new MyTodoCollection($request->user()->Todos()
            ->with([
                'Initiator',
                'Type',
                'Status',
                'Project',
                'TodoList',
                'User',
            ])
            ->where('type_id', config('todo.public'))
            ->orderBy('status_id', 'desc')
            ->latest('updated_at')
            ->paginate(50));
    }
}
