<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
    <h3 class="text-center">Escolha o seu hotel</h3>

    <div class="row ">
        <div class="col-sm-12 col-md-12 col-lg-6 text-center p-2">
            <a href="<?php echo site_url('geral/hotel/') . 0 ?>">
                <img src="<?php echo base_url('assets/images/') . $images[0] ?>" width="100%" alt="" srcset="">
            </a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 text-center p-2">
            <a href="<?php echo site_url('geral/hotel/') . 1 ?>">
                <img src="<?php echo base_url('assets/images/') . $images[1] ?>" width="100%" alt="" srcset="">
            </a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 text-center p-2">
            <a href="<?php echo site_url('geral/hotel/') . 2 ?>">
                <img src="<?php echo base_url('assets/images/') . $images[2] ?>" width="100%" alt="" srcset="">
            </a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 text-center p-2">
            <a href="<?php echo site_url('geral/hotel/') . 3 ?>">
                <img src="<?php echo base_url('assets/images/') . $images[3] ?>" width="100%" alt="" srcset="">
            </a>
        </div>
    </div>
</div>