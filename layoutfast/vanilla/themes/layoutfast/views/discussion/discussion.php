<?php
/**
 * @copyright 2009-2014 Vanilla Forums Inc.
 * @license http://www.opensource.org/licenses/gpl-2.0.php GPLv2
 */

if (!defined('APPLICATION')) {
    exit();
}
$UserPhotoFirst = c('Vanilla.Comment.UserPhotoFirst', true);

$Discussion = $this->data('Discussion');
$Author = Gdn::userModel()->getID($Discussion->InsertUserID); // UserBuilder($Discussion, 'Insert');

// Prep event args.
$CssClass = CssClass($Discussion, false);
$this->EventArguments['Discussion'] = &$Discussion;
$this->EventArguments['Author'] = &$Author;
$this->EventArguments['CssClass'] = &$CssClass;

// DEPRECATED ARGUMENTS (as of 2.1)
$this->EventArguments['Object'] = &$Discussion;
$this->EventArguments['Type'] = 'Discussion';

// Discussion template event
$this->fireEvent('BeforeDiscussionDisplay');
?>
<div class="row">
<div id="<?php echo 'Discussion_'.$Discussion->DiscussionID; ?>" class="<?php echo $CssClass; ?> col-lg-12 col-md-12">
    <div class="post">
        <div class="post-user pull-left">
            <?php
            if ($UserPhotoFirst) {
                echo userPhoto($Author);
            } else {
                echo userPhoto($Author);
            }
            echo formatMeAction($Discussion);
            ?>
        </div>
        <div class="post-content pull-right">
            <?php $this->fireEvent('BeforeDiscussionBody'); ?>
            <div class="post-body">
                <?php
                echo formatBody($Discussion);
                ?>
            </div>
            <?php
            $this->fireEvent('AfterDiscussionBody');
            writeReactions($Discussion);
            if (val('Attachments', $Discussion)) {
                writeAttachments($Discussion->Attachments);
            }
            ?>
        </div>
        <div class="post-meta">
            <span class="AuthorInfo">
                <?php
                echo "Posted by: " . userAnchor($Author, 'Username');
                echo wrapIf(htmlspecialchars(val('Title', $Author)), 'span', array('class' => 'MItem AuthorTitle'));
                echo wrapIf(htmlspecialchars(val('Location', $Author)), 'span', array('class' => 'MItem AuthorLocation'));
                $this->fireEvent('AuthorInfo');
                ?>
            </span>
            <span class="MItem DateCreated">
                <?php
                echo "on " . anchor(Gdn_Format::date($Discussion->DateInserted, 'html'), $Discussion->Url, 'Permalink', array('rel' => 'nofollow'));
                ?>
            </span>
                <?php
                echo dateUpdated($Discussion, array('<span class="MItem">', '</span>'));
                ?>
                <?php
                // Include source if one was set
                if ($Source = val('Source', $Discussion)) {
                    echo ' '.wrap(sprintf(t('via %s'), t($Source.' Source', $Source)), 'span', array('class' => 'MItem MItem-Source')).' ';
                }
                // Category
                if (c('Vanilla.Categories.Use')) {
                    echo ' <span class="MItem Category">';
                    echo ' '.t('in').' ';
                    echo anchor(htmlspecialchars($this->data('Discussion.Category')), categoryUrl($this->data('Discussion.CategoryUrlCode')));
                    echo '</span> ';
                }

                // Include IP Address if we have permission
                if ($Session->checkPermission('Garden.PersonalInfo.View')) {
                    echo " | " . wrap(ipAnchor($Discussion->InsertIPAddress), 'span', array('class' => 'MItem IPAddress'));
                }

                $this->fireEvent('DiscussionInfo');
                $this->fireEvent('AfterDiscussionMeta'); // DEPRECATED
                ?>
        </div>
    </div>
</div>
</div>
