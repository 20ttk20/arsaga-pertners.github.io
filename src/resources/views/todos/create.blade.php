@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">追加</div>

                <div class="card-body">
                        @include('components.alert')
                    <form method="POST" action="{{ route('todos.store') }}">
                    @csrf
                    @include('todos.fields')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
