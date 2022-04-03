#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
  header text DEFAULT '' NOT NULL,
  projects int(11) DEFAULT 0 NOT NULL
);

#
# Table structure for table 'pages'
#
CREATE TABLE pages (
  fa_icon_name varchar(255) DEFAULT '' NOT NULL
);

#
# Table structure for table 'tx_fxtemplateshhhuerth_domain_model_project'
#
CREATE TABLE tx_fxtemplateshhhuerth_domain_model_project (
  title varchar(255) DEFAULT '' NOT NULL,
  row_description text DEFAULT '' NOT NULL,
  gallerytype int(4) DEFAULT 0 NOT NULL,
  image_before int(11) DEFAULT 0 NOT NULL,
  image_after int(11) DEFAULT 0 NOT NULL,
  gallery int(11) DEFAULT 0 NOT NULL,
  tt_content_related_project int(11) DEFAULT 0 NOT NULL,
);
