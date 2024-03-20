@extends('admin.layout.index')

@section('content')
    <div class="d-flex flex-wrap gap-3">
        @foreach ($dummyCard as $item)
            <div class="card" style="width: 250px;">
                <div class="card-body d-flex align-items-center gap-2 justify-content-center">
                    <span class="material-icons" style="font-size: 62px; color: lightgray;">
                        {{ $item['icon'] }}
                    </span>
                    <span class="fs-1">{{ $item['number'] }}</span>
                </div>
                <div class="card-footer">
                    <h5 class="m-0 text-center">{{ $item['footer'] }}</h5>
                </div>
            </div>
        @endforeach
    </div>
@endsection
