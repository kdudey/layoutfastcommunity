<!DOCTYPE html>
<html lang="{$CurrentLocale.Lang}" class="sticky-footer-html">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {asset name="Head"}
  </head>
  <body id="{$BodyID}" class="{$BodyClass} sticky-footer-body">
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">{t c="Toggle navigation"}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{link path="home"}">{logo}</a>
        </div>

        <div class="navbar-collapse collapse">
          <!--
          <ul class="nav navbar-nav">
            {categories_link}
            {discussions_link}
            {activity_link}
            {custom_menu}
          </ul>
          -->
          <div class="nav navbar-nav search-form">
            {searchbox}
          </div>
          {if $User.SignedIn}
            <ul class="nav navbar-nav navbar-right hidden-xs">
              {module name="MeModule"}
            </ul>
            <ul class="nav navbar-nav navbar-right visible-xs">
              {profile_link}
              {inbox_link}
              {bookmarks_link}
              {dashboard_link}
              {signinout_link}
            </ul>
          {else}
            <ul class="nav navbar-nav navbar-right">
              {signin_link}
            </ul>
          {/if}
        </div>
      </div>
    </nav>

    <div class="hero">
      <img src="{"/themes/layoutfast/design/bim-hero.jpg"|asset_url:true}">
    </div>

    <section class="container">
      <div class="row">
        <main class="page-content" role="main">
        <!--
          {if InSection(array("CategoryList", "CategoryDiscussionList", "DiscussionList"))}
            <div class="well search-form">{searchbox}</div>
          {/if}
        -->
          {asset name="Content"}
        </main>

        <aside class="page-sidebar" role="complementary">
          {asset name="Panel"}
        </aside>
      </div>
    </section>

    <footer class="page-footer sticky-footer">
      <div class="container">
        <div class="clearfix">
          <!--
          <p class="pull-left">{t c="Copyright"} &copy; {$smarty.now|date_format:"%Y"}, Schneider Electric</p>
          <p class="pull-right hidden-xs"><a href="{link path="home"}">{logo}</a></p>
          -->
          <p class="pull-left" style="padding-top:10px;">Sponsored by:</p>
          <img src="{"/themes/schneider/design/sponsors.jpg"|asset_url:true}">          
        </div>
        {asset name="Foot"}
      </div>
    </footer>

    {event name="AfterBody"}
  </body>
</html>
