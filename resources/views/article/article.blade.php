@extends('layouts.default')
@section('content')
    <div class="panel-body">

{{--        <a href="{{route('articles.all')}}">All articles</a>--}}


            <div class="panel panel-default">
                <div class="panel-heading">
                    Articles
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">

                            <tr>
                                <td class="table-text">
                                    <div>{{ $article->title }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-text">
                                    <div>{{ $article->description }}</div>
                                </td>
                            </tr>

                    </table>
                </div>
            </div>
    </div>
@endsection