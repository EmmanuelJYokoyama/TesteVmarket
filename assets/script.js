document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('input[name="produtos[]"]');

    const deleteButton = document.getElementById('btnExclude');

    function checkCheckboxes() {
        let campo_check = false;

        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                campo_check = true;
                break;
            }
        }

        if (campo_check) {
            deleteButton.style.display = 'block'; 
            
        } else {
            deleteButton.style.display = 'none';
        }
    }

    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('change', checkCheckboxes);
    }
});
