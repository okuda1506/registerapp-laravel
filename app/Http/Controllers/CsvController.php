<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CsvController extends Controller
{
    /**
     * Export Sample List with csv
     * @return Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function download(Request $request)
    {
        $headers = [ //ヘッダー情報
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=people_' . date("YmdHis") . '.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function()
        {

            $createCsvFile = fopen('php://output', 'w'); //ファイル作成

            $columns = [ //1行目の情報
                '#',
                '姓',
                '名',
                'メールアドレス'
            ];

            mb_convert_variables('SJIS-win', 'UTF-8', $columns); //文字化け対策
            fputcsv($createCsvFile, $columns); //1行目の情報追記
            $rows = DB::table('people')->get(); //データ取得
            foreach ($rows as $row) {  //データを1行ずつ回す
                $csv = [
                    $row->id, 
                    $row->lastName,
                    $row->firstName,
                    $row->mail,
                ];
                mb_convert_variables('SJIS-win', 'UTF-8', $csv); //文字化け対策
                fputcsv($createCsvFile, $csv); //ファイルにデータ追記
            }
            fclose($createCsvFile); //ファイル閉じる
        };
        return response()->stream($callback, 200, $headers); //実行
    }
}
