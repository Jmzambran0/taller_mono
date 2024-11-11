document.addEventListener('DOMContentLoaded', function() {
    const filtroSeleccionado = document.getElementById('filtroSeleccionado');
    const filtrosContainer = document.getElementById('filtrosContainer');

    filtroSeleccionado.addEventListener('change', function() {

        const forms = filtrosContainer.querySelectorAll('form');
        forms.forEach(form => {
            form.style.display = 'none';
        });


        filtrosContainer.style.display = 'block';


        const selectedValue = filtroSeleccionado.value;
        if (selectedValue) {
            const selectedForm = document.getElementById(selectedValue + 'Form');
            if (selectedForm) {
                selectedForm.style.display = 'block';
            }
        }
    });
});