
        // Notifikasi untuk error
       

        // Konfirmasi sebelum submit (opsional)
        document.getElementById('postForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Validasi summernote content
            // var content = $('.summernote').summernote('code');
            // if (!content || content.trim() === '' || content === '<p><br></p>') {
            //     Swal.fire({
            //         title: 'Peringatan!',
            //         text: 'Content tidak boleh kosong!',
            //         icon: 'warning',
            //         confirmButtonText: 'OK',
            //         confirmButtonColor: '#ffc107'
            //     });
            //     return;
            // }

            Swal.fire({
                title: 'Simpan Post?',
                text: "Post akan disimpan ke database!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan loading
                    Swal.fire({
                        title: 'Menyimpan...',
                        text: 'Mohon tunggu sebentar',
                        icon: 'info',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Submit form
                    this.submit();
                }
            });
        });