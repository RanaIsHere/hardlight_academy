@if ($page == 'Assignment')
<div id="createAssignmentForm" class="modal">
    <div class="modal-box">
        <div class="p-4">
            <form action="{{ route('addAssignment') }}" method="post" id="assignmentForm">
                @csrf
                
                <div class="form-control my-4">
                    <label class="label">
                        <span class="label-text">Material</span>
                    </label>
                    <select name="nama_mapel" class="select select-bordered select-primary w-full">
                        <option value="MATH"> Math </option>
                        <option value="ENGLISH"> English </option>
                        <option value="PHYSICS"> Physics </option>
                        <option value="BIOLOGY"> Biology </option>
                        <option value="CHEMISTRY"> Chemistry </option>
                        <option value="ENGINEERING"> Engineering </option>
                    </select>
                </div>

                <div class="form-control my-4">
                    <label class="label">
                        <span class="label-text">Assignment Name</span>
                    </label>
                    <input type="text" name="nama_tugas" placeholder="Assignment name.." class="input input-primary input-bordered">
                </div>

                <div class="form-control my-4">
                    <label class="label">
                        <span class="label-text">Deadline Time</span>
                    </label>
                    <input type="datetime-local" name="deadline_time" id="deadlineInput" class="input input-primary input-bordered">
                </div>

                <div class="modal-action mt-8">
                    <button type="submit" class="btn">Submit</button>
                    <button type="button" class="btn addAssignmentBtn">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="scoreForm" class="modal">
    <div class="modal-box">
        <div class="p-4">
            <form action="{{ route('addScore') }}" method="post" id="scoreFullForm" autocomplete="off">
                @csrf

                <input type="hidden" name="id" id="tugasInput">

                <div class="form-control my-4">
                    <label class="label">
                        <span class="label-text">Assignment Name</span>
                    </label>
                    <input type="text" id="namaTugasInput" class="input input-primary input-bordered" readonly>
                </div>
                
                <div class="form-control my-4">
                    <label class="label">
                        <span class="label-text">Assignment Score</span>
                    </label>
                    <input type="number" name="skor" placeholder="Assignment score.." class="input input-primary input-bordered" id="skorTugasInput" min="0" max="100" value="0" required>
                </div>

                <div class="modal-action mt-8">
                    <button type="submit" class="btn">Submit</button>
                    <button type="button" class="btn addScoreBtn">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="deleteModal" class="modal">
    <div class="modal-box" style="max-width: 40rem">
        <div class="p-4">
            <form action="{{ route('addScore') }}" method="post" id="deleteForm" autocomplete="off">
                @csrf

                <input type="hidden" name="id" id="idInput">

                <div class="form-control my-4 text-center">
                    <h1 class="text-xl">Are you sure you want to delete this assignment?</h1>
                    <p>Keep in mind that these changes will be permanent, and thus cannot be restored!</p>
                </div>

                <div class="modal-action mt-8">
                    <button type="submit" class="btn btn-primary">Delete</button>
                    <button type="button" class="btn deleteBtn">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endif