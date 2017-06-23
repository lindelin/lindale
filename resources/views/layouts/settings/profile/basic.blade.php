<div class="well well-home">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h4><span class="glyphicon glyphicon-user lindale-icon-color"></span> {{ trans('user.public-profile') }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form action="{{ url('settings/profile/'.$user->id) }}" method="post" role="form" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="row">
                    {{-- 框架 --}}
                    <div class="col-xs-12 col-sm-10 col-md-9 col-lg-7">
                        {{-- 图片 --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <h3><small><span class="glyphicon glyphicon-camera"></span> {{ trans('user.profile-img') }}</small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-5 col-md-4 col-lg-3">
                                        @include('layouts.common.profile-img')
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                                <label class="control-label">{{ trans('user.add-image') }}</label>
                                                <input type="file" name="photo">
                                                <p class="help-block">You can also drag and drop a picture from your computer.（ jpeg、png、bmp、gif、svg ）</p>
                                                @include('layouts.common.error-one', ['field' => 'photo'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- 名字 --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <h3><small><span class="glyphicon glyphicon-user"></span> {{ trans('user.name') }}</small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <div>
                                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                                @include('layouts.common.error-one', ['field' => 'name'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- 自我介绍 --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <h3><small><span class="glyphicon glyphicon-pencil"></span> {{ trans('user.content') }}</small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                            <div>
                                                <textarea class="form-control" rows="8" name="content" placeholder="Tall a little about yourself" value="">{{ $user->content }}</textarea>
                                                @include('layouts.common.error-one', ['field' => 'content'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- 公司 --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <h3><small><i class="fa fa-university" aria-hidden="true"></i> {{ trans('user.company') }}</small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                                            <div>
                                                <input type="text" class="form-control" name="company" value="{{ $user->company }}">
                                                @include('layouts.common.error-one', ['field' => 'company'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- 国家／地区 --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <h3><small><span class="glyphicon glyphicon-globe"></span> {{ trans('user.location') }}</small></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                            <div>
                                                <select class="selectpicker form-control" data-live-search="true" name="location">
                                                    <option value="">{{ trans('project.none') }}</option>
                                                    @foreach( config('country') as $key => $country)
                                                        <option value="{{ $country }}" @if($user->location == $country) selected @endif>{{ $country }}（{{ $key }}）</option>
                                                    @endforeach
                                                </select>
                                                @include('layouts.common.error-one', ['field' => 'location'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- 提交 --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" class="btn btn-success">{{ trans('user.update') }}</button>
                            </div>
                        </div>

                    </div>
                    {{-- 框架 --}}
                    <div class="col-xs-0 col-sm-2 col-md-3 col-lg-5">

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>