<section class="mil-contact mil-p-120-0">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-8 col-xl-8 mil-mb-120">

                <form id="contact-form">

                    <h4 class="mil-mb-60"><span class="mil-accent">01.</span> Tell Us About Yourself</h4>

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="mil-input-frame mil-dark-input mil-mb-30">
                                <label class="mil-h6 mil-dark"><span>First Name</span></label>
                                <input name="first_name" id="first_name" type="text" placeholder="John">
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="mil-input-frame mil-dark-input mil-mb-30">
                                <label class="mil-h6"><span>Last Name</span></label>
                                <input name="last_name" id="last_name" type="text" placeholder="Jones">
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="mil-input-frame mil-dark-input mil-mb-30">
                                <label class="mil-h6"><span>Email Address</span></label>
                                <input name="email" id="email" type="email" placeholder="doe@mydomain.com">
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="mil-input-frame mil-dark-input mil-mb-30">
                                <label class="mil-h6"><span>Phone</span></label>
                                <input name="phone" id="phone" type="number"
                                    placeholder="Enter your phone number">
                            </div>

                        </div>
                        <div class="col-lg-6">


                            <div class="mil-input-frame mil-dark-input mil-mb-30">
                                <label class="mil-h6 mil-dark"><span>Company</span></label>
                                <input name="company" id="company" type="text" placeholder="Your company name">
                            </div>

                        </div>
                        <div class="col-lg-6 mil-mb-30">

                            <div class="mil-input-frame mil-dark-input mil-mb-30">
                                <label class="mil-h6 mil-dark"><span>Role</span></label>
                                <input name="role" id="role" type="text" placeholder="Your role">
                            </div>

                        </div>
                    </div>

                    <h4 class="mil-mb-60"><span class="mil-accent">02.</span> What Can We Help You With?</h4>

                    <div class="row">
                        <div class="col-lg-6 mil-mb-30">

                            <div class="mil-input-frame mil-dark-input mil-mb-30">
                                <label class="mil-h6 mil-dark"><span>Product Design</span></label>
                                <input name="product_design" id="product_design" type="text"
                                    placeholder="Web Designer">
                            </div>

                        </div>
                    </div>

                    <h4 class="mil-mb-60"><span class="mil-accent">03.</span> Tell Us About Your Project</h4>

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="mil-input-frame mil-dark-input mil-mb-30">
                                <label class="mil-h6"><span>Project Description</span></label>
                                <textarea name="project_description" id="project_description" placeholder="Your Message" class="mil-shortened"></textarea>
                            </div>

                        </div>





                        <div class="col-lg-12">

                            <button type="submit" class="mil-button mil-border mil-fw"><span>Submit Now</span></button>
                            <div id="form-message" class="mt-2"></div>

                        </div>

                    </div>

                </form>

            </div>
            <div class="col-lg-4 col-xl-3 mil-mb-120">

                <div class="mil-mb-60">
                    <h5 class="mil-list-title mil-mb-30">Support Request</h5>
                    <p class="mil-mb-20">Our experts are ready to answer your questions.</p>
                    <a href="mailto:info@codexer.co.uk" class="mil-link mil-link-sm">
                        <span>Support Now</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>

                </div>

                <div class="mil-divider mil-mb-60"></div>

                <div class="mil-mb-60">
                    <div class="mil-icon-frame mil-icon-frame-md mil-icon-bg mil-mb-30">
                        <img src="{{asset('frontend/img/icons/md/8.svg')}}" alt="icon">
                    </div>
                    <h5 class="mil-list-title mil-mb-30">Need Help?</h5>
                    <p>For technical support or billing inquiries, our Customer Care team is here to assist you. Reach out to us for prompt and reliable support.</p>
                </div>

                <div class="mil-mb-60">
                    <div class="mil-icon-frame mil-icon-frame-md mil-icon-bg mil-mb-30">
                        <img src="{{asset('frontend/img/icons/md/9.svg')}}" alt="icon">
                    </div>
                    <h5 class="mil-list-title mil-mb-30">Needs More Info?</h5>
                    <p>Need further details or have additional questions? We're available to provide the information you’re looking for.</p>
                </div>

                <div class="mil-divider mil-mb-60"></div>



            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Set the CSRF token in the header for every AJAX request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#contact-form').on('submit', function(e) {
                e.preventDefault();

                // Clear previous messages and errors
                $('.text-danger-message').remove();
                $('#form-message').html('');

                $.ajax({
                    url: "{{ route('contact.store') }}", // Ensure the route is correct
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Show success message
                        $('#form-message').html('<p class="text-success-message">' + response.success +
                            '</p>');

                        // Clear the form fields
                        $('#contact-form').trigger('reset');
                    },
                    error: function(xhr) {
                        // Handle errors and display messages
                        let errors = xhr.responseJSON.errors;
                        $('#form-message').html(
                            '<p class="text-danger">Please fix the errors below.</p>');

                        // Display individual error messages under each input
                        $.each(errors, function(key, value) {
                            $('#' + key).after('<div class="text-danger-message">' +
                                value[0] + '</div>');
                        });
                    }
                });
            });
        });
    </script>
@endpush
