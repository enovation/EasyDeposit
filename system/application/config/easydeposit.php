<?php

// Configuration file for the EasyDeposit application
// This file can be edited using the administrative interface at:
// http://example.com/easydeposit/admin
// !!! No config line is allowed to span multiple lines. !!!

// Admin username and password
// (The password is stored encrypted. 6da12e83ef06d1d59884a5ca724cbc75 is 'easydepositadmin'
// The password can be changed in the admin interface
//$config['easydeposit_adminusername'] = 'easydepositadmin';
//$config['easydeposit_adminpassword'] = '6da12e83ef06d1d59884a5ca724cbc75';

// Location of the SWORD PHP library (this normally doesn't need to be changed)
$config['easydeposit_librarylocation'] = 'system/application/libraries/swordapp-php-library';

// The name of the application (as shown on the welcome page)
$config['easydeposit_welcome_title'] = "NDLR EasyDeposit";

// The steps that a submission should take
// The first of these should be a login step that has public static methods _loggedin and _id
$config['easydeposit_steps'] = array('nologin', 'retrieveservicedocument', 'metadata', 'uploadfiles', 'verify', 'depositcredentials', 'deposit', 'thankyou');
//$config['easydeposit_steps'] = array('nologin', 'selectrepository', 'servicedocument', 'metadata', 'uploadfiles', 'verify', 'deposit', 'thankyou');

// Email address for support enquiries for users of the client
//todo
$config['easydeposit_supportemail'] = 'mark.melia@enovation.ie';

// LDAP login settings
$config['easydeposit_ldaplogin_netidname'] = 'NetID';
$config['easydeposit_ldaplogin_server'] = 'ldaps://ldap.example.com';
$config['easydeposit_ldaplogin_context'] = 'OU=users,DC=example,DC=com';

// ServiceDocument Login settings  TODO - specify URL of service doc location for NDLR
$config['easydeposit_servicedocumentlogin_url'] = 'http://ndlr.enovation.ie/handle/123456789/5617';

// A list of service documents to provide in the selectrepository step
$config['easydeposit_selectrepository_list'] = array('https://dspace.ndlr.ie/sword/servicedocument');

// Credentials with which to retrieve a service document automatically 
$config['easydeposit_retrieveservicedocument_url'] = 'http://ndlr.enovation.ie/sword/servicedocument';
$config['easydeposit_retrieveservicedocument_username'] = 'cmsadmin@enovation.ie';
$config['easydeposit_retrieveservicedocument_password'] = 'na3QaYfh4';
$config['easydeposit_retrieveservicedocument_obo'] = '';

// Item types
//$config['easydeposit_metadata_itemtypes'] = array('http://purl.org/eprint/type/JournalArticle' => 'Journal article', 'http://purl.org/eprint/type/ConferencePaper' => 'Conference paper', 'http://purl.org/eprint/type/ConferencePoster' => 'Conference poster', 'http://purl.org/eprint/type/Thesis' => 'Thesis or dissertation', 'http://purl.org/eprint/type/Book' => 'Book', 'http://purl.org/eprint/type/BookItem' => 'Book chapter', 'http://purl.org/eprint/type/BookReview' => 'Book review', 'http://purl.org/eprint/type/Report' => 'Report', 'http://purl.org/eprint/type/WorkingPapaer' => 'Working paper', 'http://purl.org/eprint/type/NewsItem' => 'News item', 'http://purl.org/eprint/type/Patent' => 'Patent', 'http://purl.org/eprint/type/Report' => 'Report');
$config['easydeposit_metadata_itemtypes'] = array(''=>'select...', 'Learning Object'=>'Learning Object', 'Animation'=>'Animation', 'Article'=>'Article', 'Book'=>'Book', 'Book chapter'=>'Book chapter', 'Dataset'=>'Dataset', 'Image'=>'Image', 'Image, 3-D'=>'Image, 3-D', 'Map'=>'Map', 'Musical score'=>'Musical score', 'Plan or blueprint'=>'Plan or blueprint', 'Preprint'=>'Preprint', 'Presentation'=>'Presentation', 'Recording, acoustical'=>'Recording, acoustical', 'Recording, musical'=>'Recording, musical', 'Recording, oral'=>'Recording,oral','Software'=>'Software', 'Technical Report'=>'Techical Report', 'Thesis'=>'Thesis', 'Video'=>'Video', 'Working Paper'=>'Working Paper', 'Other'=>'Other');

// Peer review status
$config['easydeposit_metadata_peerreviewstatus'] = array('http://purl.org/eprint/status/PeerReviewed' => 'Yes', 'http://purl.org/eprint/status/NonPeerReviewed' => 'No');

// The number of files to allow a user to upload
$config['easydeposit_uploadfiles_number'] = 5;

// Where to save files (remember trailing slash!)
$config['easydeposit_uploadfiles_savedir'] = 'private/uploadfiles/';

// Where to store packages (make sure these directories exist and the web server can write to them)
$config['easydeposit_deposit_packages'] = 'private/uploadfiles/';
$config['easydeposit_multipledeposit_packages'] = "private/uploadfiles/";

//license locations
$config['ndlr_cclicense_location']='private/licenses/cclicense.txt';
$config['ndlr_restrictivelicense_location']='private/licenses/restrictivelicense.txt';

// Hard code depositurl, login and password if using the depositcredentials step
$config['easydeposit_depositcredentials_depositurl'] = 'http://ndlr.enovation.ie/sword/deposit/123456789/5617';
$config['easydeposit_depositcredentials_username'] = 'cmsadmin@enovation.ie';
$config['easydeposit_depositcredentials_password'] = 'na3QaYfh4';
$config['easydeposit_depositcredentials_obo'] = '';

// Hard code depositurls, logins and passwords if using the multipledepositcredentials step
$config['easydeposit_multipledepositcredentials_depositurl'] = array('http://localhost/sword/deposit/123456789/2', 'http://localhost/sword/deposit/123456789/2');
$config['easydeposit_multipledepositcredentials_username'] = array('email@example.com', 'email@another.com');
$config['easydeposit_multipledepositcredentials_password'] = array('password1', 'password2');
$config['easydeposit_multipledepositcredentials_obo'] = array('', '');

// Email settings
$config['easydeposit_email_from'] = 'example@email.com';
$config['easydeposit_email_fromname'] = 'Example sender name';
$config['easydeposit_email_cc'] = '';
$config['easydeposit_email_subject'] = 'Thank you for your deposit';
$config['easydeposit_email_end'] = "Best wishes,\n\nThe repository team\nsupport@example.com";

// CrossRef API DOI lookup configuration
// Register for a key at http://www.crossref.org/requestaccount/
// Your API KEY is the email address that you used to register
$config['easydeposit_crossrefdoilookup_apikey'] = 'API_KEY';
$config['easydeposit_crossrefdoilookup_itemtypes'] = array('http://purl.org/eprint/type/JournalArticle' => 'Journal article', 'http://purl.org/eprint/type/ConferencePaper' => 'Conference paper', 'http://purl.org/eprint/type/ConferencePoster' => 'Conference poster', 'http://purl.org/eprint/type/Thesis' => 'Thesis or dissertation', 'http://purl.org/eprint/type/Book' => 'Book', 'http://purl.org/eprint/type/BookItem' => 'Book chapter', 'http://purl.org/eprint/type/BookReview' => 'Book review', 'http://purl.org/eprint/type/Report' => 'Report', 'http://purl.org/eprint/type/WorkingPapaer' => 'Working paper', 'http://purl.org/eprint/type/NewsItem' => 'News item', 'http://purl.org/eprint/type/Patent' => 'Patent', 'http://purl.org/eprint/type/Report' => 'Report');
$config['easydeposit_crossrefdoilookup_peerreviewstatus'] = array('http://purl.org/eprint/status/PeerReviewed' => 'Yes', 'http://purl.org/eprint/status/NonPeerReviewed' => 'No');
$config['ndlr_licenses'] = array(''=>'Select...', 'Y' => 'NDLR Restricted License', 'N' => 'Creative Commons Attribution-Non-Commercial-Share Alike 3.0 License');
?>
