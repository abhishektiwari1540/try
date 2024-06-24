<footer class="footer_wrapper">
    <div class="container">
        <div class="footLinks">
            <a href="{{ route('front.privacy_policy') }}">Privacy Policy</a> <span>|</span> <a href="{{ route('front.Refund_policy')}}">Term & Conditions</a>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <span>
                        {{ $setting['site_title']}} ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>. All rights reserved.
                    </span>
                </div>

            </div>
        </div>
    </div>
</footer>
