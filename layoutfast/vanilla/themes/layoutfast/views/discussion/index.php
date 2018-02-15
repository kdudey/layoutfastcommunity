<?php if (!defined('APPLICATION')) exit();
$Session = Gdn::session();
if (!function_exists('WriteComment'))
    include $this->fetchViewLocation('helper_functions', 'discussion');
?>

<div class="MessageList Discussion row">
    <div class="Options">
        <?php
        $this->fireEvent('BeforeDiscussionOptions');
        //WriteBookmarkLink();
        echo getDiscussionOptionsDropdown();
        WriteAdminCheck();
        ?>
    </div>
    <!-- Page Title -->
    <div id="Item_0" class="PageTitle">
        <h1><?php echo $this->data('Discussion.Name') ?></h1>
    </div>
    <?php 
    $this->fireEvent('AfterDiscussionTitle');
    $this->fireEvent('AfterPageTitle');


    // Write the initial discussion.
    if ($this->data('Page') == 1) {
        include $this->fetchViewLocation('discussion', 'discussion');
        $this->fireEvent('AfterDiscussion');
    } 

    ?>
    <div class="CommentsWrap">
        <?php 
        $this->Pager->Wrapper = '<span %1$s>%2$s</span>';
        echo '<span class="BeforeCommentHeading">';
        $this->fireEvent('CommentHeading');
        echo $this->Pager->toString('less');
        echo '</span>';
        ?>
        <div class="MessageList Comments">
            <?php include $this->fetchViewLocation('comments'); ?>
        </div>
        <?php
        $this->fireEvent('AfterComments');
        if ($this->Pager->LastPage()) {
            $LastCommentID = $this->addDefinition('LastCommentID');
            if (!$LastCommentID || $this->Data['Discussion']->LastCommentID > $LastCommentID)
                $this->addDefinition('LastCommentID', (int)$this->Data['Discussion']->LastCommentID);
            $this->addDefinition('Vanilla_Comments_AutoRefresh', Gdn::config('Vanilla.Comments.AutoRefresh', 0));
        }
        ?>
    </div>

    <div class="P PagerWrap">
        <?php
        $this->Pager->Wrapper = '<div %1$s>%2$s</div>';
        echo $this->Pager->toString('more');
        ?>
    </div>
</div>
<?php

WriteCommentForm();
