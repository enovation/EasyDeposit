<script type="text/javascript">
        <!--//
	var keywordCounter = <?php if(!empty($_SESSION['metadata-keywords'])){echo (sizeof($_SESSION['metadata-keywords'])+1);}else{echo '2';}?>
        // on DOM ready
        $(document).ready(function (){
                $("#keyword1").mcDropdown("#keywordmenu", null, "1");
		<?php for($i = 2; !empty($_SESSION['metadata-keywords'])&&$i<=sizeof($_SESSION['metadata-keywords']); $i++){ ?>
        		$("#keyword<?php echo $i?>").mcDropdown("#keywordmenu", null, "<?php echo $i ?>");
		<?php } ?>
	
	});

	function addKeywordBox() {
   	   $("#keywords").append('<label for="keyword'+keywordCounter+'" class="fixedwidthlabel"> &#160;  </label><input name="keyword'+keywordCounter+'" type="text" id="keyword'+keywordCounter+'" /><br/>');
  // $("#id_isced_"+nextelement).mcDropdown("#keywordmenu", null, nextelement);
  // $(".mcdropdown:last").parent().append('<div id="addNewKeyword"><input type="button" onclick="javascript:addNewKeyword();" value="Add+"/></div>');

//	    var keywordDiv = document.getElementById("keywords");
//	    var keywordCount = document.getElementById("keywordcount");
//	    var textfield = document.createElement("input");
//	    var label = document.createElement("label");
//	    label.setAttribute("class", "fixedwidthlabel");
//	    label.setAttribute("for", "keywords");
//	    label.setAttribute("id", "label"+keywordCounter);
//	    label.innerHTML=" &#160; ";
//	    textfield.setAttribute("type", "textfield");    
//	    textfield.setAttribute("name","keyword"+keywordCounter);
//	    textfield.setAttribute("id", "keyword"+keywordCounter);
//	    keywordDiv.appendChild(label);    
//	    keywordDiv.appendChild(textfield);
// 	    keywordDiv.appendChild(document.createElement("br"));
	    $("#keyword"+keywordCounter).mcDropdown("#keywordmenu", null, keywordCounter);
	   $("#keywordcount").val(keywordCounter);
	    keywordCounter++;
	}
        //-->
        </script>





<p>
	Please describe your item:
</p>

<?php echo validation_errors(); ?>

<?php echo form_open('metadata'); ?>

<div class="section">

    <div class="formtextnext">
        <label for="title" class="fixedwidthlabel">Title:</label>
        <input type="text" id="title" name="title" size="60"
               value="<?php echo set_value('title'); ?><?php if (!empty($_SESSION['metadata-title'])) { echo $_SESSION['metadata-title']; } ?>" />
    </div>

</div>

<div class="section">

    <div class="formtextnext">

        <label for="author1" class="fixedwidthlabel">Author 1:</label>
        <input type="text" id="author1" name="author1" size="40"
               value="<?php echo set_value('author1'); ?><?php if (!empty($_SESSION['metadata-author1'])) { echo $_SESSION['metadata-author1']; } ?>" />
        <br />

        <label for="author2" class="fixedwidthlabel">Author 2 <em>(optional)</em>:</label>
        <input type="text" id="author2" name="author2" size="40"
               value="<?php echo set_value('author2'); ?><?php if (!empty($_SESSION['metadata-author2'])) { echo $_SESSION['metadata-author2']; } ?>" />
        <br />

        <label for="author3" class="fixedwidthlabel">Author 3 <em>(optional)</em>:</label>
        <input type="text" id="author3" name="author3" size="40"
               value="<?php echo set_value('author3'); ?><?php if (!empty($_SESSION['metadata-author3'])) { echo $_SESSION['metadata-author3']; } ?>" />
    </div>

</div>

<div class="section">

    <div class="formtextnext">
        <label for="abstract" class="fixedwidthlabel">Abstract <em>(optional)</em>:</label>
        <textarea id="abstract" name="abstract" rows="6" cols="50"
        ><?php echo set_value('abstract'); ?><?php if (!empty($_SESSION['metadata-abstract'])) { echo $_SESSION['metadata-abstract']; } ?></textarea>
    </div>

</div>

<div class="section">

    <div class="formtextnext">

        <label for="type" class="fixedwidthlabel">Type of item:</label>
        <?php
		$value = '';
		if(!empty($_SESSION['metadata-type'])){
			$value = $_SESSION['metadata-type'];
		}else{
			$value = set_value('type');
		}
            echo form_dropdown('type', $this->config->item('easydeposit_metadata_itemtypes'), $value, 'id="type"');
        ?>
        <br />

        <label for="link" class="fixedwidthlabel">Existing URL for item <em>(optional)</em>:</label>
        <input type="text" id="link" name="link" size="40"
               value="<?php echo set_value('link'); ?><?php if (!empty($_SESSION['metadata-link'])) { echo $_SESSION['metadata-link']; } ?>" />


	<br />
	<div class="formattextnext" id="keywords">
	<input type="hidden" id="current_menu" value="0"/>
        <label for="keywords" class="fixedwidthlabel">Subject keywords (controlled):</label>
	<input type="text" name="keyword1" id="keyword1" value="<?php echo set_value('keyword1');?><?php if (!empty($_SESSION['metadata-keywords'][0])) { echo $_SESSION['metadata-keywords'][0]; } ?>" />
	<br>
	<?php 
	for($i = 2; !empty($_SESSION['metadata-keywords'])&&$i<=sizeof($_SESSION['metadata-keywords']); $i++){ ?>
		<label class="fixedwidthlabel">&#160;</label>
		<input type="text" name="keyword<?php echo $i ?>" id="keyword<?php echo $i ?>" value="<?php echo set_value('keyword'.$i); if(!empty($_SESSION['metadata-keywords'][$i-1])){echo $_SESSION['metadata-keywords'][$i-1];} ?> "/>
        	<br>
	<?php } ?>
	</div>
	<input type="hidden" id="keywordcount" name="keywordcount" value="<?php if(!empty($_SESSION['metadata-keywords'])){echo sizeof($_SESSION['metadata-keywords']);}else{echo '1';}?>"/>
	<label class="fixedwidthlabel">&#160;</label><div style="float:left; height:20px"><a  href="javascript:addKeywordBox()" >add additional keywords</a> </div>
	<br/>
	

        <label for="rights" class="fixedwidthlabel">Rights<em></em>:</label>
	<?php
		$value = '';
                if(!empty($_SESSION['metadata-licenses'])){
                        $value = $_SESSION['metadata-licenses'];
                }else{
                        $value = set_value('rights');
                }

            echo form_dropdown('rights', $this->config->item('ndlr_licenses'), $value , 'id="rights"');
        ?>





    </div>

</div>

<div class="section">

    <input type="Submit" name="submit" id="submit" value="Next &gt;" />

</div>


<ul id="keywordmenu" class="mcdropdown_menu">
     <li rel="Education, Learning Technology and Academic support">Education, Learning Technology and Academic support
            <ul>
                <li rel="Academic teaching and learning support ">Academic teaching and learning support </li>
                <li rel="Learning Technology">Learning Technology </li>
                <li rel="Education science">Education science </li>
                <li rel="Training of teachers and educators">Training of teachers and educators </li>
                <li rel="Vocational education">Vocational education </li>
                <li rel="Research Methods">Research Methods </li>
            </ul>
       </li>

        <li rel="Arts">Arts
            <ul>
                <li rel="Fine Arts">Fine Arts </li>
                <li rel="Art History ">Art History </li>
                <li rel="Music, drama and performing arts">Music, drama and performing arts </li>
                <li rel="Audio-visual techniques and media production ">Audio-visual techniques and media production </li>
                <li rel="Design ">Design </li>
                <li rel="Craft skills">Craft skills </li>
                <li rel="Cultural Studies">Cultural Studies </li>
            </ul>
        </li>

        <li rel="Humanities">Humanities
            <ul>
                <li rel="Religion and Theology">Religion and Theology </li>
                <li rel="Philosophy and ethics">Philosophy and ethics </li>
                <li rel="Irish language &amp; literature">Irish language &amp; literature </li>
                <li rel="English language &amp; literature">English language &amp; literature </li>
                <li rel="Modern languages &amp; literature">Modern languages &amp; literature </li>
                <li rel="Classics (languages &amp; literature) ">Classics (languages &amp; literature) </li>
                <li rel="History and archaeology">History and archaeology </li>
                <li rel="Classics (History and archaeology)">Classics (History and archaeology) </li>
                <li rel="Gender/women’s studies">Gender/women’s studies </li>
            </ul>
        </li>
        <li rel="Social and behavioural sciences">Social and behavioural sciences
            <ul>
                <li rel="Psychology">Psychology </li>
                <li rel="Sociology">Sociology </li>
                <li rel="Political science">Political science </li>
                <li rel="Economics">Economics </li>
            </ul>
        </li>
        <li rel="Media, Information and Library Studies">Media, Information and Library Studies
            <ul>
                <li rel="Journalism, publishing and reporting">Journalism, publishing and reporting </li>
                <li rel="Library, information and archival studies">Library, information and archival studies </li>
            </ul>
        </li>
        <li rel="Business &amp; management">Business &amp; management
            <ul>
                <li rel="Wholesale and retail sales">Wholesale and retail sales </li>
                <li rel="Marketing and communication">Marketing and communication </li>
                <li rel="Finance, banking, insurance">Finance, banking, insurance </li>
                <li rel="Accountancy and taxation">Accountancy and taxation </li>
                <li rel="Management and administration">Management and administration </li>
                <li rel="Secretarial and office work">Secretarial and office work </li>
                <li rel="Working life">Working life </li>
            </ul>
        </li>
        <li rel="Law">Law
            <ul>
                <li rel="Law">Law </li>
            </ul>
        </li>
        <li rel="Biological Sciences">Biological Sciences
            <ul>
                <li rel="Biology and biochemistry">Biology and biochemistry </li>
                <li rel="Environmental sciences">Environmental sciences </li>
            </ul>
        </li>
        <li rel="Physical sciences">Physical sciences
            <ul>
                <li rel="Physics">Physics </li>
                <li rel="Chemistry">Chemistry </li>
                <li rel="Earth sciences">Earth sciences </li>
                <li rel="Geography">Geography </li>
            </ul>
        </li>
        <li rel="Mathematics and statistics">Mathematics and statistics
            <ul>
                <li rel="Mathematics">Mathematics </li>
                <li rel="Statistics">Statistics </li>
            </ul>
        </li>
        <li rel="Computer Science">Computer Science
            <ul>
                <li rel="Computer science">Computer science </li>
                <li rel="Computer use">Computer use </li>
            </ul>
        </li>
        <li rel="Engineering and engineering trades">Engineering and engineering trades
            <ul>
                <li rel="Mechanical engineering">Mechanical engineering </li>
                <li rel="Energy technology and engineering">Energy technology and engineering </li>
                <li rel="Electrical, electronic and communications engineering">Electrical, electronic and communications engineering </li>
                <li rel="Chemical engineering">Chemical engineering </li>
                <li rel="Construction and civil engineering">Construction and civil engineering </li>
                <li rel="Motor vehicles, ships and aircraft">Motor vehicles, ships and aircraft </li>
                <li rel="Biotechnology and bioengineering">Biotechnology and bioengineering </li>
            </ul>
        </li>
        <li rel="Manufacturing and processing">Manufacturing and processing
            <ul>
                <li rel="Food processing ">Food processing </li>
                <li rel="Textiles, clothes, footwear, leather">Textiles, clothes, footwear, leather </li>
                <li rel="Materials (wood, paper, plastic, glass)">Materials (wood, paper, plastic, glass) </li>
                <li rel="Mining and extraction ">Mining and extraction </li>
            </ul>
        </li>
        <li rel="Architecture and planning">Architecture and planning
            <ul>
                <li rel="Architecture and town planning">Architecture and town planning </li>
            </ul>
        </li>
        <li rel="Agriculture, forestry and fishery">Agriculture, forestry and fishery
            <ul>
                <li rel="Crop and livestock production">Crop and livestock production </li>
                <li rel="Horticulture">Horticulture </li>
                <li rel="Forestry ">Forestry </li>
                <li rel="Fishery">Fishery </li>
            </ul>
        </li>
        <li rel="Veterinary Medicine">Veterinary Medicine
            <ul>
                <li rel="Veterinary medicine">Veterinary medicine </li>
            </ul>
        </li>
        <li rel="Health">Health
            <ul>
                <li rel="Medicine">Medicine </li>
                <li rel="Nursing, Midwifery and Clinical Skills">Nursing, Midwifery and Clinical Skills </li>
                <li rel="Dental science">Dental science </li>
                <li rel="Medical diagnostic and treatment technology">Medical diagnostic and treatment technology </li>
                <li rel="Therapy and rehabilitation">Therapy and rehabilitation </li>
                <li rel="Pharmacy">Pharmacy </li>
            </ul>
        </li>
        <li rel="Social Work and Social Care">Social Work and Social Care
            <ul>
                <li rel="Child care and youth services">Child care and youth services </li>
                <li rel="Social work and counselling">Social work and counselling </li>
            </ul>
        </li>
        <li rel="Service and Leisure Industry">Service and Leisure Industry
            <ul>
                <li rel="Hotel, restaurant and catering">Hotel, restaurant and catering </li>
                <li rel="Travel, tourism and leisure">Travel, tourism and leisure </li>
                <li rel="Sports Science &amp; Recreation">Sports Science &amp; Recreation </li>
                <li rel="Domestic services">Domestic services </li>
                <li rel="Hair and beauty services">Hair and beauty services </li>
            </ul>
        </li>
        <li rel="Transport services">Transport services
            <ul>
                <li rel="Transport services">Transport services </li>
            </ul>
        </li>
        <li rel="Environmental protection">Environmental protection
            <ul>
                <li rel="Environmental protection technology">Environmental protection technology </li>
                <li rel="Natural environments and wildlife">Natural environments and wildlife </li>
                <li rel="Community sanitation services">Community sanitation services </li>
            </ul>
        </li>
        <li rel="Security services">Security services
            <ul>
                <li rel="Protection of persons and property">Protection of persons and property </li>
                <li rel="Occupational health and safety">Occupational health and safety </li>
                <li rel="Military and defence ">Military and defence </li>
            </ul>
        </li>
   </ul>

<?php echo form_close(); ?>
