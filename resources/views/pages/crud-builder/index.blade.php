@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Visual CRUD Builder - Deebo</title>
@endsection

@section('subcontent')
    <div class="mt-8 flex items-center justify-between">
        <div>
            <h2 class="intro-y text-2xl font-bold mr-auto text-slate-800 dark:text-slate-200">New Module Builder</h2>
            <div class="text-slate-500 text-sm mt-1">Create a new module with Model, Migration, and CRUD views.</div>
        </div>
        <a href="{{ route('crud-builder.edit') }}">
            <x-base.button variant="outline-secondary" class="px-4 py-2">
                <x-base.lucide icon="Edit" class="w-4 h-4 mr-2" /> Edit Existing Model
            </x-base.button>
        </a>
    </div>
    
    <div class="intro-y box mt-5 p-6" id="crud-builder-app">
        <form id="crud-form" method="POST" action="{{ route('crud-builder.generate') }}">
            @csrf
            <div class="grid grid-cols-12 gap-6">
                
                <!-- Model Info Card -->
                <div class="col-span-12 intro-y">
                    <div class="box p-6 border border-slate-200/60 shadow-lg dark:border-darkmode-400 bg-gradient-to-br from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600">
                        <div class="flex items-center border-b border-slate-200/60 pb-4 mb-5 dark:border-darkmode-400">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 text-white flex items-center justify-center rounded-lg mr-4 shadow-md">
                                <x-base.lucide icon="Box" class="w-5 h-5" />
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-800 dark:text-slate-200">Module Information</h3>
                                <div class="text-slate-500 text-sm">Basic details for the new module.</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12 sm:col-span-6">
                                <div class="flex items-center gap-2">
                                    <x-base.form-label for="model_name" class="font-medium text-slate-700 dark:text-slate-300 mb-2">Model Name</x-base.form-label>
                                    <x-base.popover placement="top">
                                        <div class="flex items-center">
                                            <x-base.lucide icon="HelpCircle" class="w-4 h-4 text-slate-500 cursor-pointer" />
                                        </div>
                                        <x-base.popover.panel class="p-3 bg-slate-800 text-white text-xs max-w-xs">
                                            Enter the name of your model in PascalCase (e.g., UserProfile)
                                        </x-base.popover.panel>
                                    </x-base.popover>
                                </div>
                                <x-base.form-input id="model_name" name="model_name" type="text" placeholder="e.g. Product" required class="py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200" />
                                <div class="form-help text-slate-500 text-xs mt-2">PascalCase (e.g. UserProfile)</div>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <div class="flex items-center gap-2">
                                    <x-base.form-label for="table_name" class="font-medium text-slate-700 dark:text-slate-300 mb-2">Table Name</x-base.form-label>
                                    <x-base.popover placement="top">
                                        <div class="flex items-center">
                                            <x-base.lucide icon="HelpCircle" class="w-4 h-4 text-slate-500 cursor-pointer" />
                                        </div>
                                        <x-base.popover.panel class="p-3 bg-slate-800 text-white text-xs max-w-xs">
                                            Enter the name of your database table in snake_case (e.g., user_profiles)
                                        </x-base.popover.panel>
                                    </x-base.popover>
                                </div>
                                <x-base.form-input id="table_name" name="table_name" type="text" placeholder="e.g. products" required class="py-3 px-4 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200" />
                                <div class="form-help text-slate-500 text-xs mt-2">snake_case (e.g. user_profiles)</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fields Card -->
                <div class="col-span-12 intro-y">
                    <div class="box p-6 border border-slate-200/60 shadow-lg dark:border-darkmode-400 bg-gradient-to-br from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600">
                        <div class="flex items-center justify-between border-b border-slate-200/60 pb-4 mb-5 dark:border-darkmode-400">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 text-white flex items-center justify-center rounded-lg mr-4 shadow-md">
                                    <x-base.lucide icon="List" class="w-5 h-5" />
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg text-slate-800 dark:text-slate-200">Fields Definition</h3>
                                    <div class="text-slate-500 text-sm">Define the columns for your database table.</div>
                                </div>
                            </div>
                            <x-base.button type="button" id="add-field" variant="primary" size="sm" class="shadow-md px-4 py-2">
                                <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" /> Add Field
                            </x-base.button>
                        </div>
                        
                        <div class="space-y-4" id="fields-container">
                            <!-- Default ID field is implicit, adding first custom field -->
                            <div class="field-row grid grid-cols-12 gap-3 items-center p-5 rounded-lg border bg-white border-blue-100 shadow-md dark:bg-darkmode-600 dark:border-blue-500/30 hover:border-blue-300 transition-all duration-300">
                                <div class="col-span-12 md:col-span-3">
                                    <x-base.form-label class="text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block">Column Name</x-base.form-label>
                                    <x-base.form-input name="fields[0][name]" placeholder="name" required class="form-control-sm py-2 px-3 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200" />
                                </div>
                                <div class="col-span-12 md:col-span-3">
                                    <x-base.form-label class="text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block">Type</x-base.form-label>
                                    <x-base.tom-select name="fields[0][type]" class="mt-1 rounded-lg">
                                        <option value="string">String</option>
                                        <option value="text">Text</option>
                                        <option value="integer">Integer</option>
                                        <option value="decimal">Decimal</option>
                                        <option value="boolean">Boolean</option>
                                        <option value="date">Date</option>
                                        <option value="dateTime">DateTime</option>
                                        <option value="enum">Enum</option>
                                        <option value="json">JSON</option>
                                        <option value="foreignId">Foreign Key</option>
                                    </x-base.tom-select>
                                </div>
                                <div class="col-span-12 md:col-span-2">
                                    <x-base.form-label class="text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block">Default</x-base.form-label>
                                    <x-base.form-input name="fields[0][default]" placeholder="Optional" class="form-control-sm py-2 px-3 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200" />
                                </div>
                                <div class="col-span-12 md:col-span-3 flex items-center space-x-5 pt-6">
                                    <label class="flex items-center text-sm cursor-pointer">
                                        <x-base.form-check.input name="fields[0][nullable]" value="1" class="mr-2 w-4 h-4" /> <x-base.form-label class="mb-0 text-slate-600 dark:text-slate-300">Nullable</x-base.form-label>
                                    </label>
                                    <label class="flex items-center text-sm cursor-pointer">
                                        <x-base.form-check.input name="fields[0][unique]" value="1" class="mr-2 w-4 h-4" /> <x-base.form-label class="mb-0 text-slate-600 dark:text-slate-300">Unique</x-base.form-label>
                                    </label>
                                </div>
                                <div class="col-span-12 md:col-span-1 text-right pt-4 md:pt-0">
                                    <x-base.button type="button" class="text-slate-400 hover:text-danger transition-colors remove-field p-2 rounded-full hover:bg-red-50 dark:hover:bg-red-500/10" variant="soft-danger">
                                        <x-base.lucide icon="Trash2" class="w-4 h-4" />
                                    </x-base.button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Relationships Card -->
                <div class="col-span-12 intro-y">
                    <div class="box p-6 border border-slate-200/60 shadow-lg dark:border-darkmode-400 bg-gradient-to-br from-slate-50 to-white dark:from-darkmode-500/20 dark:to-darkmode-600">
                        <div class="flex items-center justify-between border-b border-slate-200/60 pb-4 mb-5 dark:border-darkmode-400">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-green-600 text-white flex items-center justify-center rounded-lg mr-4 shadow-md">
                                    <x-base.lucide icon="Link" class="w-5 h-5" />
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg text-slate-800 dark:text-slate-200">Relationships</h3>
                                    <div class="text-slate-500 text-sm">Define connections to other models.</div>
                                </div>
                            </div>
                            <x-base.button type="button" id="add-relationship" variant="success" size="sm" class="shadow-md px-4 py-2">
                                <x-base.lucide icon="Plus" class="w-4 h-4 mr-2" /> Add Relationship
                            </x-base.button>
                        </div>
                        <div class="space-y-4" id="relationships-container">
                            <div class="text-slate-500 text-center py-10 bg-slate-50 rounded-lg border-2 border-dashed border-slate-300 italic" id="no-rels-msg">
                                <x-base.lucide icon="Layers" class="w-10 h-10 mx-auto mb-3 text-slate-300" />
                                <p>No relationships defined yet.</p>
                                <p class="text-sm mt-1">Click "Add Relationship" to define connections between models.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="col-span-12 mt-6 p-6 bg-gradient-to-r from-blue-500 to-blue-600 border border-blue-300/50 rounded-xl flex items-center justify-between intro-y shadow-lg">
                    <div class="text-white">
                        <h4 class="font-bold text-xl">Generate Module</h4>
                        <p class="text-blue-100">This will create the Migration, Model, Controller, and Views.</p>
                    </div>
                    <x-base.button type="submit" variant="primary" size="lg" class="w-44 shadow-xl bg-white text-blue-600 hover:bg-slate-100 font-bold px-4 py-3">
                        <x-base.lucide icon="Zap" class="w-5 h-5 mr-2" /> Generate Module
                    </x-base.button>
                </div>
            </div>
        </form>
    </div>

    <!-- Processing Modal -->
    <div id="processing-modal" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/70 backdrop-blur-sm transition-all">
        <div class="bg-white p-10 rounded-2xl shadow-2xl text-center dark:bg-darkmode-600 transform scale-100 max-w-md w-full mx-4">
            <x-base.loading-icon icon="puff" class="w-16 h-16 mx-auto mb-6 text-blue-500" />
            <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-2">Generating Module...</h3>
            <p class="text-slate-500">Please wait while we set up everything for you.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let fieldCount = 1;
            let relCount = 0;
            let availableTables = [];
            const noRelsMsg = document.getElementById('no-rels-msg');

            // Fetch Tables on Load
            fetch("{{ route('crud-builder.tables') }}")
                .then(response => response.json())
                .then(data => {
                    availableTables = data;
                })
                .catch(error => console.error('Error loading tables:', error));
            
            // Helper to create field row
            function createFieldRow(index, data = {}) {
                const row = document.createElement('div');
                row.className = 'field-row grid grid-cols-12 gap-3 items-center p-5 rounded-lg border bg-white border-blue-100 shadow-md dark:bg-darkmode-600 dark:border-blue-500/30 hover:border-blue-300 transition-all duration-300';
                
                const name = data.name || '';
                const type = data.type || 'string';

                row.innerHTML = `
                    <div class="col-span-12 md:col-span-3">
                        <label class="text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block">Column Name</label>
                        <input type="text" name="fields[${index}][name]" value="${name}" placeholder="column_name" required class="form-control form-control-sm py-2 px-3 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200" />
                    </div>
                    <div class="col-span-12 md:col-span-3">
                        <label class="text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block">Type</label>
                        <select name="fields[${index}][type]" class="tom-select">
                            <option value="string" ${type === 'string' ? 'selected' : ''}>String</option>
                            <option value="text" ${type === 'text' ? 'selected' : ''}>Text</option>
                            <option value="integer" ${type === 'integer' ? 'selected' : ''}>Integer</option>
                            <option value="decimal" ${type === 'decimal' ? 'selected' : ''}>Decimal</option>
                            <option value="boolean" ${type === 'boolean' ? 'selected' : ''}>Boolean</option>
                            <option value="date" ${type === 'date' ? 'selected' : ''}>Date</option>
                            <option value="dateTime" ${type === 'dateTime' ? 'selected' : ''}>DateTime</option>
                            <option value="enum" ${type === 'enum' ? 'selected' : ''}>Enum</option>
                            <option value="json" ${type === 'json' ? 'selected' : ''}>JSON</option>
                            <option value="foreignId" ${type === 'foreignId' ? 'selected' : ''}>Foreign Key</option>
                        </select>
                    </div>
                    <div class="col-span-12 md:col-span-2">
                        <label class="text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2 block">Default</label>
                        <input type="text" name="fields[${index}][default]" placeholder="Optional" class="form-control form-control-sm py-2 px-3 text-sm rounded-lg border-2 border-slate-200 focus:border-blue-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200" />
                    </div>
                    <div class="col-span-12 md:col-span-3 flex items-center space-x-5 pt-6">
                        <label class="flex items-center text-sm cursor-pointer">
                            <input type="checkbox" name="fields[${index}][nullable]" value="1" class="form-check-input mr-2 w-4 h-4" /> <span class="mb-0 text-slate-600 dark:text-slate-300">Nullable</span>
                        </label>
                        <label class="flex items-center text-sm cursor-pointer">
                            <input type="checkbox" name="fields[${index}][unique]" value="1" class="form-check-input mr-2 w-4 h-4" /> <span class="mb-0 text-slate-600 dark:text-slate-300">Unique</span>
                        </label>
                    </div>
                    <div class="col-span-12 md:col-span-1 text-right pt-4 md:pt-0">
                        <button type="button" class="text-slate-400 hover:text-danger transition-colors remove-field p-2 rounded-full hover:bg-red-50 dark:hover:bg-red-500/10">
                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                        </button>
                    </div>
                `;
                
                // Add event listener for remove button
                row.querySelector('.remove-field').addEventListener('click', function() {
                    row.remove();
                });
                
                // Initialize TomSelect components if they exist
                if (window.TomSelect) {
                    const typeSelect = row.querySelector('select.tom-select');
                    if (typeSelect && !typeSelect.tomselect) {
                        new TomSelect(typeSelect, {});
                    }
                }
                
                return row;
            }

            // Add Field
            document.getElementById('add-field').addEventListener('click', function() {
                const container = document.getElementById('fields-container');
                const row = createFieldRow(fieldCount);
                container.appendChild(row);
                fieldCount++;
                if(window.lucide) lucide.createIcons();
            });
            
            // Handle initial remove button
            document.querySelectorAll('.remove-field').forEach(btn => {
                btn.addEventListener('click', function() {
                    this.closest('.field-row').remove();
                });
            });

            // Helper to create relationship row
            function createRelRow(index, data = {}) {
                const row = document.createElement('div');
                row.className = 'rel-row grid grid-cols-12 gap-4 p-5 bg-white border border-green-100 shadow-md rounded-lg dark:bg-darkmode-600 dark:border-green-500/30 relative animate-[fadeIn_0.3s_ease-in-out] hover:border-green-300 transition-all duration-300';
                
                // Build Table Options
                let tableOptions = '<option value="">Select Table...</option>';
                availableTables.forEach(t => {
                    tableOptions += `<option value="${t}">${t}</option>`;
                });

                row.innerHTML = `
                    <div class="col-span-12 md:col-span-3">
                        <label class="form-label text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2">Type</label>
                        <select name="relationships[${index}][type]" class="tom-select rel-type-select">
                            <option value="belongsTo">Belongs To</option>
                            <option value="hasMany">Has Many</option>
                            <option value="hasOne">Has One</option>
                            <option value="belongsToMany">Many to Many</option>
                        </select>
                    </div>
                    <div class="col-span-12 md:col-span-3">
                        <label class="form-label text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2">Related Table</label>
                        <select name="relationships[${index}][related_table]" class="tom-select rel-table-select" required>
                            ${tableOptions}
                        </select>
                    </div>
                    <div class="col-span-12 md:col-span-3">
                        <label class="form-label text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2">Related Column</label>
                         <select name="relationships[${index}][related_key]" class="tom-select rel-column-select" disabled>
                            <option value="">Select Table First</option>
                        </select>
                        <div class="form-help text-[10px] text-slate-400 mt-1">Owner Key (BelongsTo) or Foreign Key (HasMany)</div>
                    </div>
                    <div class="col-span-12 md:col-span-2">
                        <label class="form-label text-xs font-semibold text-slate-600 dark:text-slate-300 mb-2">Foreign Key</label>
                        <input type="text" name="relationships[${index}][foreign_key]" class="form-control form-control-sm py-2 px-3 text-sm rounded-lg border-2 border-slate-200 focus:border-green-500 dark:border-darkmode-300 dark:bg-darkmode-700 dark:text-slate-200" placeholder="e.g. user_id">
                         <div class="form-help text-[10px] text-slate-400 mt-1">Foreign Key (BelongsTo) or Local Key (HasMany)</div>
                    </div>
                    <div class="col-span-12 md:col-span-1 text-right pt-4 md:pt-0">
                        <button type="button" class="text-slate-400 hover:text-danger transition-colors remove-rel p-2 rounded-full hover:bg-red-50 dark:hover:bg-red-500/10">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                `;
                
                // Event Listener for Table Change
                const select = row.querySelector('.rel-table-select');
                select.addEventListener('change', function() {
                    loadColumns(this.value, index);
                    
                    // Auto-suggest Foreign Key
                    const typeSelect = row.querySelector('.rel-type-select');
                    const fkInput = row.querySelector(`input[name="relationships[${index}][foreign_key]"]`);
                    
                    if(this.value && !fkInput.value && typeSelect.value === 'belongsTo') {
                         fkInput.value = this.value.replace(/s$/, '') + '_id'; 
                    }
                });
                
                // Initialize TomSelect for the new row
                if (window.TomSelect) {
                    row.querySelectorAll('select.tom-select').forEach(select => {
                        if (!select.tomselect) {
                            new TomSelect(select, {});
                        }
                    });
                }
                
                row.querySelector('.remove-rel').addEventListener('click', function() {
                    row.remove();
                    if(document.getElementById('relationships-container').children.length <= 1) { // 1 for message
                         noRelsMsg.style.display = 'block';
                    }
                });

                return row;
            }

            function loadColumns(tableName, index, selectedValue = null) {
                const container = document.getElementById('relationships-container');
                const rows = container.querySelectorAll('.rel-row');
                let targetRow = null;
                
                // Find the row that triggered this function
                for (let row of rows) {
                    const tableSelect = row.querySelector('.rel-table-select');
                    if (tableSelect && tableSelect.value === tableName) {
                        targetRow = row;
                        break;
                    }
                }
                
                if (!targetRow) return;
                
                const colSelect = targetRow.querySelector('.rel-column-select');
                colSelect.innerHTML = '<option>Loading...</option>';
                colSelect.disabled = true;
                
                fetch(`{{ route('crud-builder.columns') }}?table=${tableName}`)
                    .then(res => res.json())
                    .then(cols => {
                        colSelect.innerHTML = '';
                        cols.forEach(c => {
                            const option = document.createElement('option');
                            option.value = c.name;
                            option.text = `${c.name} (${c.type_name})`;
                            if (selectedValue === c.name || (!selectedValue && c.name === 'id')) {
                                option.selected = true;
                            }
                            colSelect.appendChild(option);
                        });
                        colSelect.disabled = false;
                    })
                    .catch(() => {
                        colSelect.innerHTML = '<option value="">Error loading columns</option>';
                        colSelect.disabled = false;
                    });
            }

            // Add Relationship  
            document.getElementById('add-relationship').addEventListener('click', function() {
                noRelsMsg.style.display = 'none';
                const container = document.getElementById('relationships-container');
                const row = createRelRow(relCount);
                container.appendChild(row);
                relCount++;
                if(window.lucide) lucide.createIcons();
            });

            // Submit Form
            const form = document.getElementById('crud-form');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                document.getElementById('processing-modal').classList.remove('hidden');
                
                const formData = new FormData(this);
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('processing-modal').classList.add('hidden');
                    if (data.success) {
                        alert(data.message + "\n\nOutput: " + data.output);
                         // Optional: Redirect or clear form
                    } else {
                        alert("Error: " + data.message);
                    }
                })
                .catch(error => {
                    document.getElementById('processing-modal').classList.add('hidden');
                    alert("System Error: " + error.message);
                });
            });
        });
    </script>
@endsection