<?php 
/*
echo $csv; <br /><br />

<a id="csv_btn" class="">Generate CSV File</a><br /><br />
*/
?>


<div class="csv_container">
    <form id="dh_csv_form" method="post" action="/dh_emailmanager" target="_blank">
    	<textarea name="csv"><?php echo json_encode($emails); ?></textarea>
        <input type="submit" value="<?php echo lang('module_dh_generate_excel_csv')?>" />
    </form>
</div>



<span class="dh_display_inline_block dh_cell_width_xs dh_cell_padding_left_sm"><strong>#</strong></span>
<span class="dh_display_inline_block dh_cell_width_lg dh_cell_padding_left_md"><strong><?php echo lang('module_dh_emailmanager_table_heading_email')?></strong></span>
<span class="dh_display_inline_block dh_cell_width_lg dh_cell_padding_left_lg"><strong><?php echo lang('module_dh_emailmanager_table_heading_name')?></strong></span>
<span class="dh_display_inline_block dh_cell_width_sm dh_cell_padding_left_xl"><strong><?php echo lang('module_dh_emailmanager_table_heading_language')?></strong></span>
<span class="dh_display_inline_block dh_cell_width_sm dh_cell_padding_left_xxl"><strong><?php echo lang('module_dh_emailmanager_table_heading_date')?></strong></span>
<?php
$row_number=0;
?>
<ul class="authorPanelList list mb20 mt10">
 
    <?php foreach($emails as $email) :?>
 
    <?php
    $id = $email['id'];
	$row_number++;
    ?>
 
    <li class="author<?php echo $id ?>" id="author_<?php echo $id ?>" data-id="<?php echo $id ?>">
		<span class="dh_display_inline_block left dh_cell_width_xs"><?php echo $row_number ?></span>
		<a class="icon delete right"></a>
        <a class="pl5 edit title dh_display_inline_block dh_cell_width_lg" data-id="<?php echo $id ?>">
            <?php echo $email['email'] ?>
        </a>
        <span class="dh_display_inline_block dh_cell_width_lg">
	        <?php echo $email['name'] ?>
        </span>
        <span class="dh_display_inline_block dh_cell_width_sm">
	        <?php echo $email['lang'] ?>
        </span>
        <span class="dh_display_inline_block dh_cell_width_sm"><?php 
		$datestring = "%d.%m.%Y - %H:%i";
		#$time = time();
		
		echo mdate($datestring, strtotime($email['time']));		
		
		#echo date($email['time']);
		#echo date($email['time']);
		?></span>
    </li>
 
    <?php endforeach ;?>
 
</ul>


<script type="text/javascript">
 
    // Click Event to display the details of one creator
    $$('.authorPanelList li').each(function(item, idx)
    {
        var id = item.getProperty('data-id');
        var a = item.getElement('a.title');
        var del = item.getElement('a.delete');
		 
        a.removeEvents('click');
        a.addEvent('click', function(e)
        {
            // see : /themes/admin/javascript/ionize/ionize_window.js
            // ION.formWindow : function(id, form, title, wUrl, wOptions, data)
            ION.formWindow(
                    'author' + id, // ID of the window
                    'authorForm' + id, // ID of the author form
                    'module_dh_emailmanager_title_edit_email', // term of the window title
                    'module/dh_emailmanager/email_list/get/' + id, // URL of the controller
                    {
                        'width':350,
                        'height':200
                    }
            );
        });
        ION.initRequestEvent(
                del, // The item to add the event on
                admin_url + 'module/dh_emailmanager/email_list/delete/' + id, // URL to call
                {}, // Data to send. Here nothing.
                // Confirmation object
                {
                    'confirm': true,
                    'message': Lang.get('ionize_confirm_element_delete')
                }
        );		
		
    });
 
</script>
