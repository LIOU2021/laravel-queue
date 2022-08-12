<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id ?? 0;

        TestEvent::dispatch($id);

        return "RUN !";
    }

    public function thread()
    {
        $process = new Process(['ls', '-lsa']);
        echo "<pre>";
        $process->start();

        foreach ($process as $type => $data) {
            if ($process::OUT === $type) {
                echo "\nRead from stdout: " . $data;
            } else { // $process::ERR === $type
                echo "\nRead from stderr: " . $data;
            }
        }
        $process->wait();
        echo "</pre>";
    }

    public function shell()
    {
        $output = shell_exec('ls -lh');
        echo "<pre>$output</pre>";
    }
}
