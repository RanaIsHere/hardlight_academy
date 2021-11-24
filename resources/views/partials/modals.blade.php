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
                        <option value="ENGIEERING"> Engineering </option>
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