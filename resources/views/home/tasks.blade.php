@extends('layouts.home')

@section('title')
    {{ trans('header.tasks') }} - {{ config('app.title') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row ticket-card pb-2 pb-3 ">
                        <div class="col-md-1">
                            <img class="img-sm rounded-circle mb-4 mb-md-0" src="/images/faces-clipart/pic-1.png" alt="profile image">
                        </div>
                        <div class="col-md-11">
                            <div class="row ticket-card mb-4">
                                <div class="ticket-details col-md-10">
                                    <div class="d-flex">
                                        <h4 class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">佐藤 :</h4>
                                        <h4 class="text-primary mr-1 mb-0">[開発#23047]</h4>
                                        <h4 class="mb-0 ellipsis">メンバー追加機能</h4>
                                    </div>
                                    <h5 class="text-gray ellipsis mb-2">
                                        Lindalë App development
                                    </h5>
                                </div>
                                <div class="ticket-actions col-md-2 d-none d-sm-block" align="right">
                                    <div class="btn-group dropdown">
                                        <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            処理中
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">
                                                <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa fa-history fa-fw"></i>Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-gray d-md-flex d-none mb-3">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr class="text-gray">
                                                <th>
                                                    グループ
                                                </th>
                                                <th>
                                                    優先度
                                                </th>
                                                <th>
                                                    開始日
                                                </th>
                                                <th>
                                                    期限日
                                                </th>
                                                <th>
                                                    予定工数
                                                </th>
                                                <th>
                                                    担当者
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2 次開発（v1.2.0）
                                                </td>
                                                <td class="font-weight-medium">
                                                    通常
                                                </td>
                                                <td>
                                                    2019/04/04 21:04
                                                </td>
                                                <td class="text-danger">
                                                    2019/04/04 21:04
                                                </td>
                                                <td>
                                                    0 時間
                                                </td>
                                                <td>
                                                    飯塚
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">0　サブチケット（0 - 完了 ， 0 - 未完了）</p>
                                    <p class="mb-2 text-success">56%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 56%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection