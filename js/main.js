document.addEventListener('DOMContentLoaded', function () {
    // Example of simple form validation for registration
    const form = document.querySelector('form');
    form.addEventListener('submit', function (e) {
        const password = document.querySelector('input[name="password"]').value;
        const confirmPassword = document.querySelector('input[name="confirm_password"]').value;

        if (password !== confirmPassword) {
            e.preventDefault();
            alert("Passwords do not match!");
        }
    });

    // Example of AJAX call for updating task status without refreshing
    const taskStatusElements = document.querySelectorAll('.task-status');
    taskStatusElements.forEach(function (element) {
        element.addEventListener('change', function () {
            const taskId = this.dataset.taskId;
            const newStatus = this.value;

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_task_status.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (this.status === 200) {
                    alert("Task status updated successfully!");
                }
            };
            xhr.send('id=' + taskId + '&status=' + newStatus);
        });
    });
});
