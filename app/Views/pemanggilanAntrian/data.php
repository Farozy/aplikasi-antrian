<div class="card">
    <div class="card-header text-center" style="background-color: #edeeef; color: #343a40; padding: 2px 2px 0 2px">
        <marquee behavior="alternate" onmouseover="this.stop()" onmouseout="this.start()"><b>Selamat Datang di Aplikasi Antrian Berbasis Web</b></marquee>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h4 class="text-center border border-primary font-weight-bold py-1" id="counterKesatu">-</h4>
                <div class="text-center mt-2 bg-primary" style="padding: 65px 0">
                    <h1 style="font-size: 8em; font-weight: bold;" id="noCounterKesatu">0</h1>
                </div>
                <div class="mt-2 text-center displayCounterKesatu">
                    <button class="btn btn-secondary btnMulaiCounterKesatu" onclick="btnMulaiCounterKesatu()" data-toggle="tooltip" data-placement="top" title="Mulai" disabled><i class="fas fa-bahai"></i> Mulai</button>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="text-center border border-success font-weight-bold py-1" id="counterKedua">-</h4>
                <div class="text-center mt-2 bg-success" style="padding: 65px 0">
                    <h1 style="font-size: 8em; font-weight: bold;" id="noCounterKedua">0</h1>
                </div>
                <div class="mt-2 text-center displayCounterKedua">
                    <button class="btn btn-secondary btnMulaiCounterKedua" onclick="btnMulaiCounterKedua()" disabled data-toggle="tooltip" data-placement="top" title="Mulai"><i class="fas fa-bahai"></i> Mulai</button>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-warning" onclick="setCounterKesatu()"><i class="fas fa-cog"></i> Counter Pertama</button>
            <button class="btn btn-danger" id="btnReset"><i class="fas fa-trash-restore"></i> Reset</button>
            <button onclick="setCounterKedua()" class="btn btn-warning"><i class="fas fa-cog"></i> Counter Kedua</button>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#btnReset').click(function() {
            Swal.fire({
                icon: 'question',
                title: 'Reset Counter?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Kesatu',
                denyButtonText: `Semua`,
                cancelButtonText: `Kedua`,
                confirmButtonColor: '#4e73df',
                denyButtonColor: '#e74a3b',
                cancelButtonColor: '#1cc88a',
                showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Counter Pertama
                    $('#counterKesatu').html('-')
                    $('#noCounterKesatu').html('0')
                    $('.btnMulaiCounterKesatu').prop('disabled', true);
                    $('.displayCounterKesatu button').remove();
                    $('.displayCounterKesatu').html('<button class="btn btn-secondary btnMulaiCounterKesatu" onclick="btnMulaiCounterKesatu()" data-toggle="tooltip" data-placement="top" title="Mulai" disabled><i class="fas fa-bahai"></i> Mulai</button>');
                } else if (result.isDenied) {
                    // Counter Pertama
                    $('#counterKesatu').html('-')
                    $('#noCounterKesatu').html('0')
                    $('.btnMulaiCounterKesatu').prop('disabled', true);
                    $('.displayCounterKesatu').html('<button class="btn btn-secondary btnMulaiCounterKesatu" onclick="btnMulaiCounterKesatu()" data-toggle="tooltip" data-placement="top" title="Mulai" disabled><i class="fas fa-bahai"></i> Mulai</button>');

                    // Counter Kedua
                    $('#counterKedua').html('-')
                    $('#noCounterKedua').html('0')
                    $('.btnMulaiCounterKedua').prop('disabled', true);
                    $('.displayCounterKedua').html('<button class="btn btn-secondary btnMulaiCounterKedua" onclick="btnMulaiCounterKedua()" data-toggle="tooltip" data-placement="top" title="Mulai" disabled><i class="fas fa-bahai"></i> Mulai</button>')
                } else if (result.dismiss == 'cancel') {
                    // Counter Kedua
                    $('#counterKedua').html('-')
                    $('#noCounterKedua').html('0')
                    $('.btnMulaiCounterKedua').prop('disabled', true);
                    $('.displayCounterKedua').html('<button class="btn btn-secondary btnMulaiCounterKedua" onclick="btnMulaiCounterKedua()" data-toggle="tooltip" data-placement="top" title="Mulai" disabled><i class="fas fa-bahai"></i> Mulai</button>')
                }
            })
        })
    })

    // Counter Kesatu
    function btnMulaiCounterKesatu() {
        $('.btnMulaiCounterKesatu').tooltip('hide');
        $('.btnMulaiCounterKesatu').html('<i class="fas fa-cog fa-spin"></i> Proses');
        window.setTimeout(function() {
            $('.btnMulaiCounterKesatu').remove();
            $('#noCounterKesatu').html('1')
            $('.displayCounterKesatu').html('<button class="btn btn-primary" onclick="btnCounterKesatu()" id="btnCounterKesatu" title="Panggil No Antrian"><i class="fas fa-microphone"></i> Panggil</button> <button class = "btn btn-info" onclick="btnSelanjutnyaKesatu()" title="Selanjutnya"> Selanjutnya <i class = "fas fa-arrow-circle-right"></i></button>')
        }, 2000);
    }

    function btnCounterKesatu() {
        let no = $('#noCounterKesatu').text();
        let setNoCounter = $('#counterKesatu').text().replace('Counter ', '');
        $('#btnCounterKesatu').prop('disabled', true);
        $('#btnCounterKesatu').html('<i class="fas fa-spinner fa-pulse"></i> Pemanggilan')

        const bel = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'bell1.mp3');
        bel.play();

        bel.addEventListener("ended", function() {
            bel.pause();

            const no_antrian = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'no_antrian.wav');
            no_antrian.play();

            no_antrian.addEventListener("ended", function() {
                no_antrian.pause();

                if (parseInt(no) > 20 && parseInt(no) < 100) {
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

                                const counter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'counter.wav');
                                counter.play();

                                counter.addEventListener("ended", function() {
                                    counter.pause();

                                    const noCounter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + setNoCounter + '.wav');
                                    noCounter.play();

                                    noCounter.addEventListener("ended", function() {
                                        noCounter.pause();
                                        $('#btnCounterKesatu').html('<i class="fas fa-microphone"></i> Panggil')
                                        $('#btnCounterKesatu').removeClass('btn-primary');
                                        $('#btnCounterKesatu').addClass('btn-secondary');
                                        $('#btnCounterKesatu').prop('disabled', false);
                                        $('#btnCounterKesatu').attr('title', 'Panggil Ulang')
                                    })
                                })
                            })
                        } else {
                            const counter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'counter.wav');
                            counter.play();

                            counter.addEventListener("ended", function() {
                                counter.pause();

                                const noCounter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + setNoCounter + '.wav');
                                noCounter.play();

                                noCounter.addEventListener("ended", function() {
                                    noCounter.pause();
                                    $('#btnCounterKesatu').html('<i class="fas fa-microphone"></i> Panggil')
                                    $('#btnCounterKesatu').removeClass('btn-primary');
                                    $('#btnCounterKesatu').addClass('btn-secondary');
                                    $('#btnCounterKesatu').prop('disabled', false);
                                    $('#btnCounterKesatu').attr('title', 'Panggil Ulang')
                                })
                            })
                        }

                    })

                } else if (parseInt(no) > 100 && parseInt(no) < 200) {
                    const ratus = no.toString().substring(0, 1) + 0 + 0;
                    const nomer = new Audio("<?= base_url('audio/antrian/'); ?>" + '/' + ratus + '.wav');
                    nomer.play();

                    nomer.addEventListener("ended", function() {
                        nomer.pause();

                        let value = no.toString().substr(1, 3);
                        let puluh = 0;
                        if (value < 10) {
                            puluh = value.replace('0', '');
                        } else if (value < 20) {
                            puluh = value;
                        } else {
                            puluh = no.toString().substring(1, 2) + 0;
                        }
                        const angka = new Audio("<?= base_url('audio/antrian/'); ?>" + '/' + puluh + '.wav');
                        angka.play();

                        angka.addEventListener("ended", function() {
                            angka.pause();

                            const number = no.toString().substring(2, 3)
                            const number2 = no.toString().substring(1, 3)

                            if (number != 0 && number2 > 20) {
                                const angka = new Audio("<?= base_url('audio/antrian/'); ?>" + '/' + number + '.wav');
                                angka.play();
                                angka.addEventListener("ended", function() {
                                    angka.pause();

                                    const counter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'counter.wav');
                                    counter.play();

                                    counter.addEventListener("ended", function() {
                                        counter.pause();

                                        const noCounter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + setNoCounter + '.wav');
                                        noCounter.play();

                                        noCounter.addEventListener("ended", function() {
                                            noCounter.pause();
                                            $('#btnCounterKesatu').html('<i class="fas fa-microphone"></i> Panggil')
                                            $('#btnCounterKesatu').removeClass('btn-primary');
                                            $('#btnCounterKesatu').addClass('btn-secondary');
                                            $('#btnCounterKesatu').prop('disabled', false);
                                            $('#btnCounterKesatu').attr('title', 'Panggil Ulang')
                                        })
                                    })
                                })
                            } else {
                                const counter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'counter.wav');
                                counter.play();

                                counter.addEventListener("ended", function() {
                                    counter.pause();

                                    const noCounter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + setNoCounter + '.wav');
                                    noCounter.play();

                                    noCounter.addEventListener("ended", function() {
                                        noCounter.pause();
                                        $('#btnCounterKesatu').html('<i class="fas fa-microphone"></i> Panggil')
                                        $('#btnCounterKesatu').removeClass('btn-primary');
                                        $('#btnCounterKesatu').addClass('btn-secondary');
                                        $('#btnCounterKesatu').prop('disabled', false);
                                        $('#btnCounterKesatu').attr('title', 'Panggil Ulang')
                                    })
                                })
                            }
                        })
                    })
                } else {
                    const nomer = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + no + '.wav');
                    nomer.play();

                    nomer.addEventListener("ended", function() {
                        nomer.pause();

                        const counter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'counter.wav');
                        counter.play();

                        counter.addEventListener("ended", function() {
                            counter.pause();

                            const noCounter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + setNoCounter + '.wav');
                            noCounter.play();

                            noCounter.addEventListener("ended", function() {
                                noCounter.pause();
                                $('#btnCounterKesatu').html('<i class="fas fa-microphone"></i> Panggil')
                                $('#btnCounterKesatu').removeClass('btn-primary');
                                $('#btnCounterKesatu').addClass('btn-secondary');
                                $('#btnCounterKesatu').prop('disabled', false);
                                $('#btnCounterKesatu').attr('title', 'Panggil Ulang')
                            })
                        })

                    })
                }

            })
        })
    }

    function btnSelanjutnyaKesatu() {
        let no = parseInt($('#noCounterKesatu').text());
        let value = no + 1;
        $('#noCounterKesatu').html(value.toString());
        if (no + 1 > 0) {
            $('.displayCounterKesatu').html('<button class="btn btn-info btnMulaiCounterKesatu" data-toggle="tooltip" data-placement="top" title="Kembali" onclick="btnKembaliKesatu()"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</button><button class="btn btn-primary ml-2 mr-1" onclick="btnCounterKesatu()" id="btnCounterKesatu" title="Panggil No Antrian"><i class="fas fa-microphone"></i> Panggil</button> <button class = "btn btn-info" onclick="btnSelanjutnyaKesatu()" title="Selanjutnya"> Selanjutnya <i class = "fas fa-arrow-circle-right"></i></button>')
        }
    }

    function btnKembaliKesatu() {
        let no = parseInt($('#noCounterKesatu').text());
        let value = no - 1;
        $('#noCounterKesatu').html(value.toString());
        if (no - 1 <= 1) {
            $('.displayCounterKesatu').html('<button class="btn btn-primary" onclick="btnCounterKesatu()" id="btnCounterKesatu" title="Panggil No Antrian"><i class="fas fa-microphone"></i> Panggil</button> <button class = "btn btn-info" onclick="btnSelanjutnyaKesatu()" title="Selanjutnya"> Selanjutnya <i class = "fas fa-arrow-circle-right"></i></button>')
        } else {
            $('.displayCounterKesatu').html('<button class="btn btn-info btnMulaiCounterKesatu" data-toggle="tooltip" data-placement="top" title="Kembali" onclick="btnKembaliKesatu()"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</button><button class="btn btn-primary ml-2 mr-1" onclick="btnCounterKesatu()" id="btnCounterKesatu" title="Panggil No Antrian"><i class="fas fa-microphone"></i> Panggil</button> <button class = "btn btn-info" onclick="btnSelanjutnyaKesatu()" title="Selanjutnya"> Selanjutnya <i class = "fas fa-arrow-circle-right"></i></button>')
        }
    }

    function setCounterKesatu() {
        Swal.fire({
            title: 'Nomer Counter Kesatu',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Kirim',
            inputValidator: (value) => {
                if (value == '') {
                    return !value && 'Nomer counter belum diisi'
                } else if (value == 0) {
                    return "Nomer counter minimal 1"
                } else if (value > 10) {
                    return 'Nomer counter miksimal 10'
                }
            }
        }).then((result) => {
            if (result.isConfirmed) {
                let value = result.value;
                $('#counterKesatu').html('Counter ' + value);
                $('.btnMulaiCounterKesatu').prop('disabled', false);
            }
        })
    }

    // Counter Kedua
    function btnMulaiCounterKedua() {
        $('.btnMulaiCounterKedua').tooltip('hide');
        $('.btnMulaiCounterKedua').html('<i class="fas fa-cog fa-spin"></i> Proses');
        window.setTimeout(function() {
            $('.btnMulaiCounterKedua').remove();
            $('#noCounterKedua').html('1')
            $('.displayCounterKedua').html('<button class="btn btn-primary" onclick="btnCounterKedua()" id="btnCounterKedua" title="Panggil No Antrian"><i class="fas fa-microphone"></i> Panggil</button> <button class = "btn btn-info" onclick="btnSelanjutnyaKedua()" title="Selanjutnya"> Selanjutnya <i class = "fas fa-arrow-circle-right"></i></button>')
        }, 2000);
    }

    function btnCounterKedua() {
        let no = $('#noCounterKedua').text();
        let setNoCounter = $('#counterKedua').text().replace('Counter ', '');
        $('#btnCounterKedua').prop('disabled', true);
        $('#btnCounterKedua').html('<i class="fas fa-spinner fa-pulse"></i> Pemanggilan')

        const bel = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'bell1.mp3');
        bel.play();

        bel.addEventListener("ended", function() {
            bel.pause();

            const no_antrian = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'no_antrian.wav');
            no_antrian.play();

            no_antrian.addEventListener("ended", function() {
                no_antrian.pause();

                if (parseInt(no) > 20 && parseInt(no) < 100) {
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

                                const counter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'counter.wav');
                                counter.play();

                                counter.addEventListener("ended", function() {
                                    counter.pause();

                                    const noCounter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + setNoCounter + '.wav');
                                    noCounter.play();

                                    noCounter.addEventListener("ended", function() {
                                        noCounter.pause();
                                        $('#btnCounterKedua').html('<i class="fas fa-microphone"></i> Panggil')
                                        $('#btnCounterKedua').removeClass('btn-primary');
                                        $('#btnCounterKedua').addClass('btn-secondary');
                                        $('#btnCounterKedua').prop('disabled', false);
                                        $('#btnCounterKedua').attr('title', 'Panggil Ulang')
                                    })
                                })
                            })

                        } else {
                            const counter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'counter.wav');
                            counter.play();

                            counter.addEventListener("ended", function() {
                                counter.pause();

                                const noCounter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + setNoCounter + '.wav');
                                noCounter.play();

                                noCounter.addEventListener("ended", function() {
                                    noCounter.pause();
                                    $('#btnCounterKedua').html('<i class="fas fa-microphone"></i> Panggil')
                                    $('#btnCounterKedua').removeClass('btn-primary');
                                    $('#btnCounterKedua').addClass('btn-secondary');
                                    $('#btnCounterKedua').prop('disabled', false);
                                    $('#btnCounterKedua').attr('title', 'Panggil Ulang')
                                })
                            })
                        }
                    })
                } else if (parseInt(no) > 100 && parseInt(no) < 200) {
                    const ratus = no.toString().substring(0, 1) + 0 + 0;
                    const nomer = new Audio("<?= base_url('audio/antrian/'); ?>" + '/' + ratus + '.wav');
                    nomer.play();

                    nomer.addEventListener("ended", function() {
                        nomer.pause();

                        let value = no.toString().substr(1, 3);
                        let puluh = 0;
                        if (value < 10) {
                            puluh = value.replace('0', '');
                        } else if (value < 20) {
                            puluh = value;
                        } else {
                            puluh = no.toString().substring(1, 2) + 0;
                        }

                        const angka = new Audio("<?= base_url('audio/antrian/'); ?>" + '/' + puluh + '.wav');
                        angka.play();

                        angka.addEventListener("ended", function() {
                            angka.pause();

                            const number = no.toString().substring(2, 3)
                            const number2 = no.toString().substring(1, 3)

                            if (number != 0 && number2 > 20) {
                                const angka = new Audio("<?= base_url('audio/antrian/'); ?>" + '/' + number + '.wav');
                                angka.play();
                                angka.addEventListener("ended", function() {
                                    angka.pause();

                                    const counter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'counter.wav');
                                    counter.play();

                                    counter.addEventListener("ended", function() {
                                        counter.pause();

                                        const noCounter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + setNoCounter + '.wav');
                                        noCounter.play();

                                        noCounter.addEventListener("ended", function() {
                                            noCounter.pause();
                                            $('#btnCounterKedua').html('<i class="fas fa-microphone"></i> Panggil')
                                            $('#btnCounterKedua').removeClass('btn-primary');
                                            $('#btnCounterKedua').addClass('btn-secondary');
                                            $('#btnCounterKedua').prop('disabled', false);
                                            $('#btnCounterKedua').attr('title', 'Panggil Ulang')
                                        })
                                    })
                                })
                            } else {
                                const counter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'counter.wav');
                                counter.play();

                                counter.addEventListener("ended", function() {
                                    counter.pause();

                                    const noCounter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + setNoCounter + '.wav');
                                    noCounter.play();

                                    noCounter.addEventListener("ended", function() {
                                        noCounter.pause();
                                        $('#btnCounterKedua').html('<i class="fas fa-microphone"></i> Panggil')
                                        $('#btnCounterKedua').removeClass('btn-primary');
                                        $('#btnCounterKedua').addClass('btn-secondary');
                                        $('#btnCounterKedua').prop('disabled', false);
                                        $('#btnCounterKedua').attr('title', 'Panggil Ulang')
                                    })
                                })
                            }
                        })
                    })
                } else {
                    const nomer = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + no + '.wav');
                    nomer.play();

                    nomer.addEventListener("ended", function() {
                        nomer.pause();

                        const counter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + 'counter.wav');
                        counter.play();

                        counter.addEventListener("ended", function() {
                            counter.pause();

                            const noCounter = new Audio("<?= base_url('audio/antrian'); ?>" + '/' + setNoCounter + '.wav');
                            noCounter.play();

                            noCounter.addEventListener("ended", function() {
                                noCounter.pause();
                                $('#btnCounterKedua').html('<i class="fas fa-microphone"></i> Panggil')
                                $('#btnCounterKedua').removeClass('btn-primary');
                                $('#btnCounterKedua').addClass('btn-secondary');
                                $('#btnCounterKedua').prop('disabled', false);
                                $('#btnCounterKedua').attr('title', 'Panggil Ulang')
                            })
                        })

                    })
                }

            })
        })
    }

    function btnSelanjutnyaKedua() {
        let no = parseInt($('#noCounterKedua').text());
        let value = no + 1;
        $('#noCounterKedua').html(value.toString());
        if (no + 1 > 0) {
            $('.displayCounterKedua').html('<button class="btn btn-info btnMulaiCounterKedua" data-toggle="tooltip" data-placement="top" title="Kembali" onclick="btnKembaliKedua()"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</button><button class="btn btn-primary ml-2 mr-1" onclick="btnCounterKedua()" id="btnCounterKedua" title="Panggil No Antrian"><i class="fas fa-microphone"></i> Panggil</button> <button class = "btn btn-info" onclick="btnSelanjutnyaKedua()" title="Selanjutnya"> Selanjutnya <i class = "fas fa-arrow-circle-right"></i></button>')
        }
    }

    function btnKembaliKedua() {
        let no = parseInt($('#noCounterKedua').text());
        let value = no - 1;
        $('#noCounterKedua').html(value.toString());
        if (no - 1 <= 1) {
            $('.displayCounterKedua').html('<button class="btn btn-primary" onclick="btnCounterKedua()" id="btnCounterKedua" title="Panggil No Antrian"><i class="fas fa-microphone"></i> Panggil</button> <button class = "btn btn-info" onclick="btnSelanjutnyaKedua()" title="Selanjutnya"> Selanjutnya <i class = "fas fa-arrow-circle-right"></i></button>')
        } else {
            $('.displayCounterKedua').html('<button class="btn btn-info btnMulaiCounterKedua" data-toggle="tooltip" data-placement="top" title="Kembali" onclick="btnKembaliKedua()"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</button><button class="btn btn-primary ml-2 mr-1" onclick="btnCounterKedua()" id="btnCounterKedua" title="Panggil No Antrian"><i class="fas fa-microphone"></i> Panggil</button> <button class = "btn btn-info" onclick="btnSelanjutnyaKedua()" title="Selanjutnya"> Selanjutnya <i class = "fas fa-arrow-circle-right"></i></button>')
        }
    }

    function setCounterKedua() {
        Swal.fire({
            title: 'Nomer Counter Kedua',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Kirim',
            inputValidator: (value) => {
                if (value == '') {
                    return !value && 'Nomer counter belum diisi'
                } else if (value == 0) {
                    return "Nomer counter minimal 1"
                } else if (value > 10) {
                    return 'Nomer counter miksimal 10'
                }
            }
        }).then((result) => {
            if (result.isConfirmed) {
                let value = result.value;
                $('#counterKedua').html('Counter ' + value);
                $('.btnMulaiCounterKedua').prop('disabled', false);
            }
        })
    }
</script>