<?php

namespace App\Http\Controllers;

use App\Models\CommandLog;
use Illuminate\Support\Facades\Artisan;

class MonitoringController extends Controller
{
    public function index()
    {
        $logs = CommandLog::orderBy('created_at', 'desc')->paginate(20);

        return view('pages.monitoring.index', compact('logs'));

    }

    public function show(CommandLog $log)
    {
        return view('pages.monitoring.show', compact('log'));

    }

    public function rerun(CommandLog $log)
    {
        if ($log->command === 'make:crud') {
            try {
                Artisan::call('make:crud', [
                    'name' => $log->parameters['name'],
                    '--force' => true,
                ]);

                return redirect()->back()->with('success', 'Command rerun successfully!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Rerun failed: '.$e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'Cannot rerun this command type.');
    }
}
