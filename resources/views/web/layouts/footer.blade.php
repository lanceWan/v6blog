<footer class="footer footer-white">
    <div class="container">
        <a class="footer-brand" href="/"> Laravel 6.x Blog</a>
        <div class="copyright pull-center">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, made with Laravel 6.x  by
            <a href="" target="blank" class="text-primary">晚黎</a> for a better web.
        </div>
        <ul class="social-buttons float-right">
            <li>
                <a href="{{$settings['github'] ?? '/'}}" target="_blank"
                    class="btn btn-just-icon btn-link text-danger">
                    <i class="fa fa-github"></i>
                </a>
            </li>
        </ul>
    </div>
</footer>
