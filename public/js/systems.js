$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $('.addAssignmentBtn').on('click', (e) => {
        e.preventDefault()

        var assignmentForm = document.getElementById('createAssignmentForm')

        if (assignmentForm.classList.contains('modal-open')) {
            assignmentForm.classList.remove('modal-open')
        } else {
            assignmentForm.classList.add('modal-open')
        }
    })

    $('.toggleAssignmentStatus').on('click', function (e) {
        if (this.hasAttribute('checked')) {
            this.removeAttribute('checked')
            this.value = 0
        } else {
            this.setAttribute('checked', 1)
            this.value = 1
        }

        var table_id = $(this).closest('tr').find('td').eq(0).text()

        $.ajax({
            method: 'POST',
            url: '/changeStatus',
            data: { status_pengerjaan: this.value, id: table_id },
            success: function (response) {
                console.log(response)
            }
        })

        // e.preventDefault()
    })

    $('.addScoreBtn').on('click', function (e) {
        e.preventDefault()

        var scoreForm = document.getElementById('scoreForm')

        let assignment_id = $(this).closest('tr').find('td').eq(0).text()
        let assignment_name = $(this).closest('tr').find('td').eq(3).text()
        let assignment_score = $(this).closest('tr').find('td').eq(6).text()
        let namaTugasInput = document.getElementById('namaTugasInput')
        let tugasInput = document.getElementById('tugasInput')
        let skorTugasInput = document.getElementById('skorTugasInput')

        skorTugasInput.value = assignment_score
        tugasInput.value = assignment_id
        namaTugasInput.value = assignment_name.toUpperCase()

        if (scoreForm.classList.contains('modal-open')) {
            scoreForm.classList.remove('modal-open')
        } else {
            scoreForm.classList.add('modal-open')
        }
    })

    $('.deleteBtn').on('click', function (e) {
        e.preventDefault()

        var deleteModal = document.getElementById('deleteModal')

        let assignment_id = $(this).closest('tr').find('td').eq(0).text()
        let idInput = document.getElementById('idInput')

        idInput.value = assignment_id

        if (deleteModal.classList.contains('modal-open')) {
            deleteModal.classList.remove('modal-open')
        } else {
            deleteModal.classList.add('modal-open')
        }
    })

    $('#scoreFullForm').on('submit', function (e) {
        var thisForm = $(this)

        $.ajax({
            method: 'POST',
            url: '/addScore',
            data: thisForm.serialize(),
            success: function (response) {
                var scoreForm = document.getElementById('scoreForm')
                document.getElementById('scoreFullForm').reset()

                if (scoreForm.classList.contains('modal-open')) {
                    scoreForm.classList.remove('modal-open')
                }

                $('.asg-' + response['response']['id']).children('td').eq(6).html(response['response']['skor'])
            }
        })

        e.preventDefault()
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

                $('#notFoundAlert').remove()

                assignmentTable.insertAdjacentHTML('beforeend', `<tr>
                    <td>` + response['data']['id'] + `</td >
                    <td>` + response['data']['nis'] + `</td>
                    <td>` + response['data']['nama_mapel'] + `</td>
                    <td>` + response['data']['nama_tugas'] + `</td>
                    <td>` + response['data']['deadline_time'] + `</td>
                    <td><input type="checkbox" value="0" class="toggle toggle-lg toggleAssignmentStatus"></td>
                    <td>` + 0 + `</td>
                    <td>
                        <div class='dropdown dropdown-hover dropdown-left'>
                            <div tabindex='0' class='m-1 btn'>Edit</div> 
                            <ul tabindex='0' class='p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52'>
                            <li>
                                <a class="btn addScoreBtn">Add Score</a>
                            </li>

                            <li>
                                <a class="btn deleteBtn">Delete</a>
                            </li>
                            </ul>
                        </div>
                    </td>
                </tr>`);
            }
        })

        e.preventDefault()
    })

    $('#deleteForm').on('submit', function (e) {
        var thisForm = $(this)

        $.ajax({
            method: 'POST',
            url: '/deleteAssignment',
            data: thisForm.serialize(),
            success: function (response) {
                console.log(response)

                var deleteModal = document.getElementById('deleteModal')
                var assignmentTable = document.getElementById('tbody_assignment')

                if (deleteModal.classList.contains('modal-open')) {
                    deleteModal.classList.remove('modal-open')
                }

                $('.asg-' + response['response']).remove()

                if (document.getElementById('tbody_assignment').children.length == 0) {
                    assignmentTable.insertAdjacentHTML('beforeend',
                        `
                            <tr class="text-center">
                                <td colspan="8">
                                    <h1 class="text-3xl">No data found</h1>
                                </td>
                            </tr>
                        `)
                }
            }
        })

        e.preventDefault()
    })
})