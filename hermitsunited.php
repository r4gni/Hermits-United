<?php
/**
 * @package Hermits_United
 * @version 1.5.1
 */
/*
Plugin Name: Hermits United
Plugin URI: http://wordpress.org/#
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of all generations in all of time and space, and even in several parallel universes. When activated you will randomly see a quote from <cite>Doctor Who/cite>, the BBC series (>2004) in the upper right of your admin screen on every page. Based on the "Hello doctor" by Matt Mullenweg.
Author: Ragni Zlotos
Version: 1.5.1
Author URI: http://typotendency.net/
*/
/*
Aweseome lines that where "too long, breaks the design":
Time isn't a straight line, it's all bumpy-wumpy. There's loads of boring stuff, like Sundays and Tuesdays and Thursday afternoons. But now and then there are Saturdays, big temporal tipping points when anything's possible.
Safe? No, of course you're not safe! There's about another billion things out there just waiting to burn your whole world, but, if you wanna pretend you're safe just so you can sleep at night, okay, you're safe. But you're not really.

*/

function hello_doctor_get_lyric() {
	/** These are the lyrics to Hello doctor */
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
Nixon: This person you want to marry: black? Canton: Yes... Nixon: I know what people think of me, but perhaps I am a little more liberal.. Canton: He is.
Oh this is my friend River. Nice hair, clever, and has her own gun. And unlike me she really doesn't mind shooting people. I shouldn't like that.
River: Oh, the first seven, easy. The Doctor: Seven, really? R: Oh, eight for you, honey. TD: Stop it! R: Make me! TD: Oh, maybe I will!
Nixon: This person you want to marry: black? Canton: Yes... Nixon: I know what people think of me, but perhaps I am a little more liberal.. Canton: He is.
Amy: Why did you do that? Doctor: Oh, I always rip out the last page of a book. Then it doesn't have to end. I hate endings!
Amy: You laughed! The Doctor: No, that was just an involuntary snort... of fondness.
Rory: There are soldiers all over my house, and I'm in my pants. Amy: My whole life I've dreamed of saying that, and I miss it by being someone else.
The Doctor: (to Amy) Because you were the first. And you're seared onto my hearts, Amelia Pond. I'm running to you and Rory before you fade from me.
Preacher: What? The Doctor: I speak horse. He's called Susan. [The horse snorts] The Doctor: And he wants you to respect his life choices.
Amy: I'm easily worth two men. You can help, too, if you'd like.
Dalek Prime Minister: Does it surprise you to know the Daleks have a concept of beauty?<p />The Doctor: I thought you'd run out of ways to make me sick, but hello again. You think hatred is beautiful?<p />Dalek Prime Minister: Perhaps that is why we have never been able to kill you.
The Doctor: I just need to find the key.<br />Madge: Do you want me to do it with a pin? I'm good with a pin.<br />The Doctor: Multidimensional, triple-encoded temporal interface. Not really susceptible to pointy things.<br />Madge: [Unlocks the police box doors with a pin] Got it.<br />The Doctor: Okay. Suddenly the last nine hundred years of time travel seem a bit less secure.";

	// Here we split it into lines
	$lyrics = explode("\n", $lyrics);

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand(0, count($lyrics) - 1) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_doctor() {
	$chosen = hello_doctor_get_lyric();
	echo "<p id='quote'>$chosen</p>";
	echo "<p id='doctor'>Dr Who<p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_notices', 'hello_doctor');

// We need some CSS to position the paragraph
function doctor_css() {
	// This makes sure that the posinioning is also good for right-to-left languages
	$x = ( is_rtl() ) ? 'left' : 'right';

	echo"
	<style type'text/css'>
	#wp-body{
	    

	}
	</style>
	";
	
	echo "
	<style type='text/css'>
	#quote {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
		color: #9800AF;
		background-color:#DFF9CF;
		border: solid, 5px;
  	    border-color: blue;
	}
	</style>
	";
	
	echo "
	<style type='text/css'>
	#doctor {
		background-color:#DFF9CF;
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
		color: black;
		font-style: italic;
		border: solid, 1px;
  	    border-color: blue;
	}
	</style>
	";
}

add_action('admin_head', 'doctor_css');

?>
