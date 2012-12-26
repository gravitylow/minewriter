<?php
  include("Yaml.php");
  include("Dumper.php");
  include("Inline.php");
  include("Escaper.php");
    use Symfony\Component\Yaml\Yaml;

    $array = array('Author' => 'lol768', 'Title' => 'Epic story', 'Content' => "\"\'EURGH");

    print Yaml::dump($array);

?>
