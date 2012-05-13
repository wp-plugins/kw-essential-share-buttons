<?php 
/*
Plugin Name: Kw Essential share buttons
Plugin URI: http://kwark.allwebtuts.net
Description: An ultra light way to display facebook like button, google +1 button, twitter button, msn live share button. No configuration needed.
Author: Laurent (KwarK) Bertrand
Version: 1.1
Tags: sharing-button, primordial-sharing-button, ultra-light-plugin-share, tweeter-share, tweeter-tweet-this, facebook-share, facebook-like, google-buzz, google-share, msn-live-share, windows-live-share 
Author URI: http://kwark.allwebtuts.net
 */
/*  
	Copyright 2012  Laurent (KwarK) Bertrand  (email : kwark@allwebtuts.net)
	
	You can not remove this comments such as my informations.

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
$plugin_url = WP_PLUGIN_URL . '/kw-essential-share-buttons/';
/**Add general css to frontend **/
wp_register_style( 'kw_button_share', '' .$plugin_url. 'css/general.css');

/**Main function **/
function kw_share_buttons($content)
{
	if(is_single())
	{
		wp_enqueue_style( 'kw_button_share');
		
		echo '<div class="kw-share-this">
		
			<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a>
            <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
				
			<div class="gplusone">
				<script src="http://apis.google.com/js/plusone.js" type="text/javascript"></script>
				<g:plusone size="medium"></g:plusone>
			</div>
			
			<a class="msn-share-button" href="#" onclick="javascript:window.open(\'http://profile.live.com/badge?url=' . get_permalink($post->post_parent) .'/\', \'Windows Live\', \'width=550, height=450, top=230, right=450, left=450\');" title="Messenger live share">Messenger</a>
			
			<div class="facebook-share-button"><iframe src="http://www.facebook.com/plugins/like.php?href=' . get_permalink($post->post_parent)
    .'&layout=button_count&show_faces=false&width=85&action=like&colorscheme=light&height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:85px; height:21px;" allowTransparency="true"></iframe>
            </div>
      </div>';		
		
		return $content;
	}
	else{return $content;}
}
/** Main function to posts **/
add_filter('the_content', 'kw_share_buttons');
?>