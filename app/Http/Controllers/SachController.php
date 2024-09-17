<?php

namespace App\Http\Controllers;

use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saches = Sach::with('theLoai', 'tacGia')->get();
        return view('admin.sach.index', compact('saches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sach.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sach $sach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sach $sach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sach $sach)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sach $sach)
    {
        //
    }
}
