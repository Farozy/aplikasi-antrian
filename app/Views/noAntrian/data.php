<div class="card">
    <h3 class="card-header text-center">
        <?= $title ?> <button onclick="ambilNoAntrian();" id="btnGetAntrian" class="btn btn-sm btn-primary btn-icon-split rounded-circle" data-toggle="tooltip" title="Ambil No Antrian">
            <span class="icon">
                <i class="fas fa-arrow-down"></i>
            </span>
        </button>
    </h3>
    <div class="card-body">
        <table id="tNoAntrian" class="table table-bordered table-striped" width="100%">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Antrian</th>
                    <th>Panggil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        var table = $('#tNoAntrian').on('draw.dt', function() {}).DataTable({
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
                $('#tNoAntrian_paginate').addClass("mt-3 mt-md-2");
                $('#tNoAntrian_paginate').addClass("pagination-sm");
            },
            'processing': true,
            'serverSide': true,
            'order': [],
            'ajax': {
                'url': '<?= base_url('NoAntrian/listData') ?>',
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
                        "show": 500,
                        "hide": 0
                    },
                });
            }
        })
        $('.tooltip').not(this).tooltip('hide');
        $('div.dataTables_filter input').focus();
        $('#tNoAntrian_filter input').addClass('form-control-sm');

        $('.table th:nth-child(1)').removeClass('sorting_asc');
        $('.table th:nth-child(1)').addClass('sorting_disabled');
    })

    function ambilNoAntrian() {
        $.ajax({
            url: '<?= base_url('NoAntrian/ambilNoAntrian') ?>',
            type: 'post',
            dataType: 'json',
            beforeSend: function() {
                $('#btnGetAntrian').html('<i class="fas fa-circle-notch fa-spin"></i>');
            },
            complete: function() {
                $('#btnGetAntrian').html('<i class="fas fa-arrow-down"></i>');
            },
            success: function(response) {
                $('.viewData').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
        return false;
    }

    function panggilNoAntrian(id, no) {
        $('.btnPanggil').prop('disabled', true);
        const bel = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'bell1.mp3');
        bel.play();

        if (no > 20 && no < 100) {
            bel.addEventListener("ended", function() {
                bel.pause();
                const no_antrian = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'no_antrian.wav');
                no_antrian.play();

                no_antrian.addEventListener("ended", function() {
                    no_antrian.pause();

                    const puluh = no.toString().substring(0, 1) + 0;
                    const nomer = new Audio("<?= base_url('audio/antrian/'); ?>" + '/' + puluh + '.wav');
                    nomer.play();

                    nomer.addEventListener("ended", function() {
                        nomer.pause();

                        const number = no.toString().substring(1, 2)

                        if (number != 0) {
                            const angka = new Audio("<?= base_url('audio/antrian/'); ?>" + '/' + number + '.wav');
                            angka.play();

                            angka.addEventListener("ended", function() {
                                angka.pause();
                                $('#btnPanggil' + id).removeClass('btn-success');
                                $('#btnPanggil' + id).addClass('btn-secondary');
                                $('.btnPanggil').prop('disabled', false);
                                $('#btnPanggil' + id).tooltip('hide');
                                $('#btnPanggil' + id).attr('data-original-title', 'Panggil Ulang')
                            })
                        } else {
                            $('#btnPanggil' + id).removeClass('btn-success');
                            $('#btnPanggil' + id).addClass('btn-secondary');
                            $('.btnPanggil').prop('disabled', false);
                            $('#btnPanggil' + id).tooltip('hide');
                            $('#btnPanggil' + id).attr('data-original-title', 'Panggil Ulang')
                        }
                    })
                })
            })
        } else if (no > 100 && no < 200) {
            bel.addEventListener("ended", function() {
                bel.pause();
                const no_antrian = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'no_antrian.wav');
                no_antrian.play();

                no_antrian.addEventListener("ended", function() {
                    no_antrian.pause();

                    const ratus = no.toString().substring(0, 1) + 0 + 0;
                    const nomer = new Audio("<?= base_url('audio/antrian/'); ?>" + '/' + ratus + '.wav');
                    nomer.play();

                    nomer.addEventListener("ended", function() {
                        nomer.pause();

                        const puluh = no.toString().substring(1, 3);
                        const angka = new Audio("<?= base_url('audio/antrian/'); ?>" + '/' + puluh + '.wav');
                        angka.play();

                        angka.addEventListener("ended", function() {
                            angka.pause();
                            $('#btnPanggil' + id).removeClass('btn-success');
                            $('#btnPanggil' + id).addClass('btn-secondary');
                            $('.btnPanggil').prop('disabled', false);
                            $('#btnPanggil' + id).tooltip('hide');
                            $('#btnPanggil' + id).attr('data-original-title', 'Panggil Ulang')
                        })
                    })
                })
            })
        } else {
            bel.addEventListener("ended", function() {
                bel.pause();

                const no_antrian = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'no_antrian.wav');
                no_antrian.play();

                no_antrian.addEventListener('ended', function() {
                    no_antrian.pause();

                    const nomer = new Audio("<?= base_url('audio/antrian/'); ?>" + '/' + no + '.wav');
                    nomer.play();

                    nomer.addEventListener('ended', function() {
                        nomer.pause();
                        $('#btnPanggil' + id).removeClass('btn-success');
                        $('#btnPanggil' + id).addClass('btn-secondary');
                        $('.btnPanggil').prop('disabled', false);
                        $('#btnPanggil' + id).tooltip('hide');
                        $('#btnPanggil' + id).attr('data-original-title', 'Panggil Ulang')
                    })

                }, false);
            }, false);
        }
    }

    function deleteNoAntrian(id) {
        Swal.fire({
            title: 'Yakin?',
            text: "No antrian akan dihapus secara permanen!",
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
                    url: '<?= base_url('NoAntrian/deleteNoAntrian') ?>',
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