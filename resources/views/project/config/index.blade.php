@component('components.project.config', compact('project', 'selected', 'mode'))
    {{-- 基本設定 --}}
    @component('components.well')
        @slot('title')
            <span class="glyphicon glyphicon-briefcase lindale-icon-color"></span> {{ trans('config.basic') }}
        @endslot
        @component('components.elements.form', ['url' => route('project.update', compact('project')), 'method' => 'PATCH'])
            @component('components.grids.12-11-10-8')
                {{-- 图片 --}}
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        @include('layouts.common.project-img')
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label class="control-label">{{ trans('project.add-image') }}</label>
                            <input type="file" name="image">
                            <p class="help-block">（ jpeg、png、bmp、gif、svg ）</p>
                            @include('layouts.common.error-one', ['field' => 'image'])
                        </div>
                    </div>
                </div>

                {{-- 项目名 --}}
                @component('components.elements.form.text', ['name' => 'title', 'value' => $project->title])
                    {{ trans('project.title') }}
                @endcomponent

                {{-- 项目描述 --}}
                @component('components.elements.form.markdown', ['name' => 'content', 'value' => $project->content])
                    {{ trans('project.content') }}
                @endcomponent

                {{-- 开始时间 --}} {{-- 结束时间 --}}
                @component('components.elements.form.start-end', ['start_target' => 'projectStart-'.$project->id, 'end_target' => 'projectEnd-'.$project->id])
                    @slot('start')
                        {{ trans('project.start_at') }}
                    @endslot
                    @slot('end')
                        {{ trans('project.end_at') }}
                    @endslot
                    @slot('start_value')
                        {{ $project->start_at }}
                    @endslot
                    @slot('end_value')
                        {{ $project->end_at }}
                    @endslot
                @endcomponent

                {{-- 类型 --}}
                @component('components.elements.form.text', ['name' => 'type_id', 'value' => $project->type_id])
                    {{ trans('project.type') }}
                @endcomponent

                {{-- 项目副总监 --}}
                @component('components.elements.form.select', ['name' => 'sl_id'])
                    @slot('label')
                        {{ trans('project.sl') }}
                    @endslot

                    <option value="">{{ trans('project.none') }}</option>
                    @foreach( $users as $user)
                        <option value="{{ $user->id }}" @if($project->sl_id == $user->id) selected @endif>{{ $user->name }}（{{ $user->email }}）</option>
                    @endforeach
                @endcomponent

                {{-- 项目状态 --}}
                @component('components.elements.form.text', ['name' => 'status_id', 'value' => $project->type_id])
                    {{ trans('project.status') }}
                @endcomponent

                {{-- 项目密码 --}}
                @component('components.elements.form.password', ['name' => 'password'])
                    {{ trans('project.password') }}
                @endcomponent

                {{-- 确认密码 --}}
                @component('components.elements.form.password', ['name' => 'password_confirmation'])
                    {{ trans('project.password_confirmation') }}
                @endcomponent

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        @include('layouts.project.edit-modal')
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#projectEdit">
                            {{ trans('project.edit-project') }}
                        </button>
                    </div>
                </div>
            @endcomponent
        @endcomponent
    @endcomponent

    {{-- 删除项目 --}}
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h4 class="panel-title">{{ trans('project.delete') }}</h4>
        </div>
        <div class="panel-body">
            @if(Auth()->user()->id === $project->user_id)
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h3>{{ trans('project.transfer') }}</h3>
                                <p>{{ trans('project.transfer-info') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            {{-- 框架 --}}
                            <div class="col-xs-12 col-sm-11 col-md-10 col-lg-8">
                                @include('layouts.project.transfer')
                            </div>
                            {{-- 框架 --}}
                            <div class="col-xs-0 col-sm-1 col-md-2 col-lg-4">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endif
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h3>{{ trans('project.delete') }}</h3>
                            <p>{{ trans('config.delete-project-info') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        {{-- 框架 --}}
                        <div class="col-xs-12 col-sm-11 col-md-10 col-lg-8">
                            @include('layouts.project.delete')
                        </div>
                        {{-- 框架 --}}
                        <div class="col-xs-0 col-sm-1 col-md-2 col-lg-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcomponent