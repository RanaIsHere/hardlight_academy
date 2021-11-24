@extends('preload.default')

@section('container')
<div class="p-4 text-center">
    <h1 class="text-4xl">This application <span class="text-base">is NOT meant to be used as a commercial tool, and only used as a temporary school project.</span> </h1>
    <p> Copyright (C) <b>Rana Rosihan</b> 2019-2021 </p>
</div>

<div class="p-4">
    <table class="table table-compact w-full">
        <thead>
            <tr>
                <th>#</th>
                <th>Actions Taken</th>
                <th>On Date & Time</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($logs as $l)
                <tr>
                    <td>{{ $l->id }}</td>
                    <td>{{ $l->action }}</td>
                    <td>{{ $l->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection