document.addEventListener('DOMContentLoaded', function() {
    // Event listener for remove buttons
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-to-do')) {
            // Get the todo ID
            const todoId = event.target.getAttribute('idx');
            // Send a request to delete the todo item
            fetch(`api/remove_item.php?idx=${todoId}`, {
                method: 'DELETE'
            })
            .then(response => {
                if (response.ok) {
                    // Remove the todo item from the UI
                    const todoItem = event.target.closest('.todo-item');
                    todoItem.remove();
                } else {
                    console.error('Failed to remove todo item');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });
});
