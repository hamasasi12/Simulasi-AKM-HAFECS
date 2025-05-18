<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class IndoRegionController extends Controller
{
    public function getRegencies($provinceName)
    {
        // Mencari province berdasarkan name dan mendapatkan regencies
        $province = Province::where('name', $provinceName)->first(); // Pastikan Anda memiliki model Province
        
        if ($province) {
            $regencies = Regency::where('province_id', $province->id)->get(['name']);
            return response()->json($regencies);
        }
        
        return response()->json(['message' => 'Province not found'], 404);
    }
    
    public function getDistricts($regencyName)
    {
        // Mencari regency berdasarkan name dan mendapatkan districts
        $regency = Regency::where('name', $regencyName)->first();
        
        if ($regency) {
            $districts = District::where('regency_id', $regency->id)->get(['name']);
            return response()->json($districts);
        }
        
        return response()->json(['message' => 'Regency not found'], 404);
    }
    
    public function getVillages($districtName)
    {
        // Mencari district berdasarkan name dan mendapatkan villages
        $district = District::where('name', $districtName)->first();
        
        if ($district) {
            $villages = Village::where('district_id', $district->id)->get(['name']);
            return response()->json($villages);
        }
        
        return response()->json(['message' => 'District not found'], 404);
    }
}
