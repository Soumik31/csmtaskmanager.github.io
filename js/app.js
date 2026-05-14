/**
 * CSM Task Manager — Shared utility functions
 * Used across all pages for error display, time calculations,
 * user display logic, task ID generation, and history formatting.
 */

/**
 * Displays a Bootstrap dismissible alert with the given error message.
 * Prepends the alert to the first .container element, or body if none exists.
 * @param {string} message - The error message to display
 */
function showError(message) {
    var alertDiv = document.createElement('div');
    alertDiv.className = 'alert alert-danger alert-dismissible fade show';
    alertDiv.setAttribute('role', 'alert');
    alertDiv.innerHTML = message +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span></button>';
    var container = document.querySelector('.container');
    if (container) {
        container.prepend(alertDiv);
    } else {
        document.body.prepend(alertDiv);
    }
}

/**
 * Calculates the elapsed time from a task_id timestamp to now.
 * @param {string} taskId - A 12-digit string in YYYYMMDDHHmm format
 * @returns {string} Elapsed time formatted as "Xd Yh Zm"
 */
function calculatePendingTime(taskId) {
    var year = parseInt(taskId.substring(0, 4), 10);
    var month = parseInt(taskId.substring(4, 6), 10) - 1; // JS months are 0-indexed
    var day = parseInt(taskId.substring(6, 8), 10);
    var hour = parseInt(taskId.substring(8, 10), 10);
    var minute = parseInt(taskId.substring(10, 12), 10);

    var created = new Date(year, month, day, hour, minute);
    var now = new Date();
    var diffMs = now - created;

    var totalMinutes = Math.floor(diffMs / 60000);
    var days = Math.floor(totalMinutes / 1440);
    var hours = Math.floor((totalMinutes % 1440) / 60);
    var minutes = totalMinutes % 60;

    return days + 'd ' + hours + 'h ' + minutes + 'm';
}

/**
 * Returns the display username for a task.
 * Uses uuser if it is a non-null, non-empty (after trim) string; otherwise falls back to user.
 * @param {object} task - A task object with `user` and `uuser` fields
 * @returns {string} The username to display
 */
function getDisplayUser(task) {
    if (task.uuser !== null && task.uuser !== undefined && task.uuser.trim() !== '') {
        return task.uuser;
    }
    return task.user;
}

/**
 * Generates a task ID from the current timestamp in YYYYMMDDHHmm format.
 * @returns {string} A 12-digit timestamp string
 */
function generateTaskId() {
    var now = new Date();
    var y = now.getFullYear();
    var mo = String(now.getMonth() + 1).padStart(2, '0');
    var d = String(now.getDate()).padStart(2, '0');
    var h = String(now.getHours()).padStart(2, '0');
    var mi = String(now.getMinutes()).padStart(2, '0');
    return '' + y + mo + d + h + mi;
}

/**
 * Builds a formatted history log entry string.
 * @param {string} username - The username performing the update
 * @param {string} updateText - The update description text
 * @returns {string} Formatted as "YYYY/MM/DD HH:mm User: [username] [updateText].<br>"
 */
function buildHistoryEntry(username, updateText) {
    var now = new Date();
    var y = now.getFullYear();
    var mo = String(now.getMonth() + 1).padStart(2, '0');
    var d = String(now.getDate()).padStart(2, '0');
    var h = String(now.getHours()).padStart(2, '0');
    var mi = String(now.getMinutes()).padStart(2, '0');
    return y + '/' + mo + '/' + d + ' ' + h + ':' + mi + ' User: ' + username + ' ' + updateText + '.<br>';
}
