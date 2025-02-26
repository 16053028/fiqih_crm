<?php
// application/config/form_validation.php



$config = array(

    'master_login_form' => array(
        array(
            'field' => 'inputUsername',
            'label' => 'Username',
            'rules' => 'required|min_length[6]|is_unique[tbl_login.username]'
        ),
        array(

            'field' => 'inputPassword',
            'label' => 'Password',
            'rules' => 'required|min_length[6]',
            'errors' => array(
                        'required' => 'You must provide a %s.',
                ),
        ),
        array(

            'field' => 'inputConfPass',
            'label' => 'Password Confirmation',
            'rules' => 'required|matches[inputPassword]',
            ),
        array(
            'field' => 'inputLevel',
            'label' => 'Level Select',
            'rules' => 'required'
        ),
    ),

    'master_login_form_update' => array(

        array(
            'field' => 'inputUsernameUpdate',
            'label' => 'Username',
            'rules' => 'required|min_length[6]'
        ),

        array(

            'field' => 'inputPassword',
            'label' => 'Password',
            'rules' => 'required|min_length[6]',
            'errors' => array(
                        'required' => 'You must provide a %s.',
                ),
        ),
        
        array(

            'field' => 'inputConfPass',
            'label' => 'Password Confirmation',
            'rules' => 'required|matches[inputPassword]',
            ),
        array(
            'field' => 'inputLevel',
            'label' => 'Level Select',
            'rules' => 'required'
        ),
    ),

    
    'master_level_form' => array(
        array(
            'field' => 'inputLevel',
            'label' => 'Level',
            'rules' => 'required'
        ),
    ),

    'auth' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required',
            'error' => array(
                'required'      => '* The Username field cannot be empty',
            )
        ),

        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required',
            'error' => array(
                'required'      => '* The Password field cannot be empty',
            )
        ),
    ),

    'master_layanan_form' => array(
        array(
            'field' => 'inputLayanan',
            'label' => 'Service',
            'rules' => 'required'
        ),
        array(
            'field' => 'inputBiaya',
            'label' => 'Biaya',
            'rules' => 'required'
        ),
        
    ),

    'master_services_form' => array(
        array(
            'field' => 'inputCustomerName',
            'label' => 'Customer Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'inputTelp',
            'label' => 'Telp',
            'rules' => 'required'
        ),
        array(
            'field' => 'inputAddress',
            'label' => 'Address',
            'rules' => 'required'
        ),

    ),

);

?>