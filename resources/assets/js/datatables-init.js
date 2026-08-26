/*
========================================================================
   BOOTSTRAP 5 ADMIN TEMPLATE - SPARK ADMIN
   DATATABLES INITIALIZATION HELPER
   Developed with premium UI/UX standards
   datatables-init.js — Provides modular DataTables setup with export
   buttons, search, sorting, and custom Spark Admin theme integration.

   Template Name: Spark Admin
   Version: 1.0
   Author: Spark Admin Team
   Email: hello.sparkadmin@gmail.com
   URL: https://sparkadmin.web.id
========================================================================
*/

/**
 * Global Spark Admin DataTables Configuration Helper (Basic Table)
 * @param {string} selector - Target jQuery table selector (e.g. '#basic-datatable')
 * @param {object} customOptions - Overriding options for DataTables
 * @returns {object} DataTables instance
 */
function initSparkDataTable(selector, customOptions) {
    if (typeof $ === 'undefined' || typeof $.fn.DataTable === 'undefined') {
        console.warn('jQuery or DataTables library is missing.');
        return null;
    }

    var defaultOptions = {
        pageLength: 10,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records...",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            paginate: {
                first: '<i class="bi bi-chevron-double-left"></i>',
                previous: '<i class="bi bi-chevron-left"></i>',
                next: '<i class="bi bi-chevron-right"></i>',
                last: '<i class="bi bi-chevron-double-right"></i>'
            }
        }
    };

    var finalOptions = $.extend(true, {}, defaultOptions, customOptions);
    return $(selector).DataTable(finalOptions);
}

/**
 * Global Spark Admin DataTables Helper with Export & Visibility Buttons
 * @param {string} selector - Target jQuery table selector (e.g. '#buttons-datatable')
 * @param {object} customOptions - Overriding options for DataTables
 * @returns {object} DataTables instance
 */
function initSparkButtonsDataTable(selector, customOptions) {
    if (typeof $ === 'undefined' || typeof $.fn.DataTable === 'undefined') {
        console.warn('jQuery or DataTables library is missing.');
        return null;
    }

    var defaultOptions = {
        dom: "<'row mb-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 text-md-end'f>>" +
             "<'row mb-3'<'col-sm-12'B>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row mt-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [
            { extend: 'copy', text: '<i class="bi bi-clipboard me-1"></i> Copy', className: 'btn btn-sm btn-light' },
            { extend: 'csv', text: '<i class="bi bi-filetype-csv me-1"></i> CSV', className: 'btn btn-sm btn-light' },
            { extend: 'excel', text: '<i class="bi bi-file-earmark-excel me-1"></i> Excel', className: 'btn btn-sm btn-light' },
            { extend: 'pdf', text: '<i class="bi bi-file-earmark-pdf me-1"></i> PDF', className: 'btn btn-sm btn-light' },
            { extend: 'print', text: '<i class="bi bi-printer me-1"></i> Print', className: 'btn btn-sm btn-light' },
            { extend: 'colvis', text: '<i class="bi bi-columns me-1"></i> Columns', className: 'btn btn-sm btn-light' }
        ],
        pageLength: 10,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records...",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            paginate: {
                first: '<i class="bi bi-chevron-double-left"></i>',
                previous: '<i class="bi bi-chevron-left"></i>',
                next: '<i class="bi bi-chevron-right"></i>',
                last: '<i class="bi bi-chevron-double-right"></i>'
            }
        }
    };

    var finalOptions = $.extend(true, {}, defaultOptions, customOptions);
    return $(selector).DataTable(finalOptions);
}

/**
 * Global Spark Admin DataTables Helper with Multi-Item Selection
 * @param {string} selector - Target jQuery table selector (e.g. '#select-datatable')
 * @param {object} customOptions - Overriding options for DataTables
 * @returns {object} DataTables instance
 */
function initSparkSelectDataTable(selector, customOptions) {
    if (typeof $ === 'undefined' || typeof $.fn.DataTable === 'undefined') {
        console.warn('jQuery or DataTables library is missing.');
        return null;
    }

    var defaultOptions = {
        select: {
            style: 'multi'
        },
        pageLength: 10,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records...",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            paginate: {
                first: '<i class="bi bi-chevron-double-left"></i>',
                previous: '<i class="bi bi-chevron-left"></i>',
                next: '<i class="bi bi-chevron-right"></i>',
                last: '<i class="bi bi-chevron-double-right"></i>'
            }
        }
    };

    var finalOptions = $.extend(true, {}, defaultOptions, customOptions);
    return $(selector).DataTable(finalOptions);
}

/**
 * Global Spark Admin DataTables Helper with Vertical Scroll
 * @param {string} selector - Target jQuery table selector (e.g. '#scroll-vertical-datatable')
 * @param {object} customOptions - Overriding options for DataTables
 * @returns {object} DataTables instance
 */
function initSparkVerticalScrollDataTable(selector, customOptions) {
    if (typeof $ === 'undefined' || typeof $.fn.DataTable === 'undefined') {
        console.warn('jQuery or DataTables library is missing.');
        return null;
    }

    var defaultOptions = {
        scrollY: '300px',
        scrollCollapse: true,
        paging: false,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records...",
            info: "Showing _START_ to _END_ of _TOTAL_ entries"
        }
    };

    var finalOptions = $.extend(true, {}, defaultOptions, customOptions);
    return $(selector).DataTable(finalOptions);
}

/**
 * Global Spark Admin DataTables Helper with Horizontal Scroll
 * @param {string} selector - Target jQuery table selector (e.g. '#scroll-horizontal-datatable')
 * @param {object} customOptions - Overriding options for DataTables
 * @returns {object} DataTables instance
 */
function initSparkHorizontalScrollDataTable(selector, customOptions) {
    if (typeof $ === 'undefined' || typeof $.fn.DataTable === 'undefined') {
        console.warn('jQuery or DataTables library is missing.');
        return null;
    }

    var defaultOptions = {
        scrollX: true,
        pageLength: 10,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records...",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            paginate: {
                first: '<i class="bi bi-chevron-double-left"></i>',
                previous: '<i class="bi bi-chevron-left"></i>',
                next: '<i class="bi bi-chevron-right"></i>',
                last: '<i class="bi bi-chevron-double-right"></i>'
            }
        }
    };

    var finalOptions = $.extend(true, {}, defaultOptions, customOptions);
    return $(selector).DataTable(finalOptions);
}

$(document).ready(function () {

    if ($('#basic-datatable').length) {
        initSparkDataTable('#basic-datatable');
    }

    if ($('#buttons-datatable').length) {
        initSparkButtonsDataTable('#buttons-datatable');
    }

    if ($('#select-datatable').length) {
        initSparkSelectDataTable('#select-datatable');
    }

    if ($('#scroll-vertical-datatable').length) {
        initSparkVerticalScrollDataTable('#scroll-vertical-datatable');
    }

    if ($('#scroll-horizontal-datatable').length) {
        initSparkHorizontalScrollDataTable('#scroll-horizontal-datatable');
    }

});