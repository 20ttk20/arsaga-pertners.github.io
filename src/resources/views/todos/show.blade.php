@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">詳細</div>

                <div class="card-body">
                   <table class="table">
                      <tr>
                          <th class="w-25">カテゴリー</th>
                            <td>{{ $todo->category }}</td>
                      </tr>
                      <tr>
                          <th>場所</th>
                            <td>{{ $todo->place_name }}</td>
                      </tr>
                      <tr>
                          <th>メモ</th>
                            <td>{{ $todo->memo }}"</td>
                      </tr>
                      <tr>
                          <th>追加日</th>
                            <td>{{ $todo->created_at->format('Y年m月d日') }}"</td>
                      </tr>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
