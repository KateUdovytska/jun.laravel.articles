@extends('layouts.default')
@section('content')
    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
        @include('common.errors')

        <form action="{{route('article.add')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Title</label>
                <div class="col-sm-8">
                    <input type="text" name="title" id="title" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-3 control-label ">Description</label>
                <div class="col-sm-8">
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add article
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if (count($articles) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Articles
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <tr>
                        <th>Article</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td class="table-text">
                                <div><a href="{{route('article.show',  $article->id)}}">{{ $article->title }}</a></div>
                            </td>
                            <td>
                                <form action="{{route('article.delete', $article->id)}}" method="post">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash "></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection