/**
 * CSV Export Module
 * Exports the rendered HTML table (#projectSpreadsheet) to a CSV file download.
 * No jQuery dependency — uses vanilla JS only.
 */

function exportTableToCSV(tableId, filename) {
    var table = document.getElementById(tableId);
    if (!table) {
        return;
    }

    var rows = table.querySelectorAll('tr');
    var csvRows = [];

    rows.forEach(function (row) {
        var cols = row.querySelectorAll('td, th');
        if (cols.length === 0) {
            return;
        }

        var rowData = [];
        cols.forEach(function (col) {
            var text = col.textContent.trim();
            // Escape double quotes by doubling them, then wrap in double quotes
            rowData.push('"' + text.replace(/"/g, '""') + '"');
        });

        csvRows.push(rowData.join(','));
    });

    var csv = csvRows.join('\r\n');

    // Add trailing CRLF if there is content
    if (csv.length > 0) {
        csv += '\r\n';
    }

    var blob = new Blob([csv], { type: 'application/csv;charset=utf-8;' });
    var link = document.createElement('a');
    var url = URL.createObjectURL(blob);

    link.setAttribute('href', url);
    link.setAttribute('download', filename);
    link.style.display = 'none';

    document.body.appendChild(link);
    link.click();

    // Cleanup
    document.body.removeChild(link);
    URL.revokeObjectURL(url);
}

document.addEventListener('DOMContentLoaded', function () {
    var exportLink = document.getElementById('xx');
    if (exportLink) {
        exportLink.addEventListener('click', function (event) {
            event.preventDefault();
            exportTableToCSV('projectSpreadsheet', 'csm_task.csv');
        });
    }
});
