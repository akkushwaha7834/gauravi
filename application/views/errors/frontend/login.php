        <!-- page-title -->
        <section class="page-title centred">
            <div class="bg-layer" style="background-image: url(<?= base_url() ?>public/web/images/background/breadcrumbb.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>Login</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->


       


        <!-- contact-style-two -->
        <section class="contact-style-two sec-pad">
            <div class="auto-container">
                <div class="row clearfix justify-content-center">
                    <div class="col-lg-8 col-md-12 col-sm-12 default-form  form-column">
                    <div class="content-box p-0 ">
                            <div class="sec-title mb_35 text-center">
                                <span class="sub-title">Login</span>
                                <h2>Welcome Back!!</h2>
                               <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos nulla non earum animi quidem ratione nam explicabo odit ducimus consequatur?</p>
                                
                            </div>

                        </div>
                        <div class="form-inner box-shadow rounded p-4">

                        <?php if ($this->session->flashdata('msz')): ?>
                        <div class="alert alert-success" role="alert">
                            <?= $this->session->flashdata('msz'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (validation_errors() !== ''): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <?php echo form_open(base_url('admin/auth/login')); ?>
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <?php if (isset($msg_email)) {
                                echo '<p class="error text-danger">' . $msg_email . '</p>';
                            } ?>
                            <?php if (isset($msg_password)) {
                                echo '<p class="error text-danger">' . $msg_password . '</p>';
                            } ?>
                            <div class="form-group">
                                <label for="">Email</label><br>
                                <input type="email" name="email" id="email" class=""
                                    placeholder="Email address" required>
                                    
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="" >Password</label>
                                <input type="password" name="password" id="password" class="mb-0"
                                    placeholder="Password" required>                                    
                                    <a href="<?= base_url('forgot_password') ?>" class="d-block mt-2">Forget Your Password?</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <img src="<?php echo $captcha['image']; ?>" class="capt" alt="CAPTCHA Image">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="captcha" class="" id="captcha"
                                    placeholder="CAPTCHA" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button
                                    class="theme-btn theme-btn-one"
                                    type="submit" value="Submit" name="submit" id="submit">Login<i
                                        class="ps-2 ri-arrow-right-line"></i></button>
                            </div>
                           
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                            
                               
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-style-two end -->


       

