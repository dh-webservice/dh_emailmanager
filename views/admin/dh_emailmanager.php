<div id="maincolumn">
 
    <h2 class="main demo"><?php echo lang('module_dh_emailmanager_title'); ?></h2>
 
    <div class="main subtitle">
 
        <!-- About this module -->
        <p class="lite">
            <?php echo lang('module_dh_emailmanager_about'); ?>
        </p>
 
    </div>
 
    <!-- Will contains the authors list -->
    <div id="moduleDemoAuthorsList"></div>
 
</div>
 
<script type="text/javascript">
 
    // Init the panel toolbox is mandatory
	ION.initModuleToolbox('dh_emailmanager','dh_emailmanager_toolbox');
 
    // Update the authors list
    ION.HTML(
            'module/dh_emailmanager/email_list/get_list',      // URL to the controller
            {},                                 // Data send by POST. Nothing
            {'update':'moduleDemoAuthorsList'}  // JS request options
    );
 
</script>