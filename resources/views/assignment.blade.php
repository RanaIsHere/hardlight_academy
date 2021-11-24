@extends('preload.default')

@section('container')
<div class="p-4">
    <div id="alert-div">
        
    </div>

    <div class="pb-10 px-4 text-center">
        <button class="btn btn-primary addAssignmentBtn">Add Assignment</button>
    </div>

    <table class="table table-compact w-full overflow-x-auto">
        <thead>
            <tr>
                <th>#</th>
                <th>NIS</th>
                <th>Mata Pelajaran</th>
                <th>Tugas</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Nilai</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody id="tbody_assignment">
            @if ($assignmentData->count() == 0)
                <tr class="text-center">
                    <td colspan="8">
                        <h1 class="text-3xl">No data found</h1>
                    </td>
                </tr>
            @endif

            @foreach ($assignmentData as $asg)
                <tr>
                    <td>{{ $asg->id }}</td>
                    <td>{{ $asg->nis }}</td>
                    <td>{{ $asg->nama_mapel }}</td>
                    <td>{{ $asg->nama_tugas }}</td>
                    <td>{{ $asg->deadline_time }}</td>
                    <td>{{ $asg->status_pengerjaan }}</td>
                    <td>{{ $asg->skor }}</td>
                    <td>
                        <div class="dropdown dropdown-hover dropdown-left">
                            <div tabindex="0" class="m-1 btn">Edit</div> 
                            <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
                            <li>
                                <a>Add Score</a>
                            </li> 
                            <li>
                                <a>Change Status</a>
                            </li> 
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection