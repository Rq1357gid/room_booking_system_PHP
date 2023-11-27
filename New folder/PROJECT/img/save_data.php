<a href="#" onclick="saveData()">Save</a>

<script>
function saveData() {
    // Perform AJAX request or submit a form to send the data to the server

    // Example using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'superior.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert('Data saved successfully.');
        } else {
            alert('Error: ' + xhr.responseText);
        }
    };
    xhr.send(); // Send the request to the server
}
</script>
