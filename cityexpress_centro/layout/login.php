<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * A login page layout for the cityexpress_centro theme.
 * @package    theme_cityexpress_centro
 * @copyright  2015 onwards LMSACE Dev Team (http://www.lmsace.com)
 * @author    LMSACE Dev Team
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot."/theme/cityexpress_centro/classes/header_block.php");
$headervalues = header_contents();
$headervalues['navdraweropen'] = false;
require_once($CFG->dirroot."/theme/cityexpress_centro/classes/main_block.php");
$mainblock = main_block();
require_once($CFG->dirroot."/theme/cityexpress_centro/classes/footer_block.php");
$footer = footer_template();
$check = array_merge($mainblock, $headervalues);
$fulltemplate = array_merge($check, $footer);
$OUTPUT->doctype();
echo $OUTPUT->render_from_template('theme_cityexpress_centro/login', $fulltemplate);
