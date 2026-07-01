<?php get_header(); ?>

<main id="primary" class="single-photo">

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();

            $photo_id = get_the_ID();

            $reference = get_post_meta( $photo_id, 'reference', true );
            $type      = get_post_meta( $photo_id, 'type', true );
            $annee     = get_the_date( 'Y' );

            $categories = get_the_terms( $photo_id, 'categorie' );
            $formats    = get_the_terms( $photo_id, 'format' );

            $previous_photo = get_previous_post();
            $next_photo     = get_next_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-photo__article' ); ?>>

                <section class="single-photo__hero">

                    <div class="single-photo__infos">
                        <h1 class="single-photo__title"><?php the_title(); ?></h1>

                        <ul class="single-photo__meta">
                            <?php if ( $reference ) : ?>
                                <li>Référence : <?php echo esc_html( $reference ); ?></li>
                            <?php endif; ?>

                            <?php if ( $categories && ! is_wp_error( $categories ) ) : ?>
                                <li>Catégorie : <?php echo esc_html( $categories[0]->name ); ?></li>
                            <?php endif; ?>

                            <?php if ( $formats && ! is_wp_error( $formats ) ) : ?>
                                <li>Format : <?php echo esc_html( $formats[0]->name ); ?></li>
                            <?php endif; ?>

                            <?php if ( $type ) : ?>
                                <li>Type : <?php echo esc_html( $type ); ?></li>
                            <?php endif; ?>

                            <?php if ( $annee ) : ?>
                                <li>Année : <?php echo esc_html( $annee ); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="single-photo__image">
                        <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'large' );
                        }
                        ?>
                    </div>

                </section>

                <section class="single-photo__actions">

                    <div class="single-photo__contact">
                        <p>Cette photo vous intéresse ?</p>

                        <button
                            class="single-photo__contact-button js-open-contact-modal"
                            data-reference="<?php echo esc_attr( $reference ); ?>"
                            type="button"
                        >
                            Contact
                        </button>
                    </div>

                   <nav class="single-photo__navigation" aria-label="Navigation entre les photos">

                        <div class="single-photo__nav-preview">
                            <?php if ( $previous_photo ) : ?>
                                <span class="single-photo__nav-thumbnail single-photo__nav-thumbnail--previous">
                                    <?php echo get_the_post_thumbnail( $previous_photo->ID, 'thumbnail' ); ?>
                                </span>
                            <?php endif; ?>

                            <?php if ( $next_photo ) : ?>
                                <span class="single-photo__nav-thumbnail single-photo__nav-thumbnail--next">
                                    <?php echo get_the_post_thumbnail( $next_photo->ID, 'thumbnail' ); ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="single-photo__nav-arrows">
                            <?php if ( $previous_photo ) : ?>
                                <a class="single-photo__nav-link single-photo__nav-link--previous" href="<?php echo esc_url( get_permalink( $previous_photo ) ); ?>">
                                    <span class="single-photo__nav-arrow" aria-hidden="true">←</span>
                                    <span class="screen-reader-text">Photo précédente</span>
                                </a>
                            <?php endif; ?>

                            <?php if ( $next_photo ) : ?>
                                <a class="single-photo__nav-link single-photo__nav-link--next" href="<?php echo esc_url( get_permalink( $next_photo ) ); ?>">
                                    <span class="single-photo__nav-arrow" aria-hidden="true">→</span>
                                    <span class="screen-reader-text">Photo suivante</span>
                                </a>
                            <?php endif; ?>
                        </div>

                    </nav>

                </section>

            </article>

            <?php
        endwhile;
    endif;
    ?>

</main>

<?php get_footer(); ?>