<?php if (!defined('APPLICATION')) exit();
$Session = Gdn::session();
include_once $this->fetchViewLocation('helper_functions', 'discussions', 'vanilla');


echo wrapIf(Gdn_Format::htmlFilter($Description), 'div', array('class' => 'P PageDescription'));

$this->fireEvent('AfterPageTitle');

include $this->fetchViewLocation('Subtree', 'Categories', 'Vanilla');

$this->fireEvent('AfterCategorySubtree');

$PagerOptions = array('Wrapper' => '<span class="PagerNub">&#160;</span><div %1$s>%2$s</div>', 'RecordCount' => $this->data('CountDiscussions'), 'CurrentRecords' => $this->data('Discussions')->numRows());
if ($this->data('_PagerUrl'))
    $PagerOptions['Url'] = $this->data('_PagerUrl');


if ($this->DiscussionData->numRows() > 0 || (isset($this->AnnounceData) && is_object($this->AnnounceData) && $this->AnnounceData->numRows() > 0)) {
    ?>
    <div class="DataList Discussions row">
        <?php include($this->fetchViewLocation('discussions', 'Discussions', 'Vanilla')); ?>
    </div>
    <?php

    echo '<div class="PageControls Bottom hidden-sm hidden-xs">';
    PagerModule::write($PagerOptions);
    echo Gdn_Theme::Module('NewDiscussionModule', $this->data('_NewDiscussionProperties', array('CssClass' => 'Button Action Primary')));
    echo '</div>';

} else {
    ?>
    <div class="Empty"><?php echo t('No discussions were found.'); ?></div>
<?php
}
