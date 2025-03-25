<?php
namespace App\Http\Controllers;

use App\Models\Quyen;
use Illuminate\Http\Request;

class QuyenController extends Controller
{
    public function index()
    {
        return response()->json(Quyen::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_quyen' => 'required|unique:quyen,ten_quyen'
        ]);

        $quyen = Quyen::create($request->all());
        return response()->json($quyen, 201);
    }

    public function show($id)
    {
        return response()->json(Quyen::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $quyen = Quyen::findOrFail($id);
        $quyen->update($request->all());
        return response()->json($quyen);
    }

    public function destroy($id)
    {
        Quyen::destroy($id);
        return response()->json(null, 204);
    }
}
