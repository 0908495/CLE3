<?php
//==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>
//
// Ajax Poll Script v3.18 [ GPL ]
// Copyright (c) phpkobo.com ( http://www.phpkobo.com/ )
// Email : admin@phpkobo.com
// ID : APSMX-318
// URL : http://www.phpkobo.com/ajax_poll.php
//
//==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<

class CTClass extends CTClassBase
{
	function setupPoll( $poll ) {

		//-- Poll Title
		$poll->attr( "title", "Kies een nummer!" );

		//-- Poll Options
		$poll->addItem( "Hand in Hand Kameraden" );
		$poll->addItem( "Feyenoord voor altijd" );
		$poll->addItem( "De Kuip" );
        $poll->addItem( "We hebben de cup!" );


		//-- Text used in polls
		$poll->attr( "msg-vote", "Stem" );
		$poll->attr( "msg-select-one", "Kies een nummer!" );
		$poll->attr( "msg-already-voted", "Je hebt al gestemd " );
		$poll->attr( "msg-view-result", "Bekijk resultaten" );
		$poll->attr( "msg-thank-you", "Bedankt voor het stemmen" );
		$poll->attr( "msg-return", "Terug" );
		$poll->attr( "msg-total", "Totaal" );
		$poll->attr( "msg-reset-block", "Reset IP & Cookie Block" );
		$poll->attr( "msg-not-started", "Stemmen is nog niet begonnen" );
		$poll->attr( "msg-ended", "Het stemmen is geeindigd" );

		//-- Display "Reset IP & Cookie Block" button
		//--	Show: true
		//--	Hide: false
		$poll->attr( "b-reset-block", false );

		//-- Single selection or multiple selection
		//--	single selection: "radio"
		//--	multiple selection: "checkbox"
		$poll->attr( "vote-input", "radio" );

		//-- Specify the time delay on tool tips in milliseconds
		$poll->attr( "tip-box-duration", 2500 );

		//-- Prevent users from voting more than once by IP address
		//--	"true" or "false"
		$poll->attr( "enable-ip-block", false );

		//-- Prevent users from voting more than once by Cookie
		//--	"true" or "false"
		$poll->attr( "enable-cookie-block", false );

		//-- Specifiy the cookie's life span in seconds
		//--	(e.g.)　60*60*24 => One Day
		//--	(e.g.)　60*60*24*365 => One Year
		$poll->attr( "cookie-block-period", 60*60*24*365  );

		//-- Specifiy Start and End Date&Time:
		//-- Enter an empty string ("") if you don't need to specify it.
		//--	(e.g.)　"2010-01-02"
		//--	(e.g.)　"2015-03-01 15:20"
		$poll->attr( "dt-start", "" );
		$poll->attr( "dt-end", "" );

		//-- end
		return true;
	}
}

?>