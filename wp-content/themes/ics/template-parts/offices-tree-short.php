<?php/** * Output vacancy -> offices taxonomy navigation tree short view. */?><?php// check permissions//var_dump( $GLOBALS['wp_post_types']['vacancies'] );?><?php// List terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)$taxonomy = 'vacancy-office';/*$args     = array(	'taxonomy'           => $taxonomy,	'show_count'         => TRUE,	'title_li'           => '',	'use_desc_for_title' => FALSE);*/ ?><!--<ul class="items">	<?php /*wp_list_categories( $args ); */ ?></ul>--><div class="office-tree-short">  <h4>Offices</h4>  <div class="items">    <?php    $args  = array(      'taxonomy' => $taxonomy,      //'hide_empty' => true,    );    $terms = get_terms($args);    /** Get terms that have children */    $hierarchy = _get_term_hierarchy($taxonomy);    /** Loop through every term */    foreach ($terms as $term) {      //Skip term if it has children      if ($term->parent) {        continue;      }      echo '<div class="item">';      echo '<div class="title">' . $term->name . '</div>';      /** If the term has children... */      if ($hierarchy[$term->term_id]) {        /** display them */        echo '<div class="children">';        foreach ($hierarchy[$term->term_id] as $child) {          /** Get the term object by its ID */          $child = get_term($child, $taxonomy);          // get term permalink.          $term_link = get_term_link($child);          //var_dump( $child );          echo '<div class="item">';          echo '- <a href="' . esc_url($term_link) . '">' . $child->name . '</a> <span>[' . $child->count . ']</span>';          echo '</div>';        }        echo '</div>';      }      echo '</div>';    } ?>  </div></div>