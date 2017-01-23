<?php

/*
	Plugin Name: q2apro Archive Before Delete
*/

	class q2apro_archive_before_delete_events
	{
	
		// main event processing function	
		function process_event($event, $userid, $handle, $cookieid, $params) 
		{
			if(qa_opt('q2apro_archivebeforedelete_enabled')) 
			{
				// the delete events have no $params['postid'], that's why we use the delete_before events 
				$plugin_events = array(
					/*'q_hide',
					'a_hide',
					'c_hide',*/
					'q_delete_before',
					'a_delete_before',
					'c_delete_before',
				 );
				 
				// comments and answers
				if(in_array($event, $plugin_events)) 
				{
					$postid = $params['postid'];

					if(isset($postid)) 
					{
						// copy post from qa_posts to qa_posts_archive table 
						qa_db_query_sub('
							INSERT INTO `^posts_archive` 
								SELECT * FROM `^posts` 
								WHERE postid = #
							',
							$postid
						);
					}
				}
			}
		} // end process_event
	} // end class q2apro_mailfavorites_events

	
/*
	Omit PHP closing tag to help avoid accidental output
*/