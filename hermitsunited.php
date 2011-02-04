<?php
/**
 * @package Hermits_United
 * @version 1.5.1
 */
/*
Plugin Name: Hermits United
Plugin URI: http://wordpress.org/#
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of all generations in all of time and space, and even in several parallel universes. When activated you will randomly see a quote from <cite>Doctor Who/cite>, the BBC series (>2004) in the upper right of your admin screen on every page. Based on the "Hello Dolly" by Matt Mullenweg.
Author: Ragni Zlotos
Version: 1.5.1
Author URI: http://typotendency.net/
*/

function hello_dolly_get_lyric() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = "
King Louis: I'm the King of France! Doctor Who: Yeah? Well I'm the Lord of Time
Ah! Yes! Blimey, sorry! Christmas Eve on a rooftop I saw a chimney... my whole brain just went... What the hell!
Do you know, in 900 years of time and space, I've never met anyone who wasn't important.
I think you'll find that I'm universally recognized as a mature and responsible adult. Finally, a lie too big.
It's a fez. I wear a fez now. Fezes are cool.
Geronimo!
Bow ties are cool.
Amelia: You said you were in the library. The Doctor: So was the swimming pool.
Rory: We are not her boys. The Doctor: Yeah, we are. Rory: Yeah, we are.
Overconfidence, this, and a small screwdriver. I’m absolutely sorted.
Allons-y!
It is! It's the city of New New York! Strictly speaking, it's the fifteenth New York since the original, so that makes it New-New-New-New-...
Reinette: Oh, this is my lover, the King of France. The Doctor: Yeah? Well I'm the Lord of Time.
Hermits United. We meet up every ten years. Swap stories about caves. It's good fun... for a hermit.";

	// Here we split it into lines
	$lyrics = explode("\n", $lyrics);

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand(0, count($lyrics) - 1) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_dolly() {
	$chosen = hello_dolly_get_lyric();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'hello_dolly');

// We need some CSS to position the paragraph
function dolly_css() {
	// This makes sure that the posinioning is also good for right-to-left languages
	$x = ( is_rtl() ) ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		position: absolute;
		top: 4.5em;
		margin: 0;
		padding: 0;
		$x: 215px;
		font-size: 11px;
	}
	</style>
	";
}

add_action('admin_head', 'dolly_css');

?>
