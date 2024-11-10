<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Package;
use Illuminate\Http\Request;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.investment.list', compact('packages'));
    }

    public function create()
    {
        $packages = Package::all();
        return view('admin.investment.create', compact('packages'));
    }


    public function store(Request $request)
    {
        $data = $this->getData($request);
        Package::create($data);
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.investment.edit', compact('package'));
    }


    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);
        $data = $this->getData($request);
        $package->update($data);
        return redirect()->route('admin.package.index');
    }


    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
        return redirect()->back();
    }

    protected function getData(Request $request)
    {
        $rules = [
            'name' => 'required',
            'min_deposit' => 'nullable',
            'max_deposit' => 'nullable',
            'term_days' => 'required',
            'daily_interest' => 'required',
        ];
        return $request->validate($rules);
    }
}
