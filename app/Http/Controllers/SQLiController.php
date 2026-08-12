<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SQLiController extends Controller
{
    public function index()
    {
        return view('SQLi');
    }

    public function execute(Request $request)
    {
        $sql = $request->input('sql');

        try {

            if (str_starts_with(strtolower(trim($sql)), 'select')) {

                $results = DB::select($sql);

                return view('SQLi', [
                    'results' => $results,
                    'message' => 'SELECT executed successfully.'
                ]);
            }

            DB::statement($sql);

            return view('SQLi', [
                'results' => [],
                'message' => 'SQL executed successfully.'
            ]);

        } catch (\Exception $e) {

            return view('SQLi', [
                'error' => $e->getMessage()
            ]);
        }
    }
    public function search(Request $request)
    {
        $input = $request->input('search');

        $sql = "SELECT * FROM todos WHERE title = '$input'";

        try {
            $results = DB::select($sql);

            return view('sqli', [
                'results' => $results,
                'sql' => $sql,
            ]);

        } catch (\Exception $e) {

            return view('sqli', [
                'error' => $e->getMessage(),
                'sql' => $sql,
            ]);
        }
    }

}
