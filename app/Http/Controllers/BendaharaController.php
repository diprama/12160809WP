<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bendahara;

class BendaharaController extends Controller
{
    public function index()
    {
        $bendaharas = Bendahara::orderBy('created_at', 'DESC')->paginate(10);
        return view('bendahara.index', compact('bendaharas'));
    }

    public function create()
    {
        return view('bendahara.add');
    }

    public function save(Request $request)
    {
    //VALIDASI DATA
    $this->validate($request, [
        'kode_bendahara' => 'required|string',
        'nama_bendahara' => 'required|string',
        'phone' => 'required|max:13', //maximum karakter 13 digit
        'address' => 'required|string',
        //unique berarti email ditable bendaharas tidak boleh sama
        'email' => 'required|email|string|unique:bendaharas,email' // format yag diterima harus email
    ]);

    try {
        $bendahara = Bendahara::create([
            'kode_bendahara' => $request->kode_bendahara,
            'nama_bendahara' => $request->nama_bendahara,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email
        ]);
        return redirect('/bendahara')->with(['success' => 'Data telah disimpan']);
    } catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id){
    $bendahara = Bendahara::find($id);
    return view('bendahara.edit', compact('bendahara'));
        }

    public function update(Request $request, $id)
{
    $this->validate($request, [
        'kode_bendahara' => 'required|string',
        'nama_bendahara' => 'required|string',
        'phone' => 'required|max:13',
        'address' => 'required|string',
        'email' => 'required|email|string|exists:bendaharas,email'
    ]);

    try {
        $bendahara = Bendahara::find($id);
        $bendahara->update([
            'kode_bendahara' => $request->kode_bendahara,
            'nama_bendahara' => $request->nama_bendahara,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect('/bendahara')->with(['success' => 'Data telah diperbaharui']);
    } catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $bendahara = Bendahara::find($id);
        $bendahara->delete();
        return redirect()->back()->with(['success' => '<strong>' . $bendahara->name . '</strong> Telah dihapus']);
    }
}
