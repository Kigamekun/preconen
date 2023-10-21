<?php

namespace App\Http\Controllers;

use App\Models\Comodity;
use Illuminate\Http\Request;
use DataTables;

class ComodityController extends Controller
{
    public function ups()
    {
        $komoditas = [
            // [
            //     'name' => 'KACANG TANAH',
            //     'latin' => 'Arachis hypogaea L.',
            //     'temp' => '28 - 32°C',
            //     'ph' => '6-6.5',
            //     'planting_distance' => '40×20 cm',
            //     'fertilizer_dose' => 'pupuk Urea (100 kg/ha), SP-36 (200 kg/ha), KCl (100 kg/ha)',
            //     'potential_results' => 'Isi potensi hasil untuk KACANG TANAH di sini',
            // ],
            // [
            //     'name' => 'JAGUNG MANIS',
            //     'latin' => 'Zea mays saccharata Sturt',
            //     'temp' => '23-27 °C',
            //     'ph' => '5.5-7.0',
            //     'planting_distance' => '75×20 cm',
            //     'fertilizer_dose' => 'pupuk Urea (200 kg/ha), SP-36 (200 kg/ha), KCl (100 kg/ha)',
            //     'potential_results' => 'Isi potensi hasil untuk JAGUNG MANIS di sini',
            // ],
            // [
            //     'name' => 'KANGKUNG',
            //     'latin' => 'Ipomoea reptans',
            //     'temp' => '25–30 °C',
            //     'ph' => '5.5-6.5',
            //     'planting_distance' => '20×10 cm',
            //     'fertilizer_dose' => '200 kg Urea, 200 kg SP-36, dan 200 kg KCL',
            //     'potential_results' => 'Isi potensi hasil untuk KANGKUNG di sini',
            // ],
            // [
            //     'name' => 'BAYAM',
            //     'latin' => 'Amaranthus sp',
            //     'temp' => '16-20 °C',
            //     'ph' => '6-7',
            //     'planting_distance' => '20',
            //     'fertilizer_dose' => '200 kg Urea, 200 kg SP-36, dan 200 kg KCL',
            //     'potential_results' => 'Isi potensi hasil untuk BAYAM di sini',
            // ],
            // [
            //     'name' => 'KACANG PANJANG',
            //     'latin' => 'Vigna sinensis var. Sesquipedalis',
            //     'temp' => '20-35°C',
            //     'ph' => 'Isi pH yang sesuai',
            //     'planting_distance' => '50×50 cm',
            //     'fertilizer_dose' => '150 kg Urea, 100 kg SP-36, dan 100 kg KCL',
            //     'potential_results' => 'Isi potensi hasil untuk KACANG PANJANG di sini',
            // ],
            // [
            //     'name' => 'CABAI',
            //     'latin' => 'Capsicum annuum L',
            //     'temp' => '25-35 °C',
            //     'ph' => '6-7',
            //     'planting_distance' => '50×50 cm',
            //     'fertilizer_dose' => '200 kg Urea, 200 kg SP-36, dan 200 kg KCL',
            //     'potential_results' => 'Isi potensi hasil untuk CABAI di sini',
            // ],

            [
                'name' => 'Jagung Hibrida',
                'latin' => '',
                'temp' => '',
                'ph' => '',
                'planting_distance' => '',
                'fertilizer_dose' => '',
                'potential_results' => '',
                'kode'=>'JPK'
            ],
            [
                'name' => 'Padi',
                'latin' => '',
                'temp' => '',
                'ph' => '',
                'planting_distance' => '',
                'fertilizer_dose' => '',
                'potential_results' => '',
                'kode'=>'GKP'
            ],

            [
                'name' => 'Cabai Merah Besar',
                'latin' => '',
                'temp' => '',
                'ph' => '',
                'planting_distance' => '',
                'fertilizer_dose' => '',
                'potential_results' => '',
                'kode'=>'CMB'
            ],

            [
                'name' => 'Cabai Keriting',
                'latin' => '',
                'temp' => '',
                'ph' => '',
                'planting_distance' => '',
                'fertilizer_dose' => '',
                'potential_results' => '',
                'kode'=>'CMK'
            ],
        ];

    }

    public function index(Request $request)
    {

        // $cm = [
        //     [
        //         'name' => 'Jagung Hibrida',
        //         'latin' => '',
        //         'temp' => '',
        //         'ph' => '',
        //         'planting_distance' => '',
        //         'fertilizer_dose' => '',
        //         'potential_results' => '',
        //         'code'=>'JPK',
        //         'thumb'=>'',

        //     ],
        //     [
        //         'name' => 'Padi',
        //         'latin' => '',
        //         'temp' => '',
        //         'ph' => '',
        //         'planting_distance' => '',
        //         'fertilizer_dose' => '',
        //         'potential_results' => '',
        //         'code'=>'GKP',
        //         'thumb'=>'',

        //     ],

        //     [
        //         'name' => 'Cabai Merah Besar',
        //         'latin' => '',
        //         'temp' => '',
        //         'ph' => '',
        //         'planting_distance' => '',
        //         'fertilizer_dose' => '',
        //         'potential_results' => '',
        //         'code'=>'CMB',
        //         'thumb'=>'',
        //     ],

        //     [
        //         'name' => 'Cabai Keriting',
        //         'latin' => '',
        //         'temp' => '',
        //         'ph' => '',
        //         'planting_distance' => '',
        //         'fertilizer_dose' => '',
        //         'potential_results' => '',
        //         'thumb'=>'',
        //         'code'=>'CMK'
        //     ],
        // ];

        // foreach ($cm as $key => $value) {
        //    Comodity::create($value);
        // }
        if ($request->ajax()) {
            $data = Comodity::whereNull('deleted_at')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '
                        <div>
                        <button type="button" title="EDIT" class="btn btn-sm btn-biru me-1" data-bs-toggle="modal"
                        data-bs-target="#updateData" data-id="'.$row->id.'"
                        data-name="'.$row->name.'"
                        data-latin="'.$row->latin.'"
                        data-temp="'.$row->temp.'"
                        data-ph="'.$row->ph.'"
                        data-planting_distance="'.$row->planting_distance.'"
                        data-fertilizer_dose="'.$row->fertilizer_dose.'"
                        data-potential_results="'.$row->potential_results.'"

                        data-url="'.route('comodity.update', ['id' => $row->id]).'">
                        <i class="bi bi-pen"></i>
                    </button>
                            <form id="deleteForm" action="' . route('comodity.delete', ['id' => $row->id]) . '" method="POST">
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

    public function guest(Request $request)
    {
        if ($request->ajax()) {
            $data = Comodity::whereNull('deleted_at')->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('priview-pdf', function ($row) {
                $btn = '
                <div class="d-flex">
                    <a class="btn btn-sm btn-biru"
                        href="' . asset('storage/comodity/' . $row->file_materi) . '" target="_blank"> <i class="bi bi-trash"></i> Lihat
                    </a>
                </div>
                ';
                return $btn;
            })
            ->rawColumns(['priview-pdf'])
            ->make(true);
        }
        return view('comodity.guest');
    }

    public function store(CreateComodityRequest $request)
    {
        $this->validate($request, [
            'file_materi' => 'required|file|mimes:pdf|max:30720',
        ]);

        $file = $request->file('file_materi');
        $filename = time() . '-' . $file->getClientOriginalName();
        Storage::disk('public')->put('comodity/' . $filename, file_get_contents($file));

        $data = $request->validated();
        $data['file_materi'] = $filename;

        Comodity::create($data);
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
