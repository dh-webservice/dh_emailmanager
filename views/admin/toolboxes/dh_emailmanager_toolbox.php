<div class="divider">
    <a class="button light" id="newAuthorToolbarButton">
        <i class="icon-plus"></i><?php echo lang('module_dh_emailmanager_add_new_email'); ?>
    </a>
</div>
 
<script type="text/javascript">
 
    $('newAuthorToolbarButton').addEvent('click', function(e)
    {
        ION.formWindow(
            'author',
            'authorForm',
            Lang.get('module_dh_emailmanager_label_email'),
            admin_url + 'module/dh_emailmanager/email_list/create',
            {
               'width':350,
               'height':250
            }
        );
    });
 
</script>