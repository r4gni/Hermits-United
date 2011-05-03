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
/*
Aweseome lines that where "too long, breaks the design":
Time isn't a straight line, it's all bumpy-wumpy. There's loads of boring stuff, like Sundays and Tuesdays and Thursday afternoons. But now and then there are Saturdays, big temporal tipping points when anything's possible.
Safe? No, of course you're not safe! There's about another billion things out there just waiting to burn your whole world, but, if you wanna pretend you're safe just so you can sleep at night, okay, you're safe. But you're not really.

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
Hermits United. We meet up every ten years. Swap stories about caves. It's good fun... for a hermit.
Right, so what are we gonna do? Eat crisps and talk about girls? I've never done that, but I bet it's easy. Girls, yeah?
Y'know, this isn't nearly as bad as it looks.
Amy: This is it, yeah? The right place? Rory: Uh, Nowhere, Middle of? Yeah, this is it.
Amy: Nice hat. The Doctor: I wear a stetson now. Stetsons are cool.
River: This is cold. Even by your standards, this is cold. The Doctor: Or, 'Hello,' as people used to say.
I'm being extremely clever up here and there's no one to stand around looking impressed! What's the point in having you all?
The Doctor: Give a shout if you get into any trouble. River Song: Oh, don't worry. I'm quite the screamer. Now there's a spoiler for you.
Canton: What about Dr. Song? She dove off a rooftop! The Doctor: Don't worry. She does that.
Oh this is my friend River. Nice hair, clever, and has her own gun. And unlike me she really doesn't mind shooting people. I shouldn't like that.
River: Oh, the first seven, easy. The Doctor: Seven, really? R: Oh, eight for you, honey. TD: Stop it! R: Make me! TD: Oh, maybe I will!
Nixon: This person you want to marry: black? Canton: Yes... Nixon: I know what people think of me, but perhaps I am a little more liberal.. Canton: He is.";

	// Here we split it into lines
	$lyrics = explode("\n", $lyrics);

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand(0, count($lyrics) - 1) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_dolly() {
	$chosen = hello_dolly_get_lyric();
	echo "<p id='dolly'>$chosen</p>";
	echo "<p id='doctor'>Dr Who<p>";
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
		font-size: 12px;
		color: red;
	}
	</style>
	";
	
	echo "
	<style type='text/css'>
	#doctor {
		position: absolute;
		top: 4.5em;
		margin: 0;
		padding: 0;
		$x: 170px;
		font-size: 12px;
		color: black;
		font-style: italic;
	}
	</style>
	";
}

add_action('admin_head', 'dolly_css');

?>
