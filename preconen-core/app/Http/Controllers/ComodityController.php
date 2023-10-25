<?php

namespace App\Http\Controllers;

use App\Models\Comodity;
use Illuminate\Http\Request;
use DataTables;

class ComodityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Comodity::whereNull('deleted_at')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '
                        <div>

                        <button type="button" title="EDIT" class="btn btn-sm btn-biru me-1" data-bs-toggle="modal"
    data-bs-target="#updateData" data-id="' . $row->id . '"
    data-name="' . $row->name . '"
    data-latin="' . $row->latin . '"
    data-code="' . $row->code . '"
    data-ph_max="' . $row->ph_max . '"
    data-ph_min="' . $row->ph_min . '"
    data-ph_optimal="' . $row->ph_optimal . '"
    data-temp_max="' . $row->temp_max . '"
    data-temp_min="' . $row->temp_min . '"
    data-humidity_max="' . $row->humidity_max . '"
    data-humidity_min="' . $row->humidity_min . '"
    data-planting_distance="' . $row->planting_distance . '"
    data-umur_panen="' . $row->umur_panen . '"
    data-potential_results_max="' . $row->potential_results_max . '"
    data-potential_results_min="' . $row->potential_results_min . '"
    data-thumb="' . $row->thumb . '"
    data-url="' . route('admin.comodity.update', ['id' . $row->id]) . '">
    <i class="bi bi-pen"></i>
</button>
                            <form id="deleteForm" action="' . route('admin.comodity.delete', ['id' => $row->id]) . '" method="POST">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                                <button type="button" title="DELETE" class="btn btn-sm btn-biru btn-delete" onclick="confirmDelete(event)">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>';
                        return $btn;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.comodity.index');
    }



    public function store(CreateComodityRequest $request)
    {
        // $this->validate($request, [
        //     'file_materi' => 'required|file|mimes:pdf|max:30720',
        // ]);

        // $file = $request->file('file_materi');
        // $filename = time() . '-' . $file->getClientOriginalName();
        // Storage::disk('public')->put('comodity/' . $filename, file_get_contents($file));

        // $data = $request->validated();
        // $data['file_materi'] = $filename;

        Comodity::create([
        'name' => $request->input('name'),
        'latin' => $request->input('latin'),
        'code' => $request->input('code'),
        'ph_max' => $request->input('ph_max'),
        'ph_min' => $request->input('ph_min'),
        'ph_optimal' => $request->input('ph_optimal'),
        'temp_max' => $request->input('temp_max'),
        'temp_min' => $request->input('temp_min'),
        'humidity_max' => $request->input('humidity_max'),
        'humidity_min' => $request->input('humidity_min'),
        'planting_distance' => $request->input('planting_distance'),
        'umur_panen' => $request->input('umur_panen'),
        'potential_results_max' => $request->input('potential_results_max'),
        'potential_results_min' => $request->input('potential_results_min'),
        'thumb' => $request->input('thumb')
    ]);
        return redirect()->back()->with(['message' => 'Lahan berhasil ditambahkan','status' => 'success']);
    }

    public function destroy($id)
    {
        $comodity = Comodity::findOrFail($id);
        if ($comodity->file_materi) {
            $filePath = Storage::disk('public')->path('comodity/' . $comodity->file_materi);
            File::delete($filePath);
        }
        $comodity->delete();
        return redirect()->back()->with(['message' => 'Lahan berhasil di Hapus','status' => 'success']);
    }
}
