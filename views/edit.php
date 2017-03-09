<?php
$auth = SwpmAuth::get_instance();
$user_data = (array) $auth->userData;
$user_data['membership_level_alias'] = $auth->get('alias');
extract($user_data, EXTR_SKIP);
?>
<div class="swpm-edit-profile-form">
    <form id="swpm-editprofile-form" name="swpm-editprofile-form" method="post" action="">
        <?php wp_nonce_field('swpm_profile_edit_nonce_action', 'swpm_profile_edit_nonce_val') ?>
        <table>
            <tr class="swpm-profile-username-row">
                <td><label for="user_name"><?php echo SwpmUtils::_('Username'); ?></label></td>
                <td><?php echo $user_name ?></td>
            </tr>
            <tr class="swpm-profile-email-row">
                <td><label for="email"><?php echo SwpmUtils::_('Email'); ?></label></td>
                <td><input type="text" id="email" class="validate[required,custom[email],ajax[ajaxEmailCall]]" value="<?php echo $email; ?>" size="50" name="email" /></td>
            </tr>
            <tr class="swpm-profile-password-row">
                <td><label for="password"><?php echo SwpmUtils::_('Password'); ?></label></td>
                <td><input type="text" id="password" value="" size="50" name="password" placeholder="<?php echo SwpmUtils::_('Leave empty to keep the current password'); ?>" /></td>
            </tr>
            <tr class="swpm-profile-password-retype-row">
                <td><label for="password_re"><?php echo SwpmUtils::_('Repeat Password'); ?></label></td>
                <td><input type="text" id="password_re" value="" size="50" name="password_re" placeholder="<?php echo SwpmUtils::_('Leave empty to keep the current password'); ?>" /></td>
            </tr>

<tr class="swpm-profile-height-row">
                <td><label for="height"><?php echo SwpmUtils::_('Height(cm)'); ?></label></td>
                <td><input type="text" id="height" value="<?php echo $height; ?>" size="50" name="height" /></td>
            </tr>

<tr class="swpm-profile-weight-row">
                <td><label for="weight"><?php echo SwpmUtils::_('Weight(kg)'); ?></label></td>
                <td><input type="text" id="weight" value="<?php echo $weight; ?>" size="50" name="weight" /></td>
            </tr>

<tr class="swpm-profile-staffcode-row">
                <td><label for="staff_code"><?php echo SwpmUtils::_('Staff Code'); ?></label></td>
                <td><input type="text" id="staff_code" value="<?php echo $staff_code; ?>" size="50" name="staff_code" /></td>
            </tr>

            <tr class="swpm-profile-firstname-row">
                <td><label for="first_name"><?php echo SwpmUtils::_('First Name'); ?></label></td>
                <td><input type="text" id="first_name" value="<?php echo $first_name; ?>" size="50" name="first_name" /></td>
            </tr>
            <tr class="swpm-profile-lastname-row">
                <td><label for="last_name"><?php echo SwpmUtils::_('Last Name'); ?></label></td>
                <td><input type="text" id="last_name" value="<?php echo $last_name; ?>" size="50" name="last_name" /></td>
            </tr>
            <tr class="swpm-profile-phone-row">
                <td><label for="phone"><?php echo SwpmUtils::_('Phone'); ?></label></td>
                <td><input type="text" id="phone" value="<?php echo $phone; ?>" size="50" name="phone" /></td>
            </tr>
            <tr class="swpm-profile-street-row">
                <td><label for="address_street"><?php echo SwpmUtils::_('Address'); ?></label></td>
                <td><input type="text" id="address_street" value="<?php echo $address_street; ?>" size="50" name="address_street" /></td>
            </tr>
            
            
            
          
           
            <tr class="swpm-profile-membership-level-row">
                <td><label for="membership_level"><?php echo SwpmUtils::_('Membership Level'); ?></label></td>
                <td>
                    <?php echo $membership_level_alias; ?>
                </td>
            </tr>
        </table>
        <p class="swpm-edit-profile-submit-section">
            <input type="submit" value="<?php echo SwpmUtils::_('Update') ?>" class="swpm-edit-profile-submit" name="swpm_editprofile_submit" />
        </p>
        <?php echo SwpmUtils::delete_account_button(); ?>

        <input type="hidden" name="action" value="custom_posts" />

    </form>
</div>
<script>
    jQuery(document).ready(function($) {
        $.validationEngineLanguage.allRules['ajaxEmailCall']['url'] = '<?php echo admin_url('admin-ajax.php'); ?>';
        $.validationEngineLanguage.allRules['ajaxEmailCall']['extraData'] = '&action=swpm_validate_email&member_id=<?php echo SwpmAuth::get_instance()->get('member_id'); ?>';
        $("#swpm-editprofile-form").validationEngine('attach');
    });
</script>