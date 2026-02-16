@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>API Manager - Manage Your APIs</title>
@endsection

@section('subcontent')
    <div class="mt-8 flex items-center justify-between">
        <div>
            <h2 class="intro-y text-lg font-medium me-auto">API Manager</h2>
            <div class="text-slate-500 text-xs mt-1">Manage your API endpoints and versions.</div>
        </div>
    </div>
    
    <div class="intro-y box mt-5 p-5">
        <div class="grid grid-cols-12 gap-6">
            <!-- API Creation Card -->
            <div class="col-span-12 intro-y">
                <div class="box p-5 border border-slate-200/60 shadow-sm dark:border-darkmode-400">
                    <div class="flex items-center border-b border-slate-200/60 pb-3 mb-4 dark:border-darkmode-400">
                        <div class="w-8 h-8 bg-primary/10 text-primary flex items-center justify-center rounded-full me-3">
                            <x-base.lucide icon="Code" class="w-4 h-4" />
                        </div>
                        <div>
                            <h3 class="font-medium text-base">Create New API</h3>
                            <div class="text-slate-500 text-xs">Generate API endpoints for your models</div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-4">
                            <x-base.form-label>Model Name</x-base.form-label>
                            <x-base.form-input id="api-model-name" type="text" placeholder="e.g. User, Product" />
                        </div>
                        <div class="col-span-12 md:col-span-3">
                            <x-base.form-label>Version</x-base.form-label>
                            <x-base.form-select id="api-version">
                                <option value="v1">v1</option>
                                <option value="v2">v2</option>
                                <option value="v3">v3</option>
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 md:col-span-3 flex items-end">
                            <div class="flex items-center gap-4">
                                <div class="flex items-center">
                                    <x-base.form-check.input id="api-with-resource" class="form-check-input" type="checkbox">
                                    <x-base.form-label for="api-with-resource" class="ms-2">With Resource</x-base.form-label>
                                </div>
                                <div class="flex items-center">
                                    <x-base.form-check.input id="api-with-repository" class="form-check-input" type="checkbox">
                                    <x-base.form-label for="api-with-repository" class="ms-2">With Repository</x-base.form-label>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-2 flex items-end">
                            <x-base.button id="create-api-btn" variant="primary" class="w-full">
                                <x-base.lucide icon="Plus" class="w-4 h-4 me-2" /> Create API
                            </x-base.button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- API Endpoints Card -->
            <div class="col-span-12 intro-y">
                <div class="box p-5 border border-slate-200/60 shadow-sm dark:border-darkmode-400">
                    <div class="flex items-center justify-between border-b border-slate-200/60 pb-3 mb-4 dark:border-darkmode-400">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-success/10 text-success flex items-center justify-center rounded-full me-3">
                                <x-base.lucide icon="Server" class="w-4 h-4" />
                            </div>
                            <div>
                                <h3 class="font-medium text-base">Available APIs</h3>
                                <div class="text-slate-500 text-xs">List of all created API endpoints</div>
                            </div>
                        </div>
                        <div class="text-xs">
                            <span class="bg-success/20 px-2 py-1 rounded">Total: </span>
                            <span id="api-count" class="font-bold">{{ count($apis) }}</span>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <x-base.table class="table-sm table-bordered bg-white dark:bg-darkmode-600 shadow-sm rounded-md">
                            <x-base.table.thead class="table-light">
                                <x-base.table.tr>
                                    <x-base.table.th class="whitespace-nowrap">API Name</x-base.table.th>
                                    <x-base.table.th class="whitespace-nowrap">Model</x-base.table.th>
                                    <x-base.table.th class="whitespace-nowrap">Routes</x-base.table.th>
                                    <x-base.table.th class="whitespace-nowrap">Methods</x-base.table.th>
                                    <x-base.table.th class="whitespace-nowrap">Created At</x-base.table.th>
                                    <x-base.table.th class="whitespace-nowrap text-center">Actions</x-base.table.th>
                                </x-base.table.tr>
                            </x-base.table.thead>
                            <x-base.table.tbody id="apis-list">
                                @if(count($apis) > 0)
                                    @foreach($apis as $api)
                                        <x-base.table.tr>
                                            <x-base.table.td class="font-medium">
                                                <div class="flex items-center">
                                                    <x-base.lucide icon="Code" class="w-4 h-4 me-2 text-primary" />
                                                    {{ $api['name'] }}
                                                </div>
                                            </x-base.table.td>
                                            <x-base.table.td>{{ $api['model'] }}</x-base.table.td>
                                            <x-base.table.td>
                                                <div class="space-y-1">
                                                    @foreach($api['routes'] as $route)
                                                        <div class="text-xs bg-slate-100 dark:bg-darkmode-400 px-2 py-1 rounded truncate max-w-[150px]">
                                                            <span class="font-mono">{{ $route['method'] }}</span> {{ $route['uri'] }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </x-base.table.td>
                                            <x-base.table.td>
                                                <div class="space-y-1">
                                                    @foreach($api['methods'] as $method)
                                                        <div class="text-xs bg-primary/10 text-primary px-2 py-1 rounded">
                                                            {{ $method }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </x-base.table.td>
                                            <x-base.table.td class="text-slate-500 text-sm">{{ $api['created_at'] }}</x-base.table.td>
                                            <x-base.table.td class="text-center">
                                                <div class="flex justify-center gap-1">
                                                    <x-base.button class="btn btn-sm btn-outline-primary test-api-btn" data-api-name="{{ $api['name'] }}">
                                                        <x-base.lucide icon="Play" class="w-4 h-4" />
                                                    </x-base.button>
                                                    <x-base.button class="btn btn-sm btn-outline-warning edit-api-btn" data-api-name="{{ $api['name'] }}">
                                                        <x-base.lucide icon="Settings" class="w-4 h-4" />
                                                    </x-base.button>
                                                    <x-base.button class="btn btn-sm btn-outline-danger delete-api-btn" data-api-name="{{ $api['name'] }}">
                                                        <x-base.lucide icon="Trash" class="w-4 h-4" />
                                                    </x-base.button>
                                                </div>
                                            </x-base.table.td>
                                        </x-base.table.tr>
                                    @endforeach
                                @else
                                    <x-base.table.tr>
                                        <x-base.table.td colspan="6" class="text-center text-slate-500 py-8">
                                            <x-base.lucide icon="ServerOff" class="w-12 h-12 mx-auto mb-3 text-slate-400" />
                                            <div>No APIs found</div>
                                            <div class="text-sm mt-1">Create your first API to get started</div>
                                        </x-base.table.td>
                                    </x-base.table.tr>
                                @endif
                            </x-base.table.tbody>
                        </x-base.table>
                    </div>
                </div>
            </div>
            
            <!-- API Testing Card -->
            <div class="col-span-12 intro-y">
                <div class="box p-5 border border-slate-200/60 shadow-sm dark:border-darkmode-400">
                    <div class="flex items-center border-b border-slate-200/60 pb-3 mb-4 dark:border-darkmode-400">
                        <div class="w-8 h-8 bg-info/10 text-info flex items-center justify-center rounded-full me-3">
                            <x-base.lucide icon="Zap" class="w-4 h-4" />
                        </div>
                        <div>
                            <h3 class="font-medium text-base">Test API Endpoint</h3>
                            <div class="text-slate-500 text-xs">Test your API endpoints directly</div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-4">
                            <x-base.form-label>Endpoint</x-base.form-label>
                            <x-base.form-input id="test-endpoint" type="text" placeholder="/api/users" />
                        </div>
                        <div class="col-span-12 md:col-span-2">
                            <x-base.form-label>Method</x-base.form-label>
                            <x-base.form-select id="test-method">
                                <option value="GET">GET</option>
                                <option value="POST">POST</option>
                                <option value="PUT">PUT</option>
                                <option value="PATCH">PATCH</option>
                                <option value="DELETE">DELETE</option>
                            </x-base.form-select>
                        </div>
                        <div class="col-span-12 md:col-span-4">
                            <x-base.form-label>Payload (JSON)</x-base.form-label>
                            <x-base.form-input id="test-payload" type="text" placeholder='{"name": "John", "email": "john@example.com"}' />
                        </div>
                        <div class="col-span-12 md:col-span-2 flex items-end">
                            <x-base.button id="test-api-btn" variant="outline-info" class="w-full">
                                <x-base.lucide icon="Zap" class="w-4 h-4 me-2" /> Test API
                            </x-base.button>
                        </div>
                    </div>
                    
                    <div id="test-result" class="mt-4 hidden">
                        <div class="p-4 bg-slate-50 dark:bg-darkmode-400 rounded-md">
                            <h4 class="font-medium mb-2">Response:</h4>
                            <pre id="test-response" class="text-sm bg-white dark:bg-darkmode-600 p-3 rounded overflow-x-auto"></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Processing Modal -->
    <div id="api-processing-modal" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/50 backdrop-blur-sm transition-all">
        <div class="bg-white p-8 rounded-xl shadow-2xl text-center dark:bg-darkmode-600 transform scale-100">
            <x-base.loading-icon icon="puff" class="w-12 h-12 mx-auto mb-4 text-primary" />
            <h3 class="text-xl font-bold text-slate-800 dark:text-white">Processing...</h3>
            <p class="text-slate-500 mt-2">Creating your API.</p>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="api-confirmation-modal" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white p-6 rounded-xl shadow-2xl max-w-md w-full dark:bg-darkmode-600">
            <div class="text-center">
                <x-base.lucide icon="AlertTriangle" class="w-12 h-12 mx-auto mb-4 text-warning" />
                <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-2">Confirm Action</h3>
                <p id="api-confirmation-message" class="text-slate-500 mb-6">Are you sure you want to proceed?</p>
                <div class="flex justify-center gap-3">
                    <x-base.button id="api-cancel-confirm-btn" variant="outline-secondary" class="px-4">
                        Cancel
                    </x-base.button>
                    <x-base.button id="api-confirm-action-btn" variant="danger" class="px-4">
                        Confirm
                    </x-base.button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modelNameInput = document.getElementById('api-model-name');
            const versionSelect = document.getElementById('api-version');
            const withResourceCheckbox = document.getElementById('api-with-resource');
            const withRepositoryCheckbox = document.getElementById('api-with-repository');
            const createApiBtn = document.getElementById('create-api-btn');
            const apisList = document.getElementById('apis-list');
            const processingModal = document.getElementById('api-processing-modal');
            const confirmationModal = document.getElementById('api-confirmation-modal');
            const confirmMessage = document.getElementById('api-confirmation-message');
            const confirmActionBtn = document.getElementById('api-confirm-action-btn');
            const cancelConfirmBtn = document.getElementById('api-cancel-confirm-btn');
            
            // Test API elements
            const testEndpointInput = document.getElementById('test-endpoint');
            const testMethodSelect = document.getElementById('test-method');
            const testPayloadInput = document.getElementById('test-payload');
            const testApiBtn = document.getElementById('test-api-btn');
            const testResultDiv = document.getElementById('test-result');
            const testResponsePre = document.getElementById('test-response');
            
            let actionCallback = null;
            
            // Create API
            createApiBtn.addEventListener('click', function() {
                const modelName = modelNameInput.value.trim();
                
                if (!modelName) {
                    alert('Please enter a model name');
                    modelNameInput.focus();
                    return;
                }
                
                processingModal.classList.remove('hidden');
                
                fetch('{{ route('api-manager.create') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        model_name: modelName,
                        version: versionSelect.value,
                        with_resource: withResourceCheckbox.checked,
                        with_repository: withRepositoryCheckbox.checked
                    })
                })
                .then(response => response.json())
                .then(data => {
                    processingModal.classList.add('hidden');
                    
                    if (data.success) {
                        alert(data.message);
                        window.location.reload();
                    } else {
                        alert('Error: ' + (data.message || 'Failed to create API'));
                    }
                })
                .catch(error => {
                    processingModal.classList.add('hidden');
                    alert('Error: ' + error.message);
                });
            });
            
            // Test API
            testApiBtn.addEventListener('click', function() {
                const endpoint = testEndpointInput.value.trim();
                const method = testMethodSelect.value;
                
                if (!endpoint) {
                    alert('Please enter an endpoint');
                    testEndpointInput.focus();
                    return;
                }
                
                let payload = {};
                if (testPayloadInput.value.trim()) {
                    try {
                        payload = JSON.parse(testPayloadInput.value.trim());
                    } catch (e) {
                        alert('Invalid JSON in payload: ' + e.message);
                        testPayloadInput.focus();
                        return;
                    }
                }
                
                processingModal.classList.remove('hidden');
                
                fetch('{{ route('api-manager.test') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        endpoint: endpoint,
                        method: method,
                        data: payload
                    })
                })
                .then(response => response.json())
                .then(data => {
                    processingModal.classList.add('hidden');
                    
                    testResponsePre.textContent = JSON.stringify(data, null, 2);
                    testResultDiv.classList.remove('hidden');
                })
                .catch(error => {
                    processingModal.classList.add('hidden');
                    alert('Error: ' + error.message);
                });
            });
            
            // Delete API
            document.querySelectorAll('.delete-api-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const apiName = this.getAttribute('data-api-name');
                    confirmAction('delete', apiName);
                });
            });
            
            function confirmAction(action, apiName) {
                let message = '';
                
                if (action === 'delete') {
                    message = `Are you sure you want to delete API ${apiName}? This cannot be undone.`;
                    actionCallback = () => performDelete(apiName);
                }
                
                confirmMessage.textContent = message;
                confirmationModal.classList.remove('hidden');
            }
            
            function performDelete(apiName) {
                processingModal.classList.remove('hidden');
                
                fetch('{{ route('api-manager.destroy', '') }}/' + apiName, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    processingModal.classList.add('hidden');
                    
                    if (data.success) {
                        alert(data.message);
                        window.location.reload();
                    } else {
                        alert('Error: ' + (data.message || 'Failed to delete API'));
                    }
                })
                .catch(error => {
                    processingModal.classList.add('hidden');
                    alert('Error: ' + error.message);
                });
            }
            
            // Modal events
            confirmActionBtn.addEventListener('click', function() {
                if (actionCallback) {
                    actionCallback();
                }
                confirmationModal.classList.add('hidden');
            });
            
            cancelConfirmBtn.addEventListener('click', function() {
                confirmationModal.classList.add('hidden');
            });
        });
    </script>
@endsection