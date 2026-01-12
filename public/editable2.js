/**
 * EditableTablePlugin (jQuery version)
 * A reusable, configurable jQuery plugin for editable, paginated tables
 */

function EditableTablePlugin(tableSelector, options) {
    const $table = $(tableSelector);
    if (!$table.length) throw new Error("Table element not found");

    const settings = $.extend(true, {
        inputs: {}, // { columnKey: { type, readonly, visible, options } }
        data: [],
        perPage: 10,
        allowDelete: true,
        allowAddRow: true,
        onChange: null // function(rowIndex, columnKey, newValue) {}
    }, options);

    let currentPage = 1;

    function getRealIndex(i) {
        return (currentPage - 1) * settings.perPage + i;
    }

    function render() {
        const start = (currentPage - 1) * settings.perPage;
        const end = start + settings.perPage;
        const dataSlice = settings.data.slice(start, end);
        const $tbody = $table.find("tbody").empty();

        // Add select-all header if needed
        if (settings.enableSelect && $table.find("thead th.select-all-header").length === 0) {
            $table.find("thead tr").prepend('<th class="text-center select-all-header" style="width:5%"><input type="checkbox" id="select-all"></th>');
        }

        dataSlice.forEach((row, i) => {
            const realIndex = getRealIndex(i);
            const $tr = $('<tr>').attr('data-index', realIndex);

            // Row select checkbox
            if (settings.enableSelect) {
                $tr.append(
                    $('<td class="text-center">').append(
                        $('<input type="checkbox" class="row-select">')
                            .data('index', realIndex)
                            .prop('checked', !!row.selected)
                    )
                );
            }

            // Row number
            $tr.append($('<td class="text-center">').text(realIndex + 1)).on('click', function(e){
                e.stopPropagation();
                setTimeout(() => {
                    $tr.toggleClass('selected-row');
                }, 0);
            });

            // Delete button
            if (settings.allowDelete) {
                $tr.append(
                    $('<td class="action-cell text-center">').append(
                        $('<button type="button" class="btn btn-sm delete-row" style="padding:0px !important;"><i class="simple-icon-trash"></i></button>')
                            .on('click', function (e) {
                                e.stopPropagation();
                                setTimeout(() => {
                                    $tr.find('select.input-select').each(function () {
                                        const selectize = this.selectize;
                                        if (selectize && typeof selectize.destroy === 'function') selectize.destroy();
                                    });
                                    $table.find('.selectize-dropdown, .selectize-control').remove();
                                    $tr.fadeOut(100, function () {
                                        // settings.data.splice(realIndex, 1);
                                        const deletedRow = settings.data.splice(realIndex, 1)[0];
                                        
                                        // ✅ Panggil callback jika ada
                                        if (typeof settings.onDeleteRow === 'function') {
                                            settings.onDeleteRow(realIndex, deletedRow);
                                        }
                                        render();
                                    });
                                }, 0);
                            })
                    )
                );
            }else{
                // 🟩 Tambahkan td kosong agar struktur tetap
                const $emptyTd = $('<td class="action-cell">');
                $tr.append($emptyTd);
            }

            // Data columns
            $.each(settings.inputs, function (key, colOpt) {
                const $td = $('<td>')
                    .addClass('editable-cell')
                    .css('position', 'relative')
                    .attr({ 'data-column': key, 'data-index': realIndex })
                    .toggle(colOpt.visible !== false);

                let displayText = row[key] ?? "";
                const $display = $('<span class="display">').text(displayText).attr('title', displayText);
                
                let $input;
                switch (colOpt.type) {
                    case 'currency':
                        $td.addClass('text-right');
                        $input = $('<input type="text" class="edit-input input-currency">').val(displayText);
                        if (colOpt.readonly) $input.prop('readonly', true);
                        $display.addClass('text-right');
                        // setTimeout(() => window.Inputmask && Inputmask({ alias: 'numeric', groupSeparator: '.', radixPoint: ',', autoGroup: true, digits: 2 }).mask($input[0]), 0);
                        setTimeout(() => {
                            if (window.Inputmask) {
                                const inputmask = Inputmask({ 
                                    alias: 'numeric', 
                                    groupSeparator: '.', 
                                    radixPoint: ',', 
                                    autoGroup: true, 
                                    digits: 2
                                })
                                inputmask.mask($input[0])
                                $input.on('focusout', function(e){
                                    $input.trigger('change');
                                });
                            }
                        }, 0);
                        break;
                    case 'number' :
                        $td.addClass('text-right');
                        $input = $('<input type="number" class="edit-input input-number">').val(displayText);
                        if (colOpt.readonly) $input.prop('readonly', true);
                        if (colOpt.min !== undefined) $input.attr('min', colOpt.min);
                        if (colOpt.max !== undefined) $input.attr('max', colOpt.max);
                        if (colOpt.step !== undefined) $input.attr('step', colOpt.step);
                    break;
                    case 'search' : 
                        const id = key + '_' + realIndex;
                        const value = row[key] ?? "";

                        // ➕ Group input + search button
                        const $inputGroup = $('<div class="input-group input-group-sm edit-input">').hide();

                        const $inputText = $('<input type="text" class="form-control input-search w-100" style="padding-right:25px">')
                            .val(value)
                            .data('key', key);

                        const $btnSearch = $(`
                            <button class="btn btn-search" type="button" tabindex="-1" style="position:absolute;right:5px;padding: 2px 4px !important;top:5px;border: 0px;z-index:3;font-size:16px !important;">
                            <i class="simple-icon-magnifier"></i>
                            </button>
                        `);

                        $inputGroup.append($inputText).append($btnSearch);
                        $input = $inputGroup; // gunakan $inputGroup sebagai $input utama

                        if(!colOpt.readOnly){
                            $btnSearch.on('click', function (e) {
                                e.preventDefault();
                                e.stopPropagation();
    
                                let beforeSearch = true;
                                if (typeof colOpt.beforeSearch === 'function') {
                                    beforeSearch = colOpt.beforeSearch(realIndex);
                                    if(!beforeSearch){
                                        return;
                                    }
                                }
    
                                const defaultOptions = {
                                    id: id,
                                    header: ['NIK', 'Nama'],
                                    url: '/default-url',
                                    columns: [
                                        { data: 'nik' },
                                        { data: 'nama' }
                                    ],
                                    judul: "Daftar Data",
                                    pilih: "nik",
                                    jTarget1: "text",
                                    jTarget2: "text",
                                    target1: ".info-code_" + id,
                                    target2: ".info-name_" + id,
                                    target3: "",
                                    target4: "",
                                    width: ["30%", "70%"],
                                    onItemSelected: function (data) {
                                        if (typeof opt.onItemSelected === 'function') {
                                            opt.onItemSelected(data);
                                        }
                                    }
                                };
    
                                let customOptions = {};
                                if (typeof colOpt.searchOptions === 'function') {
                                    customOptions = colOpt.searchOptions(realIndex);
                                } else if (typeof colOpt.searchOptions === 'object') {
                                    customOptions = colOpt.searchOptions;
                                }
    
                                const options = $.extend(true, {}, defaultOptions, customOptions);
                                const serverSide = typeof colOpt.serverSide === 'boolean' ? colOpt.serverSide : true;
                                const bottomSheet = typeof colOpt.bottomSheet === 'boolean' ? colOpt.bottomSheet : true;
                                if(serverSide){
                                    if(bottomSheet){
                                        showInpFilterBSheetServer(options);
                                    }else{
                                        showInpFilterServer(options);
                                    }
                                }else{
                                    if(bottomSheet){
                                        showInpFilterBSheet(options);
                                    }else{
                                        showInpFilter(options);
                                    }
                                }
                            });
                        }

                        // // Jika ingin trigger change saat teks diketik langsung:
                        // $inputText.on('change', function () {
                        //     settings.data[realIndex][key] = $(this).val();
                        //     $display.text($(this).val());
                        //     if (typeof settings.onChange === 'function') {
                        //     settings.onChange(realIndex, key, $(this).val());
                        //     }
                        // });

                        $td.append($display).append($inputGroup);
                        if (colOpt.readonly) $inputGroup.addClass('readonly');
                        if (colOpt.readonly) $btnSearch.hide();

                    break;
                    case 'checkbox':
                        $display.addClass('text-center');
                        const isChecked = !!row[key];
                        const labelText = isChecked ? (colOpt.trueLabel || "On") : (colOpt.falseLabel || "Off");
                        displayText = isChecked ? (colOpt.trueLabel || "On") : (colOpt.falseLabel || "Off");
                        $display.text(displayText).attr('title', displayText);
                        if (colOpt.toggle) {
                            const $checkbox = $('<input type="checkbox" class="form-check-input edit-input input-checkbox" role="switch">')
                            .prop('checked', isChecked)
                            .css({ height: "1.2em", width: "2em" });
                            const $label = $('<span class="ms-2 toggle-label">').text(labelText);
                            $input = $checkbox.data('labelElement', $label);
                            $td.append($('<div class="form-check form-switch m-0 d-flex justify-content-center align-items-center">').append($checkbox, $label));
                        } else {
                            $input = $('<input type="checkbox" class="edit-input input-checkbox">').prop('checked', !!row[key]);
                        }
                        if (colOpt.readonly) $input.prop('disabled', true);
                        break;
                    case 'date':
                        $input = $('<input type="text" class="edit-input input-date form-control">').val(displayText);
                        if (colOpt.readonly) $input.prop('readonly', true);
                        setTimeout(() => $input.datepicker && $input.datepicker({
                            format: colOpt.format || 'yyyy-mm-dd',
                            autoclose: true,
                            todayHighlight: true
                        }), 0);
                        break;
                    case 'select':
                        $input = $('<select class="edit-input input-select" style="display:none;">');
                        if (colOpt.readonly) {
                            $input.prop('readonly', true);
                            $input.addClass('no-dropdown');
                        }else{
                            $input.prop('readonly', false);
                            $input.removeClass('no-dropdown');
                        }

                        // Add empty option if allowEmpty is true or not specified
                        if (colOpt.allowEmpty !== false) {
                            const emptyLabel = colOpt.emptyLabel || '-- Pilih --';
                            $input.append($('<option>').val('').text(emptyLabel));
                        }
                        let optionsList = colOpt.rowOptions?.[realIndex] || colOpt.options || [];
                        optionsList.forEach(opt => {
                            const val = typeof opt === 'object' ? opt.value : opt;
                            const label = typeof opt === 'object' ? opt.label : opt;
                            const isDefault = typeof opt === 'object' ? opt.default : false;
                            
                            const $option = $('<option>').val(val).text(label);
                            
                            // Set selection priority: current value > default > first option
                            let shouldSelect = false;
                            if (row[key] !== undefined && row[key] !== null && row[key] !== '') {
                                shouldSelect = (val == row[key]);
                            } else if (isDefault) {
                                shouldSelect = true;
                                // Set default value to data if no current value
                                if (!row[key]) {
                                    settings.data[realIndex][key] = val;
                                }
                            } else if (optionsList.length === 1) {
                                // Auto-select if only one option available
                                shouldSelect = true;
                                settings.data[realIndex][key] = val;
                            }
                            
                            $option.prop('selected', shouldSelect);
                            $input.append($option);
                        });
                        displayText = $input.find('option:selected').text();
                        $display.text(displayText).attr('title', displayText);
                        $input.data('key', key);
                        if (colOpt.selectize !== false && $input.selectize) {
                            setTimeout(() => $input.selectize({
                                dropdownParent: 'body',
                                onChange: () => $input.trigger('change')
                            }), 0);
                        }
                        break;
                    case 'file':
                        $input = $('<input type="file" class="edit-input input-file">').on('change', function () {
                            const file = this.files[0];
                            if (file) {
                                const ext = file.name.split('.').pop().toLowerCase();
                                const allowed = colOpt.allowedExtensions || [];
                                if (allowed.length && !allowed.includes(ext)) {
                                    alert("Ekstensi file tidak diperbolehkan: ." + ext);
                                    $(this).val('');
                                    return;
                                }
                                if (colOpt.maxSize && file.size > colOpt.maxSize) {
                                    alert("Ukuran file terlalu besar. Maksimum " + Math.round(colOpt.maxSize / 1024 / 1024) + "MB.");
                                    $(this).val('');
                                    return;
                                }
                                settings.data[realIndex][key] = file;
                                displayText = `${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
                                $display.text(displayText).attr('title', displayText);
                                typeof settings.onChange === 'function' && settings.onChange(realIndex, key, file);
                            }
                        });
                        if (colOpt.readonly) $input.prop('readonly', true);
                        break;
                    case 'button':
                        $input = $('<button type="button" class="edit-input input-button btn btn-sm always-show '+colOpt.className+' " style="display:none;">');
                        $input.text(colOpt.label || 'Action');
                        if (settings.onClick && typeof settings.onClick === 'function') {
                            $input.on('click', function(e) {
                                e.stopPropagation();
                                settings.onClick(realIndex, key);
                            });
                        }
                        if (colOpt.readonly) $input.prop('disabled', true);
                        $display.hide();
                        $display.addClass('not-show');
                        $td.append($input);
                        $td.addClass("text-center no-pad");
                        break;
                    default:{
                        $input = $('<input type="text" class="edit-input">').val(displayText);
                        if (colOpt.readonly) $input.prop('readonly', true);
                    }
                        
                }

                if (colOpt.readonly) $input.prop('readonly', true);
                $input.hide().data('key', key);

                $input.on('change', function () {
                    let value;
                    if ($(this).attr('type') === 'checkbox') {
                        value = $(this).is(':checked');
                        if (colOpt.toggle) {
                            const $label = $(this).data('labelElement');
                            $label && $label.text(value ? (colOpt.trueLabel || "On") : (colOpt.falseLabel || "Off"));
                        }
                    } else {
                        if($(this).hasClass('input-group')){
                            value = $(this).find('input').val();
                        }else{
                            value = $(this).val();
                        }
                    }
                    if (!validateCell($td, key, value)) return;
                    settings.data[realIndex][key] = value;
                    if ($(this).attr('type') === 'checkbox') {
                        $display.html(value ? (colOpt.trueLabel || `<i class="fa fa-lg fa-check-square"><i>`) : (colOpt.falseLabel || `<i class="fa fa-lg fa-times-square"><i>`));
                    } else if (colOpt.type === "select") {
                        $display.text($(this).find('option:selected').text());
                    } else {
                        $display.text(value);
                    }
                    typeof settings.onChange === 'function' && settings.onChange(realIndex, key, value);
                });

                $input.on('keydown', function (e) {
                    const isEnterOrTab = (e.key === 'Enter' || e.key === 'Tab');
                    if (isEnterOrTab) {
                        const $this = $(this);
                        const key = $this.data('key');
                        const index = $this.closest('td').data('index');
                        const oldValue = settings.data[index]?.[key];

                        let newValue;
                        if ($this.attr('type') === 'checkbox') {
                            newValue = $this.is(':checked');
                        } else {
                            if($this.hasClass('input-group')){
                                newValue = $this.find('input').val();
                            }else{
                                newValue = $this.val();
                            }
                        }

                        if (oldValue != newValue) {
                            $input.trigger('change');
                        }

                        // lanjutkan navigasi
                        const $currentTd = $this.closest('td');
                        const $currentTr = $currentTd.closest('tr');
                        // const $editableCells = $currentTr.find('.editable-cell:visible');
                        // const currentIndex = $editableCells.index($currentTd);
                        const visibleKeys = getVisibleColumns();
                        const allCells = $currentTr.find('.editable-cell');
                        const currentIndex = visibleKeys.indexOf(key);

                        let nextKey = null;
                        if (e.key === 'Enter' || (e.key === 'Tab' && !e.shiftKey)) {
                            e.preventDefault();
                            if (currentIndex < visibleKeys.length - 1) {
                                nextKey = visibleKeys[currentIndex + 1];
                            } else {
                                const $nextTr = $currentTr.next('tr');
                                if ($nextTr.length > 0) {
                                    const $nextTd = $nextTr.find(`td[data-column="${visibleKeys[0]}"]`);
                                    focusCell($nextTr.data('index'), visibleKeys[0]);
                                    return;
                                } else {
                                    if(settings.allowAddRow){
                                        addRow();
                                        return;
                                    }else{
                                        return;
                                    }
                                }
                            }
                        } else if (e.key === 'Tab' && e.shiftKey) {
                            e.preventDefault();
                            if (currentIndex > 0) {
                                nextKey = visibleKeys[currentIndex - 1];
                            } else {
                                const $prevTr = $currentTr.prev('tr');
                                if ($prevTr.length > 0) {
                                    const lastKey = visibleKeys[visibleKeys.length - 1];
                                    focusCell($prevTr.data('index'), lastKey);
                                    return;
                                }
                            }
                        }

                        if (nextKey) {
                            const $nextTd = $currentTr.find(`td[data-column="${nextKey}"]`);
                            if ($nextTd.length) $nextTd.click();
                        }

                    // if ($nextInput && $nextInput.length) {
                    //     $table.find('.edit-input').hide();
                    //     $table.find('.display').show();
                    //     $table.find('.editable-cell').removeClass('editing');
                    //     const $nextTd = $nextInput.closest('td');
                    //     $nextTd.addClass('editing');
                    //     $nextTd.find('.display').hide();
                    //     $nextInput.show().focus();
                    // }
                    }
                });

                if (colOpt.type !== 'checkbox' || !colOpt.toggle) {
                    $td.append($display, $input);
                }
                $tr.append($td);
            });

            $tbody.append($tr);
        });

        applyEvents();
        if (settings.enableSelect) {
            const totalOnPage = $table.find('input.row-select').length;
            const checkedCount = $table.find('input.row-select:checked').length;
            $table.find('#select-all').prop('checked', totalOnPage > 0 && checkedCount === totalOnPage);
        }
        renderPagination();
    }

    function applyEvents() {
        if (settings.enableSelect) {
            $table.find('#select-all').off().on('change', function () {
                const checked = $(this).is(':checked');
                settings.data.forEach(row => row.selected = checked);
                render();
            });
            $table.find('input.row-select').off().on('change', function () {
                const index = $(this).data('index');
                settings.data[index].selected = $(this).is(':checked');
                $table.find('#select-all').prop('checked', settings.data.length > 0 && settings.data.every(row => row.selected));
            });
        }
        $table.find(".editable-cell").off("click").on("click", function (e) {
            e.stopPropagation();
            if ($(e.target).closest('.selectize-dropdown, .selectize-input, select.input-select').length || $(e.target).attr('id') == "trigger-bottom-sheet") return;
            $table.find(".edit-input").hide();
            $table.find(".display").show();
            $table.find(".editable-cell").removeClass("editing");
            const $td = $(this);
            $td.addClass("editing");
            $td.find(".display").hide();
            $td.find(".btn-search").show();
            if($td.find(".edit-input").hasClass("input-group")){
                $td.find(".edit-input").show();
                $td.find(".edit-input").find("input").focus();
            }else{
                $td.find(".edit-input").show().focus();
            }
        });
        $(document).off("click.editablePlugin-" + tableSelector).on("click.editablePlugin-" + tableSelector, function (e) {
            if ($(e.target).closest('.selectize-dropdown, .selectize-input, select.input-select').length || $(e.target).attr('id') == "trigger-bottom-sheet") return;
            $table.find(".edit-input").hide();
            $table.find(".display").show();
            $table.find(".editable-cell").removeClass("editing");
        });
    }

    function hasEmptyColumn(rowIndex) {
        const row = settings.data[rowIndex];
        if (!row) return false;
        const emptyFields = [];
        for (const key in settings.inputs) {
            const colOpt = settings.inputs[key];
            if (!colOpt.required) continue;
            const value = row[key];
            const isEmpty = value === null || value === undefined || value === "" || (colOpt.type === "file" && !(value instanceof File));
            if (isEmpty) emptyFields.push(key);
        }
        return emptyFields.length > 0 ? emptyFields : false;
    }

    function validateCell($td, key, value) {
        const colOpt = settings.inputs[key];
        const $input = $td.find('.edit-input');
        $input.removeClass('input-error');
        $td.find('.error-message').remove();
        if (!colOpt.required) return true;
        const isEmpty = value === null || value === undefined || value === "" || (colOpt.type === "file" && !(value instanceof File));
        if (isEmpty) {
            $input.addClass('input-error');
            // $td.append($('<div class="error-message">Kolom wajib diisi</div>'));
            return false;
        }
        return true;
    }

    function addRow() {
        const lastIndex = settings.data.length - 1;
        if (lastIndex >= 0) {
            const empty = hasEmptyColumn(lastIndex);
            if (empty) {
                alert("Kolom berikut wajib diisi:\n- " + empty.join("\n- "));
                return;
            }
        }
        const newRow = {};
        Object.keys(settings.inputs).forEach(k => {
            const colOpt = settings.inputs[k];
            let defaultValue = '';
            
            // Set default value for select options
            if (colOpt.type === 'select' && colOpt.options) {
                const defaultOption = colOpt.options.find(opt => 
                    typeof opt === 'object' && opt.default === true
                );
                if (defaultOption) {
                    defaultValue = defaultOption.value;
                }
            }
            // Set default value for checkbox
            else if (colOpt.type === 'checkbox' && colOpt.defaultValue !== undefined) {
                defaultValue = colOpt.defaultValue;
            }
            // Set default value for other types
            else if (colOpt.defaultValue !== undefined) {
                defaultValue = colOpt.defaultValue;
            }
            
            newRow[k] = defaultValue;
        });
        newRow.selected = false;
        settings.data.push(newRow);
        currentPage = Math.ceil(settings.data.length / settings.perPage);
        render();
        setTimeout(() => $table.find('tbody tr').last().find('.editable-cell:visible').eq(0).click(), 0);
    }

    function normalizeRowFromExcelFormat(row) {
        const normalized = {};
        for (const key in settings.inputs) {
            const opt = settings.inputs[key];
            let val = row[key];

            if (opt.type === 'currency') {
                number = val == null ? 0 : val;
                number = isNaN(number) ? 0 : number;
                val = new Intl.NumberFormat(['ban','id']).format(number).toString();
            }

            if (opt.type === 'checkbox') {
                const truthy = ['ya', 'on', 'true', '1', opt.trueLabel?.toLowerCase()];
                val = truthy.includes(String(val).toLowerCase());
            }

            if (opt.type === 'date' && typeof val === 'number') {
                // Excel serial number → JS date
                const excelEpoch = new Date(1899, 11, 30);
                const date = new Date(excelEpoch.getTime() + val * 24 * 60 * 60 * 1000);
                const yyyy = date.getFullYear();
                const mm = String(date.getMonth() + 1).padStart(2, '0');
                const dd = String(date.getDate()).padStart(2, '0');
                val = `${yyyy}-${mm}-${dd}`;
            }

            if (opt.type === 'file') {
                val = null; // file tidak bisa direstore
            }

            normalized[key] = val;
        }

        return normalized;
    }

    function focusCell(index, columnKey){
        render();
        setTimeout(() => {
            const $td = $table.find(`tr[data-index="${index}"] td[data-column="${columnKey}"]`);
            $td.length && $td.click();
        }, 10);
    }

    function getVisibleColumns() {
        return Object.keys(settings.inputs).filter(k => settings.inputs[k].visible !== false);
    }

    function renderPagination() {
        const table_id = tableSelector.replace('#','');
        const $pagination = $('#pagination-controls-' + table_id).empty();
        const $info = $('#pagination-info-' + table_id).empty();
        const totalData = settings.data.length;
        const totalPages = Math.ceil(totalData / settings.perPage);

        if($('#total-row_'+table_id).length > 0){
            $('#total-row_'+table_id).html('Baris : '+totalData);
        }
        if (totalPages <= 1) return;

        const $ul = $('<ul class="pagination pagination-sm mb-0">');

        // Tombol First
        $ul.append(
            $('<li class="page-item">').toggleClass('disabled', currentPage === 1).append(
            $('<a class="page-link" href="#">').html('⏮').on('click', function (e) {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage = 1;
                    render();
                }
            })
            )
        );

        // Tombol Prev
        $ul.append(
            $('<li class="page-item">').toggleClass('disabled', currentPage === 1).append(
            $('<a class="page-link" href="#">').html('«').on('click', function (e) {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    render();
                }
            })
            )
        );

        // Tombol halaman (angka)
        const maxVisiblePages = 5;
        let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
        let endPage = startPage + maxVisiblePages - 1;
        if (endPage > totalPages) {
            endPage = totalPages;
            startPage = Math.max(1, endPage - maxVisiblePages + 1);
        }

        for (let i = startPage; i <= endPage; i++) {
            $ul.append(
                $('<li class="page-item">').toggleClass('active', i === currentPage).append(
                    $('<a class="page-link" href="#">').text(i).on('click', function (e) {
                        e.preventDefault();
                        currentPage = i;
                        render();
                    })
                )
            );
        }

        // Tombol Next
        $ul.append(
            $('<li class="page-item">').toggleClass('disabled', currentPage === totalPages).append(
                $('<a class="page-link" href="#">').html('»').on('click', function (e) {
                    e.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage++;
                        render();
                    }
                })
            )
        );

        // Tombol Last
        $ul.append(
            $('<li class="page-item">').toggleClass('disabled', currentPage === totalPages).append(
                $('<a class="page-link" href="#">').html('⏭').on('click', function (e) {
                    e.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage = totalPages;
                        render();
                    }
                })
            )
        );

        $pagination.append($ul);

        // Info text
        const showingFrom = (currentPage - 1) * settings.perPage + 1;
        const showingTo = Math.min(currentPage * settings.perPage, totalData);
        $info.text(`Menampilkan ${showingFrom} – ${showingTo} dari ${totalData} data • Halaman ${currentPage} dari ${totalPages}`);
    }

    // Public API
    this.nextPage = () => { currentPage++; render(); };
    this.prevPage = () => { if (currentPage > 1) { currentPage--; render(); } };
    this.goToFirstPage = () => { currentPage = 1; render(); };
    this.goToLastPage = () => {
        const totalPages = Math.ceil(settings.data.length / settings.perPage);
        currentPage = totalPages > 0 ? totalPages : 1;
        render();
    };
    this.addRow = addRow;
    this.render = render;
    this.getData = () => settings.data;
    this.clear = () => { settings.data = []; currentPage = 1; render(); };
    this.loadData = function (jsonArray) {
        if (!Array.isArray(jsonArray)) throw new Error("Data harus array");
        const normalizedData = jsonArray.map(row => {
            const nRow = normalizeRowFromExcelFormat(row);
            return { ...nRow, selected: row.selected || false };
        });
        settings.data = normalizedData;
        currentPage = 1;
        render();
    };
    this.exportToExcel = function (filename = "data.xlsx") {
        const dataToExport = settings.data.map(row => {
            const cleanRow = {};
            for (const key in settings.inputs) {
                const value = row[key];
                if (settings.inputs[key].type === 'file') {
                    cleanRow[key] = value?.name || "";
                } else if (settings.inputs[key].type === 'checkbox') {
                    cleanRow[key] = value ? (settings.inputs[key].trueLabel || "Ya") : (settings.inputs[key].falseLabel || "Tidak");
                } else {
                    cleanRow[key] = value;
                }
            }
            return cleanRow;
        });
        const ws = XLSX.utils.json_to_sheet(dataToExport);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Data");
        XLSX.writeFile(wb, filename);
    };
    this.importFromExcel = function (file, callback) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const data = new Uint8Array(e.target.result);
            const workbook = XLSX.read(data, { type: "array" });
            const sheetName = workbook.SheetNames[0];
            const sheet = workbook.Sheets[sheetName];
            const rawJson = XLSX.utils.sheet_to_json(sheet, { raw: true });
            const json = rawJson.map(row => {
                const nRow = normalizeRowFromExcelFormat(row);
                return { ...nRow, selected: row.selected || false };
            });

            settings.data = json;
            currentPage = 1;
            render();
            typeof callback === 'function' && callback(json);
        };

        reader.onerror = function() {
            msgDialog({
                type: 'warning',
                title: 'Upload Gagal',
                text: 'Terjadi kesalahan saat membaca file.'
            });
        };

        reader.readAsArrayBuffer(file);
    };
    this.getSelectedRows = () => settings.enableSelect ? $table.find('input.row-select:checked').map(function () { return settings.data[$(this).data('index')]; }).get() : [];
    this.selectAll = () => { settings.data.forEach(row => row.selected = true); render(); };
    this.deselectAll = () => { settings.data.forEach(row => row.selected = false); render(); };
    this.updateSelectOptions = function (columnKey, newOptions) {
        if (!settings.inputs[columnKey] || settings.inputs[columnKey].type !== 'select') {
            console.warn(`Kolom ${columnKey} bukan select`);
            return;
        }
        settings.inputs[columnKey].options = newOptions;
        
        // If only one option, auto-select it for all rows
        if (newOptions && newOptions.length === 1) {
            const onlyValue = typeof newOptions[0] === 'object' ? newOptions[0].value : newOptions[0];
            settings.data.forEach(row => {
                row[columnKey] = onlyValue;
            });
        }
        
        render();
    };
    this.updateCellSelectOptions = function (columnKey, rowIndex, optionsArray) {
        if (!settings.inputs[columnKey] || !Array.isArray(optionsArray)) return;
        settings.inputs[columnKey].rowOptions = settings.inputs[columnKey].rowOptions || {};
        settings.inputs[columnKey].rowOptions[rowIndex] = optionsArray;
        render();
    };
    this.getRow = index => settings.data[index] ? { ...settings.data[index] } : null;
    this.copyRow = function (index) {
        const row = settings.data[index];
        if (!row) return;
        const newRow = { ...row };
        delete newRow.selected;
        settings.data.push(newRow);
        render();
    };
    this.getCell = (index, columnKey) => settings.data[index]?.[columnKey] ?? null;
    this.setCell = function (index, columnKey, value) {
        if (settings.data[index] && columnKey in settings.inputs) {
            const colOpt = settings.inputs[columnKey];
            
            // If select type with single option, use the option value
            if (colOpt.type === 'select' && colOpt.options && colOpt.options.length === 1) {
                const onlyOption = colOpt.options[0];
                value = typeof onlyOption === 'object' ? onlyOption.value : onlyOption;
            }
            
            settings.data[index][columnKey] = value;
            render();
        }
    };
    this.setCellSilent = function (index, columnKey, value) {
        if (settings.data[index] && columnKey in settings.inputs) {
            const colOpt = settings.inputs[columnKey];
            
            // If select type with single option, use the option value
            if (colOpt.type === 'select' && colOpt.options && colOpt.options.length === 1) {
                const onlyOption = colOpt.options[0];
                value = typeof onlyOption === 'object' ? onlyOption.value : onlyOption;
            }
            
            settings.data[index][columnKey] = value;
        }
    };
    this.setReadOnly = function (columnKey, readOnly = true) {
        if (!settings.inputs[columnKey]) {
            console.warn(`Kolom ${columnKey} tidak ditemukan`);
            return;
        }
        settings.inputs[columnKey].readonly = readOnly;
        render();
    };
    this.focusCell = focusCell;
    this.copySelectedRows = function () {
        const selected = settings.data.filter(row => row.selected);
        const clones = selected.map(row => {
            const copy = { ...row };
            delete copy.selected;
            return copy;
        });
        settings.data = settings.data.concat(clones);
        render();
    };
    this.scrollToTop = () => $('#table-container').scrollTop(0);
    this.scrollToBottom = () => {
        const container = $('#table-container');
        container.scrollTop(container.prop('scrollHeight'));
    };
    this.scrollToColumn = function (columnIndex) {
        const container = $('#table-container');
        const $col = $table.find('tbody tr:first td').eq(columnIndex);
        $col.length && container.scrollLeft($col.offset().left - container.offset().left + container.scrollLeft());
    };

    

    // ✨ NEW: Dynamic Column Visibility Functions
    this.setColumnVisible = function (columnKey, visible) {
        if (!settings.inputs[columnKey]) {
            console.warn(`Column ${columnKey} not found`);
            return false;
        }
        
        settings.inputs[columnKey].visible = visible;
        
        // Update header visibility if it exists
        const $headerCell = $table.find(`thead th[data-column="${columnKey}"]`);
        if ($headerCell.length) {
            $headerCell.toggle(visible);
        }
        
        // Re-render to apply visibility changes
        render();
        return true;
    };
    
    this.hideColumn = function (columnKey) {
        return this.setColumnVisible(columnKey, false);
    };
    
    this.showColumn = function (columnKey) {
        return this.setColumnVisible(columnKey, true);
    };
    
    this.toggleColumn = function (columnKey) {
        if (!settings.inputs[columnKey]) {
            console.warn(`Column ${columnKey} not found`);
            return false;
        }
        
        const currentVisible = settings.inputs[columnKey].visible !== false;
        return this.setColumnVisible(columnKey, !currentVisible);
    };
    
    this.setMultipleColumnsVisible = function (columnVisibilityMap) {
        if (typeof columnVisibilityMap !== 'object') {
            console.warn('columnVisibilityMap must be an object');
            return false;
        }
        
        let hasChanges = false;
        
        for (const [columnKey, visible] of Object.entries(columnVisibilityMap)) {
            if (settings.inputs[columnKey]) {
                settings.inputs[columnKey].visible = visible;
                
                // Update header visibility if it exists
                const $headerCell = $table.find(`thead th[data-column="${columnKey}"]`);
                if ($headerCell.length) {
                    $headerCell.toggle(visible);
                }
                
                hasChanges = true;
            } else {
                console.warn(`Column ${columnKey} not found`);
            }
        }
        
        if (hasChanges) {
            render();
        }
        
        return hasChanges;
    };
    
    this.getColumnVisibility = function (columnKey) {
        if (!settings.inputs[columnKey]) {
            console.warn(`Column ${columnKey} not found`);
            return null;
        }
        
        return settings.inputs[columnKey].visible !== false;
    };
    
    this.getAllColumnsVisibility = function () {
        const visibility = {};
        for (const columnKey in settings.inputs) {
            visibility[columnKey] = settings.inputs[columnKey].visible !== false;
        }
        return visibility;
    };
    
    this.hideAllColumns = function () {
        const columnKeys = Object.keys(settings.inputs);
        const visibilityMap = {};
        columnKeys.forEach(key => visibilityMap[key] = false);
        return this.setMultipleColumnsVisible(visibilityMap);
    };
    
    this.showAllColumns = function () {
        const columnKeys = Object.keys(settings.inputs);
        const visibilityMap = {};
        columnKeys.forEach(key => visibilityMap[key] = true);
        return this.setMultipleColumnsVisible(visibilityMap);
    };
    
    this.getVisibleColumns = getVisibleColumns;

    function renderPagination() {
        const table_id = tableSelector.replace('#','');
        const $pagination = $('#pagination-controls-' + table_id).empty();
        const $info = $('#pagination-info-' + table_id).empty();
        const totalData = settings.data.length;
        const totalPages = Math.ceil(totalData / settings.perPage);

        if($('#total-row_'+table_id).length > 0){
            $('#total-row_'+table_id).html('Baris : '+totalData);
        }
        if (totalPages <= 1) return;

        const $ul = $('<ul class="pagination pagination-sm mb-0">');

        // Tombol First
        $ul.append(
            $('<li class="page-item">').toggleClass('disabled', currentPage === 1).append(
            $('<a class="page-link" href="#">').html('⏮').on('click', function (e) {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage = 1;
                    render();
                }
            })
            )
        );

        // Tombol Prev
        $ul.append(
            $('<li class="page-item">').toggleClass('disabled', currentPage === 1).append(
            $('<a class="page-link" href="#">').html('<i class="simple-icon-arrow-left"></i>').on('click', function (e) {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    render();
                }
            })
            )
        );

        // Tombol halaman (angka)
        const maxVisiblePages = 5;
        let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
        let endPage = startPage + maxVisiblePages - 1;
        if (endPage > totalPages) {
            endPage = totalPages;
            startPage = Math.max(1, endPage - maxVisiblePages + 1);
        }

        for (let i = startPage; i <= endPage; i++) {
            $ul.append(
                $('<li class="page-item">').toggleClass('active', i === currentPage).append(
                    $('<a class="page-link" href="#">').text(i).on('click', function (e) {
                        e.preventDefault();
                        currentPage = i;
                        render();
                    })
                )
            );
        }

        // Tombol Next
        $ul.append(
            $('<li class="page-item">').toggleClass('disabled', currentPage === totalPages).append(
                $('<a class="page-link" href="#">').html('<i class="simple-icon-arrow-right"></i>').on('click', function (e) {
                    e.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage++;
                        render();
                    }
                })
            )
        );

        // Tombol Last
        $ul.append(
            $('<li class="page-item">').toggleClass('disabled', currentPage === totalPages).append(
                $('<a class="page-link" href="#">').html('⏭').on('click', function (e) {
                    e.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage = totalPages;
                        render();
                    }
                })
            )
        );

        $pagination.append($ul);

        // Info text
        const showingFrom = (currentPage - 1) * settings.perPage + 1;
        const showingTo = Math.min(currentPage * settings.perPage, totalData);
        $info.text(`Menampilkan ${showingFrom} – ${showingTo} dari ${totalData} data • Halaman ${currentPage} dari ${totalPages}`);
    }


    this.renderCellDisplay = function(rowIndex, columnKey) {
        const $td = $table.find(`tr[data-index="${rowIndex}"] td[data-column="${columnKey}"]`);
        const value = settings.data[rowIndex][columnKey];
        const colOpt = settings.inputs[columnKey];
        const $display = $td.find('.display');

        if (!$td.length || !$display.length) return;

        if (colOpt.type === 'checkbox') {
            const isChecked = !!value;
            $display.html(isChecked ? (colOpt.trueLabel || '✔️') : (colOpt.falseLabel || '❌'));
        } else if (colOpt.type === 'select') {
            const label = $td.find(`.edit-input option[value="${value}"]`).text();
            $display.text(label);
        } else if (colOpt.type === 'file') {
            if (value && value.name) {
            const sizeMB = (value.size / 1024 / 1024).toFixed(2);
            $display.text(`${value.name} (${sizeMB} MB)`);
            }
        } else {
            $display.text(value);
        }
    }

    this.renderCell = function (rowIndex, columnKey) {
        const $td = $table.find(`tr[data-index="${rowIndex}"] td[data-column="${columnKey}"]`);
        const value = settings.data[rowIndex][columnKey];
        const colOpt = settings.inputs[columnKey];
        $td.find('.display').text(value).attr('title', value);
        switch (colOpt.type) {
            case 'currency': 
            case 'number': 
                $td.find('.display').text(value); // format if needed
                $td.find('input.input-currency').val(value);
            break;
            case 'checkbox' :
                const $checkbox = $td.find('input[type="checkbox"]');
                $checkbox.prop('checked', !!value);

                if (colOpt.toggle && $checkbox.length) {
                    const $label = $checkbox.data('labelElement');
                    if ($label) {
                        $label.text(value ? (colOpt.trueLabel || "On") : (colOpt.falseLabel || "Off"));
                    }
                    $td.find('.display').text(value ? colOpt.trueLabel : colOpt.falseLabel);
                } else {
                    $td.find('.display').html(value ? `<i class="fa fa-lg fa-check-square"></i>` : `<i class="fa fa-lg fa-times-square"></i>`);
                }
            break;
            case 'select':
                const $select = $td.find('select');
                $select.val(value);
                let label = value;
                const options = (colOpt.rowOptions?.[rowIndex] || colOpt.options || []);
                const optObj = options.find(o => (typeof o === 'object' ? o.value : o) == value);
                if (optObj) {
                    label = typeof optObj === 'object' ? optObj.label : optObj;
                }
                $td.find('.display').text(label);
            break;
            case 'file':
                if (value instanceof File) {
                    const sizeMB = (value.size / 1024 / 1024).toFixed(2);
                    $td.find('.display').text(`${value.name} (${sizeMB} MB)`);
                } else {
                    $td.find('.display').text('');
                }
            break;
            default :
                $td.find('input').val(value);
                $td.find('.display').text(value);
            break;
        }
    }
    render();
}
