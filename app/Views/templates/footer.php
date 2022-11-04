<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>

<!-- Main Footer -->
<footer class="main-footer text-sm">
    <strong><?= date('Y-m-d') ?></strong>
    </div>
</footer>
</div>

<script>
    (() => {
        $('[data-toggle="tooltip"]').tooltip();
       
        $('#logout').click(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Yakin?',
                text: "Anda mau keluar dari aplikasi ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url(); ?>/logout';
                }
            })
        })
    })();
</script>
</body>

</html>
