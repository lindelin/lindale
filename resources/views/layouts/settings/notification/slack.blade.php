<div class="well well-home">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h4><i class="fa fa-slack lindale-icon-color" aria-hidden="true"></i> {{ trans('config.slack-notify') }}</h4>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form action="{{ url('/settings/notification') }}" method="post" role="form" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="row">
                    {{-- 框架 --}}
                    <div class="col-xs-12 col-sm-11 col-md-10 col-lg-8">

                        <div class="row">
                            <div class="col-xs-6 col-sm-5 col-md-4 col-lg-3">
                                <a href="#" class="thumbnail">
                                    <img src="{{ asset('img/ico/Slack-icon.png') }}">
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
                                <h3>Slack</h3>
                                <hr>
                                <p>{{ trans('config.notifiable') }}</p>
                                <div class="btn-group form-group" data-toggle="buttons">
                                    <label class="btn btn-default @if(old(config('config.user.slack')) ? old(config('config.user.slack')) :
                                                       user_config(Auth::user(), config('config.user.slack')) == config('config.off'))  active @endif">
                                        <input type="radio" name="{{ config('config.user.slack') }}" value="{{ config('config.off') }}" id="option1" autocomplete="off"
                                               @if(old(config('config.user.slack')) ? old(config('config.user.slack')) :
                                               user_config(Auth::user(), config('config.user.slack')) == config('config.off'))  checked @endif> OFF
                                    </label>
                                    <label class="btn btn-default @if(old(config('config.user.slack')) ? old(config('config.user.slack')) :
                                                       user_config(Auth::user(), config('config.user.slack')) == config('config.on'))  active @endif">
                                        <input type="radio" name="{{ config('config.user.slack') }}" value="{{ config('config.on') }}" id="option2" autocomplete="off"
                                               @if(old(config('config.user.slack')) ? old(config('config.user.slack')) :
                                               user_config(Auth::user(), config('config.user.slack')) == config('config.on'))  checked @endif> ON
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3" align="center">

                            </div>
                            <div class="col-xs-0 col-sm-7 col-md-8 col-lg-9">
                            </div>
                        </div>

                        {{-- API Key --}}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group{{ $errors->has(config('config.user.key.slack')) ? ' has-error' : '' }}">
                                    <label class="control-label">
                                        WebHook
                                    </label>
                                    <div>
                                        <input type="text" class="form-control" name="{{ config('config.user.key.slack') }}"
                                               value="{{ old(config('config.user.key.slack')) ? old(config('config.user.key.slack')) : user_config(Auth::user(), config('config.user.key.slack')) }}" />
                                        @include('layouts.common.error-one', ['field' => config('config.user.key.slack')])
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" class="btn btn-warning">
                                    {{ trans('config.save') }}
                                </button>
                            </div>
                        </div>

                    </div>
                    {{-- 框架 --}}
                    <div class="col-xs-0 col-sm-1 col-md-2 col-lg-4">

                    </div>
                </div>

            </form>
        </div>
    </div>
</div>