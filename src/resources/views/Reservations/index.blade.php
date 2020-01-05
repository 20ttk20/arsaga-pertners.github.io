@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">予約一覧<div>

                <div class="card-body">
                    <div class="mb-3">
                <a href="{{ route('reservations.create') }}" class="btn btn-primary">予約する</a>
                    </div>
                    @include('components.alert')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>予約番号</th>
                                <th>ルーム名</th>
                                <th>CheckIn</th>
                                <th>CheckOut</th>
                                <th>編集・削除</th>

                            </tr>
                        </thead>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td class="align-middle"><a href="{{ route('reservations.show', $reservation) }}">{{ $reservation->id }}</a></td>
                                <td class="align-middle">{{ $reservation->room_name }}</td>
                                <td class="align-middle">{{ $reservation->checkin }}</td>
                                <td class="align-middle">{{ $reservation->checkout }}</td>
                                <td class="align-middle">
                                    <div class="d-flex">
                                        <a href="{{ route('reservations.show', $reservation) }}" class="btn btn-secondary btn-sm">表示</a>
                                        <a href="{{ route('reservations.edit', $reservation) }}" class="btn btn-secondary btn-sm ml-1">編集</a>
                                        <form action="{{ route('reservations.destroy', $reservation) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button oneclick="return confirm('本当に削除しますか？')" class="btn btn-secondary btn-sm ml-1">削除</button>
                                        </form>
                                    </div>
                        </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
