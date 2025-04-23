<?php

function codelibry_header_menu_modification($items, $args) {
    if ($args->theme_location !== 'header-menu') {
        return $items;
    }

    // Organize menu items into parent and child items
    $menu_structure = [];

    foreach ($items as $item) {
        if ($item->menu_item_parent == 0) {
            $menu_structure[$item->ID] = [
                'item' => $item,
                'children' => []
            ];
        } else {
            // Child items
            $menu_structure[$item->menu_item_parent]['children'][] = $item;
        }
    }

    foreach ($menu_structure as &$menu_entry) {
        $item = &$menu_entry['item'];
        $children = $menu_entry['children'];

        $has_mega_menu = get_field('has_mega_menu', $item);
        $description = get_field('description', $item);
        $title = get_field('title', $item) ?: $item->title;
        $icon_id = get_field('icon', $item);
        $icon_url = $icon_id ? wp_get_attachment_url($icon_id) : '';
        $button = get_field('button', $item);
        $button_url = $button['url'] ?? '';
        $button_text = $button['title'] ?? 'Learn More';

        // Check if it has a mega menu
        if ($has_mega_menu) {
            $item->title = '<a class="dropdown"><strong>' . $item->title . '</strong></a>';
            $item->classes[] = 'has-children';

            $mega_menu_html = '<div class="pane"><div class="flex width-100">';

            // Intro section
            if ($description) {
                $mega_menu_html .= '<div class="intro">';
                $mega_menu_html .= '<h3>' . esc_html($title) . '</h3>';
                $mega_menu_html .= '<p><small>' . esc_html($description) . '</small></p>';
                if ($button_url) {
                    $mega_menu_html .= '<a href="' . esc_url($button_url) . '" class="button">' . esc_html($button_text) . '</a>';
                }
                $mega_menu_html .= '</div>';
            }

            // Signposts (child menu items)
            if (!empty($children)) {
                $mega_menu_html .= '<div class="signposts">';
                foreach ($children as $child_item) {
                    $child_icon_id = get_field('icon', $child_item);
                    $child_icon_url = $child_icon_id ? wp_get_attachment_url($child_icon_id) : '';
                    $child_title = esc_html($child_item->title);
                    $child_url = esc_url($child_item->url);

                    $mega_menu_html .= '<a href="' . $child_url . '" target="_self">';
                    if ($child_icon_url) {
                        $mega_menu_html .= '<img src="' . esc_url($child_icon_url) . '" alt="">';
                    }
                    $mega_menu_html .= $child_title . '</a>';
                }
                $mega_menu_html .= '</div>'; // Close signposts
            }

            $mega_menu_html .= '</div></div>'; // Close flex + pane
            $item->title .= $mega_menu_html;

        // Does not have mega menu
        } else {
            $children = $menu_entry['children'];

            if(!empty($children)) {
              $item->title = '<a class="dropdown">' . esc_html($title) . '</a>';
              $item->classes[] = 'has-children'; 
              $item->classes[] = 'relative'; 

              $submenu = '<div class="pane small"><ul class="menu vertical">';

              foreach ($children as $child_item) {
                  $child_icon_id = get_field('icon', $child_item);
                  $child_icon_url = $child_icon_id ? wp_get_attachment_url($child_icon_id) : '';
                  $child_title = esc_html($child_item->title);
                  $child_url = esc_url($child_item->url);
                  $submenu .= '<li><a href="' . $child_url . '" target="_self">';
                  if ($child_icon_url) {
                      $submenu .= '<img src="' . esc_url($child_icon_url) . '" alt="">';
                  }
                  $submenu .= $child_title . '</a></li>';
              }

              $submenu .= '</ul></div>';

              $item->title .= $submenu;
            }
        }
    } 
    

    return array_values(array_column($menu_structure, 'item')); // Return only modified parent items
}
add_filter('wp_nav_menu_objects', 'codelibry_header_menu_modification', 10, 2);

