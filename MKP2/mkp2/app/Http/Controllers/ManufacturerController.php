<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Models\Product;


class ManufacturerController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::all();
        return view('manufacturers.index', ['manufacturers' => $manufacturers]);
    }

    public function destroy($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturers = Manufacturer::all();
        $manufacturer->delete();

        return redirect('/manufacturers');
    }

    public function showDeleteConfirmation($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        return view('manufacturers.confirm-delete', ['manufacturer'=>$manufacturer]);
    }
}

