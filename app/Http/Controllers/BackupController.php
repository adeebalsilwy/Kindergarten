<?php

namespace App\Http\Controllers;

use App\Services\BackupService;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    protected $backupService;

    public function __construct(BackupService $backupService)
    {
        $this->backupService = $backupService;
    }

    public function index()
    {
        $backups = $this->backupService->listBackups();

        return view('pages.backup.index', compact('backups'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'model_name' => 'required|string',
        ]);

        $result = $this->backupService->backupModelFiles($request->model_name);

        if ($result['success']) {
            return response()->json([
                'success' => true,
                'message' => 'Backup created successfully',
                'backup_id' => $result['backup_id'],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create backup',
            ], 500);
        }
    }

    public function restore(Request $request)
    {
        $request->validate([
            'backup_id' => 'required|string',
        ]);

        $result = $this->backupService->restoreBackup($request->backup_id);

        return response()->json($result);
    }

    public function destroy($backupId)
    {
        $result = $this->backupService->deleteBackup($backupId);

        if ($result['success']) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => $result['message'],
            ], 404);
        }
    }

    public function download($backupId)
    {
        $backupDir = storage_path('backups/crud-backups/'.$backupId);

        if (! file_exists($backupDir)) {
            abort(404);
        }

        $zipPath = storage_path('app/backups/'.$backupId.'.zip');
        $this->createZip($backupDir, $zipPath);

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    private function createZip($source, $destination)
    {
        $zip = new \ZipArchive;
        if ($zip->open($destination, \ZipArchive::CREATE | \ZipArchive::OVERWRITE)) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS)
            );

            foreach ($files as $file) {
                $relativePath = substr($file->getPathname(), strlen($source) + 1);
                if (! $file->isDir()) {
                    $zip->addFile($file->getPathname(), $relativePath);
                }
            }

            $zip->close();
        }
    }
}
