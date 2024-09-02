       <!-- footer -->
       <footer class="mil-dark-bg">
           <img src="{{ asset('frontend/img/deco/map.png') }}" alt="background" class="mil-footer-bg">
           <div class="container">
               <div class="mil-footer-content">
                   <div class="row align-items-center mil-p-120-60">
                       <div class="col-xl-6 mil-mb-60">

                           <h3 class="mil-light mil-mb-15">Join The <span class="mil-accent">Codexer</span> Experience
                           </h3>

                           <p class="mil-light-soft">Get the latest updates and innovations straight to your inbox.
                               Subscribe now!</p>

                       </div>
                       <div class="col-xl-6 mil-mb-60">

                           <form id="subscribe-form" class="mil-subscribe-form">
                               @csrf
                               <input type="email" id="email" placeholder="Your email address" required>
                               <button type="submit" class="mil-button mil-accent-bg">Subscribe Now</button>
                               <div id="form-message" class="mil-message-newsletter"></div>
                           </form>

                       </div>
                   </div>
                   <div class="mil-divider mil-light"></div>
                   <div class="row justify-content-between mil-p-120-60">
                       <div class="col-md-3 col-lg-3 col-xl-3 mil-mb-30">

                           <img src="img/logo/logo-light.png" alt="" class="mil-logo mil-mb-60"
                               style="width: 140px">

                           <p class="mil-light mil-light-soft" style="margin-bottom: 45px">24 Colston Rise, Ampthill,
                               <br>
                               Bedford, England MK45 2GN
                           </p>

                           <ul class="mil-simple-list mil-mb-15">
                               <li class="mil-light"><span class="mil-accent">+44</span>&nbsp;<span
                                       class="mil-light-soft">20 313 78 313</span></li>
                               <li><span class="mil-accent">info</span><span
                                       class="mil-light mil-light-soft">@codexer.com</span></li>
                           </ul>

                       </div>
                       <div class="col-md-8 col-lg-7 col-xl-7">

                           <div class="row justify-content-end">
                               <div class="col-md-4 col-lg-4 mil-mb-60">

                                   <h4 class="mil-list-title mil-light mil-mb-60">Social</h4>

                                   <ul class="mil-hover-link-list mil-light">
                                       <li>
                                           <a href="#.">Facebook</a>
                                       </li>
                                       <li>
                                           <a href="#.">Instagram</a>
                                       </li>
                                       <li>
                                           <a href="#.">LinkedIn</a>
                                       </li>
                                       <li>
                                           <a href="#.">Twitter</a>
                                       </li>
                                       <li>
                                           <a href="#.">YouTube</a>
                                       </li>
                                   </ul>

                               </div>
                               <div class="col-md-4 col-lg-4 mil-mb-60">

                                   <h4 class="mil-list-title mil-light mil-mb-60">Support</h4>

                                   <ul class="mil-hover-link-list mil-light">
                                       <li>
                                           <a href="#.">Documentation</a>
                                       </li>
                                       <li>
                                           <a href="#.">Support</a>
                                       </li>
                                       <li>
                                           <a href="#.">FAQs</a>
                                       </li>
                                       <li>
                                           <a href="#.">Download</a>
                                       </li>
                                       <li>
                                           <a href="#.">Sitemap</a>
                                       </li>
                                   </ul>

                               </div>
                               <div class="col-md-4 col-lg-4 mil-mb-60">

                                   <h4 class="mil-list-title mil-light mil-mb-60">Links</h4>

                                   <ul class="mil-hover-link-list mil-light">
                                       <li>
                                           <a href="#.">About Us</a>
                                       </li>
                                       <li>
                                           <a href="#.">Terms & condition</a>
                                       </li>
                                       <li>
                                           <a href="#.">Privacy Policy</a>
                                       </li>
                                       <li>
                                           <a href="#.">Partners</a>
                                       </li>
                                       <li>
                                           <a href="#.">Press</a>
                                       </li>
                                   </ul>

                               </div>
                           </div>

                       </div>
                   </div>
               </div>

           </div>
           <div class="mil-footer-bottom">
               <div class="container">
                   <p class="mil-text-sm mil-light">© Codexer, trading as Reliance International London Limited
                       {{ date('Y') }}</p>
                   <p class="mil-text-sm mil-light">All Rights Reserved.</p>
               </div>
           </div>
       </footer>
       <!-- footer end -->


       @push('scripts')
           <script>
               document.getElementById('subscribe-form').addEventListener('submit', function(event) {
                   event.preventDefault(); // Prevent the form from submitting the traditional way

                   const email = document.getElementById('email').value;
                   const messageDiv = document.getElementById('form-message');

                   // Clear previous messages
                   messageDiv.textContent = '';

                   // Ensure the CSRF token is present and accessible
                   const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                   // AJAX request using Fetch API
                   fetch('{{ route('subscribe') }}', {
                           method: 'POST',
                           headers: {
                               'Content-Type': 'application/json',
                               'X-CSRF-TOKEN': csrfToken
                           },
                           body: JSON.stringify({
                               email: email
                           })
                       })
                       .then(response => response.json())
                       .then(data => {
                           if (data.message) {
                               messageDiv.textContent = data.message;
                               messageDiv.style.color = 'green'; // Success message in green
                               document.getElementById('subscribe-form').reset(); // Reset form after success
                           }
                       })
                       .catch(error => {
                           messageDiv.textContent = 'There was an error. Please try again.';
                           messageDiv.style.color = 'red'; // Error message in red
                       });
               });
           </script>
       @endpush
