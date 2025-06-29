<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class DatabaseController extends Controller
{


public function backupDatabase()
{
    $dbHost = env('DB_HOST');
    $dbName = env('DB_DATABASE');
    $dbUser = env('DB_USERNAME');
    $dbPass = env('DB_PASSWORD');

    // Define the backup directory inside the public folder
    $backupDir = public_path('backups');

    // Ensure the directory exists
    if (!file_exists($backupDir)) {
        mkdir($backupDir, 0777, true);
    }

    // Define the backup file name
    $backupFile = $backupDir . '/' . $dbName . '-' . now()->format('Y-m-d_H-i-s') . '.sql';

    // Execute MySQL dump command
    $command = "mysqldump -h {$dbHost} -u {$dbUser} --password='{$dbPass}' {$dbName} > {$backupFile}";

    $result = system($command);

    if ($result === false) {
        return response()->json(['message' => 'Backup failed'], 500);
    }

    return response()->json([
        'message' => 'Backup created successfully',
        'file' => asset('backups/' . basename($backupFile))
    ]);
}

public function downloadBackup($filename)
{
    $filePath = public_path("backups/{$filename}");

    if (!file_exists($filePath)) {
        return response()->json(['message' => 'Backup file not found'], 404);
    }

    // Generate file URL
    $fileUrl = asset("backups/{$filename}");

    return response()->json([
        'status' => 200,
        'message' => 'Backup file available for download',
        'file_path' => $fileUrl,
        'url_name' => url("/api/backups/{$filename}"), // API URL to access the file
    ]);
}

public function listBackupFiles()
{
    $backupDir = public_path('backups');

    if (!file_exists($backupDir)) {
        return response()->json([
            'status' => 404,
            'message' => 'Backup directory not found'
        ], 404);
    }

    // Get all .sql files from the directory
    $files = File::files($backupDir);
    $sqlFiles = [];

    foreach ($files as $file) {
        if ($file->getExtension() === 'sql') {
            $filename = $file->getFilename();
            $sqlFiles[] = [
                'filename' => $filename,
                'file_path' => asset("backups/sql_list/{$filename}"), // Download URL
            ];
        }
    }

    return response()->json([
        'status' => 200,
        'message' => 'Backup files fetched successfully',
        'files' => $sqlFiles
    ]);
}



public function restoreDatabase(Request $request)
{
    // Validate request
    $request->validate([
        'backup_file' => 'required|string', // The file name from backups
    ]);

    // Retrieve backup file name from the request
    $filename = $request->backup_file;
    $backupPath = public_path("backups/{$filename}");

    // Check if file exists
    if (!file_exists($backupPath)) {
        return response()->json(['error' => "Backup file not found: {$filename}"], 404);
    }

    // Get database credentials from .env
    $dbHost = env('DB_HOST');
    $dbName = env('DB_DATABASE');
    $dbUser = env('DB_USERNAME');
    $dbPass = env('DB_PASSWORD');

    // Execute MySQL restore command
    $command = "mysql -h {$dbHost} -u {$dbUser} --password='{$dbPass}' {$dbName} < {$backupPath}";

    $result = system($command);

    if ($result === false) {
        return response()->json(['error' => 'Database restore failed'], 500);
    }

    return response()->json(['message' => "Database restored successfully from {$filename}"]);
}






}

