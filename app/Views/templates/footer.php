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
        var i = "theme",
            o = /\btheme-[a-z0-9]+\b/g,
            r = document.getElementById("toggle-dark");


        function l(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
            (document.body.className = document.body.className.replace(o, "")),
            document.body.classList.add(e),
                (r.checked = "light-mode" == e),
                t || localStorage.setItem(i, e);
        }
        r.addEventListener("input", function(e) {
                if (e.target.checked) {
                    l("light-mode");
                    $('body').removeClass('dark-mode')
                } else {
                    l("dark-mode");
                    $('body').removeClass('light-mode')
                }
            }),
            document.addEventListener("DOMContentLoaded", function() {
                var e;
                if ((e = localStorage.getItem(i))) return l(e);
                if (window.matchMedia) {
                    var t = window.matchMedia("(prefers-color-scheme: light)");
                    return (
                        t.addEventListener("change", function(e) {
                            return l(e.matches ? "light-mode" : "dark-mode", !0);
                        }),
                        l(t.matches ? "light-mode" : "dark-mode", !0)
                    );
                }
            });




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