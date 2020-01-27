@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">一覧</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('todos.create') }}" class="btn btn-primary">追加</a>
                    </div>

                    @include('components.alert')
                   <table class="table">
                       <thead>
                           <tr>
                               <th>ID</th>
                               <th>カテゴリー</th>
                               <th>場所</th>
                               <th>メモ</th>
                               <th>アクション</th>
                           </tr>
                       </thead>
                       @foreach($todos as $todo)
                       <tr>
                           <td class="align-middle">{{ $todo->id }}</td>
                           <td class="align-middle"><a href="{{ route('todos.show',$todo) }}">{{ $todo->category }}</a></td>
                           <td class="align-middle">{{ $todo->place_name }}</td>
                           <td class="align-middle">{{ $todo->memo }}</td>
                           <td class="align-middle">
                               <div class="d-flex">
                               <a href="{{route('todos.show', $todo) }}" class="btn btn-secondary btn-sm">表示</a>
                               <a href="{{route('todos.edit', $todo) }}" class="btn btn-secondary btn-sm ml-1">編集</a>
                               <form method="POST" action="{{route('todos.destroy', $todo) }}">

                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('削除しもよろしいですか？')" class="btn btn-secondary btn-sm ml-1">削除</button>
                                </form>
                            </div>
                        </td>
                       </tr>
                       @endforeach
                   </table>
                   {{ $todos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
