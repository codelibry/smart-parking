<?php

class Mobile_Menu_Walker extends Walker_Nav_Menu {
    private $accordion_id_count = 0;

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $id = 'submenu-' . ++$this->accordion_id_count;
        $output .= '<ul class="menu vertical nested submenu is-accordion-submenu" data-submenu="" role="group" style="display: none;" aria-labelledby="' . esc_attr($this->parent_id) . '" aria-hidden="true" id="' . esc_attr($id) . '">';
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '</ul>';
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $has_children = in_array('menu-item-has-children', $item->classes);
        $li_classes = ['is-submenu-item', 'is-accordion-submenu-item'];
        $a_classes = [];
        $role = 'menuitem';

        if ($depth === 0) {
            $li_classes = $has_children ? ['is-accordion-submenu-parent'] : [];
        }

        $li_id = 'item-' . $item->ID;
        $submenu_id = 'submenu-' . $item->ID;

        $aria_controls = $has_children ? ' aria-controls="' . esc_attr($submenu_id) . '" aria-expanded="false" id="' . esc_attr($li_id) . '-link"' : '';

        $output .= '<li role="none" class="' . esc_attr(implode(' ', $li_classes)) . '"' . $aria_controls . '>';

        $output .= '<a href="' . esc_url($item->url) . '" role="' . esc_attr($role) . '">' . esc_html($item->title) . '</a>';

        if ($has_children) {
            $this->parent_id = $li_id . '-link';
        }
    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '</li>';
    }
}

