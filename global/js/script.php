<script>
    function rp_swall(btn, title, text, icon, time, botao, dangerMode, action = null) {
        if (botao) {
            const requiredFields = document.querySelectorAll('[required]');
            const isRequiredActive = requiredFields.length > 0;

            if (isRequiredActive) {
                let emptyRequiredFields = [];

                requiredFields.forEach(field => {
                    if (field.value.trim() === '') {
                        emptyRequiredFields.push(field);
                    }
                });

                if (emptyRequiredFields.length > 0) {
                    emptyRequiredFields.forEach(field => {
                        field.setAttribute('required', 'required');
                    });

                    Swal.fire('Error', 'Preencha todos os campos.', 'error');
                    return;
                }
            }
        }

        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            timer: time,
            showCancelButton: botao,
            confirmButtonText: "Confirmar",
            cancelButtonText: "Cancelar",
            allowOutsideClick: !botao,
            dangerMode: dangerMode
        }).then((result) => {
            if (result.isConfirmed) {
                if (typeof action === 'function') {
                    action(btn);
                } else {
                    btn.removeAttribute("onclick");
                    btn.setAttribute("type", "submit");
                    btn.click();
                }
            }
        });
    }
</script>