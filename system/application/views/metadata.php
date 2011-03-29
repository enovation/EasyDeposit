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

   </ul>

<?php echo form_close(); ?>
