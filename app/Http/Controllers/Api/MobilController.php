<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MobilResource;
use App\Models\Mobil;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    // GET /api/mobil
    public function index(): JsonResponse
    {
        return response()->json([
            'message' => 'Daftar mobil berhasil diambil',
            'data' => MobilResource::collection(Mobil::all()),
        ], 200);
    }

    // POST /api/mobil
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate($this->rules(), $this->messages());

        $mobil = Mobil::create($data);

        return response()->json([
            'message' => 'Data mobil berhasil ditambahkan',
            'data' => new MobilResource($mobil->fresh()),
        ], 201);
    }

    // GET /api/mobil/{id}
    public function show(string $id): JsonResponse
    {
        $mobil = Mobil::find($id);

        if (! $mobil) {
            return $this->notFound();
        }

        return response()->json([
            'message' => 'Detail mobil berhasil diambil',
            'data' => new MobilResource($mobil),
        ], 200);
    }

    // PUT/PATCH /api/mobil/{id}
    public function update(Request $request, string $id): JsonResponse
    {
        $mobil = Mobil::find($id);

        if (! $mobil) {
            return $this->notFound();
        }

        $data = $request->validate(
            $this->rules($request->isMethod('patch')),
            $this->messages()
        );

        $mobil->update($data);

        return response()->json([
            'message' => 'Data mobil berhasil diperbarui',
            'data' => new MobilResource($mobil->fresh()),
        ], 200);
    }

    // DELETE /api/mobil/{id}
    public function destroy(string $id): JsonResponse
    {
        $mobil = Mobil::find($id);

        if (! $mobil) {
            return $this->notFound();
        }

        $mobil->delete();

        return response()->json([
            'message' => 'Data mobil berhasil dihapus',
        ], 200);
    }

    private function notFound(): JsonResponse
    {
        return response()->json([
            'message' => 'Data mobil tidak ditemukan',
        ], 404);
    }

    private function rules(bool $partial = false): array
    {
        $rules = [
            'nama' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:100'],
            'harga' => ['required', 'integer', 'min:0'],
            'tahun' => ['required', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
            'transmisi' => ['required', 'in:Manual,Matic,CVT'],
            'bahan_bakar' => ['required', 'in:Bensin,Diesel,Hybrid,Listrik'],
            'status' => ['sometimes', 'in:tersedia,sold'],
        ];

        // PATCH = update sebagian, jadi semua field hanya divalidasi bila dikirim
        if ($partial) {
            foreach ($rules as $field => $rule) {
                if (! in_array('sometimes', $rule)) {
                    array_unshift($rules[$field], 'sometimes');
                }
            }
        }

        return $rules;
    }

    private function messages(): array
    {
        return [
            'nama.required' => 'Kolom nama mobil wajib diisi.',
            'nama.string' => 'Kolom nama mobil harus berupa teks.',
            'nama.max' => 'Nama mobil maksimal 255 karakter.',

            'brand.required' => 'Kolom brand wajib diisi.',
            'brand.string' => 'Kolom brand harus berupa teks.',
            'brand.max' => 'Brand maksimal 100 karakter.',

            'harga.required' => 'Kolom harga wajib diisi.',
            'harga.integer' => 'Kolom harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh negatif.',

            'tahun.required' => 'Kolom tahun wajib diisi.',
            'tahun.integer' => 'Kolom tahun harus berupa angka.',
            'tahun.min' => 'Tahun minimal 1900.',
            'tahun.max' => 'Tahun tidak boleh lebih dari tahun depan.',

            'transmisi.required' => 'Kolom transmisi wajib diisi.',
            'transmisi.in' => 'Transmisi harus salah satu dari: Manual, Matic, CVT.',

            'bahan_bakar.required' => 'Kolom bahan bakar wajib diisi.',
            'bahan_bakar.in' => 'Bahan bakar harus salah satu dari: Bensin, Diesel, Hybrid, Listrik.',

            'status.in' => 'Status harus salah satu dari: tersedia, sold.',
        ];
    }
}
