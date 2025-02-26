<?php 
if ($this->session->userdata('id_level') == 2 ) {
    $menu = '_partials/menu/sales';
}else if ($this->session->userdata('id_level') == 4 ) {
    $menu = '_partials/menu/manager';
}else {
    $menu = '_partials/menu/super';
}


$this->load->view($menu);
?>
