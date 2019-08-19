CREATE TABLE tx_xnewsfeed_domain_model_item (
  -- Columns
  title varchar(255) DEFAULT '' NOT NULL,
  slug varchar(255) DEFAULT '' NOT NULL,
  itemdate date,
  bodytext mediumtext,
  image int(11) unsigned DEFAULT '0' NOT NULL,
  additional_images int(11) unsigned DEFAULT '0' NOT NULL,
  link varchar(255) DEFAULT '' NOT NULL
);
