<h2 class="section-header mt-5rem"><?php esc_html_e(get_field('baltic_drummers_league_heading'), 'saulkrasti-jazz-festival') ?></h2>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">


            <div class="content-card content-card__text-lg">
                <?php echo wp_kses_post(wpautop(get_field('baltic_drummers_league_about_league__text'))) ?>

            </div>

        </div>

    </div>
