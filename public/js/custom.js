/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.action-confirm').forEach(function (el) {
        el.addEventListener('click', function (e) {
            e.preventDefault();

            const actionTitle = el.getAttribute('title');
            const actionHref  = el.getAttribute('href');
            const csrfToken   = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            Swal.fire({
                title: 'Konfirmasi',
                text: `Yakin ingin ${actionTitle}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    if (el.dataset.method === "delete") {
                        const form = document.createElement('form');
                        form.method = "POST";
                        form.action = actionHref;

                        const token = document.createElement('input');
                        token.type = "hidden";
                        token.name = "_token";
                        token.value = csrfToken;
                        form.appendChild(token);

                        const method = document.createElement('input');
                        method.type = "hidden";
                        method.name = "_method";
                        method.value = "DELETE";
                        form.appendChild(method);

                        document.body.appendChild(form);
                        form.submit();

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil dihapus',
                            timer: 2000,
                            showConfirmButton: false
                        });

                    } else {
                        window.location.href = actionHref;
                    }
                }
            });
        });
    });
});
