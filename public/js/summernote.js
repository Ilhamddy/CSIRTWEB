 $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                dialogsInBody: true,
                callbacks: {
                    onImageUpload: function(files) {
                        uploadImage(files[0]);
                    }
                }
            });

            function uploadImage(file) {
                let data = new FormData();
                data.append("file", file);
                data.append("_token", "{{ csrf_token() }}");

                $.ajax({
                    url: "{{ route('summernote.upload') }}",
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('.summernote').summernote('insertImage', response.url);
                    },
                    error: function(xhr) {
                        console.error(xhr);
                    }
                });
            }

            function deleteImage(src) {
                $.ajax({
                    url: "{{ route('summernote.delete') }}", // Route Laravel untuk hapus file
                    method: "POST",
                    data: {
                        src: src,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log('Gambar dihapus:', response);
                    },
                    error: function(xhr) {
                        console.error('Gagal hapus gambar:', xhr);
                    }
                });
            }
        });
