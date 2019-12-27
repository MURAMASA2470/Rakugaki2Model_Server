<?php

namespace App\Http\Controllers\Api;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EventController extends Controller
{

    protected $event;
    protected $localPath = '/Users/muramasa/ws/Misoten/';
    protected $mainProjectName = 'Rakugaki2Model_MainProcess';
    protected $clientProjectName = 'Rakugaki2Model_Client';
    protected $serverProjectName = 'Rakugaki2Model_Server';

    public function __construct(Event $event) {
        $this->event = $event;
    }

    public function index() {
        return $this->event->all();
    }

    public function add($img, $obj) {

        $event = new Event();
        $event->image = $img;
        $event->obj = $obj;

        $event->save();
    }

    public function generate(Request $req) {

        $res = []; $ret = '';
        $targetPath = $this->localPath . $this->mainProjectName;
        if($base64 = $req->base64) {
            $base64bin = str_replace('data:image/png;base64,', '', $base64);
            $base64bin = str_replace(' ', '+', $base64bin);
            $image = base64_decode($base64bin);
            exec("rm -rf {$targetPath}/test_image/*");
            // \File::put("{$targetPath}/test_image/aaa.jpg", $image);
            file_put_contents("{$targetPath}/test_image/aaa.jpg", $image);

            $execFile = 'demo.py';
            $output = '/output/models/' . 'test' . '.obj';
            $output = $this->localPath . $this->clientProjectName . $output;
            $cmd = "cd {$targetPath} && python {$execFile} {$output} >& /dev/null";
            exec($cmd, $res);
            return $res;
        }
        return abort(400);
    }

}
