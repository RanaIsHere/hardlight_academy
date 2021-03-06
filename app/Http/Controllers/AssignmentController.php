<?php

namespace App\Http\Controllers;

use App\Models\Assignments;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function launchAssignment()
    {
        $assignmentData = Assignments::orderBy('id', 'DESC')->get();
        return view('assignment', ['page' => 'Assignment', 'assignmentData' => $assignmentData]);
    }

    public function addScore(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => ['required'],
                'skor' => ['required']
            ]);

            $assignment = Assignments::find($validatedData['id']);

            $assignment->skor = $validatedData['skor'];

            if ($assignment->updateOrFail()) {
                return response()->json(['response' => $assignment]);
            }
        }
    }

    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => ['required'],
                'status_pengerjaan' => ['required']
            ]);

            $assignment = Assignments::find($validatedData['id']);

            $assignment->status_pengerjaan = $validatedData['status_pengerjaan'];

            if ($assignment->updateOrFail()) {
                return response()->json(['response' => $assignment->status_pengerjaan]);
            }
        }
    }

    public function deleteAssignment(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => ['required']
            ]);

            $assignment = Assignments::find($validatedData['id']);

            if ($assignment->deleteOrFail()) {
                return response()->json(['response' => $assignment->id]);
            }
        }
    }

    public function addAssignment(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'nama_mapel' => ['required'],
                'nama_tugas' => ['required'],
                'deadline_time' => ['required']
            ]);

            $assignment = new Assignments;

            $assignment->nis = '0';
            $assignment->nama_mapel = $validatedData['nama_mapel'];
            $assignment->nama_tugas = $validatedData['nama_tugas'];
            $assignment->deadline_time = $validatedData['deadline_time'];

            if ($assignment->saveOrFail()) {
                $assignment->nis = date('Y') . $assignment->id;

                if ($assignment->updateOrFail()) {
                    return response()->json(['response' => 'Assignment added successfully!', 'data' => $assignment]);
                } else {
                    return response()->json(['response' => 'Error within the database caused the system to fault!']);
                }
            } else {
                return response()->json(['response' => 'Assignment failed to add successfully!!']);
            }
        }
    }
}
