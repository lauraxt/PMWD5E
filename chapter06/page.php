<?php
class Page
{
  // class Page's attributes
  public $content;
  public $title = "TLA Consulting Pty Ltd";
  public $keywords = "TLA Consulting, Three Letter Abbreviation, 
                     some of my best friends are search engines";
  public $buttons = array("Home"   => "home.php", 
                        "Contact"  => "contact.php", 
                        "Services" => "services.php", 
                        "Site Map" => "map.php"
                    );

  // class Page's operations
  public function __set($name, $value)
  {
    $this->$name = $value;
  }

  public function Display()
  {
    echo "<html>\n<head>\n";
    $this -> DisplayTitle();
    $this -> DisplayKeywords();
    $this -> DisplayStyles();
    echo "</head>\n<body>\n";
    $this -> DisplayHeader();
    $this -> DisplayMenu($this->buttons);
    echo $this->content;
    $this -> DisplayFooter();
    echo "</body>\n</html>\n";
  }

  public function DisplayTitle()
  {
    echo "<title>".$this->title."</title>";
  }

  public function DisplayKeywords()
  {
    echo "<meta name='keywords' content='".$this->keywords."'/>";
  }

  public function DisplayStyles()
  { 
    ?>   
    <link href="styles.css" type="text/css" rel="stylesheet" media="screen" />
    <?php
  }

  public function DisplayHeader()
  { 
    ?>   
    <div class="header">
          <img class="header-logo" src="logo.gif" alt="TLA logo"/>
          <h1 class="header-text">TLA Consulting</h1>
    </div>
    <?php
  }

  public function DisplayMenu($buttons)
  {
    echo "<div class='menu'>";

    while (list($name, $url) = each($buttons)) {
      $this->DisplayButton($name, $url, 
               !$this->IsURLCurrentPage($url));
    }
    echo "</div>\n";
  }

  public function IsURLCurrentPage($url)
  {
    if(strpos($_SERVER['PHP_SELF'],$url)===false)
    {
      return false;
    }
    else
    {
      return true;
    }
  }

  public function DisplayButton($name,$url,$active=true)
  {
    if ($active) { ?>
      <div class="menuitem">
        <a href="<?=$url?>">
        <img src="s-logo.gif" alt="" height="20" width="20" />
        <span class="menutext"><?=$name?></span>
        </a>
      </div>
      <?php
    } else { ?>
      <div class="menuitem">
      <img src="side-logo.gif">
      <span class="menutext"><?=$name?></span>
      </div>
      <?php
    }  
  }

  public function DisplayFooter()
  {
    ?>
    <!-- page footer -->
    <div class="footer">
        <p class="foot">&copy; TLA Consulting Pty Ltd.</p>
        <p class="foot">Please see our
          <a href="legal.php">legal information page</a></p>
    </div>
    <?php
  }
}
?>

