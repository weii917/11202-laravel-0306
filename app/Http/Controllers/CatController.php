<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 確認edit路徑使用
        $url = route('cats.edit', ['cat' => 1]);
        // dd($url);
        //撈出的資料存$data['']，return view 將此data帶進去
        $data = DB::select('SELECT * FROM cats');
        // $data['test'] = '123';

        // 新增進資料庫 insert
        // DB::table('cats')->insert([
        //     'name' => 'amy',
        //     'mobile' => '091134',
        //     'address' => '1'
        // ]);
        return view('cat.index', ['data' => $data]);
        // $data = view('cat.index');
        // $data = route('cats.index');
        // dd($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $url = route('cats.store');
        // dd($url);
        return view('cat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->except('_token');
        $now = now();
        // dd($input);
        // dd('hello cat store');
        // 新增進資料庫 insert
        DB::table('cats')->insert([
            'name' => $input['name'],
            'mobile' => $input['mobile'],
            'address' => $input['address'],
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        return redirect()->route('cats.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        dd("Hello $id");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function excel()
    {
        dd('excel test ');
        //
    }
}
