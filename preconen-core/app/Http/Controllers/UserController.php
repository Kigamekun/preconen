<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '
                        <div>
                            <button type="button" title="EDIT" class="btn btn-sm btn-biru me-1" data-bs-toggle="modal" data-bs-target="#updateData" data-id="' . $row->id . '" data-name="' . $row->name . '" data-email="' . $row->email . '" data-phone="' . $row->phone . '" data-role="' . $row->role . '" data-lat="' . $row->lat . '" data-long="' . $row->long . '" data-url="' . route('admin.user.update', ['id' => $row->id]) . '">
                                <i class="bi bi-pen"></i>
                            </button>
                            <form id="deleteForm" action="' . route('admin.user.delete', ['id' => $row->id]) . '" method="POST">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                                <button type="submit" title="DELETE" class="btn btn-sm btn-biru btn-delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.user.index');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'lat' => $request->lat,
            'long' => $request->long,
            'password' => Hash::make('password'),
        ]);
        return redirect()->back()->with(['message' => 'Lahan berhasil ditambahkan','status' => 'success']);
    }

    public function update(Request $request, $id)
    {
        User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'lat' => $request->lat,
            'long' => $request->long,
            'password' => Hash::make('password'),
        ]);
        return redirect()->back()->with(['message' => 'Lahan berhasil ditambahkan','status' => 'success']);
    }

    public function destroy($id)
    {
        $land = User::findOrFail($id);
        if ($land->file_materi) {
            $filePath = Storage::disk('public')->path('land/' . $land->file_materi);
            File::delete($filePath);
        }
        $land->delete();
        return redirect()->route('admin.user.index')->with(['message' => 'Lahan berhasil di Hapus','status' => 'success']);
    }
}
