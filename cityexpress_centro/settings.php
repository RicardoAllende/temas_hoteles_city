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
 * cityexpress_centro theme Settings page.
 * @package    theme_cityexpress_centro
 * @copyright  2015 onwards LMSACE Dev Team (http://www.lmsace.com)
 * @author    LMSACE Dev Team
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    $settings = new theme_boost_admin_settingspage_tabs('themesettingcityexpress_centro',
    get_string('cityexpress_centro_settings', 'theme_cityexpress_centro'));

    /* General Settings */
    $temp = new admin_settingpage('theme_cityexpress_centro_general', get_string('themegeneralsettings', 'theme_cityexpress_centro'));

    // This is the descriptor for Slide One.
    $name = 'theme_cityexpress_centro/theme_cityexpress_centro_generalsub1';
    $heading = get_string('generallogo_menu', 'theme_cityexpress_centro');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_cityexpress_centro/patternselect';
    $title = get_string('patternselect', 'theme_cityexpress_centro');
    $description = get_string('patternselectdesc', 'theme_cityexpress_centro');
    $default = 'default';
    $choices = array(
        'default' => get_string("blue", "theme_cityexpress_centro"),
        '1' => get_string("green", "theme_cityexpress_centro"),
        '2' => get_string("lavender", "theme_cityexpress_centro"),
        '3' => get_string("red", "theme_cityexpress_centro"),
        '4' => get_string("purple", "theme_cityexpress_centro")
    );

    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $pimg = array();
    global $CFG;

    // Logo file setting.
    $name = 'theme_cityexpress_centro/logo';
    $title = get_string('logo', 'theme_cityexpress_centro');
    $description = get_string('logodesc', 'theme_cityexpress_centro');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Primary menu position.
    $name = 'theme_cityexpress_centro/primarymenu';
    $title = get_string('primarymenu', 'theme_cityexpress_centro');
    $description = get_string('primarymenudesc', 'theme_cityexpress_centro');
    $default = get_string('primary_menu', 'theme_cityexpress_centro');
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $temp->add($setting);

    // Course menu.
    $name = 'theme_cityexpress_centro/cmenushow';
    $title = get_string('cmenushow', 'theme_cityexpress_centro');
    $description = get_string('cmenushowdesc', 'theme_cityexpress_centro');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    // Course menu position.
    $name = 'theme_cityexpress_centro/cmenuPosition';
    $title = get_string('cmenuPosition', 'theme_cityexpress_centro');
    $description = get_string('cmenuPosition_desc', 'theme_cityexpress_centro');
    $default = '2';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $temp->add($setting);

    // This is the descriptor for Slide One.
    $name = 'theme_cityexpress_centro/theme_cityexpress_centro_miscellaneous';
    $heading = get_string('miscellaneous', 'theme_cityexpress_centro');
    $information = "";
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Combo list box type.
    $name = 'theme_cityexpress_centro/comboListboxType';
    $title = get_string('comboListboxType', 'theme_cityexpress_centro');
    $description = get_string('comboListboxType_desc', 'theme_cityexpress_centro');
    $expand = get_string('expand', 'theme_cityexpress_centro');
    $collapse = get_string('collapse', 'theme_cityexpress_centro');
    $default = 1;
    $choices = array(0 => $expand, 1 => $collapse);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $temp->add($setting);


    // Custom CSS file.
    $name = 'theme_cityexpress_centro/customcss';
    $title = get_string('customcss', 'theme_cityexpress_centro');
    $description = get_string('customcssdesc', 'theme_cityexpress_centro');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);


    $settings->add($temp);
    // General settings end.

    /* Slideshow Settings Start */

    $temp = new admin_settingpage('theme_cityexpress_centro_slideshow', get_string('slideshowheading', 'theme_cityexpress_centro'));
    $temp->add(new admin_setting_heading('theme_cityexpress_centro_slideshow', get_string('slideshowheadingsub', 'theme_cityexpress_centro'),
    format_text(get_string('slideshowdesc', 'theme_cityexpress_centro'), FORMAT_MARKDOWN)));

    // SlideShow Status.
    $name = 'theme_cityexpress_centro/slideshowStatus';
    $title = get_string('slideshowStatus', 'theme_cityexpress_centro');
    $description = get_string('slideshowStatus_desc', 'theme_cityexpress_centro');
    $yes = get_string('yes');
    $no = get_string('no' );
    $default = 1;
    $choices = array(1 => $yes , 0 => $no);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $temp->add($setting);

    // Auto Scroll.
    $name = 'theme_cityexpress_centro/autoslideshow';
    $title = get_string('autoslideshow', 'theme_cityexpress_centro');
    $description = get_string('autoslideshowdesc', 'theme_cityexpress_centro');
    $yes = get_string('yes');
    $no = get_string('no');
    $default = 1;
    $choices = array(1 => $yes , 0 => $no);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $temp->add($setting);

    // Slide Show Interval.
    $name = 'theme_cityexpress_centro/slideinterval';
    $title = get_string('slideinterval', 'theme_cityexpress_centro');
    $description = get_string('slideintervaldesc', 'theme_cityexpress_centro');
    $default = 3500;
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_INT);
    $temp->add($setting);

    // Slide Overlay Opacity.
    $name = 'theme_cityexpress_centro/slideOverlay_opacity';
    $title = get_string('slideOverlay', 'theme_cityexpress_centro');
    $description = get_string('slideOverlay_desc', 'theme_cityexpress_centro');
    $opacity = array();
    $opacity = array_combine(range(0, 1, 0.1 ), range(0, 1, 0.1 ));
    $setting = new admin_setting_configselect($name, $title, $description, '0.4', $opacity);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    for ($i = 1; $i <= 3; $i++) {

        // This is the descriptor for Slide One.
        $name = 'theme_cityexpress_centro/slide' . $i . 'info';
        $heading = get_string('slideno', 'theme_cityexpress_centro', array('slide' => $i));
        $information = "";
        $setting = new admin_setting_heading($name, $heading, $information);
        $temp->add($setting);

        // SlideShow Status.
        $name = 'theme_cityexpress_centro/slide'.$i.'status';
        $title = get_string('slideStatus', 'theme_cityexpress_centro', array('slide' => $i));
        $description = get_string('slideStatus_desc', 'theme_cityexpress_centro', array('slide' => $i));
        $yes = get_string('enable', 'theme_cityexpress_centro');
        $no = get_string('disable', 'theme_cityexpress_centro');
        $default = 1;
        $choices = array(1 => $yes , 0 => $no);
        $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
        $temp->add($setting);

        // Slide Image.
        $name = 'theme_cityexpress_centro/slide' . $i . 'image';
        $title = get_string('slideimage', 'theme_cityexpress_centro', array('slide' => $i));
        $description = get_string('slideimagedesc', 'theme_cityexpress_centro');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide' . $i . 'image');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Slide Caption.
        $name = 'theme_cityexpress_centro/slide' . $i . 'caption';
        $title = get_string('slidecaption', 'theme_cityexpress_centro', array('slide' => $i));
        $description = get_string('slidecaptiondesc', 'theme_cityexpress_centro');
        $default = 'lang:slidecaptiondefault';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $temp->add($setting);

        // Slide Description Text.
        $name = 'theme_cityexpress_centro/slide' . $i . 'desc';
        $title = get_string('slidedesc', 'theme_cityexpress_centro', array('slide' => $i));
        $description = get_string('slidedesctext', 'theme_cityexpress_centro');
        $default = 'lang:slidedescdefault';
        $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_TEXT);
        $temp->add($setting);

        // Slide Link text.
        $name = 'theme_cityexpress_centro/slide' . $i . 'urltext1';
        $title = get_string('slideurl1text', 'theme_cityexpress_centro', array('type' => "1"));
        $description = get_string('slideurl1textdesc', 'theme_cityexpress_centro');
        $default = 'lang:knowmore';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $temp->add($setting);

        // Slide Url.
        $name = 'theme_cityexpress_centro/slide' . $i . 'url1';
        $title = get_string('slideurl1', 'theme_cityexpress_centro', array('type' => "1"));
        $description = get_string('slideurl1desc', 'theme_cityexpress_centro');
        $default = 'http://www.example.com/';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
        $temp->add($setting);

        $name = 'theme_cityexpress_centro/slide'.$i.'urltarget1';
        $title = get_string('urltarget1', 'theme_cityexpress_centro', array('type' => "1"));
        $description = get_string('urltarget_desc', 'theme_cityexpress_centro', array('slide' => $i));
        $same = get_string('sameWindow', 'theme_cityexpress_centro');
        $new = get_string('newWindow', 'theme_cityexpress_centro');
        $default = 1;
        $choices = array(0 => $same , 1 => $new);
        $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
        $temp->add($setting);

        $name = 'theme_cityexpress_centro/slide' . $i . 'contFullwidth';
        $title = get_string('slideCont_full', 'theme_cityexpress_centro');
        $description = get_string('slideCont_fulldesc', 'theme_cityexpress_centro');
        $default = "50";
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);


         // Slider content position.
        $name = 'theme_cityexpress_centro/slide' . $i . 'contentPosition';
        $title = get_string('slidecontent', 'theme_cityexpress_centro', array('slide' => $i));
        $description = get_string('slidecontentdesc', 'theme_cityexpress_centro');

        $topleft = get_string("topLeft", "theme_cityexpress_centro");
        $topcenter = get_string("topCenter", "theme_cityexpress_centro");
        $topright = get_string("topRight", "theme_cityexpress_centro");
        $centerleft = get_string("centerLeft", "theme_cityexpress_centro");
        $center = get_string("center", "theme_cityexpress_centro");
        $centerright = get_string("centerRight", "theme_cityexpress_centro");
        $bottomleft = get_string("bottomLeft", "theme_cityexpress_centro");
        $bottomcenter = get_string("bottomCenter", "theme_cityexpress_centro");
        $bottomright = get_string("bottomRight", "theme_cityexpress_centro");

        $default = 'centerRight';
        $choices = array(
            "topLeft" => $topleft,
            "topCenter" => $topcenter,
            "topRight" => $topright,
            "centerLeft" => $centerleft,
            "center" => $center,
            "centerRight" => $centerright,
            "bottomLeft" => $bottomleft,
            "bottomCenter" => $bottomcenter,
            "bottomRight" => $bottomright,
            );

        $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
        $temp->add($setting);
    }

    $settings->add($temp);
    /* Slideshow Settings End*/
    /* Front Page Settings */
    $temp = new admin_settingpage('theme_cityexpress_centro_marketingspot', get_string('frontpageheading', 'theme_cityexpress_centro'));
    /* Marketing Spot 1*/
    $name = 'theme_cityexpress_centro_mspot1heading';
    $heading = get_string('marketingspot', 'theme_cityexpress_centro').' 1 ('.get_string('aboutustxt', 'theme_cityexpress_centro').')';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    // Marketing Spot 1 Title.

    // Marketing Spot 1 Enable or disable.
    $name = 'theme_cityexpress_centro/marketingSpot1_status';
    $title = get_string('marketingSpot1_status', 'theme_cityexpress_centro');
    $description = get_string('marketingSpot1_statusdesc', 'theme_cityexpress_centro');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);
    // Marketing Spot 1 Enable or disable.

    // Marketing Spot 1 Title.
    $name = 'theme_cityexpress_centro/mspot1title';
    $title = get_string('title', 'theme_cityexpress_centro');
    $description = get_string('mspottitledesc', 'theme_cityexpress_centro', array('msno' => '1'));
    $default = 'lang:aboutus';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Marketing Spot 1 Description.
    $name = 'theme_cityexpress_centro/mspot1desc';
    $title = get_string('description');
    $description = get_string('mspotdescdesc', 'theme_cityexpress_centro', array('msno' => '1'));
    $default = 'lang:aboutusdesc';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_TEXT);
    $temp->add($setting);

    // Marketing spot 1 Media content.
    $name = 'theme_cityexpress_centro/mspot1media';
    $title = get_string('media', 'theme_cityexpress_centro');
    $description = get_string('mspotmediadesc', 'theme_cityexpress_centro', array('msno' => '1'));
    $default = '<iframe src="https://www.youtube.com/embed/zKD91RTMwK0"
    allowfullscreen="" width="560" height="315" frameborder="0"></iframe>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $temp->add($setting);
    /* Marketing Spot 1*/

    /* Marketing Spot 2*/
    $name = 'theme_cityexpress_centro_mspot2heading';
    $heading = get_string('marketingspot', 'theme_cityexpress_centro').' 2 ( '.get_string('learntitle', 'theme_cityexpress_centro')." )";
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_cityexpress_centro/marketingSpot2_status';
    $title = get_string('marketingSpot2_status', 'theme_cityexpress_centro');
    $description = get_string('marketingSpot2_statusdesc', 'theme_cityexpress_centro');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    // Marketing Spot 2 Title.
    $name = 'theme_cityexpress_centro/mspot2title';
    $title = get_string('title', 'theme_cityexpress_centro');
    $description = get_string('mspottitledesc', 'theme_cityexpress_centro', array('msno' => '2'));
    $default = 'lang:learnanytime';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Marketing Spot 2 Description.
    $name = 'theme_cityexpress_centro/mspot2desc';
    $title = get_string('description');
    $description = get_string('mspotdescdesc', 'theme_cityexpress_centro', array('msno' => '2'));
    $default = 'lang:learnanytimedesc';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_TEXT);
    $temp->add($setting);

    // Marketing Spot 2 Link Text.
    $name = 'theme_cityexpress_centro/mspot2urltext';
    $title = get_string('button', 'theme_cityexpress_centro').' '.get_string('text', 'theme_cityexpress_centro');
    $description = get_string('mspot2urltxtdesc', 'theme_cityexpress_centro', array('msno' => '2'));
    $default = 'lang:viewallcourses';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $temp->add($setting);

    // Marketing Spot 2 Link.
    $name = 'theme_cityexpress_centro/mspot2url';
    $title = get_string('button', 'theme_cityexpress_centro').' '.get_string('link', 'theme_cityexpress_centro');
    $description = get_string('mspot2urldesc', 'theme_cityexpress_centro');
    $default = 'http://www.example.com/';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $temp->add($setting);

    $name = 'theme_cityexpress_centro/mspot2urltarget';
    $title = get_string('button', 'theme_cityexpress_centro').' '.get_string('target', 'theme_cityexpress_centro');
    $description = get_string('mspot2urltarget_desc', 'theme_cityexpress_centro');
    $same = get_string('sameWindow', 'theme_cityexpress_centro');
    $new = get_string('newWindow', 'theme_cityexpress_centro');
    $default = 1;
    $choices = array(0 => $same , 1 => $new);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $temp->add($setting);
    /* Marketing Spot 2*/
    $settings->add($temp);
    /* Front Page Settings End */

    /*Testimonials End*/

    /* Footer Settings start */
    $temp = new admin_settingpage('theme_cityexpress_centro_footer', get_string('footerheading', 'theme_cityexpress_centro'));

    /* Footer Block1 */
    $name = 'theme_cityexpress_centro_footerblock1heading';
    $heading = get_string('footerblock', 'theme_cityexpress_centro').' 1 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

     $name = 'theme_cityexpress_centro/footerb1_status';
    $title = get_string('activateblock', 'theme_cityexpress_centro');
    $description = get_string('footerb1_statusdesc', 'theme_cityexpress_centro');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_cityexpress_centro/footerbtitle1';
    $title = get_string('title', 'theme_cityexpress_centro');
    $description = get_string('footerbtitledesc', 'theme_cityexpress_centro');
    $default = 'lang:footerbtitle1default';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_cityexpress_centro/footerdesc1';
    $title = get_string('footnote', 'theme_cityexpress_centro');
    $description = get_string('footerdescription_desc', 'theme_cityexpress_centro', array('blockno' => '1'));
    $default = get_string('footerblink1default', 'theme_cityexpress_centro');
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $temp->add($setting);
    /* Footer Block1 */

    /* Footer Block2*/
    $name = 'theme_cityexpress_centro_footerblock2heading';
    $heading = get_string('footerblock', 'theme_cityexpress_centro').' 2 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_cityexpress_centro/footerb2_status';
    $title = get_string('activateblock', 'theme_cityexpress_centro');
    $description = get_string('footerb1_statusdesc', 'theme_cityexpress_centro');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_cityexpress_centro/footerbtitle2';
    $title = get_string('title', 'theme_cityexpress_centro');
    $description = get_string('footerbtitledesc', 'theme_cityexpress_centro');
    $default = 'lang:footerbtitle2default';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_cityexpress_centro/footerblink2';
    $title = get_string('links', 'theme_cityexpress_centro');
    $description = get_string('footerblink_desc', 'theme_cityexpress_centro', array('blockno' => '2'));
    $default = get_string('footerblink2default', 'theme_cityexpress_centro');
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $temp->add($setting);
    /* Footer Block2 */

    /* Footer Block3 */

    $name = 'theme_cityexpress_centro_footerblock3heading';
    $heading = get_string('footerblock', 'theme_cityexpress_centro').' 3 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Footer block 3 status.
    $name = 'theme_cityexpress_centro/footerb3_status';
    $title = get_string('activateblock', 'theme_cityexpress_centro');
    $description = get_string('footerb1_statusdesc', 'theme_cityexpress_centro');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    // Footer block title 3.
    $name = 'theme_cityexpress_centro/footerbtitle3';
    $title = get_string('title', 'theme_cityexpress_centro');
    $description = get_string('footerbtitledesc', 'theme_cityexpress_centro');
    $default = 'lang:footerbtitle3default';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Footer block 3 link.
    $name = 'theme_cityexpress_centro/footerblink3';
    $title = get_string('links', 'theme_cityexpress_centro');
    $description = get_string('footerblink_desc', 'theme_cityexpress_centro', array('blockno' => '3'));
    $default = get_string('footerblink3default', 'theme_cityexpress_centro');
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $temp->add($setting);
    /* Footer Block3 */

    /* Footer Block4 */
    $name = 'theme_cityexpress_centro_footerblock4heading';
    $heading = get_string('footerblock', 'theme_cityexpress_centro').' 4 ';
    $information = get_string('socialmediadesc', 'theme_cityexpress_centro');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Footer block 4 status.
    $name = 'theme_cityexpress_centro/footerb4_status';
    $title = get_string('activateblock', 'theme_cityexpress_centro');
    $description = get_string('footerb1_statusdesc', 'theme_cityexpress_centro');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    // Footer block 4 Title.
    $name = 'theme_cityexpress_centro/footerbtitle4';
    $title = get_string('title', 'theme_cityexpress_centro');
    $description = get_string('footerbtitledesc', 'theme_cityexpress_centro');
    $default = 'lang:footerbtitle4default';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Footer Address.
    $name = 'theme_cityexpress_centro/footaddress';
    $title = get_string('address', 'theme_cityexpress_centro');
    $description = get_string('address_desc', 'theme_cityexpress_centro');
    $default = get_string('defaultaddress', 'theme_cityexpress_centro');
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $temp->add($setting);

    // Footer Email Id.
    $name = 'theme_cityexpress_centro/footemailid';
    $title = get_string('emailid', 'theme_cityexpress_centro');
    $description = '';
    $default = get_string('defaultemailid', 'theme_cityexpress_centro');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Footer phone number.
    $name = 'theme_cityexpress_centro/footphoneno';
    $title = get_string('phoneno', 'theme_cityexpress_centro');
    $description = '';
    $default = get_string('defaultphoneno', 'theme_cityexpress_centro');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Enable / Disable social media icon 1.
    $name = 'theme_cityexpress_centro/siconenable1';
    $title = get_string('enable', 'theme_cityexpress_centro').' '.get_string('socialicon', 'theme_cityexpress_centro').' 1 ';
    $description = '';
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    // Social media icon 1 - name.
    $name = 'theme_cityexpress_centro/socialicon1';
    $title = get_string('socialicon', 'theme_cityexpress_centro').' 1 ';
    $description = get_string('socialicondesc', 'theme_cityexpress_centro');
    $default = get_string('socialicon1default', 'theme_cityexpress_centro');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Social media icon 1 - Background color.
    $name = 'theme_cityexpress_centro/siconbgc1';
    $title = get_string('socialicon', 'theme_cityexpress_centro').' 1 '.get_string('bgcolor', 'theme_cityexpress_centro');
    $description = get_string('siconbgcdesc', 'theme_cityexpress_centro');
    $default = get_string('siconbgc1default', 'theme_cityexpress_centro');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $temp->add($setting);

    // Social Media Icon Url 1.
    $name = 'theme_cityexpress_centro/siconurl1';
    $title = get_string('socialicon', 'theme_cityexpress_centro').' 1 '.get_string('url', 'theme_cityexpress_centro');
    $description = get_string('siconurldesc', 'theme_cityexpress_centro');
    $default = get_string('siconurl1default', 'theme_cityexpress_centro');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Enable / Disable social media icon 2.
    $name = 'theme_cityexpress_centro/siconenable2';
    $title = get_string('enable', 'theme_cityexpress_centro').' '.get_string('socialicon', 'theme_cityexpress_centro').' 2 ';
    $description = '';
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    // Social media icon 2 - name.
    $name = 'theme_cityexpress_centro/socialicon2';
    $title = get_string('socialicon', 'theme_cityexpress_centro').' 2 ';
    $description = get_string('socialicondesc', 'theme_cityexpress_centro');
    $default = get_string('socialicon2default', 'theme_cityexpress_centro');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Social media icon 2 - Background color.
    $name = 'theme_cityexpress_centro/siconbgc2';
    $title = get_string('socialicon', 'theme_cityexpress_centro').' 2 '.get_string('bgcolor', 'theme_cityexpress_centro');
    $description = get_string('siconbgcdesc', 'theme_cityexpress_centro');
    $default = get_string('siconbgc2default', 'theme_cityexpress_centro');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $temp->add($setting);

    // Social Media Icon Url 2.
    $name = 'theme_cityexpress_centro/siconurl2';
    $title = get_string('socialicon', 'theme_cityexpress_centro').' 2 '.get_string('url', 'theme_cityexpress_centro');
    $description = get_string('siconurldesc', 'theme_cityexpress_centro');
    $default = get_string('siconurl2default', 'theme_cityexpress_centro');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Enable / Disable social media icon 3.
    $name = 'theme_cityexpress_centro/siconenable3';
    $title = get_string('enable', 'theme_cityexpress_centro').' '.get_string('socialicon', 'theme_cityexpress_centro').' 3 ';
    $description = '';
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    // Social media icon 3 - name.
    $name = 'theme_cityexpress_centro/socialicon3';
    $title = get_string('socialicon', 'theme_cityexpress_centro').' 3 ';
    $description = get_string('socialicondesc', 'theme_cityexpress_centro');
    $default = get_string('socialicon3default', 'theme_cityexpress_centro');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Social media icon 3 - Background color.
    $name = 'theme_cityexpress_centro/siconbgc3';
    $title = get_string('socialicon', 'theme_cityexpress_centro').' 3 '.get_string('bgcolor', 'theme_cityexpress_centro');
    $description = get_string('siconbgcdesc', 'theme_cityexpress_centro');
    $default = get_string('siconbgc3default', 'theme_cityexpress_centro');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $temp->add($setting);

    // Social Media Icon Url 3.
    $name = 'theme_cityexpress_centro/siconurl3';
    $title = get_string('socialicon', 'theme_cityexpress_centro').' 3 '.get_string('url', 'theme_cityexpress_centro');
    $description = get_string('siconurldesc', 'theme_cityexpress_centro');
    $default = get_string('siconurl3default', 'theme_cityexpress_centro');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Enable / Disable social media icon 4.
    $name = 'theme_cityexpress_centro/siconenable4';
    $title = get_string('enable', 'theme_cityexpress_centro').' '.get_string('socialicon', 'theme_cityexpress_centro').' 4 ';
    $description = '';
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    // Social media icon 4 - name.
    $name = 'theme_cityexpress_centro/socialicon4';
    $title = get_string('socialicon', 'theme_cityexpress_centro').' 4 ';
    $description = get_string('socialicondesc', 'theme_cityexpress_centro');
    $default = get_string('socialicon4default', 'theme_cityexpress_centro');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Social media icon 4 - Background color.
    $name = 'theme_cityexpress_centro/siconbgc4';
    $title = get_string('socialicon', 'theme_cityexpress_centro').' 4 '.get_string('bgcolor', 'theme_cityexpress_centro');
    $description = get_string('siconbgcdesc', 'theme_cityexpress_centro');
    $default = get_string('siconbgc4default', 'theme_cityexpress_centro');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $temp->add($setting);

    // Social Media Icon Url 4.
    $name = 'theme_cityexpress_centro/siconurl4';
    $title = get_string('socialicon', 'theme_cityexpress_centro').' 4 '.get_string('url', 'theme_cityexpress_centro');
    $description = get_string('siconurldesc', 'theme_cityexpress_centro');
    $default = get_string('siconurl4default', 'theme_cityexpress_centro');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
    /* Footer Block4 */

    // Copyright.
    $name = 'theme_cityexpress_centro_copyrightheading';
    $heading = get_string('copyrightheading', 'theme_cityexpress_centro');
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Copyright setting.
    $name = 'theme_cityexpress_centro/copyright';
    $title = get_string('copyright', 'theme_cityexpress_centro');
    $description = get_string('copyrightdesc', 'theme_cityexpress_centro');
    $default = 'lang:copyrightdefault';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $settings->add($temp);
    /* Footer Settings end */

    $temp = new admin_settingpage('theme_cityexpress_centro_faqs_tab', 'Preguntas frecuentes');

    // Course menu.
    $name = 'theme_cityexpress_centro/show_faqs';
    $title = 'Mostrar preguntas frecuentes';
    $description = 'Mostrar enlace a preguntas frecuentes';
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    // Slide Link text.
    $name = 'theme_cityexpress_centro/faqs_url';
    $title = 'Url preguntas frecuentes';
    $description = 'Escriba aquí la url de las preguntas frecuentes';
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $temp->add($setting);

    $settings->add($temp);
}