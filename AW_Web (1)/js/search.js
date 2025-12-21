document.addEventListener('DOMContentLoaded', function() {
    const searchIcon = document.getElementById('search-icon');
    const searchForm = document.getElementById('search-form');

    searchIcon.addEventListener('click', function(e) {
        e.preventDefault();
        if (searchForm.style.display === 'none' || searchForm.style.display === '') {
            searchForm.style.display = 'block';
        } else {
            searchForm.style.display = 'none';
        }
    });

    document.addEventListener('click', function(e) {
        if (!searchForm.contains(e.target) && !searchIcon.contains(e.target)) {
            searchForm.style.display = 'none';
        }
    });
});
