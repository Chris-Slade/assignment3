<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Assignment 3</title>

  <link rel="stylesheet" href="assignment3.css">
</head>
<body>
  <div class="container">
    <?php
      include 'ParentClass.php';
      include 'ChildClass.php';

      echo "<!-- Start of PHP output -->\n";

      $text = file('input.md');
      $formatter = new MarkdownFormatter($text);
      echo join("\n", $formatter->get_formatted()), "\n";

      echo "<!-- End of PHP output -->\n";
    ?>
  </div>
</body>
</html>

<!-- vim: set sw=2 ts=2 sts=2: -->
