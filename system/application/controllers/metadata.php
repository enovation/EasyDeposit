<?php

// Name: Metadata
// Description: Select some standard metadata for journal articles
// Notes: Collects title, up to three authors, abstract, type, peer review status, citation and link

require_once('EasyDeposit.php');

class Metadata extends EasyDeposit
{

    function Metadata()
    {
        // Initalise the parent
        parent::EasyDeposit();
    }

    function index()
    {   
	// Load javascripts
        $data['javascript'] = array('mootools1.2.js', 'mootools1.2-more.js', 'jquery-1.2.6.min.js', 'jquery.mcdropdown.js', 'jquery.bgiframe.js');

        // Prepoulate some session variables
        $_SESSION['metadata-type'] = '';

        // Validate the form
        $this->form_validation->set_rules('title', 'Title', 'xss_clean|_clean|required');
        $this->form_validation->set_rules('author1', 'First author', 'xss_clean|_clean|required');
        $this->form_validation->set_rules('author2', 'Second author', 'xss_clean|_clean');
        $this->form_validation->set_rules('author3', 'Third author', 'xss_clean|_clean');
        $this->form_validation->set_rules('abstract', 'Abstract', 'xss_clean|_clean');
        $this->form_validation->set_rules('type', 'Type', 'xss_clean|_clean|required');
        $this->form_validation->set_rules('citation', 'Bibliographic citation', 'xss_clean|_clean');
        $this->form_validation->set_rules('link', 'Link', 'xss_clean|_clean');
        $this->form_validation->set_rules('keyword', 'ISCED Keywords', 'xss_clean|_clean|required');
	$this->form_validation->set_rules('rights', 'Rights', 'xss_clean|_clean|required');
	
	if ($this->form_validation->run() == FALSE)
        {
            // Set the page title
            $data['page_title'] = 'Describe your item';

            // Display the header, page, and footer
            $this->load->view('header', $data);
            $this->load->view('metadata');
            $this->load->view('footer');
        }
        else
        {
            // Store the metadata in the session
            $_SESSION['metadata-title'] = $this->input->xss_clean($_POST['title']);
            $_SESSION['metadata-author1'] = $this->input->xss_clean($_POST['author1']);
            $_SESSION['metadata-author2'] = $this->input->xss_clean($_POST['author2']);
            $_SESSION['metadata-author3'] = $this->input->xss_clean($_POST['author3']);
            $_SESSION['metadata-abstract'] = $this->input->xss_clean($_POST['abstract']);

            $types = $this->config->item('easydeposit_metadata_itemtypes');
            $_SESSION['metadata-type'] = $this->input->xss_clean($types[$_POST['type']]);

            $_SESSION['metadata-link'] = $this->input->xss_clean($_POST['link']);
	
	    $_SESSION['metadata-keyword'] = $this->input->xss_clean($_POST['keyword']);
	    $_SESSION['metadata-licenses'] = $this->input->xss_clean($_POST['rights']);
            // Go to the next page
	    $licences = $this->config->item('ndlr_licenses');
            $_SESSION['licText'] = $licences[$_SESSION['metadata-licenses']];
		
	 // Find the path to this script
            $path = str_replace('index.php', '', $_SERVER["SCRIPT_FILENAME"]);

            // Make the directory to save the files in
            $id = $this->userid;

	    $savepath = $path . $this->config->item('easydeposit_uploadfiles_savedir') . $id;

	    if (file_exists($savepath))
            {
		$this->_rmdir_R($savepath);
            }
            mkdir($savepath);
            if($_SESSION['licText'] == 'Y'){
                copy($this->config->item('ndlr_cclicense_location'), $savepath.'/license.txt');
            }else{
                copy($this->config->item('ndlr_restrictivelicense_location'), $savepath.'/license.txt');
            }
	    $this->_gotonextstep();
	}
    }

    public static function _verify($data)
    {
        // Verify the metadata that has been stored
        $data[] = array('Title', $_SESSION['metadata-title'], 'metadata', 'true');
        $data[] = array('Author 1', $_SESSION['metadata-author1'], 'metadata', 'true');
        if (!empty($_SESSION['metadata-author2']))
        {
            $data[] = array('Author 2', $_SESSION['metadata-author2'], 'metadata', 'true');
        }
        if (!empty($_SESSION['metadata-author3']))
        {
            $data[] = array('Author 3', $_SESSION['metadata-author3'], 'metadata', 'true');
        }
        if (!empty($_SESSION['metadata-abstract']))
        {
            $data[] = array('Abstract', $_SESSION['metadata-abstract'], 'metadata', 'true');
        }
        $data[] = array('Type of item', $_SESSION['metadata-type'], 'metadata', 'true');
        if (!empty($_SESSION['metadata-citation']))
        {
            $data[] = array('Bibliographic citation', $_SESSION['metadata-citation'], 'metadata', 'true');
        }
        if (!empty($_SESSION['metadata-link']))
        {
            $data[] = array('Link', $_SESSION['metadata-link'], 'metadata', 'true');
        }
	if (!empty($_SESSION['metadata-keyword']))
        {
            $data[] = array('ISCED Keyword', $_SESSION['metadata-keyword'], 'metadata', 'true');
        }
	if (!empty($_SESSION['metadata-licenses']))
        {
            $data[] = array('Rights',  $_SESSION['licText'], 'metadata', 'true');
        }

        return $data;
    }

    public static function _package($package)
    {
        // Use the metadata in making the package
        $package->setTitle($_SESSION['metadata-title']);
        $package->addCreator($_SESSION['metadata-author1']);
        $package->setType($_SESSION['metadata-type']);
	if (!empty($_SESSION['metadata-author2']))
        {
            $package->addCreator($_SESSION['metadata-author2']);
        }
        if (!empty($_SESSION['metadata-author3']))
        {
            $package->addCreator($_SESSION['metadata-author3']);
        }
        if (!empty($_SESSION['metadata-abstract']))
        {
            $package->setAbstract($_SESSION['metadata-abstract']);
        }
       // $data[] = array('Type of item', $_SESSION['metadata-type'], 'metadata', 'true');
        if (!empty($_SESSION['metadata-citation']))
        {
            $package->setCitation($_SESSION['metadata-citation']);
        }
        if (!empty($_SESSION['metadata-link']))
        {
            $package->setIdentifier($_SESSION['metadata-link']);
        }
	if(!empty($_SESSION['metadata-licenses']))
	{
	    $package->setLicense($_SESSION['metadata-licenses']);
        }
        if(!empty($_SESSION['metadata-keyword']))
        {
            $keywordEntry = $_SESSION['metadata-keyword'];
	   // $keywords = preg_split("/[\s,] /", $keywordEntry);
	   // foreach($keywords as $keyword){
	   	$package->addKeyword($keywordEntry);
	   // }
        }

    }

  /*  public static function _email($message)
    {
        // Add the details
        $message .= "Thank you for depositing an electronic copy of your item '" . $_SESSION['metadata-title']. ":\n";
        $message .= ' - Author: ' . $_SESSION['metadata-author1'] . "\n";
        if (!empty($_SESSION['metadata-author2']))
        {
            $message .= ' - Author 2: ' . $_SESSION['metadata-author2'] . "\n";
        }
        if (!empty($_SESSION['metadata-author3']))
        {
            $message .= ' - Author 3: ' . $_SESSION['metadata-author3'] . "\n";
        }
        if (!empty($_SESSION['metadata-abstract']))
        {
            $message .= ' - Abstract: ' . $_SESSION['metadata-abstract'] . "\n";
        }
        if (!empty($_SESSION['metadata-citation']))
        {
            $message .= ' - Citation: ' . $_SESSION['metadata-citation'] . "\n";
        }
        if (!empty($_SESSION['metadata-link']))
        {
            $message .= ' - Link: ' . $_SESSION['metadata-link'] . "\n";
        }
        $message .= "\n";

        return $message;
    } */
}

?>
