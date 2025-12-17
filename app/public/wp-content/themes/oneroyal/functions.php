<?php
// Enqueue parent theme styles
add_action( 'wp_enqueue_scripts', 'oneroyal_enqueue_styles' );
function oneroyal_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// Enqueue child theme styles + custom-header.css
// add_action( 'wp_enqueue_scripts', 'child_theme_scripts' );
// function child_theme_scripts() {
//     // Main child theme style
//     wp_enqueue_style(
//         'child-style',
//         get_stylesheet_uri(), // Points to style.css in your child theme
//         array( 'parent-style' )
//     );

//     // Enqueue custom-header.css inside custom-css directory
//     wp_enqueue_style(
//         'custom-header-style',
//         get_stylesheet_directory_uri() . '/custom-css/custom-header.css',
//         array( 'child-style' ), // ensures it loads after child-style
//         '1.0.0',
//         'all'
//     );
// }




/**
 * Shortcode to display ACF Repeater "feature_cards"
 */
function feature_cards_shortcode() {
    // Start output buffering
    ob_start();

    // Check if repeater has any rows
    if ( have_rows('feature_cards') ) {
        echo '<div class="feature-cards-wrapper">';

        // Loop through each row
        while ( have_rows('feature_cards') ) {
            the_row();

            // Grab sub field values
            $icon         = get_sub_field('icon__fc');          // Returns an array if set to Image return format
            $title        = get_sub_field('card_title__fc');
            $description  = get_sub_field('card_description__fc');
            $link_text    = get_sub_field('card_link_text__fc');
            $link_url     = get_sub_field('card_link_url__fc');

            // Start card HTML
            echo '<div class="feature-card">';

            // Icon
            if ( $icon ) {
                // Example: <img src="..." alt="..." />
                echo '<div class="feature-card-icon">';
                echo '<img src="' . esc_url($icon['url']) . '" alt="' . esc_attr($icon['alt']) . '" />';
                echo '</div>';
            }

            // Card Title
            if ( $title ) {
                echo '<h3 class="feature-card-title t-20 fw-600">' . esc_html($title) . '</h3>';
            }

            // Card Description
            if ( $description ) {
                echo '<p class="feature-card-description t-16 fw-400">' . esc_html($description) . '</p>';
            }

            // Link Text & URL
            if ( $link_text && $link_url ) {
                // e.g. "Learn more →"
                echo '<a class="feature-card-link t-16 fw-500" href="' . esc_url($link_url) . '">';
                echo esc_html($link_text);
                echo '</a>';
            }

            // End card
            echo '</div>';
        }

        echo '</div>'; // Close .feature-cards-wrapper
    } else {
        // No rows found
        echo '<!-- No feature_cards data found -->';
    }

    // Return the buffered output
    return ob_get_clean();
}
add_shortcode('feature_cards', 'feature_cards_shortcode');

// Register Custom Post Type: Careers
function create_careers_post_type() {
    $args = array(
        'label'              => 'Careers',
        'labels'             => array(
            'name'          => 'Careers',
            'singular_name' => 'Career',
            'add_new_item'  => 'Add New Career',
            'edit_item'     => 'Edit Career',
        ),
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'careers'),
        'menu_icon'          => 'dashicons-businessman',
        'supports'           => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('careers', $args);
}

add_action('init', 'create_careers_post_type');

/**
 * TranslatePress Language Switcher Toggle
 */
function translatepress_language_switcher_toggle() {
    ?>
    <script>
    jQuery(document).ready(function($) {
        console.log('TranslatePress toggle script loaded');
        
        // Function to close language switcher
        function closeLangSwitcher() {
            var $trpSwitcher = $('.trp-language-switcher.trp-language-switcher-container');
            if ($trpSwitcher.length === 0) {
                $trpSwitcher = $('.trp-language-switcher');
            }
            
            if ($trpSwitcher.length > 0 && $trpSwitcher.hasClass('active')) {
                $trpSwitcher.removeClass('active');
                console.log('Language switcher closed');
            }
        }
        
        // Toggle active class on trp-language-switcher when lang-switcher-toggle is clicked
        $(document).on('click', '#lang-switcher-toggle', function(e) {
            console.log('Lang switcher toggle clicked');
            e.preventDefault();
            e.stopPropagation();
            
            // Find the trp-language-switcher with trp-language-switcher-container class
            var $trpSwitcher = $('.trp-language-switcher.trp-language-switcher-container');
            
            if ($trpSwitcher.length > 0) {
                $trpSwitcher.toggleClass('active');
                console.log('Toggled active class on trp-language-switcher-container');
                console.log('Current classes:', $trpSwitcher.attr('class'));
            } else {
                console.log('trp-language-switcher-container not found');
                
                // Fallback: try just .trp-language-switcher
                var $fallbackSwitcher = $('.trp-language-switcher');
                if ($fallbackSwitcher.length > 0) {
                    $fallbackSwitcher.toggleClass('active');
                    console.log('Toggled active class on .trp-language-switcher (fallback)');
                }
            }
            
            return false;
        });
        
        // Close language switcher when clicking outside
        $(document).on('click', function(e) {
            var $target = $(e.target);
            
            // Check if click is outside the language switcher area
            if (!$target.closest('.mobile-lang-switcher').length && 
                !$target.closest('#lang-switcher-toggle').length &&
                !$target.closest('.trp-language-switcher').length) {
                closeLangSwitcher();
            }
        });
        
        // Prevent clicks inside the language switcher from closing it
        $(document).on('click', '.mobile-lang-switcher, .trp-language-switcher', function(e) {
            e.stopPropagation();
        });
        
        // Debug: log what elements we can find
        console.log('lang-switcher-toggle elements found:', $('#lang-switcher-toggle').length);
        console.log('trp-language-switcher-container elements found:', $('.trp-language-switcher.trp-language-switcher-container').length);
        console.log('trp-language-switcher elements found:', $('.trp-language-switcher').length);
    });
    </script>
    <?php
}
add_action('wp_footer', 'translatepress_language_switcher_toggle');

/**
 * Get current language from TranslatePress
 */
function getCurrentLocale() {
    // Method 1: Check TranslatePress global variable
    if (isset($GLOBALS['TRP_LANGUAGE']) && !empty($GLOBALS['TRP_LANGUAGE'])) {
        return convertToShortLanguageCode($GLOBALS['TRP_LANGUAGE']);
    }
    
    // Method 2: Try to get from URL
    if (isset($_SERVER['REQUEST_URI'])) {
        $request_uri = $_SERVER['REQUEST_URI'];
        $url_parts = explode('/', trim($request_uri, '/'));
        
        // Update this array with your site's language codes
        $supported_languages = array('en', 'fr', 'es', 'de', 'it', 'pt', 'nl', 'ru', 'zh', 'cn', 'ja', 'ar', 'tr');
        
        if (!empty($url_parts[0]) && in_array($url_parts[0], $supported_languages)) {
            return convertToShortLanguageCode($url_parts[0]);
        }
    }
    
    // Method 3: Check TranslatePress cookie
    if (isset($_COOKIE['trp_language']) && !empty($_COOKIE['trp_language'])) {
        return convertToShortLanguageCode($_COOKIE['trp_language']);
    }
    
    // Method 4: Get from WordPress locale
    if (function_exists('get_locale')) {
        $locale = get_locale();
        if ($locale && strlen($locale) >= 2) {
            return convertToShortLanguageCode($locale);
        }
    }
    
    // Default fallback
    return 'en';
}

/**
 * Convert WordPress locale codes to short language codes
 */
function convertToShortLanguageCode($locale) {
    // Mapping of common WordPress locales to your short codes
    $locale_map = array(
        'en_US' => 'en',
		'id_ID' => 'id',
		'pl_PL' => 'pl',
		'pt_PT' => 'pt',
		'ar' => 'ar',
		'ms_MY' => 'ms',
		'vi' => 'vi',
		'th' => 'th',
		'fa_IR' => 'fa',
        'zh_CN' => 'cn',
        'fr_FR' => 'fr',
        'es_ES' => 'es',
    );
    
    // If exact match exists in mapping, use it
    if (isset($locale_map[$locale])) {
        return $locale_map[$locale];
    }
    
    // If it's already a short code, return as is
    if (strlen($locale) <= 3 && ctype_alpha($locale)) {
        return strtolower($locale);
    }
    
    // Extract language part from locale (e.g., 'en' from 'en_US')
    $parts = explode('_', $locale);
    $language = strtolower($parts[0]);
    
    // Special handling for Chinese
    if ($language === 'zh') {
        return 'cn';
    }
    
    return $language;
}

/**
 * Get base URL with current language
 */
function getRoyalBaseUrl() {
    return '//www.oneroyal.com/' . getCurrentLocale();
}

/**
 * Generate localized path
 */
function localePath($path) {
    $current_locale = getCurrentLocale();
    $base_url = '//www.oneroyal.com/' . $current_locale;
    
    // Add set_lang parameter to ensure language change is triggered
    $separator = (strpos($path, '?') !== false) ? '&' : '?';
    
    return $base_url . $path . $separator . 'set_lang=' . $current_locale;
}




/**
 * Exclude OneRoyal from TranslatePress translations
 * Works for Arabic, Farsi, and all other languages
 */

// Method 1: Skip translation processing for OneRoyal
add_filter('trp_skip_gettext_processing', 'exclude_oneroyal_all_languages', 10, 4);
function exclude_oneroyal_all_languages($skip, $translation, $text, $domain) {
    $exclude_terms = array('OneRoyal', 'One Royal', 'ONEROYAL', 'oneroyal');
    
    foreach ($exclude_terms as $term) {
        if (stripos($text, $term) !== false || stripos($translation, $term) !== false) {
            return true;
        }
    }
    return $skip;
}

// Method 2: Force original for all OneRoyal strings
add_filter('trp_translate_string', 'force_oneroyal_original_all_lang', 100, 5);
function force_oneroyal_original_all_lang($translated_string, $original_string, $language_code, $block_type, $translation_object) {
    $exclude_terms = array('OneRoyal', 'One Royal', 'ONEROYAL', 'oneroyal');
    
    foreach ($exclude_terms as $term) {
        if (stripos($original_string, $term) !== false) {
            return $original_string;
        }
    }
    return $translated_string;
}

// Method 3: Protect in final HTML output (CRITICAL for both AR and FA)
add_filter('trp_translated_html', 'protect_oneroyal_final_output', 999);
function protect_oneroyal_final_output($translated_html) {
    // All possible translations we want to replace back to OneRoyal
    $translated_variations = array(
        // Arabic variations
        'ون رويال',
        'وان رويال',
        'ونرويال',
        'وانرويال',
        'ون‌رویال',
        
        // Farsi (Persian) variations
        'وان رویال',
        'ون رویال',
        'یک رویال',
        'یک‌رویال',
        'وانروyal',
        'ونروyal',
        
        // Mixed Latin-Arabic/Farsi
        'وان royal',
        'ون royal',
        
        // Any other capitalization
        'one royal',
        'One royal',
        'ONE ROYAL',
    );
    
    // Replace all variations with OneRoyal
    foreach ($translated_variations as $variation) {
        if ($variation !== 'OneRoyal') {
            // Case-insensitive replacement
            $translated_html = preg_replace(
                '/' . preg_quote($variation, '/') . '/ui',
                'OneRoyal',
                $translated_html
            );
        }
    }
    
    return $translated_html;
}

// Method 4: Protect in specific content filters
add_filter('the_content', 'force_oneroyal_in_content', 999);
add_filter('the_title', 'force_oneroyal_in_content', 999);
add_filter('widget_text', 'force_oneroyal_in_content', 999);
add_filter('the_excerpt', 'force_oneroyal_in_content', 999);

function force_oneroyal_in_content($content) {
    // All Arabic/Farsi variations
    $patterns = array(
        '/وان\s*رویال/ui',
        '/ون\s*رویال/ui',
        '/وان\s*رويال/ui',
        '/ون\s*رويال/ui',
        '/یک\s*رویال/ui',
        '/یک‌رویال/ui',
        '/وانرویال/ui',
        '/ونرویال/ui',
        '/وانروyal/ui',
        '/ونروyal/ui',
        '/one\s*royal/i',
    );
    
    foreach ($patterns as $pattern) {
        $content = preg_replace($pattern, 'OneRoyal', $content);
    }
    
    return $content;
}