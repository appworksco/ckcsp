$(document).ready(function () {
    $('.table').DataTable();
});

// Add event listener for clicks on the anchor tag
document.querySelectorAll('li a').forEach(function (item) {
    item.addEventListener('click', function () {
        // Remove the 'active' class from all links
        document.querySelectorAll('li a').forEach(function (link) {
            link.classList.remove('active');
        });

        // Add the 'active' class to the clicked link
        item.classList.add('active-sidebar');
    });
});