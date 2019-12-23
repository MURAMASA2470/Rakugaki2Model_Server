<?php

namespace App\Http\Controllers\Api;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EventController extends Controller
{

    protected $event;

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

        $path = '/Users/muramasa/ws/Misoten/Rakugaki2Model_MainProcess/';
    }

    public function generate(/*path*/) {

        $res = []; $ret = '';
        $path = '/Users/muramasa/ws/Misoten/Rakugaki2Model_MainProcess/';

        // exec("rm -rf {$path}test_image/*");

        $execFile = 'demo.py';
        // $output = 'output/models/' . 'komura' . '.obj';
        $output = '../Rakugaki2Model_Client/' . 'komura' . '.obj';
        $cmd = "cd {$path} && python {$execFile} {$output} >& /dev/null";
        passthru($cmd, $res);
        return $res;
    }

}
