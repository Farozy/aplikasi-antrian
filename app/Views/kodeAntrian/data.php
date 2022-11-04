<div class="card">
    <h3 class="card-header text-center">
        <?= $title ?>
        <form class="formSave form-inline d-flex justify-content-center mt-2">
            <div class="form-group mx-sm-2">
                <input type="text" class="form-control form-control-sm" name="kode_antrian" id="kode_antrian" placeholder="Kode antrian A-Z">
            </div>
            <button id="btnKodeAntrian" class="btn btn-sm btn-primary btn-icon-split rounded-circle" disabled data-toggle="tooltip" title="Tambah Kode Antrian">
                <span class="icon">
                    <i class="fas fa-arrow-down"></i>
                </span>
            </button>
        </form>
        <div class="error errKodeAntrian" style="margin: 3px 0 0 -55px; display: none;">Maximal 1 karakter</div>
    </h3>
    <div class="card-body">
        <table id="tKodeAntrian" class="table table-bordered table-striped" width="100%">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Kode Antrian</th>
                    <th>Panggil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $('#tKodeAntrian').on('draw.dt', function() {}).DataTable({
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "All"]
            ],
            responsive: true,
            oLanguage: {
                sProcessing: "<i class='fa fa-spinner fa-spin' style='font-size:24px;'></i>",
                "sSearch": "",
                "sSearchPlaceholder": "Pencarian...",
                "sLengthMenu": "Tampilkan _MENU_ data per halaman",
                "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
                "sZeroRecords": "Data tidak ditemukan",
                "sInfoFiltered": "(di filter dari _MAX_ total data)",
                "sInfoFiltered": "",
                "sLengthMenu": 'Tampilkan <select class="form-control-sm">' +
                    '<option value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">All</option>' +
                    '</select> data',
            },
            drawCallback: function() {
                $('a.paginate_button').addClass('btn btn-sm rounded');
                $('#tKodeAntrian_paginate').addClass("mt-3 mt-md-2");
                $('#tKodeAntrian_paginate').addClass("pagination-sm");
            },
            'processing': true,
            'serverSide': true,
            'order': [],
            'ajax': {
                'url': '<?= base_url('KodeAntrian/listData') ?>',
                'type': 'post'
            },
            'columnDefs': [{
                    "orderable": false,
                    "targets": [0, 2, 3]
                },
                {
                    "orderable": true,
                    "targets": [1]
                },
                {
                    className: "text-center align-middle",
                    targets: [0, 1, 2, 3]
                },
            ],
            drawCallback: function(settings) {
                $('[data-toggle="tooltip"]').tooltip({
                    "html": true,
                    "delay": {
                        "show": 100,
                        "hide": 0
                    },
                });
            }
        })
        $('div.dataTables_filter input').focus();
        $('#tKodeAntrian_filter input').addClass('form-control-sm');

        $('.table th:nth-child(1)').removeClass('sorting_asc');
        $('.table th:nth-child(1)').addClass('sorting_disabled');

        $('#kode_antrian').keyup(function(e) {
            let pattern = $(this).val().toLowerCase().match(/^[a-zA-Z]{1}/);

            if (pattern != null) {
                let value = $(this).val().toLowerCase();
                $('#kode_antrian').val(value);
                if (value != null && value.length == 1) {
                    $('#btnKodeAntrian').prop('disabled', false);
                    $('.errKodeAntrian').hide();
                } else if (value.length == 0) {
                    $('#btnKodeAntrian').prop('disabled', true);
                    $('.errKodeAntrian').hide();
                } else if (value == '') {
                    $('#btnKodeAntrian').prop('disabled', true);
                } else {
                    $('.errKodeAntrian').show();
                }

                if (value.indexOf(' ') >= 0) {
                    $('#btnKodeAntrian').prop('disabled', true);
                }
            } else {
                $('#btnKodeAntrian').prop('disabled', true);
            }


        })

        $('.formSave').submit(function() {
            $.ajax({
                url: '<?= base_url('KodeAntrian/saveKodeAntrian'); ?>',
                type: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('#btnKodeAntrian').html('<i class="fas fa-circle-notch fa-spin"></i>');
                },
                complete: function() {
                    $('#btnKodeAntrian').html('<i class="fas fa-arrow-down"></i>');
                },
                success: function(response) {
                    if (response.data != undefined) {
                        $('.viewData').html(response.data);
                    } else {
                        Swal.fire({
                            icon: response.icon,
                            title: response.title,
                            showConfirmButton: false,
                            timer: 1200
                        })
                    }
                    $('#btnKodeAntrian').tooltip('hide');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
            return false;
        })
    })

    function panggilKodeAntrian(id, huruf) {
        $('.btnPanggil').prop('disabled', true);
        const bel = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'bell1.mp3');
        bel.play();

        bel.addEventListener("ended", function() {
            const nama = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + huruf + '.wav');
            nama.play();

            nama.addEventListener("ended", function() {
                nama.pause();
                $('#btnPanggil' + id).removeClass('btn-success');
                $('#btnPanggil' + id).addClass('btn-secondary');
                $('.btnPanggil').prop('disabled', false);
                $('#btnPanggil' + id).tooltip('hide');
                $('#btnPanggil' + id).attr('data-original-title', 'Panggil Ulang')
            })
        })
    }

    function deleteKodeAntrian(id) {
        Swal.fire({
            title: 'Yakin?',
            text: "Nama counter akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('KodeAntrian/deleteKodeAntrian') ?>',
                    type: 'post',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('.viewData').html(response.data);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            }
        })
    }
</script>