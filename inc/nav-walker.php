<?php

class Custom_Nav_Walker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = null) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class='navigation-menu__submenu'>\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
			$indent = ($depth) ? str_repeat("\t", $depth) : '';
			$css_classes = empty($item->classes) ? array() : (array) $item->classes;
			$css_classes[] = 'navigation-menu__item';

			if ($args->walker->has_children && $depth === 0) {
					$css_classes[] = 'navigation-menu__item--has-submenu';
			}

			$css_classes = implode(' ', apply_filters('nav_menu_css_class', array_filter($css_classes), $item, $args));

			if ($depth === 1) {
					// Add the class to submenu items
					$css_classes .= ' navigation-menu__submenu-item';
			}

			$output .= $indent . '<li id="menu-item-' . $item->ID . '" class="' . esc_attr($css_classes) . '">';
			$output .= '<a href="' . esc_attr($item->url) . '" class="navigation-menu__link">';

			if ($depth === 1) {
					$output .= '<img src="dist/images/general/welding-icon.svg" alt="" class="navigation-menu__submenu-icon">';
			} else {
					$output .= '<span class="navigation-menu__indicator">01</span>';
			}

			$output .= '<span class="navigation-menu__label">' . esc_html($item->title) . '</span>';

			if ($args->walker->has_children && $depth === 0) {
					$output .= '<button class="navigation-menu__submenu-toggle">Open Submenu</button>';
			}

			$output .= '</a>';
	}
}

class Footer_Nav_Walker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = null) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class='footer-navigation__submenu'>\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
			$indent = ($depth) ? str_repeat("\t", $depth) : '';
			$css_classes = empty($item->classes) ? array() : (array) $item->classes;

			$css_classes[] = 'footer-navigation__list-item';

			$css_classes = implode(' ', apply_filters('nav_menu_css_class', array_filter($css_classes), $item, $args));

			$output .= $indent . '<li id="menu-item-' . $item->ID . '" class="' . esc_attr($css_classes) . '">';
			$output .= '<a href="' . esc_attr($item->url) . '" class="footer-navigation__link">';
			$output .= esc_html($item->title);
			$output .= '</a>';
	}
}