<?php 
/*
Plugin Name: Kw Essential share buttons
Plugin URI: http://kwark.allwebtuts.net
Description: An ultra light way to display mini buttons for sharing on social media. Buttons and popup for pinterest, linkedin, facebook, google +1, twitter, windows live on posts in home page loop and in if is single. No configuration needed.
Author: Laurent (KwarK) Bertrand
Version: 1.2
Tags:  essential, sharing, social, media, share, button, pinterest, facebook, twitter, gplus, linkedin, ultra, light, plugin, wordpress
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
global $plugin_url;

$plugin_url = WP_PLUGIN_URL . '/kw-essential-share-buttons/';

wp_register_style( 'kw_button_share', '' .$plugin_url. 'css/general.css');
wp_register_style( 'kw_button_share_single', '' .$plugin_url. 'css/single.css');

function kw_share_buttons($content)
{
	if(is_single() || is_home())
	{
		global $plugin_url, $post;
		
		if(is_single())
		{ 
			wp_enqueue_style( 'kw_button_share_single');
			echo '<div style="margin:0 auto; height:0px; position:fixed; top:1px; left:1px; right:1px; width:985px;">';
		}
		if(is_home())
		{ 
			wp_enqueue_style( 'kw_button_share');
		}
		?>
        <div class="kw-share-this">
                
                <a href="#" onclick="javascript:window.open('http://profile.live.com/badge?url=<?php urlencode(the_permalink()); ?>', 'Windows Live', 'width=550, height=450, top=230, right=450, left=450'); return false;" rel="nofollow">
                <img class="kw-bubble" src="<?php echo esc_url($plugin_url . 'images/blt8.png', array('http', 'https')); ?>" alt="messenger live share" title="Live" /></a>
                
                <a href="#" onclick="javascript:window.open('https://plusone.google.com/_/+1/confirm?url=<?php urlencode(the_permalink()); ?>', 'Google plusone', 'width=550, height=450, top=230, right=450, left=450'); return false;" rel="nofollow">
                <img class="kw-bubble" src="<?php echo esc_url($plugin_url . 'images/google.png', array('http', 'https')); ?>" alt="Google plusone" title="Plus" /></a>
                
                <a href="#" onclick="javascript:window.open('http://twitter.com/share?url=<?php urlencode(the_permalink()); ?>&text=<?php urlencode(the_title()); ?>', 'Twitter', 'width=550, height=450, top=230, right=450, left=450'); return false;" rel="nofollow">
                <img class="kw-bubble" src="<?php echo esc_url($plugin_url . 'images/twitter.png', array('http', 'https')); ?>" alt="Twitter" title="Tweet" /></a>
                
                 <a href="#" onclick="javascript:window.open('https://www.facebook.com/login.php?skip_api_login=1&display=popup&nux=1&referer=<?php echo urlencode(get_site_url()); ?>&social_plugin=like&external_page_url=<?php urlencode(the_permalink()); ?>', 'Facebook', 'width=550, height=450, top=230, right=450, left=450'); return false;" rel="nofollow">
                <img class="kw-bubble" src="<?php echo esc_url($plugin_url . 'images/facebook.png', array('http', 'https')); ?>" alt="Facebook" title="Like" /></a>
                
                <a href="#" onclick="javascript:window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php urlencode(the_permalink()); ?>&title=<?php urlencode(the_title()); ?>&source=<?php echo urlencode(get_site_url()); ?>', 'LinkedIn', 'width=550, height=450, top=230, right=450, left=450'); return false;" rel="nofollow">
                <img class="kw-bubble" src="<?php echo esc_url($plugin_url . 'images/linkedin.png', array('http', 'https')); ?>" alt="LinkedIn" title="In" /></a>
                
				<?php if (has_post_thumbnail())
				{ 
					$kw_thumb_id = get_post_thumbnail_id($post->ID);
				}
				?>
                
                <a href="#" onclick="javascript:window.open('http://pinterest.com/pin/create/button/?url=<?php urlencode(the_permalink()); ?>&media=<?php echo urlencode(wp_get_attachment_url($kw_thumb_id)); ?>&description=<?php urlencode(the_title()); ?>', 'Pinterest', 'width=560, height=450, top=230, right=450, left=450'); return false;" rel="nofollow">
            <img class="kw-bubble" src="http://passets-ec.pinterest.com/images/about/buttons/small-p-button.png" alt="Pinterest" title="Pin" /></a>    
        </div>
        <?php
        if(is_single())
		{ 
			echo '</div>';
		}
	}
	return $content;
}
add_filter('the_content', 'kw_share_buttons');
?>