-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************


-- --------------------------------------------------------

-- 
-- Table `tl_content`
-- 

CREATE TABLE `tl_content` (
  `encode_utf8` char(1) NULL default '', 
  `decode_utf8` char(1) NULL default '',
  `readfromurl` varchar(255) NOT NULL default '',
  `readfromurl_source` varchar(255) NOT NULL default '0',
  `readfromurl_template` char(255) NOT NULL default '',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;