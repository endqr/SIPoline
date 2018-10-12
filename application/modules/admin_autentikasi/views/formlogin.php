    <div class="container">
        <div class="row">
					<?php echo form_open('/admin_autentikasi/proseslogin');?>
					<div class="well">
					<h4><?php echo $judul ?></h4>
					<!--jalankan validasi pesan -->
					<?php if($this->session->flashdata('pesan1')){?>
						<div class="alert alert-warning" role="alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<h4>Peringatan</h4>
							<?php echo $this->session->flashdata('pesan2');?>
						</div>
					<?php }else if($this->session->flashdata('pesan2')){?>
						<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismis="alert">x</button>
							<h4>Ada Kesalahan</h4>
							<?php echo $this->session->flashdata('pesan2');?>
						</div>
					<?php };?>
					<!--end validasi-->
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User Name" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" onclick='load_masking()'>Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>