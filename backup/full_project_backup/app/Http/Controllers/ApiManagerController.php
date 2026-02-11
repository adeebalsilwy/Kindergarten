<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ApiManagerController extends Controller
{
    public function index()
    {
        $apis = $this->getAllApis();

        return view('pages.api-manager.index', compact('apis'));
    }

    public function getAllApis()
    {
        // Get all controllers in the Api directory
        $apiControllersPath = app_path('Http/Controllers/Api');

        if (! File::exists($apiControllersPath)) {
            return [];
        }

        $files = File::files($apiControllersPath);
        $apis = [];

        foreach ($files as $file) {
            $fileName = $file->getFilename();
            if (Str::endsWith($fileName, 'Controller.php')) {
                $controllerName = Str::replaceLast('Controller.php', '', $fileName);
                $modelName = Str::replaceLast('Api', '', $controllerName);

                // Get routes for this API
                $routes = $this->getApiRoutes($controllerName);

                $apis[] = [
                    'name' => $controllerName,
                    'model' => $modelName,
                    'path' => $file->getPathname(),
                    'routes' => $routes,
                    'methods' => $this->getControllerMethods($file->getPathname()),
                    'created_at' => date('Y-m-d H:i:s', $file->getMTime()),
                ];
            }
        }

        return $apis;
    }

    private function getApiRoutes($controllerName)
    {
        // This is a simplified way to get API routes - in a real app, you'd want to parse the routes file
        $apiRoutes = [];

        // For now, return standard REST API routes
        $standardRoutes = [
            ['method' => 'GET', 'uri' => "/api/{$this->getResourceName($controllerName)}", 'action' => 'index'],
            ['method' => 'GET', 'uri' => "/api/{$this->getResourceName($controllerName)}/{id}", 'action' => 'show'],
            ['method' => 'POST', 'uri' => "/api/{$this->getResourceName($controllerName)}", 'action' => 'store'],
            ['method' => 'PUT/PATCH', 'uri' => "/api/{$this->getResourceName($controllerName)}/{id}", 'action' => 'update'],
            ['method' => 'DELETE', 'uri' => "/api/{$this->getResourceName($controllerName)}/{id}", 'action' => 'destroy'],
        ];

        return $standardRoutes;
    }

    private function getResourceName($controllerName)
    {
        $modelName = Str::replaceLast('Api', '', $controllerName);

        return Str::kebab(Str::plural(Str::studly($modelName)));
    }

    private function getControllerMethods($filePath)
    {
        $content = File::get($filePath);
        $methods = [];

        // Simple regex to find public methods in the controller
        preg_match_all('/public\s+function\s+(\w+)\s*\(/', $content, $matches);

        foreach ($matches[1] as $method) {
            if (! in_array($method, ['__construct', '__invoke'])) {
                $methods[] = $method;
            }
        }

        return $methods;
    }

    public function create(Request $request)
    {
        $request->validate([
            'model_name' => 'required|string',
            'version' => 'nullable|string',
            'with_resource' => 'boolean',
            'with_repository' => 'boolean',
        ]);

        $modelName = $request->model_name;
        $version = $request->version ?: 'v1';
        $withResource = $request->with_resource ?? false;
        $withRepository = $request->with_repository ?? false;

        try {
            // Generate API controller using the existing CRUD generator
            $params = [
                'name' => $modelName,
                '--force' => true,
                '--components' => json_encode(['api']),
            ];

            if ($withResource) {
                $params['--components'] = json_encode(['api', 'requests']);
            }

            Artisan::call('make:crud', $params);
            $output = Artisan::output();

            return response()->json([
                'success' => true,
                'message' => "API for {$modelName} created successfully!",
                'output' => $output,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $controllerName)
    {
        $request->validate([
            'version' => 'nullable|string',
            'with_resource' => 'boolean',
            'with_repository' => 'boolean',
        ]);

        // In a real implementation, this would update the API
        return response()->json([
            'success' => true,
            'message' => "API {$controllerName} updated successfully!",
        ]);
    }

    public function destroy($controllerName)
    {
        $controllerPath = app_path("Http/Controllers/Api/{$controllerName}Controller.php");

        if (File::exists($controllerPath)) {
            File::delete($controllerPath);

            // Also delete associated resource if exists
            $resourceName = Str::replaceLast('Api', '', $controllerName);
            $resourcePath = app_path("Http/Resources/{$resourceName}Resource.php");

            if (File::exists($resourcePath)) {
                File::delete($resourcePath);
            }

            return response()->json([
                'success' => true,
                'message' => "API {$controllerName} deleted successfully!",
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "API {$controllerName} not found",
        ], 404);
    }

    public function test(Request $request)
    {
        $request->validate([
            'endpoint' => 'required|string',
            'method' => 'required|string|in:GET,POST,PUT,PATCH,DELETE',
            'data' => 'nullable|array',
        ]);

        $endpoint = $request->endpoint;
        $method = strtoupper($request->method);
        $data = $request->data ?? [];

        // In a real implementation, this would make an actual API call
        // For now, return a mock response
        $response = [
            'endpoint' => $endpoint,
            'method' => $method,
            'data_sent' => $data,
            'status' => 200,
            'response' => [
                'message' => 'API test successful',
                'timestamp' => now()->toISOString(),
                'data' => $data,
            ],
        ];

        return response()->json($response);
    }

    public function versions()
    {
        // In a real implementation, this would return API versions
        $versions = [
            ['name' => 'v1', 'status' => 'active', 'created_at' => '2023-01-01'],
            ['name' => 'v2', 'status' => 'beta', 'created_at' => '2024-01-01'],
            ['name' => 'v3', 'status' => 'development', 'created_at' => '2025-01-01'],
        ];

        return response()->json($versions);
    }
}
