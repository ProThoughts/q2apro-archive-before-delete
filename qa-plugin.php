<?php

/*
	Plugin Name: q2apro Archive Before Delete
	Plugin URI: https://github.com/q2apro/q2apro-archive-before-delete
	Plugin Description: Makes a copy of the deleted post before deleting it from the main posts table 
	Plugin Version: 0.1
	Plugin Date: 2017-01-23
	Plugin Author: q2apro.com 
	Plugin Author URI: http://www.q2apro.com/
	Plugin License: GPLv3
	Plugin Minimum Question2Answer Version: 1.7
	Plugin Update Check URI: 
*/


	if (!defined('QA_VERSION')) 
	{ // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}

	// language file
	qa_register_plugin_phrases('q2apro-archive-before-delete-lang.php', 'q2apro_archivebeforedelete_lang');

	// admin module, only used to create database table
	qa_register_plugin_module('module', 'q2apro-archive-before-delete-admin.php', 'q2apro_archive_before_delete_admin', 'Q2apro Archive-Before-Delete');
	
	// track events
	qa_register_plugin_module('event', 'q2apro-archive-before-delete-events.php', 'q2apro_archive_before_delete_events', 'q2apro archive-before-delete Events');
	
	
/*
	Omit PHP closing tag to help avoid accidental output
*/