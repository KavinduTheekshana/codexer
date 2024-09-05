@extends('layouts.frontend')
@section('content')
@section('page_name', 'FAQS')
@include('frontend.components.banner')

<section class="mil-faqs mil-p-120-120">
    <div class="container">




        <div class="row justify-content-between">
            <div class="col-lg-4">
                <h3 class="mil-up-font mil-mb-30"><span class="mil-accent">Have questions?</span>We’ve got answers.</h3>
                <p class="mil-mb-60">Find detailed responses to the most common inquiries about our services, processes,
                    and solutions. If you need further assistance, feel free to reach out to us directly.</p>
            </div>
            <div class="col-lg-7">


                <div class="mil-accordion">
                    <h6>What services does Codexer offer?</h6>
                </div>
                <div class="mil-panel">
                    <div class="mil-window">
                        <p>Codexer provides a wide range of IT services, including custom software development, web and
                            mobile app development, cloud solutions, IoT integration, and advanced data analytics. We
                            tailor our solutions to meet the specific needs of each client.</p>
                    </div>
                </div>

                <div class="mil-accordion">
                    <h6>How do I get started with Codexer?</h6>
                </div>
                <div class="mil-panel">
                    <div class="mil-window">
                        <p>To get started, simply contact us through our website or email us at <a
                                href="mailto:info@codexer.co.uk">info@codexer.co.uk</a>.
                            We’ll schedule a consultation to discuss your project requirements and outline the next
                            steps.</p>
                    </div>
                </div>

                <div class="mil-accordion">
                    <h6>What technologies do you use for software development?</h6>
                </div>
                <div class="mil-panel">
                    <div class="mil-window">
                        <p>We use a diverse set of technologies including React, Angular, Node.js, Python, Java, and
                            more. Our technology stack is selected based on the specific needs and goals of each project
                            to ensure optimal performance and scalability.</p>
                    </div>
                </div>

                <div class="mil-accordion">
                    <h6>How long does it take to complete a project?</h6>
                </div>
                <div class="mil-panel">
                    <div class="mil-window">
                        <p>The timeline for completing a project varies depending on its complexity and scope. We work
                            closely with clients to define project milestones and deliverables, providing an estimated
                            timeline during the initial consultation.</p>
                    </div>
                </div>

                <div class="mil-accordion">
                    <h6>Can you provide support after the project is completed?</h6>
                </div>
                <div class="mil-panel">
                    <div class="mil-window">
                        <p>Yes, we offer ongoing support and maintenance services to ensure that your software continues to perform well and adapt to any changes or updates needed.</p>
                    </div>
                </div>


            </div>
        </div>



    </div>

</section>
@endsection
