
        <!-- page-title -->
        <section class="page-title centred">
            <div class="bg-layer" style="background-image: url(<?= base_url() ?>public/web/images/background/breadcrumbb.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>Consultation</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Consultation</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->

        <!-- contact-style-two -->
        <section class="contact-style-two sec-pad bg-color-1">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box mr_70">
                            <div class="sec-title mb_35">
                                <span class="sub-title">Consultation</span>
                                <h2>Request for Our Free <br />Consultation</h2>   
                                <p class="mt-4"> Get personalized guidance with our free consultation! Our experts are here to answer your questions, offer tailored advice, and help you make informed decisions. Book your session today and start your journey to success!  </p>
                            </div>
                         
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                    <div class="content_block_four">
                    <div class="content-box p_relative ml_30 mt_20 centred">
                        <h3></h3>
                        <div class="form-inner">
                            
                            <form action="<?= base_url('consultation_submit_data') ?>" method="post" class="default-form needs-validation" novalidate>
    <div class="row clearfix">
      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
        <input type="text" name="name" placeholder="Your name" class="form-control" required>
        <div class="invalid-feedback">Please enter your name.</div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
        <input type="email" name="email" placeholder="Email address" class="form-control" required>
        <div class="invalid-feedback">Please enter a valid email address.</div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
        <input type="text" name="mobile" placeholder="Phone number" class="form-control" required pattern="^[0-9]{10}$">
        <div class="invalid-feedback">Please enter a valid 10-digit phone number.</div>
      </div>
      <!--<div class="col-lg-6 col-md-6 col-sm-12 form-group">-->
      <!--  <input type="text" name="company" placeholder="Company Name" class="form-control" required>-->
      <!--  <div class="invalid-feedback">Please enter your company name.</div>-->
      <!--</div>-->
      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
        <div class="select-box">
    <select class="form-control" name="service" required>
        <option value="" disabled selected>Select a Service</option>
        <?php foreach ($service_view as $row): ?>
            <option value="<?= htmlspecialchars($row->service_name); ?>"><?= htmlspecialchars($row->service_name); ?></option>
        <?php endforeach; ?>
    </select>
    <div class="invalid-feedback">Please select a service.</div>
</div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 form-group">
        <textarea name="message" class="form-control" placeholder="Message" required></textarea>
        <div class="invalid-feedback">Please enter your message.</div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
        <button type="submit" class="btn btn-primary theme-btn-one">Send Request</button>
      </div>
    </div>
  </form>
                        </div>
                    </div>
                </div> 
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-style-two end -->


        
