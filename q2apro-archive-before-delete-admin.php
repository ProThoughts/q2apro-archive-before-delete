<?php

/*
	Plugin Name: q2apro Archive Before Delete
*/

	class q2apro_archive_before_delete_admin
	{
		
		// initialize db-table 'posts_archive' if it does not exist yet
		function init_queries($tableslc) 
		{
			$tablename = qa_db_add_table_prefix('posts_archive');
			
			if(!in_array($tablename, $tableslc)) 
			{
				return '
				CREATE TABLE `'.$tablename.'` (
				  `postid` int(10) UNSIGNED NOT NULL,
				  `type` enum("Q","A","C","Q_HIDDEN","A_HIDDEN","C_HIDDEN","Q_QUEUED","A_QUEUED","C_QUEUED","NOTE") NOT NULL,
				  `parentid` int(10) UNSIGNED DEFAULT NULL,
				  `categoryid` int(10) UNSIGNED DEFAULT NULL,
				  `catidpath1` int(10) UNSIGNED DEFAULT NULL,
				  `catidpath2` int(10) UNSIGNED DEFAULT NULL,
				  `catidpath3` int(10) UNSIGNED DEFAULT NULL,
				  `acount` smallint(5) UNSIGNED NOT NULL DEFAULT "0",
				  `amaxvote` smallint(5) UNSIGNED NOT NULL DEFAULT "0",
				  `selchildid` int(10) UNSIGNED DEFAULT NULL,
				  `closedbyid` int(10) UNSIGNED DEFAULT NULL,
				  `userid` int(10) UNSIGNED DEFAULT NULL,
				  `cookieid` bigint(20) UNSIGNED DEFAULT NULL,
				  `createip` int(10) UNSIGNED DEFAULT NULL,
				  `lastuserid` int(10) UNSIGNED DEFAULT NULL,
				  `lastip` int(10) UNSIGNED DEFAULT NULL,
				  `upvotes` smallint(5) UNSIGNED NOT NULL DEFAULT "0",
				  `downvotes` smallint(5) UNSIGNED NOT NULL DEFAULT "0",
				  `netvotes` smallint(6) NOT NULL DEFAULT "0",
				  `lastviewip` int(10) UNSIGNED DEFAULT NULL,
				  `views` int(10) UNSIGNED NOT NULL DEFAULT "0",
				  `hotness` float DEFAULT NULL,
				  `flagcount` tinyint(3) UNSIGNED NOT NULL DEFAULT "0",
				  `format` varchar(20) CHARACTER SET ascii NOT NULL DEFAULT "",
				  `created` datetime NOT NULL,
				  `updated` datetime DEFAULT NULL,
				  `updatetype` char(1) CHARACTER SET ascii DEFAULT NULL,
				  `title` varchar(800) DEFAULT NULL,
				  `content` varchar(17000) DEFAULT NULL,
				  `tags` varchar(800) DEFAULT NULL,
				  `name` varchar(40) DEFAULT NULL,
				  `notify` varchar(80) DEFAULT NULL
				) 
				ENGINE=InnoDB DEFAULT CHARSET=utf8;
				';
			}
		}
		
		// option's value is requested but the option has not yet been set
		function option_default($option) 
		{
			switch($option) {
				case 'q2apro_archivebeforedelete_enabled':
					return 1; // true
				default:
					return null;
			}
		}
			
		function allow_template($template) 
		{
			return ($template!='admin');
		}       
			
		function admin_form(&$qa_content)
		{                       

			// process the admin form if admin hit Save-Changes-button
			$ok = null;
			if (qa_clicked('q2apro_archivebeforedelete_save')) 
			{
				qa_opt('q2apro_archivebeforedelete_enabled', (bool)qa_post_text('q2apro_archivebeforedelete_enabled')); // empty or 1
				$ok = qa_lang('admin/options_saved');
			}
			
			// form fields to display frontend for admin
			$fields = array();
			
			$fields[] = array(
				'type' => 'checkbox',
				'label' => qa_lang('q2apro_archivebeforedelete_lang/enable_plugin'),
				'tags' => 'name="q2apro_archivebeforedelete_enabled"',
				'value' => qa_opt('q2apro_archivebeforedelete_enabled'),
			);
			
			return array(           
				'ok' => ($ok && !isset($error)) ? $ok : null,
				'fields' => $fields,
				'buttons' => array(
					array(
						'label' => qa_lang_html('main/save_button'),
						'tags' => 'name="q2apro_archivebeforedelete_save"',
					),
				),
			);
		}
	}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/