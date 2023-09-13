document.addEventListener('click', function (e) {
    if (e.target.classList.contains('bi-trash')) {
        e.preventDefault();
        const del = e.target.parentElement.getAttribute('delete');
        if (del) {
            const conf = confirm('Are you sure, you want to delete this folder or file ?');
            if (conf) {
                
                window.location.href = 'index.php?action=delete&path=' + encodeURIComponent(del);
            }
        }
    }
});