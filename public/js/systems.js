$(function () {
    $('.addAssignmentBtn').on('click', (e) => {
        e.preventDefault()

        var assignmentForm = document.getElementById('createAssignmentForm')

        if (assignmentForm.classList.contains('modal-open')) {
            assignmentForm.classList.remove('modal-open')
        } else {
            assignmentForm.classList.add('modal-open')
        }
    })

    $('#assignmentForm').on('submit', function (e) {
        var thisForm = $(this)

        $.ajax({
            method: 'POST',
            url: '/addAssignment',
            data: thisForm.serialize(),
            success: function (response) {
                console.log(response['data'])

                let alertMessage = document.createElement('div')

                var assignmentForm = document.getElementById('createAssignmentForm')
                var assignmentTable = document.getElementById('tbody_assignment')

                if (assignmentForm.classList.contains('modal-open')) {
                    assignmentForm.classList.remove('modal-open')
                }

                alertMessage.classList.add('alert');
                alertMessage.classList.add('alert-success');
                alertMessage.textContent = response['response'];

                document.getElementById('alert-div').appendChild(alertMessage)

                assignmentTable.insertAdjacentHTML('beforeend', `<tr>
                    <td>` + response['data']['id'] + `</td >
                    <td>` + response['data']['nis'] + `</td>
                    <td>` + response['data']['nama_mapel'] + `</td>
                    <td>` + response['data']['nama_tugas'] + `</td>
                    <td>` + response['data']['deadline_time'] + `</td>
                    <td>` + 0 + `</td>
                    <td>` + 0 + `</td>
                    <td>
                        <div class='dropdown dropdown-hover dropdown-left'>
                            <div tabindex='0' class='m-1 btn'>Edit</div> 
                            <ul tabindex='0' class='p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52'>
                            <li>
                                <a>Add Score</a>
                            </li> 
                            <li>
                                <a>Change Status</a>
                            </li> 
                            </ul>
                        </div>
                    </td>
                </tr>`);
            }
        })

        e.preventDefault()
    })
})