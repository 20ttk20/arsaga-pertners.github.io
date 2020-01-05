@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">予約詳細<div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th class="w-25">ルーム名</th>
                            <td>{{ $reservation->room_name }}</td>
                        </tr>
                        <tr>
                            <th>CheckIn</th>
                            <td>{{ $reservation->checkin }}</td>
                        </tr>
                        <tr>
                            <th>CheckOut</th>
                            <td>{{ $reservation->checkout }}</td>
                        </tr>
                        <tr>
                            <th>作成日</th>
                            <td>{{ $reservation->created_at->format('Y年m月d日') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
