<?php 

/**
 * @package kw-essential-share-buttons
 * @author Laurent Bertrand
 * @version 1.0.1
 */
 
 
/*
 Plugin Name: Kw Essential share buttons
 Plugin URI: http://kwark.allwebtuts.net
 Description: An ultra light way to display facebook share button, google buzz button, twitter tweet this button, msn live share button, windows live share button. No configuration needed.
 Author: Laurent (KwarK) Bertrand
 Version: 1.0.1
 Tags: share-button, primordial-share-button, ultra-light-plugin-share, tweeter-share, tweeter-tweet-this, facebook-share, facebook-like, google-buzz, google-share, msn-live-share, windows-live-share, share-button-auto-integration
 
Author URI: http://kwark.allwebtuts.net
 */
/**
 * @copyright 2011  Laurent Bertrand  ( email : kwark1(at)style-cataclysm.com )
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
 
 
/**
 * Bootstrap file for getting the ABSPATH constant to wp-load.php
 * This is requried when a plugin requires access not via the admin screen.
 *
 * If the wp-load.php file is not found, then an error will be displayed
 *
 * @package WordPress
 * @since Version 2.6
 */

/**Add general css to frontend **/

wp_enqueue_style( 'kw_button_share', '/wp-content/plugins/kw-essential-share-buttons/css/general.css');

/**Main function **/

function kw_share_buttons($content){
	
if((is_admin()) || (is_404()) || (is_archive()) || (is_attachment()) || (is_author()) || (is_category()) || (is_comments_popup()) || (is_date()) || (is_day()) || (is_feed()) || (is_front_page()) || (is_home()) || (is_month/**()) || (is_new_day**/()) || (is_page()) || (is_page_template()) || (is_paged()) || (is_post_type_archive()) || (is_preview()) || (is_search/**()) || (is_single**//**()) || (is_singular**/()) || (is_sticky()) || (is_tag()) || (is_tax()) || (is_time()) || (is_trackback()) || (is_year()) || (is_active_widget()) || (is_rtl/**()) || (is_dynamic_sidebar**//**()) || (is_user_logged_in**/()))
	{
		return $content; 
	}
		
else 
	{
		echo '<div class="share-this">
                    <a href="http://twitter.com/share"
class="twitter-share-button"
data-count="horizontal">Tweet</a>
                    <script type="text/javascript"
src="http://platform.twitter.com/widgets.js"></script>
				<div class="gplusone">
					<script src="http://apis.google.com/js/plusone.js" type="text/javascript"></script>
					<g:plusone size="medium"></g:plusone>
					</div>
					<a class="msn-share-button" href="#" onclick="javascript:window.open(\'http://profile.live.com/badge?url=' . get_permalink($post->post_parent) .'/\', \'Windows Live\', \'width=550, height=450, top=230, right=450, left=450\');" title="Messenger live share">Partager</a>
                    <div class="facebook-share-button">
                        <iframe
src="http://www.facebook.com/plugins/like.php?href=' . get_permalink($post->post_parent)
    .'&amp;layout=button_count&amp;show_faces=false&amp;width=85&amp;action=like&amp;colorscheme=light&amp;height=21"
scrolling="no" frameborder="0" style="border:none;
overflow:hidden; width:85px; height:21px;"
allowTransparency="true"></iframe>
                    </div>
                </div>';
				
		return $content;
	}
}
/** Main function to posts **/
add_filter('the_content', 'kw_share_buttons');
?>