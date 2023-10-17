<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;

class LandController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Land::whereNull('deleted_at')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '
                        <div>
                            <form id="deleteForm" action="' . route('land.delete', ['id' => $row->id]) . '" method="POST">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                                <button type="button" title="DELETE" class="btn btn-sm btn-biru btn-delete" onclick="confirmDelete(event)">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>';
                        return $btn;
                    })
                    ->addColumn('priview-pdf', function ($row) {
                        $btn = '
                        <div class="d-flex">
                            <a class="btn btn-sm btn-biru" title="Lihat Lahan Pengetahuan"
                                href="' . asset('storage/land/' . $row->file_materi) . '"  onclick="window.open(this.href, \'_blank\', \'width=800,height=600\'); return false;"> <i class="bi bi-eye"></i>
                            </a>
                        </div>
                        ';
                        return $btn;
                    })
                    ->rawColumns(['action', 'priview-pdf'])
                    ->make(true);
        }
        return view('land.index');
    }

    public function guest(Request $request)
    {
        if ($request->ajax()) {
            $data = Land::whereNull('deleted_at')->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('priview-pdf', function ($row) {
                $btn = '
                <div class="d-flex">
                    <a class="btn btn-sm btn-biru"
                        href="' . asset('storage/land/' . $row->file_materi) . '" target="_blank"> <i class="bi bi-trash"></i> Lihat
                    </a>
                </div>
                ';
                return $btn;
            })
            ->rawColumns(['priview-pdf'])
            ->make(true);
        }
        return view('land.guest');
    }

    public function store(CreateLandRequest $request)
    {
        $this->validate($request, [
            'file_materi' => 'required|file|mimes:pdf|max:30720',
        ]);

        $file = $request->file('file_materi');
        $filename = time() . '-' . $file->getClientOriginalName();
        Storage::disk('public')->put('land/' . $filename, file_get_contents($file));

        $data = $request->validated();
        $data['file_materi'] = $filename;

        Land::create($data);
        return redirect()->back()->with(['message' => 'Lahan berhasil ditambahkan','status' => 'success']);
    }

    public function destroy($id)
    {
        $land = Land::findOrFail($id);
        if ($land->file_materi) {
            $filePath = Storage::disk('public')->path('land/' . $land->file_materi);
            File::delete($filePath);
        }
        $land->delete();
        return redirect()->back()->with(['message' => 'Lahan berhasil di Hapus','status' => 'success']);
    }
}
