#
# Table structure for table 'pws_arch'
#

CREATE TABLE `pws_arch` (
  `arch_pk` int(11) NOT NULL default '0',
  `arch_name` varchar(16) NOT NULL default '',
  `arch_regexp` varchar(16) NOT NULL default '',
  `arch_priority` int(11) NOT NULL default '0',
  PRIMARY KEY  (`arch_pk`)
) TYPE=MyISAM;



#
# Table structure for table 'pws_browser'
#

CREATE TABLE `pws_browser` (
  `browser_pk` int(11) NOT NULL default '0',
  `browser_regexp` varchar(64) NOT NULL default '',
  `browser_name` varchar(64) NOT NULL default '',
  `browser_search` enum('N','Y') NOT NULL default 'N',
  `browser_collector` enum('N','Y') NOT NULL default 'N',
  `browser_priority` int(11) NOT NULL default '0',
  `browser_url` varchar(255) NOT NULL default '',
  `browser_version_regexp` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`browser_pk`)
) TYPE=MyISAM;



#
# Table structure for table 'pws_country'
#

CREATE TABLE `pws_country` (
  `country_pk` int(11) NOT NULL default '0',
  `country_code` char(2) NOT NULL default '',
  `country_name` varchar(64) NOT NULL default '',
  `country_priority` int(11) NOT NULL default '0',
  PRIMARY KEY  (`country_pk`)
) TYPE=MyISAM;



#
# Table structure for table 'pws_lang'
#

CREATE TABLE `pws_lang` (
  `lang_pk` int(11) NOT NULL default '0',
  `lang_code` char(2) NOT NULL default '',
  `lang_name` varchar(32) NOT NULL default '',
  `lang_priority` int(11) NOT NULL default '0',
  PRIMARY KEY  (`lang_pk`)
) TYPE=MyISAM;



#
# Table structure for table 'pws_os'
#

CREATE TABLE `pws_os` (
  `os_pk` int(11) NOT NULL default '0',
  `os_name` varchar(32) NOT NULL default '',
  `os_version` varchar(16) NOT NULL default '',
  `os_regexp` varchar(64) NOT NULL default '',
  `os_priority` int(11) NOT NULL default '0',
  `os_url` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`os_pk`)
) TYPE=MyISAM;



#
# Table structure for table 'pws_stats'
#

CREATE TABLE `pws_stats` (
  `stats_pk` int(11) NOT NULL auto_increment,
  `browser_pk` int(11) default NULL,
  `os_pk` int(11) default NULL,
  `country_pk` int(11) default NULL,
  `arch_pk` int(11) default NULL,
  `lang_pk` int(11) default NULL,
  `stats_page_id` varchar(16) NOT NULL default '',
  `stats_visitor_id` varchar(32) NOT NULL default '',
  `stats_referer` varchar(255) default NULL,
  `stats_bmajorv` varchar(8) default NULL,
  `stats_bminorv` varchar(8) default NULL,
  `stats_ip` varchar(15) default NULL,
  `stats_forward_ip` varchar(15) default NULL,
  `stats_date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`stats_pk`)
) TYPE=MyISAM;


