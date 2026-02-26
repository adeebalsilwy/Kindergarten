@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Backup Manager - Manage Your Backups</title>
@endsection

@section('subcontent')
    <div class="mt-8 flex items-center justify-between">
        <div>
            <h2 class="intro-y text-lg font-medium me-auto">Backup Manager</h2>
            <div class="text-slate-500 text-xs mt-1">Manage backups of your models and related files.</div>
        </div>
    </div>
    
    <div class="intro-y box mt-5 p-5">
        <div class="grid grid-cols-12 gap-6">
            <!-- Backup Creation Card -->
            <div class="col-span-12 intro-y">
                <div class="box p-5 border border-slate-200/60 shadow-sm dark:border-darkmode-400">
                    <div class="flex items-center border-b border-slate-200/60 pb-3 mb-4 dark:border-darkmode-400">
                        <div class="w-8 h-8 bg-primary/10 text-primary flex items-center justify-center rounded-full me-3">
                            <x-base.lucide icon="DatabaseBackup" class="w-4 h-4" />
                        </div>
                        <div>
                            <h3 class="font-medium text-base">Create New Backup</h3>
                            <div class="text-slate-500 text-xs">Backup model and related files</div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-8">
                            <x-base.form-label>Model Name</x-base.form-label>
                            <x-base.form-input id="backup-model-name" type="text" placeholder="e.g. User, Product, Category" />
                            <div class="text-xs text-slate-500 mt-1">Enter the name of the model to backup (without 'Model' suffix)</div>
                        </div>
                        <div class="col-span-12 md:col-span-4 flex items-end">
                            <x-base.button id="create-backup-btn" variant="primary" class="w-full">
                                <x-base.lucide icon="Save" class="w-4 h-4 me-2" /> Create Backup
                            </x-base.button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Backup List Card -->
            <div class="col-span-12 intro-y">
                <div class="box p-5 border border-slate-200/60 shadow-sm dark:border-darkmode-400">
                    <div class="flex items-center justify-between border-b border-slate-200/60 pb-3 mb-4 dark:border-darkmode-400">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-success/10 text-success flex items-center justify-center rounded-full me-3">
                                <x-base.lucide icon="Server" class="w-4 h-4" />
                            </div>
                            <div>
                                <h3 class="font-medium text-base">Available Backups</h3>
                                <div class="text-slate-500 text-xs">List of all created backups</div>
                            </div>
                        </div>
                        <div class="text-xs">
                            <span class="bg-success/20 px-2 py-1 rounded">Total: </span>
                            <span id="backup-count" class="font-bold">{{ count($backups) }}</span>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <x-base.table class="table-sm table-bordered bg-white dark:bg-darkmode-600 shadow-sm rounded-md">
                            <x-base.table.thead class="table-light">
                                <x-base.table.tr>
                                    <x-base.table.th class="whitespace-nowrap">Backup ID</x-base.table.th>
                                    <x-base.table.th class="whitespace-nowrap">Model Name</x-base.table.th>
                                    <x-base.table.th class="whitespace-nowrap">Created At</x-base.table.th>
                                    <x-base.table.th class="whitespace-nowrap text-center">Files Count</x-base.table.th>
                                    <x-base.table.th class="whitespace-nowrap text-center">Actions</x-base.table.th>
                                </x-base.table.tr>
                            </x-base.table.thead>
                            <x-base.table.tbody id="backups-list">
                                @if(count($backups) > 0)
                                    @foreach($backups as $backup)
                                        <x-base.table.tr>
                                            <x-base.table.td class="font-mono text-xs">
                                                <span class="truncate inline-block max-w-[150px]" title="{{ $backup['backup_id'] }}">
                                                    {{ substr($backup['backup_id'], 0, 15) }}...
                                                </span>
                                            </x-base.table.td>
                                            <x-base.table.td class="font-medium">{{ $backup['model_name'] }}</x-base.table.td>
                                            <x-base.table.td class="text-slate-500 text-sm">{{ $backup['created_at'] }}</x-base.table.td>
                                            <x-base.table.td class="text-center">
                                                <span class="inline-block px-2 py-1 text-xs font-medium bg-success/20 text-success rounded">
                                                    {{ $backup['count'] }}
                                                </span>
                                            </x-base.table.td>
                                            <x-base.table.td class="text-center">
                                                <div class="flex justify-center gap-1">
                                                    <x-base.button class="btn btn-sm btn-outline-success restore-backup-btn" data-backup-id="{{ $backup['backup_id'] }}">
                                                        <x-base.lucide icon="RefreshCw" class="w-4 h-4" />
                                                    </x-base.button>
                                                    <x-base.button class="btn btn-sm btn-outline-warning download-backup-btn" data-backup-id="{{ $backup['backup_id'] }}">
                                                        <x-base.lucide icon="Download" class="w-4 h-4" />
                                                    </x-base.button>
                                                    <x-base.button class="btn btn-sm btn-outline-danger delete-backup-btn" data-backup-id="{{ $backup['backup_id'] }}">
                                                        <x-base.lucide icon="Trash" class="w-4 h-4" />
                                                    </x-base.button>
                                                </div>
                                            </x-base.table.td>
                                        </x-base.table.tr>
                                    @endforeach
                                @else
                                    <x-base.table.tr>
                                        <x-base.table.td colspan="5" class="text-center text-slate-500 py-8">
                                            <x-base.lucide icon="ServerOff" class="w-12 h-12 mx-auto mb-3 text-slate-400" />
                                            <div>No backups found</div>
                                            <div class="text-sm mt-1">Create your first backup to get started</div>
                                        </x-base.table.td>
                                    </x-base.table.tr>
                                @endif
                            </x-base.table.tbody>
                        </x-base.table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Processing Modal -->
    <div id="backup-processing-modal" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/50 backdrop-blur-sm transition-all">
        <div class="bg-white p-8 rounded-xl shadow-2xl text-center dark:bg-darkmode-600 transform scale-100">
            <x-base.loading-icon icon="puff" class="w-12 h-12 mx-auto mb-4 text-primary" />
            <h3 class="text-xl font-bold text-slate-800 dark:text-white">Processing...</h3>
            <p class="text-slate-500 mt-2">Creating your backup.</p>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmation-modal" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white p-6 rounded-xl shadow-2xl max-w-md w-full dark:bg-darkmode-600">
            <div class="text-center">
                <x-base.lucide icon="AlertTriangle" class="w-12 h-12 mx-auto mb-4 text-warning" />
                <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-2">Confirm Action</h3>
                <p id="confirmation-message" class="text-slate-500 mb-6">Are you sure you want to proceed?</p>
                <div class="flex justify-center gap-3">
                    <x-base.button id="cancel-confirm-btn" variant="outline-secondary" class="px-4">
                        Cancel
                    </x-base.button>
                    <x-base.button id="confirm-action-btn" variant="danger" class="px-4">
                        Confirm
                    </x-base.button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modelNameInput = document.getElementById('backup-model-name');
            const createBackupBtn = document.getElementById('create-backup-btn');
            const backupsList = document.getElementById('backups-list');
            const processingModal = document.getElementById('backup-processing-modal');
            const confirmationModal = document.getElementById('confirmation-modal');
            const confirmMessage = document.getElementById('confirmation-message');
            const confirmActionBtn = document.getElementById('confirm-action-btn');
            const cancelConfirmBtn = document.getElementById('cancel-confirm-btn');
            
            let actionCallback = null;
            
            // Create backup
            createBackupBtn.addEventListener('click', function() {
                const modelName = modelNameInput.value.trim();
                
                if (!modelName) {
                    alert('Please enter a model name');
                    modelNameInput.focus();
                    return;
                }
                
                processingModal.classList.remove('hidden');
                
                fetch('{{ route('backup.create') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        model_name: modelName
                    })
                })
                .then(response => response.json())
                .then(data => {
                    processingModal.classList.add('hidden');
                    
                    if (data.success) {
                        alert('Backup created successfully!');
                        window.location.reload();
                    } else {
                        alert('Error: ' + (data.message || 'Failed to create backup'));
                    }
                })
                .catch(error => {
                    processingModal.classList.add('hidden');
                    alert('Error: ' + error.message);
                });
            });
            
            // Restore backup
            document.querySelectorAll('.restore-backup-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const backupId = this.getAttribute('data-backup-id');
                    confirmAction('restore', backupId);
                });
            });
            
            // Download backup
            document.querySelectorAll('.download-backup-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const backupId = this.getAttribute('data-backup-id');
                    window.location.href = '{{ url('/backup/download/') }}/' + backupId;
                });
            });
            
            // Delete backup
            document.querySelectorAll('.delete-backup-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const backupId = this.getAttribute('data-backup-id');
                    confirmAction('delete', backupId);
                });
            });
            
            function confirmAction(action, backupId) {
                let message = '';
                
                if (action === 'restore') {
                    message = `Are you sure you want to restore backup ${backupId}? This will overwrite existing files.`;
                    actionCallback = () => performRestore(backupId);
                } else if (action === 'delete') {
                    message = `Are you sure you want to delete backup ${backupId}? This cannot be undone.`;
                    actionCallback = () => performDelete(backupId);
                }
                
                confirmMessage.textContent = message;
                confirmationModal.classList.remove('hidden');
            }
            
            function performRestore(backupId) {
                processingModal.classList.remove('hidden');
                
                fetch('{{ route('backup.restore') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        backup_id: backupId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    processingModal.classList.add('hidden');
                    
                    if (data.success) {
                        alert(data.message);
                    } else {
                        alert('Error: ' + (data.message || 'Failed to restore backup'));
                    }
                })
                .catch(error => {
                    processingModal.classList.add('hidden');
                    alert('Error: ' + error.message);
                });
            }
            
            function performDelete(backupId) {
                processingModal.classList.remove('hidden');
                
                fetch('{{ route('backup.destroy', '') }}/' + backupId, {
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
                        alert('Error: ' + (data.message || 'Failed to delete backup'));
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