<?php

namespace App\Http\Controllers\Api;

use App\Boxel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EventController extends Controller
{

    protected $boxel;
    protected $localPath = '/Users/muramasa/ws/Misoten/';
    protected $mainProjectName = 'Rakugaki2Model_MainProcess';
    protected $clientProjectName = 'Rakugaki2Model_Client';
    protected $serverProjectName = 'Rakugaki2Model_Server';

    public function __construct(Boxel $boxel) {
        $this->boxel = $boxel;
    }

    public function index() {
        return $this->boxel->all();
    }

    public function add($img, $obj) {

        $boxel = new Boxel();
        $boxel->image = $img;
        $boxel->obj = $obj;

        $boxel->save();
    }

    public function generate(Request $req) {

        $res = []; $ret = '';
        $targetPath = $this->localPath . $this->mainProjectName;
        if($base64 = $req->base64) {
            // base64画像を画像ファイルに変換
            $base64bin = str_replace('data:image/png;base64,', '', $base64);
            $base64bin = str_replace(' ', '+', $base64bin);
            $image = base64_decode($base64bin);

            // 既存の画像を置換
            exec("rm -rf {$targetPath}/test_image/*");
            file_put_contents("{$targetPath}/test_image/model.jpg", $image);

            // Client側にpix2pixで生成した画像ファイルを保存する
            file_put_contents("{$this->localPath}{$this->clientProjectName}/static/output/images/{$req->file}.jpg", $image);
            // 3Dモデルの生成及びClient側への保存
            $execFile = 'demo.py';
            $output = "/static/output/models/{$req->file}.obj";
            $output = $this->localPath . $this->clientProjectName . $output;
            $cmd = "cd {$targetPath} && python {$execFile} {$output} >& /dev/null";
            exec($cmd, $res);

            // ユーザー毎に画像及び3Dモデルのパスを保存
            $boxel = new Boxel();
            $boxel->user = $req->user;
            $boxel->file = $req->file;
            $boxel->save();

            return $res;
        }
        return abort(400);
    }

}
