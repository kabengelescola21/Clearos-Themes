<?php
/**
 * Head tags handler for the theme.
 *
 * @category  Theme
 * @package   ClearOS
 * @author    ClearFoundation <developer@clearfoundation.com>
 * @copyright 2014 ClearFoundation
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link      http://www.clearfoundation.com/docs/developer/theming/
 */

//////////////////////////////////////////////////////////////////////////////
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
///////////////////////////////////////////////////////////////////////////////

/**
 * Returns additional <head> data required for the theme.
 *
 * @param string $settings custom theme settings
 *
 * @return string HTML output
 */

function theme_page_head($settings)
{
    $framework =& get_instance();
    $theme_url = clearos_theme_url('ClearOS-Admin');

    $userdata = $framework->session->userdata ?: array();
    $options = @$userdata['theme_ClearOS-Admin'];

    $version_theme_override = 'no-edition';
    preg_match('/(community|business|home|hosted)/i', $userdata['os_name'], $match);

    if (!empty($match)) {
        $version_theme_override = strtolower($match[1]);
    } 

    $output = "
        <!-- Theme Styles -->
        <link rel='stylesheet' type='text/css' media='screen' href='{$theme_url}/css/bootstrap.css?v=3.0'>
        <link rel='stylesheet' type='text/css' media='screen' href='{$theme_url}/css/fontawesome.css?v=4.2.0'>
        <link rel='stylesheet' type='text/css' media='screen' href='{$theme_url}/css/theme.css'>

        <link id='theme-os-css' rel='stylesheet' type='text/css' media='screen' href='{$theme_url}/css/theme-{$version_theme_override}.css'>

        <link rel='stylesheet' type='text/css' media='screen' href='{$theme_url}/css/colorpicker/bootstrap-colorpicker.min.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='{$theme_url}/css/lightbox.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='{$theme_url}/css/dataTables.responsive.css'>

        <!-- FAVICONS -->
        <link rel='shortcut icon' href='{$theme_url}/img/favicon.ico' type='image/x-icon'>
        <link rel='icon' href='{$theme_url}/img/favicon.ico' type='image/x-icon'>";

    $output .= theme_primary_color_override(array(
        @$options['color_1'] ?: null,
        @$options['color_2'] ?: null,
        @$options['color_3'] ?: null
    ));

    return $output;
}


function theme_primary_color_override($colors) {
    $regex = '/^#([0-9a-f][0-9a-f])([0-9a-f][0-9a-f])([0-9a-f][0-9a-f])$/i';

    foreach ($colors as $key => $value) {
        if (!(is_string($value) && preg_match($regex, $value))) {
            $colors[$key] = null;
        }
    }

    $rgb = null;
    if(!empty($colors[0])) {
        preg_match($regex, $colors[0], $rgb);

        $rgb[1] = hexdec($rgb[1]) / 255;
        $rgb[2] = hexdec($rgb[2]) / 255;
        $rgb[3] = hexdec($rgb[3]) / 255;
    }

    ob_start();
    include dirname(__FILE__) . '/_head-custom-colors.php';
    return ob_get_flush();
}
