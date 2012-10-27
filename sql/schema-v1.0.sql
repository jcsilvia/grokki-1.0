/*
* Grokki MySQL Schema v1.0
* Author: J. Silvia
*/

# create the grokki database. Uncomment only if this is a fresh mysql install
# CREATE DATABASE grokki;

# Primary message repository
CREATE TABLE grokki.messages (
  `MessageId` bigint(19) NOT NULL AUTO_INCREMENT,
  `MemberId` bigint(19) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Content` varchar(255) DEFAULT NULL,
  `ParentMessageId` bigint(19) DEFAULT NULL,
  `GeoLat` decimal(10,6) DEFAULT NULL,
  `GeoLng` decimal(10,6) DEFAULT NULL,
  `RecipientId` int(10) DEFAULT NULL,
  `CategoryId` int(10) DEFAULT NULL,
  PRIMARY KEY (MessageId)
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

ALTER TABLE grokki.messages
  ADD INDEX messages_mid_idx (MemberId);
  
ALTER TABLE grokki.messages
  ADD INDEX messages_rid_idx (RecipientId);
  
ALTER TABLE grokki.messages
  ADD INDEX messages_cid_idx (CategoryId);

# Members Inbox
CREATE TABLE grokki.message_inbox (
  `MessageId` bigint(19) NOT NULL,
  `MemberId` bigint(19) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SenderId` bigint(19) DEFAULT NULL,
  `IsRead` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (MessageId, MemberId)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

ALTER TABLE grokki.message_inbox
  ADD INDEX message_inbox_sid_idx (SenderId);
  

# Members Sent Messages  
CREATE TABLE grokki.message_sent (
  `MessageId` bigint(19) NOT NULL,
  `MemberId` bigint(19) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (MessageId, MemberId)
) ENGINE=MYISAM DEFAULT CHARSET=utf8;


# Member repository - includes both consumers and businesses
CREATE TABLE grokki.members (
  `ShardId` int(3) NOT NULL DEFAULT 1,
  `MemberId` bigint(19) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) NOT NULL,
  `UserPassword` varchar(255) NOT NULL,
  `PasswordSalt` bigint(19),
  `FirstName`  varchar(50),
  `LastName`   varchar(50),
  `EmailAddress` varchar(50) NOT NULL,
  `FaceBookId`  varchar(50),
  `IsBusiness`   smallint(1) NOT NULL DEFAULT '0',
  `BusinessName` varchar(50),
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsEmailVerified` smallint(1) DEFAULT '0',
  `IsActiveAccount` smallint(1) NOT NULL DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (MemberId)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

# Member address repository - businesses will be able to use lat/lng for geolocation
CREATE TABLE grokki.addresses (
  `AddressId`  bigint(19) NOT NULL AUTO_INCREMENT,
  `MemberId` bigint(19) NOT NULL,
  `Address1` varchar(50),
  `Address2`  varchar(50),
  `City`   varchar(50),
  `State` varchar(2),
  `Zipcode`  varchar(15)NOT NULL,
  `Country`  varchar(50)NOT NULL DEFAULT 'US',
  `AddressType` enum('primary','alternate') NOT NULL DEFAULT 'primary',
  `PhoneNumber`  varchar(20),
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `GeoLat`   decimal(10,5),
  `GeoLng`   decimal(10,5),
  `GeoLatBox` decimal(10,5),
  `GeoLngBox` decimal(10,5),
  PRIMARY KEY (AddressId)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

ALTER TABLE grokki.addresses
  ADD INDEX addresses_mid_idx (memberId);
  
# Business category association  
CREATE TABLE grokki.business_categories (
  `CategoryId` int(10) NOT NULL,
  `MemberId` bigint(19) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `business_category_type` enum('primary','alternate') NOT NULL DEFAULT 'primary',
  PRIMARY KEY (MemberId, CategoryId)
) ENGINE=INNODB DEFAULT CHARSET=utf8;  

# Categories consumers can message on and businesses can subscribe to 
CREATE TABLE grokki.categories (
  `CategoryId` int(10) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(30) NOT NULL,
  `CategoryDescription`  varchar(255),
  `ParentCategoryId`  int(10),
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (CategoryId)
) ENGINE=INNODB DEFAULT CHARSET=utf8;  

ALTER TABLE grokki.categories
  ADD INDEX categories_pcid_idx (ParentCategoryId);

# Associations between members and businesses - like Facebook friends
CREATE TABLE grokki.member_associations (
  `MemberId` bigint(19) NOT NULL,
  `AssociateId` bigint(19) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (MemberId, AssociateId)
) ENGINE=MYISAM DEFAULT CHARSET=utf8;    

# Ratings repository per member interaction - used for sort, recommendations etc
CREATE TABLE grokki.member_ratings (
  `RatingId`  bigint(19) NOT NULL AUTO_INCREMENT,
  `MemberId` bigint(19) NOT NULL,
  `ReviewerId`  bigint(19) NOT NULL,
  `Rating` int(2) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (RatingId)
) ENGINE=MYISAM DEFAULT CHARSET=utf8;  

ALTER TABLE grokki.member_ratings
  ADD INDEX ratings_mid_idx (MemberId);
  
ALTER TABLE grokki.member_ratings
  ADD INDEX ratings_rid_idx (ReviewerId);

# Reviews repository - for member reviews of businesses
CREATE TABLE grokki.member_reviews (
  `ReviewId`  bigint(19) NOT NULL AUTO_INCREMENT,
  `MemberId` bigint(19) NOT NULL,
  `ReviewerId`  bigint(19) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (ReviewId)
) ENGINE=MYISAM DEFAULT CHARSET=utf8;  

ALTER TABLE grokki.member_reviews
  ADD INDEX reviews_mid_idx (MemberId);
  
ALTER TABLE grokki.member_reviews
  ADD INDEX reviews_rid_idx (ReviewerId);
  
# Member Aggregate data - should be calculated nightly  
CREATE TABLE grokki.member_aggregates (
  `MemberId` bigint(19) NOT NULL,
  `Rating`  decimal(2,2),
  `TotalRates` int(5),
  `PositiveReviews` int(5),
  `NegativeReviews` int(5),
  `UpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (MemberId)
) ENGINE=INNODB DEFAULT CHARSET=utf8;  

# Message counts - should be updated every message transaction
CREATE TABLE grokki.message_aggregates (
  `MemberId` bigint(19) NOT NULL,
  `InBoxUnread` int(5),
  `InBoxTotal`  int(5),
  `SentTotal`   int(5),
  `UpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (MemberId)
) ENGINE=INNODB DEFAULT CHARSET=utf8;  

# Message queue repository for tracking asyncronous processing of messages
CREATE TABLE grokki.messages_queue_1 (
  `MessageQueueId` bigint(19) NOT NULL AUTO_INCREMENT,
  `MessageId` bigint(19) NOT NULL,
  `MessageProcessed`  smallint(1) NOT NULL DEFAULT 0,
  `UpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (MessageQueueId)
) ENGINE=INNODB DEFAULT CHARSET=utf8;  

ALTER TABLE grokki.messages_queue_1
  ADD INDEX message_queue_mid_idx (MessageId);

# Codeigniter session table for tracking user sessions in the DB  
  CREATE TABLE `grokki`.`ci_sessions` (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(45) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity bigint(10) unsigned DEFAULT 0 NOT NULL,
	user_data text,
	PRIMARY KEY (session_id),
	KEY `last_activity_idx` (`last_activity`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

# table for converting zips to lat/longs
CREATE TABLE `zipcodes` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `zip` varchar(5) CHARACTER SET ascii NOT NULL DEFAULT '',
  `latitude` varchar(11) CHARACTER SET ascii NOT NULL DEFAULT '',
  `longitude` varchar(11) CHARACTER SET ascii NOT NULL DEFAULT '',
  `city` varchar(40) CHARACTER SET ascii NOT NULL DEFAULT '',
  `state` char(2) CHARACTER SET ascii NOT NULL DEFAULT '',
  `fullstate` varchar(30) CHARACTER SET ascii NOT NULL DEFAULT '',
  `county` varchar(40) CHARACTER SET ascii NOT NULL DEFAULT '',
  `zipclass` varchar(20) CHARACTER SET ascii NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `zip` (`zip`),
  KEY `city` (`city`,`state`),
  KEY `state` (`state`,`city`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;