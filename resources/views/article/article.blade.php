@extends('layouts.default')
@section('content')
    <div class="panel-body">

{{--        <a href="{{route('articles.all')}}">All articles</a>--}}

        @if (count($articles) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Articles
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        @foreach ($articles as $article)
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
                        @endforeach
                    </table>
                </div>
            </div>
    </div>
    @endif
@endsection