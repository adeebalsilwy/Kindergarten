@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Database Import - Import from Database</title>
@endsection

@section('subcontent')
    <div class="mt-8 mb-6">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h2 class="intro-y text-2xl font-bold text-slate-800 dark:text-slate-200 mr-auto flex items-center">
                    <x-base.lucide icon="Database" class="w-6 h-6 mr-3 text-primary" />
                    Database Import Manager
                </h2>
                <div class="text-slate-600 dark:text-slate-400 text-sm mt-2 flex items-center">
                    <x-base.lucide icon="Info" class="w-4 h-4 mr-2" />
                    Import existing database tables and generate complete CRUD modules with relationships
                </div>
            </div>
            <div class="flex flex-wrap gap-3">
                <x-base.button id="configure-db-btn" variant="primary" class="px-4 py-2.5 flex items-center shadow-md">
                    <x-base.lucide icon="Settings" class="w-4 h-4 mr-2" /> Configure Connection
                </x-base.button>
                <a href="{{ route('crud-builder.index') }}">
                    <x-base.button variant="outline-primary" class="px-4 py-2.5 flex items-center">
                        <x-base.lucide icon="ArrowLeft" class="w-4 h-4 mr-2" /> Back to Builder
                    </x-base.button>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Tab Navigation -->
    <div class="intro-y box mt-5 p-5">
        <div class="border-b border-slate-200/60 dark:border-darkmode-400 mb-4">
            <ul class="nav nav-tabs" role="tablist">
                <li id="schema-tab" class="nav-item active" role="presentation">
                    <button class="nav-link w-full text-slate-600 dark:text-slate-300 hover:text-slate-800 dark:hover:text-slate-200 active" data-toggle="tab" data-target="#schema-content" type="button" role="tab">
                        <x-base.lucide icon="Table" class="w-4 h-4 mr-2" /> Schema Explorer
                    </button>
                </li>
                <li id="import-tab" class="nav-item" role="presentation">
                    <button class="nav-link w-full text-slate-600 dark:text-slate-300 hover:text-slate-800 dark:hover:text-slate-200" data-toggle="tab" data-target="#import-content" type="button" role="tab">
                        <x-base.lucide icon="Download" class="w-4 h-4 mr-2" /> Import Settings
                    </button>
                </li>
                <li id="preview-tab" class="nav-item" role="presentation">
                    <button class="nav-link w-full text-slate-600 dark:text-slate-300 hover:text-slate-800 dark:hover:text-slate-200" data-toggle="tab" data-target="#preview-content" type="button" role="tab">
                        <x-base.lucide icon="Eye" class="w-4 h-4 mr-2" /> Preview
                    </button>
                </li>
            </ul>
        </div>
        
        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Schema Explorer Tab -->
            <div id="schema-content" class="tab-pane active" role="tabpanel">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-12 intro-y">
                        <div class="box p-5 border border-slate-200/60 shadow-sm dark:border-darkmode-400 bg-gradient-to-br from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600">
                            <div class="flex items-center border-b border-slate-200/60 pb-3 mb-4 dark:border-darkmode-400">
                                <div class="w-8 h-8 bg-primary/10 text-primary flex items-center justify-center rounded-full mr-3 shadow-md">
                                    <x-base.lucide icon="Database" class="w-4 h-4" />
                                </div>
                                <div>
                                    <h3 class="font-medium text-base text-slate-800 dark:text-slate-200">Database Schema</h3>
                                    <div class="text-slate-500 text-xs">Available tables in your database</div>
                                </div>
                                <div class="ml-auto">
                                    <x-base.button id="refresh-schema-btn" variant="primary" size="sm" class="shadow-md">
                                        <x-base.lucide icon="RefreshCw" class="w-4 h-4 mr-1" /> Refresh
                                    </x-base.button>
                                </div>
                            </div>
                            
                            <div class="overflow-x-auto rounded-lg border border-slate-200/60 dark:border-darkmode-400 shadow-sm max-h-[500px] overflow-y-auto">
                                <style>
                                    .scrollable-table-container::-webkit-scrollbar {
                                        height: 8px;
                                    }
                                    .scrollable-table-container::-webkit-scrollbar-track {
                                        background: #f1f5f9;
                                        border-radius: 4px;
                                    }
                                    .scrollable-table-container::-webkit-scrollbar-thumb {
                                        background: #cbd5e1;
                                        border-radius: 4px;
                                    }
                                    .scrollable-table-container::-webkit-scrollbar-thumb:hover {
                                        background: #94a3b8;
                                    }
                                </style>
                                <x-base.table class="table-sm table-bordered bg-white dark:bg-darkmode-600 shadow-sm rounded-md w-full min-w-full">
                                    <x-base.table.thead class="table-light bg-gradient-to-r from-slate-100 to-slate-200 dark:from-darkmode-500 dark:to-darkmode-600 sticky top-0 z-10">
                                        <x-base.table.tr class="text-slate-700 dark:text-slate-300">
                                            <x-base.table.th class="whitespace-nowrap w-12 text-center sticky left-0 bg-inherit z-20 border-r border-slate-200 dark:border-darkmode-400">
                                                <x-base.form-check.input id="select-all-tables" class="form-check-input" type="checkbox" />
                                            </x-base.table.th>
                                            <x-base.table.th class="whitespace-nowrap px-4 py-3 text-left font-semibold border-b border-slate-200 dark:border-darkmode-400">Table Name</x-base.table.th>
                                            <x-base.table.th class="whitespace-nowrap text-center px-4 py-3 text-left font-semibold border-b border-slate-200 dark:border-darkmode-400">Columns</x-base.table.th>
                                            <x-base.table.th class="whitespace-nowrap text-center px-4 py-3 text-left font-semibold border-b border-slate-200 dark:border-darkmode-400">Relationships</x-base.table.th>
                                            <x-base.table.th class="whitespace-nowrap text-center px-4 py-3 text-left font-semibold border-b border-slate-200 dark:border-darkmode-400">Actions</x-base.table.th>
                                        </x-base.table.tr>
                                    </x-base.table.thead>
                                    <x-base.table.tbody id="tables-list" class="divide-y divide-slate-200 dark:divide-darkmode-400">
                                        <x-base.table.tr>
                                            <x-base.table.td colspan="5" class="text-center text-slate-500 py-8 bg-white dark:bg-darkmode-600">
                                                <x-base.lucide icon="Loader" class="w-8 h-8 mx-auto mb-2 animate-spin text-primary" />
                                                <div>Loading database schema...</div>
                                            </x-base.table.td>
                                        </x-base.table.tr>
                                    </x-base.table.tbody>
                                </x-base.table>
                            </div>
                            
                            <div class="mt-4 flex justify-between items-center bg-slate-50 dark:bg-darkmode/30 p-4 rounded-lg border border-slate-200/60 dark:border-darkmode-400">
                                <div class="text-sm text-slate-600 dark:text-slate-400 flex items-center">
                                    <x-base.lucide icon="Info" class="w-4 h-4 mr-2 text-primary" />
                                    <span id="selected-count">0</span> of <span id="total-count">0</span> tables selected
                                </div>
                                <div>
                                    <x-base.button id="import-selected-btn" variant="primary" disabled class="px-4 py-2 shadow-md">
                                        <x-base.lucide icon="Download" class="w-4 h-4 mr-2" /> Import Selected Tables
                                    </x-base.button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Import Settings Tab -->
            <div id="import-content" class="tab-pane" role="tabpanel">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-8 intro-y">
                        <div class="box p-5 border border-slate-200/60 shadow-sm dark:border-darkmode-400 bg-gradient-to-br from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600">
                            <div class="flex items-center border-b border-slate-200/60 pb-3 mb-4 dark:border-darkmode-400">
                                <div class="w-8 h-8 bg-success/10 text-success flex items-center justify-center rounded-full mr-3 shadow-md">
                                    <x-base.lucide icon="Settings" class="w-4 h-4" />
                                </div>
                                <div>
                                    <h3 class="font-medium text-base text-slate-800 dark:text-slate-200">Import Settings</h3>
                                    <div class="text-slate-500 text-xs">Configure import options</div>
                                </div>
                            </div>
                            
                            <div class="space-y-4">
                                <div>
                                    <x-base.form-label class="font-medium text-slate-700 dark:text-slate-300 mb-2">Prefix for Model Names</x-base.form-label>
                                    <x-base.form-input id="model-prefix" type="text" placeholder="e.g. App\Models\ or leave empty" class="py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200 w-full" />
                                </div>
                                
                                <div class="border-t border-slate-200/60 pt-4 mt-4 dark:border-darkmode-400">
                                    <div class="flex items-center">
                                        <x-base.form-check.input id="generate-crud-checkbox" class="form-check-input" type="checkbox" checked />
                                        <x-base.form-label for="generate-crud-checkbox" class="ml-2 font-medium text-slate-700 dark:text-slate-300">Generate Full CRUD</x-base.form-label>
                                    </div>
                                    <div class="text-xs text-slate-500 mt-1">Generate model, controller, views, and routes for selected tables.</div>
                                </div>
                                
                                <div class="border-t border-slate-200/60 pt-4 mt-4 dark:border-darkmode-400">
                                    <div class="flex items-center">
                                        <x-base.form-check.input id="overwrite-existing" class="form-check-input" type="checkbox" />
                                        <x-base.form-label for="overwrite-existing" class="ml-2 font-medium text-slate-700 dark:text-slate-300">Overwrite Existing Files</x-base.form-label>
                                    </div>
                                    <div class="text-xs text-slate-500 mt-1">Overwrite existing models/controllers if they exist.</div>
                                </div>
                                
                                <div class="pt-4">
                                    <x-base.button id="bulk-import-btn" variant="primary" class="w-full shadow-md py-3" disabled>
                                        <x-base.lucide icon="Download" class="w-4 h-4 mr-2" /> Bulk Import Selected Tables
                                    </x-base.button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-span-12 lg:col-span-4 intro-y">
                        <div class="box p-5 border border-slate-200/60 shadow-sm dark:border-darkmode-400 bg-gradient-to-br from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600">
                            <div class="flex items-center border-b border-slate-200/60 pb-3 mb-4 dark:border-darkmode-400">
                                <div class="w-8 h-8 bg-info/10 text-info flex items-center justify-center rounded-full mr-3 shadow-md">
                                    <x-base.lucide icon="Info" class="w-4 h-4" />
                                </div>
                                <div>
                                    <h3 class="font-medium text-base text-slate-800 dark:text-slate-200">Import Progress</h3>
                                    <div class="text-slate-500 text-xs">Track your import status</div>
                                </div>
                            </div>
                            
                            <div class="space-y-3">
                                <div class="p-4 bg-slate-50 dark:bg-darkmode-500/30 rounded-lg border border-slate-200/60 dark:border-darkmode-400">
                                    <h4 class="font-medium text-slate-700 dark:text-slate-300 mb-2 flex items-center">
                                        <x-base.lucide icon="Info" class="w-4 h-4 mr-2 text-blue-500" /> Import Status
                                    </h4>
                                    <div class="text-sm text-slate-600 dark:text-slate-400 space-y-1">
                                        <p><span class="font-medium">Tables Selected:</span> <span id="import-status-selected" class="text-primary">0</span></p>
                                        <p><span class="font-medium">CRUD Generation:</span> <span id="import-status-crud" class="text-success">Enabled</span></p>
                                        <p><span class="font-medium">Overwrite:</span> <span id="import-status-overwrite" class="text-warning">Disabled</span></p>
                                    </div>
                                </div>
                                
                                <div class="p-4 bg-slate-50 dark:bg-darkmode-500/30 rounded-lg border border-slate-200/60 dark:border-darkmode-400">
                                    <h4 class="font-medium text-slate-700 dark:text-slate-300 mb-2 flex items-center">
                                        <x-base.lucide icon="History" class="w-4 h-4 mr-2 text-purple-500" /> Recent Imports
                                    </h4>
                                    <div class="text-sm text-slate-600 dark:text-slate-400 space-y-1">
                                        <p class="text-xs italic">No recent imports</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Preview Tab -->
            <div id="preview-content" class="tab-pane" role="tabpanel">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-12 intro-y">
                        <div class="box p-5 border border-slate-200/60 shadow-sm dark:border-darkmode-400 bg-gradient-to-br from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600">
                            <div class="flex items-center border-b border-slate-200/60 pb-3 mb-4 dark:border-darkmode-400">
                                <div class="w-8 h-8 bg-info/10 text-info flex items-center justify-center rounded-full mr-3 shadow-md">
                                    <x-base.lucide icon="Eye" class="w-4 h-4" />
                                </div>
                                <div>
                                    <h3 class="font-medium text-base text-slate-800 dark:text-slate-200">Table Preview</h3>
                                    <div class="text-slate-500 text-xs">Preview of selected table structures</div>
                                </div>
                            </div>
                            
                            <div id="table-preview" class="space-y-3 max-h-[500px] overflow-y-auto">
                                <div class="text-center text-slate-500 py-12">
                                    <x-base.lucide icon="Eye" class="w-12 h-12 mx-auto mb-4 opacity-50" />
                                    <p>Select a table from the Schema Explorer to view its structure and relationships here.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Database Configuration Modal -->
    <div id="db-config-modal" class="hidden fixed inset-0 z-[10000] flex items-center justify-center bg-black/70 backdrop-blur-sm transition-all">
        <div class="bg-white p-6 rounded-xl shadow-2xl dark:bg-darkmode-600 transform scale-100 max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between border-b border-slate-200 dark:border-darkmode-400 pb-4 mb-4">
                <h3 class="text-xl font-bold text-slate-800 dark:text-white flex items-center">
                    <x-base.lucide icon="Server" class="w-6 h-6 mr-2 text-primary" /> Database Configuration
                </h3>
                <button id="close-config-modal" class="text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200">
                    <x-base.lucide icon="X" class="w-6 h-6" />
                </button>
            </div>
            
            <div class="space-y-6 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-base.form-label for="db-type" class="font-medium text-slate-700 dark:text-slate-300 mb-2 flex items-center">
                            <x-base.lucide icon="HardDrive" class="w-4 h-4 mr-2" /> Database Type
                        </x-base.form-label>
                        <x-base.tom-select id="db-type" class="w-full rounded-lg" name="db_type">
                            <option value="mysql">MySQL</option>
                            <option value="pgsql">PostgreSQL</option>
                            <option value="sqlite">SQLite</option>
                            <option value="sqlsrv">SQL Server</option>
                        </x-base.tom-select>
                    </div>
                    <div>
                        <x-base.form-label for="db-server" class="font-medium text-slate-700 dark:text-slate-300 mb-2 flex items-center">
                            <x-base.lucide icon="Globe" class="w-4 h-4 mr-2" /> Server Host
                        </x-base.form-label>
                        <x-base.form-input id="db-server" type="text" placeholder="localhost" value="localhost" class="py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200 w-full" />
                    </div>
                    <div>
                        <x-base.form-label for="db-port" class="font-medium text-slate-700 dark:text-slate-300 mb-2 flex items-center">
                            <x-base.lucide icon="Plug" class="w-4 h-4 mr-2" /> Port
                        </x-base.form-label>
                        <x-base.form-input id="db-port" type="number" placeholder="3306" value="3306" class="py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200 w-full" />
                    </div>
                    <div>
                        <x-base.form-label for="db-name" class="font-medium text-slate-700 dark:text-slate-300 mb-2 flex items-center">
                            <x-base.lucide icon="Database" class="w-4 h-4 mr-2" /> Database Name
                        </x-base.form-label>
                        <x-base.form-input id="db-name" type="text" placeholder="my_database" class="py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200 w-full" />
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-base.form-label for="db-user" class="font-medium text-slate-700 dark:text-slate-300 mb-2 flex items-center">
                            <x-base.lucide icon="User" class="w-4 h-4 mr-2" /> Username
                        </x-base.form-label>
                        <x-base.form-input id="db-user" type="text" placeholder="root" class="py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200 w-full" />
                    </div>
                    <div>
                        <x-base.form-label for="db-password" class="font-medium text-slate-700 dark:text-slate-300 mb-2 flex items-center">
                            <x-base.lucide icon="Lock" class="w-4 h-4 mr-2" /> Password
                        </x-base.form-label>
                        <x-base.form-input id="db-password" type="password" placeholder="••••••••" class="py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200 w-full" />
                    </div>
                </div>
                
                <div class="p-4 bg-slate-50 dark:bg-darkmode-500/30 rounded-lg border border-slate-200/60 dark:border-darkmode-400">
                    <h4 class="font-medium text-slate-700 dark:text-slate-300 mb-2 flex items-center">
                        <x-base.lucide icon="Info" class="w-4 h-4 mr-2 text-blue-500" /> Connection Details
                    </h4>
                    <div class="text-sm text-slate-600 dark:text-slate-400 space-y-1">
                        <p><span class="font-medium">Current Connection:</span> <span id="current-connection" class="text-primary">Using application default</span></p>
                        <p><span class="font-medium">Status:</span> <span id="connection-status" class="text-success">Connected</span></p>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end gap-3 pt-4 border-t border-slate-200 dark:border-darkmode-400">
                <x-base.button id="test-connection-btn" variant="secondary" class="px-4 py-2 shadow-md flex items-center">
                    <x-base.lucide icon="Zap" class="w-4 h-4 mr-2" /> Test Connection
                </x-base.button>
                <x-base.button id="save-config-btn" variant="primary" class="px-4 py-2 shadow-md flex items-center">
                    <x-base.lucide icon="Save" class="w-4 h-4 mr-2" /> Save Configuration
                </x-base.button>
            </div>
        </div>
    </div>
    
    <!-- Processing Modal -->
    <div id="import-processing-modal" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/50 backdrop-blur-sm transition-all">
        <div class="bg-white p-8 rounded-xl shadow-2xl text-center dark:bg-darkmode-600 transform scale-100 max-w-md w-full mx-4">
            <x-base.loading-icon icon="puff" class="w-12 h-12 mx-auto mb-4 text-primary" />
            <h3 class="text-xl font-bold text-slate-800 dark:text-white">Importing...</h3>
            <p class="text-slate-500 mt-2">Processing your database import.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tablesList = document.getElementById('tables-list');
            const importBtn = document.getElementById('import-btn');
            const bulkImportBtn = document.getElementById('bulk-import-btn');
            const previewSection = document.getElementById('preview-section');
            const tablePreview = document.getElementById('table-preview');
            const generateCrudCheckbox = document.getElementById('generate-crud-checkbox');
            const refreshBtn = document.getElementById('refresh-schema-btn');
            const selectAllCheckbox = document.getElementById('select-all-tables');
            const selectedCountEl = document.getElementById('selected-count');
            const totalCountEl = document.getElementById('total-count');
            const importSelectedBtn = document.getElementById('import-selected-btn');
            const modelPrefixInput = document.getElementById('model-prefix');
            const overwriteCheckbox = document.getElementById('overwrite-existing');

            // Modal elements
            const configureDbBtn = document.getElementById('configure-db-btn');
            const dbConfigModal = document.getElementById('db-config-modal');
            const closeConfigModal = document.getElementById('close-config-modal');
            const saveConfigBtn = document.getElementById('save-config-btn');
            const testConnectionBtn = document.getElementById('test-connection-btn');

            // Tab elements
            const schemaTab = document.getElementById('schema-tab');
            const importTab = document.getElementById('import-tab');
            const previewTab = document.getElementById('preview-tab');
            const schemaContent = document.getElementById('schema-content');
            const importContent = document.getElementById('import-content');
            const previewContent = document.getElementById('preview-content');

            let selectedTables = [];

            // Load database schema
            loadDatabaseSchema();

            refreshBtn.addEventListener('click', function() {
                loadDatabaseSchema();
            });

            // Tab switching functionality
            schemaTab.addEventListener('click', function(e) {
                e.preventDefault();
                activateTab('schema');
            });

            importTab.addEventListener('click', function(e) {
                e.preventDefault();
                activateTab('import');
            });

            previewTab.addEventListener('click', function(e) {
                e.preventDefault();
                activateTab('preview');
            });

            function activateTab(tabName) {
                // Remove active class from all tabs and content
                document.querySelectorAll('.nav-item').forEach(tab => tab.classList.remove('active'));
                document.querySelectorAll('.tab-pane').forEach(content => content.classList.remove('active'));

                // Add active class to selected tab and content
                document.getElementById(tabName + '-tab').classList.add('active');
                document.getElementById(tabName + '-content').classList.add('active');
            }

            // Modal controls
            configureDbBtn.addEventListener('click', function() {
                dbConfigModal.classList.remove('hidden');
            });

            closeConfigModal.addEventListener('click', function() {
                dbConfigModal.classList.add('hidden');
            });

            // Close modal when clicking outside
            dbConfigModal.addEventListener('click', function(e) {
                if (e.target === dbConfigModal) {
                    dbConfigModal.classList.add('hidden');
                }
            });

            // Test connection functionality
            testConnectionBtn.addEventListener('click', function() {
                const config = {
                    db_type: document.getElementById('db-type').value,
                    db_server: document.getElementById('db-server').value,
                    db_port: document.getElementById('db-port').value,
                    db_name: document.getElementById('db-name').value,
                    db_user: document.getElementById('db-user').value,
                    db_password: document.getElementById('db-password').value,
                };

                // Show testing state
                const originalText = testConnectionBtn.innerHTML;
                testConnectionBtn.innerHTML = '<i data-lucide="Loader" class="w-4 h-4 mr-2 animate-spin"></i> Testing...';
                testConnectionBtn.disabled = true;
                
                if(window.lucide) lucide.createIcons();

                // Test the connection
                fetch('{{ route('database-import.test-connection') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(config)
                })
                .then(response => response.json())
                .then(data => {
                    testConnectionBtn.innerHTML = originalText;
                    testConnectionBtn.disabled = false;
                    
                    if (data.success) {
                        document.getElementById('connection-status').textContent = 'Connected';
                        document.getElementById('connection-status').className = 'text-success';
                        alert('Connection successful!');
                    } else {
                        document.getElementById('connection-status').textContent = 'Failed';
                        document.getElementById('connection-status').className = 'text-danger';
                        alert('Connection failed: ' + data.message);
                    }
                })
                .catch(error => {
                    testConnectionBtn.innerHTML = originalText;
                    testConnectionBtn.disabled = false;
                    document.getElementById('connection-status').textContent = 'Error';
                    document.getElementById('connection-status').className = 'text-danger';
                    alert('Error testing connection: ' + error.message);
                });
                
                if(window.lucide) lucide.createIcons();
            });

            // Save configuration
            saveConfigBtn.addEventListener('click', function() {
                const config = {
                    db_type: document.getElementById('db-type').value,
                    db_server: document.getElementById('db-server').value,
                    db_port: document.getElementById('db-port').value,
                    db_name: document.getElementById('db-name').value,
                    db_user: document.getElementById('db-user').value,
                    db_password: document.getElementById('db-password').value,
                };

                // Show saving state
                const originalText = saveConfigBtn.innerHTML;
                saveConfigBtn.innerHTML = '<i data-lucide="Loader" class="w-4 h-4 mr-2 animate-spin"></i> Saving...';
                saveConfigBtn.disabled = true;
                
                if(window.lucide) lucide.createIcons();

                fetch('{{ route('database-import.save-config') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(config)
                })
                .then(response => response.json())
                .then(data => {
                    saveConfigBtn.innerHTML = originalText;
                    saveConfigBtn.disabled = false;
                    
                    if (data.success) {
                        document.getElementById('current-connection').textContent = `${config.db_type.toUpperCase()}://${config.db_user}@${config.db_server}:${config.db_port}/${config.db_name}`;
                        document.getElementById('connection-status').textContent = 'Saved & Connected';
                        document.getElementById('connection-status').className = 'text-success';
                        alert('Configuration saved successfully!');
                        dbConfigModal.classList.add('hidden');
                        loadDatabaseSchema(); // Reload schema with new config
                    } else {
                        document.getElementById('connection-status').textContent = 'Failed';
                        document.getElementById('connection-status').className = 'text-danger';
                        alert('Failed to save configuration: ' + data.message);
                    }
                })
                .catch(error => {
                    saveConfigBtn.innerHTML = originalText;
                    saveConfigBtn.disabled = false;
                    document.getElementById('connection-status').textContent = 'Error';
                    document.getElementById('connection-status').className = 'text-danger';
                    alert('Error saving configuration: ' + error.message);
                });
                
                if(window.lucide) lucide.createIcons();
            });

            function loadDatabaseSchema() {
                tablesList.innerHTML = `
                    <tr>
                        <td colspan="5" class="text-center text-slate-500 py-8 bg-white dark:bg-darkmode-600">
                            <i data-lucide="Loader" class="w-8 h-8 mx-auto mb-2 animate-spin text-primary"></i>
                            <div>Loading database schema...</div>
                        </td>
                    </tr>
                `;

                if(window.lucide) lucide.createIcons();

                fetch('{{ route('database-import.schema') }}')
                    .then(res => res.json())
                    .then(data => {
                        if (data.error) {
                            tablesList.innerHTML = `
                                <tr>
                                    <td colspan="5" class="text-center text-red-500 py-8 bg-white dark:bg-darkmode-600">
                                        <i data-lucide="AlertTriangle" class="w-8 h-8 mx-auto mb-2"></i>
                                        <div>Error loading schema: ${data.error}</div>
                                    </td>
                                </tr>
                            `;
                            if(window.lucide) lucide.createIcons();
                            return;
                        }

                        if (data.length === 0) {
                            tablesList.innerHTML = `
                                <tr>
                                    <td colspan="5" class="text-center text-slate-500 py-8 bg-white dark:bg-darkmode-600">
                                        <i data-lucide="Database" class="w-8 h-8 mx-auto mb-2"></i>
                                        <div>No tables found in the database</div>
                                    </td>
                                </tr>
                            `;
                            if(window.lucide) lucide.createIcons();
                            return;
                        }

                        tablesList.innerHTML = '';

                        // Update total count
                        totalCountEl.textContent = data.length;

                        data.forEach((table, index) => {
                            const tr = document.createElement('tr');
                            tr.className = 'hover:bg-slate-50 dark:hover:bg-darkmode-400/30 transition-colors';

                            tr.innerHTML = `
                                <td class="text-center px-4 py-3 text-slate-500 border-r border-slate-200 dark:border-darkmode-400 sticky left-0 bg-inherit z-10">
                                    <input type="checkbox" class="table-select-checkbox form-check-input" data-table="${table.table_name}" />
                                </td>
                                <td class="font-medium px-4 py-3 text-slate-500 border-b border-slate-200 dark:border-darkmode-400">
                                    <div class="flex items-center">
                                        <i data-lucide="Table" class="w-4 h-4 mr-2 text-primary"></i>
                                        ${table.table_name}
                                    </div>
                                </td>
                                <td class="text-center px-4 py-3 text-slate-500 border-b border-slate-200 dark:border-darkmode-400">${table.columns.length}</td>
                                <td class="text-center px-4 py-3 text-slate-500 border-b border-slate-200 dark:border-darkmode-400">
                                    <span class="px-2 py-1 rounded-full text-xs font-medium ${table.relationships.length > 0 ? 'bg-success/20 text-success' : 'bg-slate-200 text-slate-600'}">
                                        ${table.relationships.length}
                                    </span>
                                </td>
                                <td class="text-center px-4 py-3 text-slate-500 border-b border-slate-200 dark:border-darkmode-400">
                                    <button class="preview-btn btn btn-sm btn-outline-info" data-table="${table.table_name}">
                                        <i data-lucide="Eye" class="w-4 h-4"></i>
                                    </button>
                                </td>
                            `;

                            tablesList.appendChild(tr);
                        });

                        // Add event listeners to checkboxes
                        document.querySelectorAll('.table-select-checkbox').forEach(checkbox => {
                            checkbox.addEventListener('change', function() {
                                const tableName = this.getAttribute('data-table');

                                if (this.checked) {
                                    if (!selectedTables.includes(tableName)) {
                                        selectedTables.push(tableName);
                                    }
                                } else {
                                    selectedTables = selectedTables.filter(t => t !== tableName);
                                }

                                updateSelectionCount();
                                updateBulkImportButton();
                                updateImportStatus();

                                // Update select-all checkbox
                                const allCheckboxes = document.querySelectorAll('.table-select-checkbox');
                                selectAllCheckbox.checked = allCheckboxes.length > 0 && allCheckboxes.length === document.querySelectorAll('.table-select-checkbox:checked').length;
                            });
                        });

                        // Add event listeners to preview buttons
                        document.querySelectorAll('.preview-btn').forEach(btn => {
                            btn.addEventListener('click', function() {
                                const tableName = this.getAttribute('data-table');
                                showTablePreview(tableName);
                                activateTab('preview'); // Switch to preview tab when clicking preview
                            });
                        });

                        if(window.lucide) lucide.createIcons();
                    })
                    .catch(err => {
                        console.error('Error loading schema:', err);
                        tablesList.innerHTML = `
                            <tr>
                                <td colspan="5" class="text-center text-red-500 py-8 bg-white dark:bg-darkmode-600">
                                    <i data-lucide="AlertTriangle" class="w-8 h-8 mx-auto mb-2"></i>
                                    <div>Error loading database schema</div>
                                </td>
                            </tr>
                        `;
                        if(window.lucide) lucide.createIcons();
                    });
            }

            // Select/deselect all tables
            selectAllCheckbox.addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.table-select-checkbox');

                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;

                    const tableName = checkbox.getAttribute('data-table');

                    if (this.checked && !selectedTables.includes(tableName)) {
                        selectedTables.push(tableName);
                    } else if (!this.checked) {
                        selectedTables = selectedTables.filter(t => t !== tableName);
                    }
                });

                updateSelectionCount();
                updateBulkImportButton();
                updateImportStatus();
            });

            function updateSelectionCount() {
                selectedCountEl.textContent = selectedTables.length;
            }

            function updateImportStatus() {
                document.getElementById('import-status-selected').textContent = selectedTables.length;
                document.getElementById('import-status-crud').textContent = generateCrudCheckbox.checked ? 'Enabled' : 'Disabled';
                document.getElementById('import-status-overwrite').textContent = overwriteCheckbox.checked ? 'Enabled' : 'Disabled';
            }

            function updateBulkImportButton() {
                importSelectedBtn.disabled = selectedTables.length === 0;
                bulkImportBtn.disabled = selectedTables.length === 0;
            }

            function showTablePreview(tableName) {
                // Show loading state
                tablePreview.innerHTML = `
                    <div class="text-center text-slate-500 py-4">
                        <i data-lucide="Loader" class="w-6 h-6 mx-auto mb-2 animate-spin text-primary"></i>
                        <div>Loading table structure...</div>
                    </div>
                `;

                if(window.lucide) lucide.createIcons();

                // Fetch table details to show preview
                fetch('{{ route('crud-builder.table-details') }}?table=' + tableName)
                    .then(res => res.json())
                    .then(data => {
                        let html = '<div class="space-y-3">';

                        html += `<div class="font-medium text-sm text-slate-600 dark:text-slate-300 mb-2 flex items-center"><i data-lucide="List" class="w-4 h-4 mr-2"></i>Columns (${data.fields.length}):</div>`;
                        html += '<div class="space-y-2 max-h-60 overflow-y-auto border border-slate-200 dark:border-darkmode-400 rounded-lg p-3 bg-slate-50 dark:bg-darkmode/20">';

                        data.fields.forEach(field => {
                            html += `
                                <div class="flex justify-between items-center p-2 bg-white dark:bg-darkmode-500 rounded text-sm border border-slate-200 dark:border-darkmode-400 shadow-sm">
                                    <div class="flex items-center">
                                        <i data-lucide="Database" class="w-4 h-4 mr-2 text-primary"></i>
                                        <span class="font-medium">${field.name}</span>
                                    </div>
                                    <span class="text-xs bg-slate-200 dark:bg-darkmode-600 px-2 py-1 rounded">${field.type}</span>
                                </div>
                            `;
                        });

                        html += '</div>';

                        if (data.relationships && data.relationships.length > 0) {
                            html += `<div class="font-medium text-sm text-slate-600 dark:text-slate-300 mt-3 mb-2 flex items-center"><i data-lucide="GitBranch" class="w-4 h-4 mr-2"></i>Detected Relationships (${data.relationships.length}):</div>`;
                            html += '<div class="space-y-2 max-h-40 overflow-y-auto border border-slate-200 dark:border-darkmode-400 rounded-lg p-3 bg-slate-50 dark:bg-darkmode/20">';

                            data.relationships.forEach(rel => {
                                html += `
                                    <div class="flex justify-between items-center p-2 bg-success/10 dark:bg-success/20 rounded text-sm border border-success/20 shadow-sm">
                                        <div class="flex items-center">
                                            <i data-lucide="Link" class="w-4 h-4 mr-2 text-success"></i>
                                            <span class="font-medium">${rel.type}</span>
                                            <span class="mx-1">→</span>
                                            <span class="font-medium">${rel.related_table}</span>
                                        </div>
                                        <span class="text-xs bg-success/20 px-2 py-1 rounded">${rel.foreign_key}</span>
                                    </div>
                                `;
                            });

                            html += '</div>';
                        } else {
                            html += '<div class="text-xs text-slate-500 mt-3 p-3 bg-slate-50 dark:bg-darkmode/20 rounded-lg border border-slate-200 dark:border-darkmode-400 flex items-center"><i data-lucide="Info" class="w-4 h-4 mr-2"></i>No relationships detected for this table.</div>';
                        }

                        html += '</div>';

                        tablePreview.innerHTML = html;
                        if(window.lucide) lucide.createIcons();
                    })
                    .catch(err => {
                        tablePreview.innerHTML = `
                            <div class="text-center text-red-500 py-4 p-3 bg-red-50 dark:bg-darkmode/20 rounded-lg border border-red-200 dark:border-darkmode-400">
                                <i data-lucide="AlertTriangle" class="w-6 h-6 mx-auto mb-2"></i>
                                <div>Error loading table details</div>
                            </div>
                        `;
                        if(window.lucide) lucide.createIcons();
                    });
            }

            // Bulk import functionality
            importSelectedBtn.addEventListener('click', function() {
                if (selectedTables.length === 0) {
                    alert('Please select at least one table to import.');
                    return;
                }

                document.getElementById('import-processing-modal').classList.remove('hidden');

                fetch('{{ route('database-import.bulk-import') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        tables: selectedTables,
                        generate_crud: generateCrudCheckbox.checked,
                        model_prefix: modelPrefixInput.value,
                        overwrite_existing: overwriteCheckbox.checked
                    })
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('import-processing-modal').classList.add('hidden');

                    if (data.success) {
                        alert(data.message + '\n\nOutput: ' + data.output);
                        // Optionally redirect or reset form
                        window.location.reload();
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    document.getElementById('import-processing-modal').classList.add('hidden');
                    alert('System Error: ' + error.message);
                });
            });

            // Alternative bulk import button
            bulkImportBtn.addEventListener('click', function() {
                if (selectedTables.length === 0) {
                    alert('Please select at least one table to import.');
                    return;
                }

                document.getElementById('import-processing-modal').classList.remove('hidden');

                fetch('{{ route('database-import.bulk-import') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        tables: selectedTables,
                        generate_crud: generateCrudCheckbox.checked,
                        model_prefix: modelPrefixInput.value,
                        overwrite_existing: overwriteCheckbox.checked
                    })
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('import-processing-modal').classList.add('hidden');

                    if (data.success) {
                        alert(data.message + '\n\nOutput: ' + data.output);
                        // Optionally redirect or reset form
                        window.location.reload();
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    document.getElementById('import-processing-modal').classList.add('hidden');
                    alert('System Error: ' + error.message);
                });
            });
        });
    </script>
@endsection