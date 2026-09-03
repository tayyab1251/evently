    <!-- ============================= FOOTER ============================= -->
    <footer class="footer-brand" id="contact">
        <div class="container-xl-custom">
            <div class="row g-4 pb-5">
                <div class="col-6 col-lg-3">
                    <a class="navbar-brand d-flex align-items-center gap-2 mb-3 fw-bold" href="{{route('home')}}">
                       {{config('app.name')}}
                    </a>
                    <p class="text-body-c" style="max-width:220px;">Discover and book conferences, workshops, concerts
                        and meetups near you.</p>
                </div>
                <div class="col-6 col-lg-2">
                    <div class="footer-heading">Navigation</div>
                    <a class="footer-link" href="{{route('home')}}">Home</a>
                    <a class="footer-link" href="#">Events</a>
                    <a class="footer-link" href="#">Categories</a>
                    <a class="footer-link" href="#about">About</a>
                    <a class="footer-link" href="#contact">Contact</a>
                </div>
                <div class="col-6 col-lg-2">
                    <div class="footer-heading">Support</div>
                    <a class="footer-link" href="#">Help Center</a>
                    <a class="footer-link" href="#">FAQ</a>
                    <a class="footer-link" href="#">Terms</a>
                    <a class="footer-link" href="#">Privacy</a>
                </div>
                <div class="col-6 col-lg-2">
                    <div class="footer-heading">Company</div>
                    <a class="footer-link" href="#">About Us</a>
                    <a class="footer-link" href="#">Careers</a>
                    <a class="footer-link" href="#">Blog</a>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="footer-heading">Follow us</div>
                    <div class="d-flex gap-2">
                        <a href="#" class="social-icon" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon" aria-label="Twitter / X"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="social-icon" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="legal-band">
            <div class="container-xl-custom d-flex flex-wrap justify-content-between gap-2">
                <span>© 2026 {{config('app.name')}}. All rights reserved.</span>
                <span>Made with ❤️ by Tayyab &nbsp; (tayyabsabir72@gmail.com)</span>
            </div>
        </div>
    </footer>