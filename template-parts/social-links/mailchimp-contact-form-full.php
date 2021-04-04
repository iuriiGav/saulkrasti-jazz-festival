<!-- Begin Mailchimp Signup Form -->


<div class="full-form-middle-viewport">


<div class="full-subscribe-form-message full-subscribe-form-card ig-card__line-high">

<?php 

echo ig_gav_get_global_text_wp_kses_filter('global_subscribe_to_mailing_list_when_upcoming_concerts_are_disabled_message')  

?>

</div>
<div class="subscribe-form-all-inputs-container">

<div id="mc_embed_signup">
    <form action="https://saulkrastijazz.us1.list-manage.com/subscribe/post?u=4999f97c85f982abb66d2608f&amp;id=811326199b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll" class="">
            <div class="">

            <label for="mce-FNAME" class="form-label full-contact-form-label"><?php echo ig_gav_get_global_text('global_newsletter_name_label') ?></label>
			<input type="text" value="" name="FNAME" class="name form-control " id="mce-FNAME" placeholder="<?php echo ig_gav_get_global_text('global_newsletter_placeholder_name') ?>">
            
			<label for="mce-EMAIL" class="form-label full-contact-form-label"><?php echo ig_gav_get_global_text('global_newsletter_email_label') ?></label>
           	<input type="email" value="" name="EMAIL" class="email form-control" id="mce-EMAIL" placeholder="<?php echo ig_gav_get_global_text('global_newsletter_placeholder_email') ?>" required>
            <div class="mc-field-group">
	
</div>

            <div class="mc-field-group">
                <label for="mce-MMERGE2" class="full-contact-form-label"><?php echo ig_gav_get_global_text('global_newsletter_preferred_language_label') ?> </label>
                <select name="MMERGE2" class="form-select" id="mce-MMERGE2">
                    <?php if (get_bloginfo("language") === 'lv-LV') : ?>

                        <option value="Latviešu" selected>Latviešu</option>
                        <option value="English">English</option>

                    <?php else : ?>
                        <option value="Latviešu">Latviešu</option>
                        <option value="English" selected>English</option>
                    <?php endif; ?>

                </select>
            </div>


            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_4999f97c85f982abb66d2608f_811326199b" tabindex="-1" value=""></div>
           <input type="submit" value="<?php echo ig_gav_get_global_text('global_newsletter_subscribe_button_text') ?>" name="subscribe" id="mc-embedded-subscribe" class="btnc btnc-brand-square btnc-brand-square--subscribe btnc-brand-square--subscribe--mt ">
           </div>

        </div>
    </form>
</div>
</div><!-- .subscribe-form-all-inputs-container -->

</div>
<!--End mc_embed_signup-->