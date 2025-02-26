<?php 
if ($this->session->userdata('id_level') == 2 ) {
    $menu = '_partials/menu/manager';
}else if ($this->session->userdata('id_level') == 3 ) {
    $menu = '_partials/menu/sales';
}else {
    $menu = '_partials/menu/super';
}


$this->load->view($menu);
?>
