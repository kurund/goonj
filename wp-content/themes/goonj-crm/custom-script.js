document.addEventListener('DOMContentLoaded', function() {
    function checkSelect2ForOther() {
        const select2Container = document.querySelector('.select2-container');

        if (!select2Container) {
            console.error('Select2 container not found.');
            return;
        }

        const select2Choices = select2Container.querySelector('.select2-choices');

        if (select2Choices) {
            const selectedItems = select2Choices.querySelectorAll('.select2-search-choice div');
            let isOtherSelected = false;

            selectedItems.forEach(item => {
                if (item.textContent.trim() === 'Other') {
                    isOtherSelected = true;
                }
            });

            toggleAfFieldVisibility(isOtherSelected);
        }
    }

    function toggleAfFieldVisibility(shouldShow) {
        const afField = Array.from(document.querySelectorAll('af-field')).find(field =>
            field.getAttribute('name') === 'Volunteer_fields.Others_Skills'
        );

        if (!afField) {
            console.error('AF Field not found.');
            return;
        }

        afField.style.display = shouldShow ? 'block' : 'none';
    }

    const observer = new MutationObserver(function(mutations) {
        checkSelect2ForOther();
    });

    observer.observe(document.body, { childList: true, subtree: true });

    checkSelect2ForOther();

    document.addEventListener('change', function(event) {
        if (event.target.classList.contains('select2-input')) {
            checkSelect2ForOther();
        }
    });
});
