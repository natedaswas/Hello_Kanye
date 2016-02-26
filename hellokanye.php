<?php
/**
 * @package Hello_Kanye
 * @version 1.0
 */
/*
Plugin Name: Hello Kanye
Description: This is more than any mere plugin, In one word it symbolizes the extreme obsession of a man that is in love with himself, singing about being in love with people other than himself: Bound. When activated you will randomly see a lyric from <cite>Bound, 2</cite> in the upper right of your admin screen on every page.
Author: Nathanael Meyers
Version: 1.0
Author URI: http://nathanaelmeyers.com
*/
function hello_kanye_get_lyric() {
	/** These are the lyrics to Bound 2 */
	$lyrics = "Bound to fall in love
Bound to fall in love (Uh-huh, honey)
All them other niggas lame, and you know it now
When a real nigga hold you down, you supposed to drown, bound
What you doing in the club on a Thursday?
She say she only here for her girl birthday
They ordered champagne but still look thirsty
Rock Forever 21 but just turned thirty
I know I got a bad reputation
Walking 'round, always mad reputation
Leave a pretty girl sad reputation
Start a Fight Club, Brad reputation
I turnt the nightclub out of the basement
I'll turn the plane 'round, your ass keep complaining
How you gon' be mad on vacation?
Dutty wining 'round all these Jamaicans
Uh, this that prom shit
This that what we do, don't tell your mom shit
This that red cup, all on the lawn shit
Got a fresh cut, straight out the salon, bitch
I wanna f*** you hard on the sink
After that, give you something to drink
Step back, can't get spunk on the mink
I mean damn, what would Jeromey Romey Romey Rome think?
Hey, you remember where we first met?
Okay, I don't remember where we first met
But hey, admitting is the first step
And hey, you know ain't nobody perfect
And I know, with the hoes I got the worst rep
But hey, their backstroke I'm tryna perfect
And hey, ayo, we made it, Thanksgiving
So hey, maybe we can make it to Christmas
She asked me what I wished for on the wishlist
Have you ever asked your bitch for other bitches?
Maybe we could still make it to the church steps
But first, you gon' remember how to forget
After all these long-ass verses
I'm tired, you tired, Jesus wept
I know you're tired of loving, of loving
With nobody to love, nobody, nobodyo
So just grab somebody, no leaving this party
With nobody to love, nobody, nobody (Uh-huh, honey)
";
	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );
	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}
// This just echoes the chosen line, we'll position it later
function hello_kanye() {
	$chosen = hello_kanye_get_lyric();
	echo "<p id='kanye'>$chosen</p>";
}
// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_kanye' );
// We need some CSS to position the paragraph
function kanye_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';
	echo "
	<style type='text/css'>
	#kanye {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}
add_action( 'admin_head', 'kanye_css' );
?>
