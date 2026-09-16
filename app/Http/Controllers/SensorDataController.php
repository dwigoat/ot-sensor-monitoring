<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorDataController extends Controller
{
    // ================================
    // DASHBOARD SENSOR
    // ================================
    public function dashboard()
    {
        $semuaData = SensorData::orderBy('created_at', 'desc')->get();

        return view('sensor-dashboard', [
            'semuaData' => $semuaData
        ]);
    }


    // ================================
    // DATA UNTUK GRAFIK REALTIME
    // ================================
    public function dataGrafik()
    {
        $total = SensorData::count();

        $data = SensorData::latest()
            ->take(20)
            ->get()
            ->reverse()
            ->values();

        return response()->json([
            'total' => $total,
            'data' => $data
        ]);
    }


    // ================================
    // FORM TAMBAH DATA
    // ================================
    public function formTambah()
    {
        return view('sensor-tambah');
    }


    // ================================
    // SIMPAN DATA SENSOR (MANUAL, DARI FORM)
    // ================================
    public function simpan(Request $request)
    {
        $request->validate([
            'device_id' => 'required|string',
            'suhu' => 'nullable|numeric',
            'kelembapan' => 'nullable|numeric',
        ]);

        SensorData::create([
            'device_id' => $request->device_id,
            'suhu' => $request->suhu,
            'kelembapan' => $request->kelembapan,
        ]);

        return redirect('/dashboard-sensor')
            ->with('sukses', 'Data sensor berhasil ditambahkan!');
    }


    // ================================
    // TERIMA DATA DARI ESP32/ESP8266 (API - PUSH)
    // ================================
    public function simpanDariDevice(Request $request)
    {
        $validated = $request->validate([
            'device_id' => 'required|string',
            'suhu' => 'nullable|numeric',
            'kelembapan' => 'nullable|numeric',
            'jarak' => 'nullable|numeric',
        ]);

        $data = SensorData::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 201);
    }


    // ================================
    // AMBIL DATA DARI ESP8266 & SIMPAN (PULL)
    // ================================
    public function syncData()
    {
        $espUrl = 'http://192.168.1.8/data';

        try {
            $response = \Illuminate\Support\Facades\Http::timeout(5)->get($espUrl);

            if ($response->successful()) {
                $espData = $response->json();

                SensorData::create([
                    'device_id' => 'esp8266-utama',
                    'suhu' => $espData['suhu'] ?? null,
                    'kelembapan' => $espData['kelembaban'] ?? null, // beda nama field
                    'jarak' => $espData['jarak'] ?? null,
                ]);
            }
        } catch (\Exception $e) {
            // Kalau ESP8266 tidak bisa diakses, dilewati saja
            // supaya dashboard tidak error
        }

        $total = SensorData::count();

        $data = SensorData::latest()
            ->take(20)
            ->get()
            ->reverse()
            ->values();

        return response()->json([
            'total' => $total,
            'data' => $data
        ]);
    }
}